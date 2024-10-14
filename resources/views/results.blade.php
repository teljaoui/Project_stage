<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Recherche</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <div class="container">

        <h2 class="text-center">Résultats de la recherche</h2>
        <a href="/" class="home">Home</a>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @elseif(session('warning'))
            <div class="alert alert-warning">
                {{ session('warning') }}
            </div>
        @endif

        <div class="row m-4">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Matricule</th>
                            <th>Nom Product</th>
                            <th>description</th>
                            <th>Price</th>
                            <th>Quantité</th>
                            <th>Catégorie</th>
                            <th>Fournisseur</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $produit->id }}</td>
                            <td>{{ $produit->name }}</td>
                            <td>{{ $produit->description }}</td>
                            <td>{{ $produit->price }}</td>
                            <td>{{ $produit->quantité }}</td>
                            <td>{{ $produit->categorie->name }}</td>
                            <td>{{ $produit->fournisseur->name }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="/removeProd/{{ $produit->id }}" class="btn btn-danger delete">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                    <a href="/update/{{ $produit->id }}" id="remove" class="btn btn-info mx-1">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <button class="btn btn-success afficherform" onclick="affciherform()">
                                        <i class="fa-solid fa-magnifying-glass-minus"></i>
                                    </button>
                                </div>
                                <div>
                                    <form action="/update_quant" method="POST"class="py-4">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $produit->id }}">
                                        <input type="number" class="form-control" min="0" name="quantité_vendu"
                                            placeholder="Entrez le nombre de ventes" required>
                                        <button type="submit" class="valider"><i
                                                class="fa-solid fa-check"></i></button>
                                        <button type="reset" class="reset"><i class="fa-solid fa-xmark"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="/js/main.js"></script>

</body>

</html>
