<?php

use App\Http\Controllers\Stock;
use Illuminate\Support\Facades\Route;

Route::get('/', [Stock::class, 'home']);
Route::get('/fournisseur' , [Stock::class , 'Fournisseur']);
Route::get('/Produits' , [Stock::class , 'Produits']);
Route::get('/Catégorie' , [Stock::class , 'Catégorie']);
Route::get('/remove_cat/{id}', [Stock::class, 'RemoveCat']);
Route::get('/remove_four/{id}', [Stock::class, 'RemoveFour']);
Route::get('/removeProd/{id}', [Stock::class, 'RemoveProd']);
Route::post('/produit/search', [Stock::class , 'search'])->name('produit.search');
Route::post('/new_catégorie', [Stock::class , 'new_catégorie']);
Route::post('/new_fournisseur', [Stock::class , 'new_fournisseur']);
Route::post('new_product', [Stock::class , 'new_product']);
Route::get('/update/{id}', [Stock::class , 'update']);
Route::post('/update_produit' , [Stock::class , 'update_produit']);