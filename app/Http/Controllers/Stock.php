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
        $produits = Produits::paginate(5);
        return view('home', compact('produits'));
    }
    public function Fournisseur()
    {
        $fournisseurs = Fournisseurs::paginate(6);
        ;
        return view('fournisseur', compact('fournisseurs'));
    }
    public function Catégorie()
    {
        $catégories = Categories::paginate(6);
        return view('catégorie', compact('catégories'));
    }
    public function Produits()
    {
        $fournisseurs = Fournisseurs::all();
        $catégories = Categories::all();
        return view('produits', compact('catégories', 'fournisseurs'));
    }
    public function RemoveCat($id)
    {
        $categorie = Categories::find($id);
        if (!$categorie) {
            return redirect('/Catégorie')->with('error', 'Catégorie non trouvée.');
        }

        $categorie->delete();
        return redirect('/Catégorie')->with('success', 'La catégorie a été supprimée avec succès.');
    }

    public function RemoveFour($id)
    {
        $fournisseur = Fournisseurs::find($id);
        if (!$fournisseur) {
            return redirect('/fournisseur')->with('error', 'Fournisseur non trouvé.');
        }

        $fournisseur->delete();
        return redirect('/fournisseur')->with('success', 'Le fournisseur a été supprimé avec succès.');
    }
    public function RemoveProd($id)
    {
        $produit = Produits::find($id);
        if (!$produit) {
            return redirect('/')->with('error', 'Produit non trouvé.');
        }

        $produit->delete();
        return redirect('/')->with('success', 'Le produit a été supprimé avec succès.');
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
            $produit = Produits::create([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'price' => $request->get('price'),
                'quantité' => $request->get('quantité'),
                'fournisseur_id' => $request->get('fournisseur_id'),
                'categorie_id' => $request->get('categorie_id')
            ]);
            $matricule = $produit->id;
            session()->flash('success', 'Produit ajouté avec succès. "Matricule du produit" : ' . '{' . $matricule . '}'  );
        } catch (\Exception $e) {
            session()->flash('error', 'Une erreur est survenue lors de l\'ajout du produit. Assurez-vous de remplir tous les champs');
        }

        return redirect('/');
    }
    public function update($id)
    {
        $produit = Produits::find($id);
        $fournisseurs = Fournisseurs::all();
        $catégories = Categories::all();
        return view('update', compact('produit', 'catégories', 'fournisseurs'));
    }
    public function update_produit(Request $request)
    {
        $produit = Produits::find($request->get('id'));
        try {
            $produit->update(
                [
                    'name' => $request->get('name'),
                    'description' => $request->get('description'),
                    'price' => $request->get('price'),
                    'quantité' => $request->get('quantité'),
                    'fournisseur_id' => $request->get('fournisseur_id'),
                    'categorie_id' => $request->get('categorie_id')
                ]
            );
            session()->flash('success', 'Produit Modifié avec succès.');
        } catch (\Exception $e) {
            session()->flash('error', 'Une erreur est survenue lors de Modifieé du produit.');
        }
        return redirect('/');
    }
    public function update_quant(Request $request)
    {
        $produit = Produits::find($request->get('id'));
        if (!$produit) {
            return redirect('/')->with('error', 'Produit non trouvé.');
        }
        try {
            $ancienne = $produit->quantité;
            $quantité_vendu = $request->get('quantité_vendu');
            $newquantité = $ancienne - $quantité_vendu;
            $produit->update(
                [
                    'quantité' => $newquantité
                ]
            );
            if ($newquantité <= 0) {
                $produit->delete();
                session()->flash('warning', 'La quantité de produit est inférieure ou égale à 0, le produit est donc supprimé');
            } else {
                session()->flash('success', 'Quantité du produit mise à jour avec succès.');
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Une erreur est survenue lors de la mise à jour de la quantité du produit.');
        }
        return redirect('/');
    }
}
