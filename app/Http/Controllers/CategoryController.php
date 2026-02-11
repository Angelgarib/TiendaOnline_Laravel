<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Offer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Show all categories
     */
    public function index(): View
    {
        $categories = Category::all();
        
        return view('categories.index', ['categories' => $categories]);
    }

    /**
     * Show products from a specific category
     */
    public function show(string $id): View
    {
        // Validate ID format
        if (!is_numeric($id) || $id < 1) {
            abort(404, 'ID de categoría inválido');
        }
        
        $category = Category::find($id);
        
        if (!$category) {
            abort(404, 'Categoría no encontrada');
        }
        
        $categoryProducts = $category->products()->with(['offer'])->get();
        
        return view('categories.show', compact('category', 'categoryProducts'));
    }

    /**
     * Muestra el formulario para crear un nuevo género.
     */
    public function create(): View
    {
        // Cargar todas las categorías y ofertas para los selectores del formulario
        $categories = Category::all();
        $offers = Offer::all();
        
        return view('admin.categories.create', compact('categories', 'offers'));
    }

        /**
     * Almacena un nuevo género en la base de datos.
     */
    public function store(Request $request): RedirectResponse
    {
        // PASO 1: Validar todos los datos del formulario, incluyendo la imagen
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'slug' => 'required|alpha_dash|string|max:255|unique:categories,slug',
            'description' => 'required|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ], [
            'name.required' => 'El nombre del género es obligatorio.',
            'name.unique' => 'Ya existe un género con ese nombre.',
            'slug.required' => 'El slug del género es obligatorio.',
            'slug.unique' => 'Ya existe un género con ese slug.',
            'slug.alpha_dash' => 'El slug no puede contener espacios.',
            'description.required' => 'La descripción es obligatoria.',
            'image.image' => 'El archivo debe ser una imagen.',
            'image.mimes' => 'La imagen debe ser de tipo: jpeg, png, jpg, webp.',
            'image.max' => 'La imagen no debe superar los 2MB.',
        ]);

        // PASO 2: Procesar la imagen si fue subida
        if ($request->hasFile('image')) {
            // Guardar en el disco 'public' dentro de la carpeta 'categories'
            // Laravel genera automáticamente un nombre único para evitar colisiones
            $imagePath = $request->file('image')->store('categories', 'public');
            $validated['image'] = $imagePath;
        }

        // PASO 3: Crear el género con los datos validados
        Category::create($validated);

        // PASO 4: Redirigir con mensaje de éxito
        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Género creado exitosamente!');
    }

        /**
     * Muestra la lista de géneros en el panel de administración.
     */
    public function adminIndex(): View
    {
        $categories = Category::latest()->get();
        return view('admin.categories.index', compact('categories'));
    }

        /**
     * Muestra el formulario para editar un género existente.
     */
    public function edit(Category $category): View
    {
        // Cargar todas las categorías y ofertas para los selectores del formulario
        $categories = Category::all();
        
        return view('admin.categories.edit', compact('category'));
    }

        /**
     * Actualiza un género existente en la base de datos.
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        // PASO 1: Validar los datos del formulario
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'slug' => 'required|alpha_dash|string|max:255|unique:categories,slug,' . $category->id,
            'description' => 'required|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // PASO 2: Manejar la subida de la nueva imagen
        if ($request->hasFile('image')) {
            // Eliminar la imagen anterior si existe para no acumular archivos
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }
            // Guardar la nueva imagen y obtener su ruta
            $imagePath = $request->file('image')->store('categories', 'public');
            $validated['image'] = $imagePath;
        }

        // PASO 3: Actualizar el género con los datos validados
        $category->update($validated);

        // PASO 4: Redirigir con mensaje de éxito
        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Género actualizado exitosamente!');
    }

        /**
     * Elimina un género de la base de datos.
     */
    public function destroy(Category $category): RedirectResponse
    {
        // PASO 1: Eliminar la imagen asociada si existe
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }

        // PASO 2: Eliminar el género de la base de datos
        $category->delete();

        // PASO 3: Redirigir con mensaje de éxito
        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Género eliminado exitosamente.');
    }
}
?>
