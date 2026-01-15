<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;

class CartController extends Controller
{
    /**
     * Muestra la vista del carrito de compras con los datos de la sesión.
     */
    public function index(): View
    {
        $cart = session()->get('cart', []);

        // Obtenemos los IDs de los productos del carrito
        $productIds = array_keys($cart);

        // Cargamos los modelos de producto con sus relaciones
        $cartProducts = Product::with(['category', 'offer'])->find($productIds);

        // Añadimos la cantidad a cada producto para usarla en la vista
        $cartProducts = $cartProducts->map(function ($product) use ($cart) {
            $product->quantity = $cart[$product->id]['quantity'];
            return $product;
        });

        return view('cart.index', [
            'cartProducts' => $cartProducts
        ]);
    }

    /**
     * Añade un producto al carrito de compras en la sesión.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate(['product_id' => 'required|exists:products,id']);
        $product = Product::findOrFail($request->product_id);

        // 🔒 Protección: producto agotado
        if ($product->stock <= 0) {
            return redirect()
                ->back()
                ->with('error', 'Este producto está agotado.');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {

            // 🛑 Evitar superar el stock disponible
            if ($cart[$product->id]['quantity'] >= $product->stock) {
                return redirect()->back()->with('error', 'No hay más unidades disponibles.');
            }

            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', '¡Producto añadido al carrito!');
    }

    /**
     * Actualiza la cantidad de un producto en el carrito.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate(['quantity' => 'required|integer|min:1']);
        
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->input('quantity');
            session()->put('cart', $cart);
            return redirect()->route('cart.index')->with('success', 'Cantidad actualizada correctamente.');
        }

        return redirect()->route('cart.index')->with('error', 'El producto no se encontró en el carrito.');
    }

    /**
     * Elimina un producto del carrito de compras.
     */
    public function destroy(string $id): RedirectResponse
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]); // Elimina el elemento del array
            session()->put('cart', $cart);
            return redirect()->route('cart.index')->with('success', 'Producto eliminado del carrito.');
        }

        return redirect()->route('cart.index')->with('error', 'El producto no se encontró en el carrito.');
    }
    
    /**
     * Simula la finalización de la compra, vaciando el carrito.
     */
    public function checkout(): RedirectResponse
    {
        session()->forget('cart'); // Vacía el carrito de la sesión
        return redirect()->route('welcome')->with('success', '¡Pedido realizado con éxito! Gracias por tu compra.');
    }
}