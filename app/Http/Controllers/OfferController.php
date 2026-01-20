<?php

namespace App\Http\Controllers;
use App\Models\Offer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OfferController extends Controller
{
    /**
     * Muestra por separado las ofertas actuales y las no aplicadas
     */
    public function index(): View
    {
        $activeOffers = Offer::whereHas('products')
            ->get();

        $upcomingOffers = Offer::WhereDoesntHave('products')
            ->get();

        return view('offers.index', compact('activeOffers', 'upcomingOffers'));
    }


    /**
     * Show products with a specific offer
     */
    public function show(string $id): View
    {
        // Validate ID format
        if (!is_numeric($id) || $id < 1) {
            abort(404, 'ID de oferta inválido');
        }
        
        $offer = Offer::find($id);
        
        if (!$offer) {
            abort(404, 'Oferta no encontrada');
        }
        
        $offerProducts = $offer->products()->with(['category'])->get();

        return view('offers.show', compact('offer', 'offerProducts'));
    }
}
?>