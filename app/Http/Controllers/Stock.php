<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Fournisseurs;
use App\Models\Produits;
use Illuminate\Http\Request;

class Stock extends Controller
{
    public function home()
    {
        $produits = Produits::all();
        return view('home', compact('produits'));
    }
    public function Fournisseur()
    {
        $fournisseurs = Fournisseurs::all();
        return view('fournisseur', compact('fournisseurs'));
    }
    public function Produits()
    {
        $fournisseurs = Fournisseurs::all();
        $catégories = Categories::all();
        return view('produits', compact('catégories', 'fournisseurs'));
    }
    public function Catégorie()
    {
        $catégories = Categories::all();
        return view('catégorie', compact('catégories'));
    }
    public function RemoveCat($id)
    {
        $catégorie = Categories::find($id);
        $catégorie->delete();
        return redirect('/Catégorie');
    }
    public function RemoveFour($id)
    {
        $fournisseur = Fournisseurs::find($id);
        $fournisseur->delete();
        return redirect('/fournisseur');
    }
    public function RemoveProd($id)
    {
        $produit = Produits::find($id);
        $produit->delete();
        return redirect('/');
    }
    public function search(Request $request)
    {
        $matricule = $request->input('id');

        $produit = Produits::where('id', 'like', "%$matricule%")->get();

        return view('results', compact('produit'));
    }
    public function new_catégorie(Request $request)
    {
        Categories::create(
            [
                'name' => $request->get('name')
            ]
        );
        session()->flash('success', 'Catégorie ajouté avec succès.');
        return redirect('/Catégorie');
    }
    public function new_fournisseur(Request $request)
    {
        Fournisseurs::create(
            [
                'name' => $request->get('name'),
                'phone' => $request->get('phone')
            ]
        );
        session()->flash('success', 'Fournisseur ajouté avec succès.');
        return redirect('fournisseur');
    }
    public function new_product(Request $request)
    {
        try {
            Produits::create([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'price' => $request->get('price'),
                'quantité' => $request->get('quantité'),
                'fournisseur_id' => $request->get('fournisseur_id'),
                'categorie_id' => $request->get('categorie_id'),
            ]);

            session()->flash('success', 'Produit ajouté avec succès.');
        } catch (\Exception $e) {
            session()->flash('error', 'Une erreur est survenue lors de l\'ajout du produit.');
        }

        return redirect('/');
    }
}
