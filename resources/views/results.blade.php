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
                        @foreach ($produit as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->quantité }}</td>
                                <td>{{ $item->categorie->name }}</td>
                                <td>{{ $item->fournisseur->name }}</td>
                                <td class="d-flex">
                                    <a href="/removeProd/{{ $item->id }}" class="btn btn-danger delete"><i
                                            class="fa-solid fa-trash"></i></a>
                                    <a href="/update"  class="btn  btn-info mx-1"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="/js/main.js"></script>

</body>

</html>
