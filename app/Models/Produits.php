<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produits extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'quantité',
        'fournisseur_id',
        'categorie_id'
    ];
    public function fournisseur()
    {
        return $this->belongsTo(Fournisseurs::class);
    }

    public function categorie()
    {
        return $this->belongsTo(Categories::class);
    }
}
