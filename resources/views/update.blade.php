<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Produits</title>
    <link rel="stylesheet" href="/css/style.css">

</head>

<body>
    <div class="container">
        <h2 class="text-center">Modifier de Produit</h2>
        <a href="/" class="home">Home</a>
        <div class="row">
            <div class="col-12">
                <form action="/update_produit" method="POST" enctype="multipart/form-data"
                    class="container gap m-3 d-flex flex-column w-50 mx-auto">
                    @csrf
                    <input type="hidden" name="id" value="{{ $produit->id }}" />
                    <div>
                        <label for="titre">Nom Product :</label>
                        <input type="text" name="name" class="form-control" value="{{ $produit->name }}" required>
                    </div>
                    <div>
                        <label for="contenu" class="form-label">description :</label>
                        <textarea name="description" id="contenu" cols="30" rows="4" class="form-control" required>{{ $produit->description }}</textarea>
                    </div>
                    <div>
                        <label for="" class="form-label">Price</label>
                        <input type="number" min="1" name="price" id="" class="form-control"
                            value="{{ $produit->price }}" required>
                    </div>
                    <div>
                        <label for="" class="form-label">Quantité</label>
                        <input type="number" min="1" name="quantité" id="" class="form-control"
                            value="{{ $produit->quantité }}" required>
                    </div>
                    <div>
                        <label for="" class="form-label">Categorie</label>
                        <select class="form-control" name="categorie_id" id="" required>
                            <option value="" selected disabled>Choisissez une catégorie</option>
                            @foreach ($catégories as $catégorie)
                                <option value="{{ $catégorie->id }}" {{ $catégorie->id == $produit->categorie->id ? 'selected' : '' }}>{{ $catégorie->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="" class="form-label">Fournisseur</label>
                        <select class="form-control" name="fournisseur_id" id="" required>
                            <option value="" selected disabled>Choisissez un fournisseur</option>
                            @foreach ($fournisseurs as $fournisseur)
                                <option value="{{ $fournisseur->id }}" {{ $fournisseur->id == $produit->fournisseur->id ? 'selected' : '' }}>{{ $fournisseur->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <button type="submit" class="submit">Modifier</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
