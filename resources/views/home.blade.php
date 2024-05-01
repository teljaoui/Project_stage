<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Home page</title>
    <link rel="stylesheet" href="/css/style.css">

</head>

<body>
    <div class="container">
        <h2 class="text-center">Gestion de stock</h2>
        <div class="d-flex py-5 justify-content-between align-items-center">
            <div class="search d-flex">
                <form action="{{ route('produit.search') }}" method="POST" class="d-flex">
                    @csrf
                    <input type="number" name="id" class="form-control" placeholder="Matricule">
                    <button type="submit">Recherche</button>
                </form>

            </div>
            <div class="lien">
                <a href="/Produits" class="btn">Ajouter des Produits</a>
                <a href="/fournisseur" class="btn">Ajouter un Fournisseur</a>
                <a href="/Catégorie" class="btn">Ajouter Catégorie</a>
            </div>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <h4>List des Produits</h4>
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
                        @foreach ($produits as $produit)
                            <tr>
                                <td>{{ $produit->id }}</td>
                                <td>{{ $produit->name }}</td>
                                <td>{{ $produit->description }}</td>
                                <td>{{ $produit->price }}</td>
                                <td>{{ $produit->quantité }}</td>
                                <td>{{ $produit->categorie->name }}</td>
                                <td>{{ $produit->fournisseur->name }}</td>
                                <td class="d-flex">
                                    <a href="/removeProd/{{ $produit->id }}" class="btn btn-danger delete"><i
                                            class="fa-solid fa-trash"></i></a>
                                    <a href="/update/{{ $produit->id }}" id="remove" class="btn btn-info mx-1"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-12">
                <span class="text-center">{{ $produits->links() }}</span>
            </div>
        </div>
    </div>
    <script src="/js/main.js"></script>
</body>

</html>
