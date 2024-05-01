<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Fournisseur</title>
    <link rel="stylesheet" href="/css/style.css">

</head>

<body>
    <div class="container">
        <h2 class="text-center">Fournisseurs</h2>
        <a href="/" class="home">Home</a>
        <div class="row m-4">
            <div class="col-6 p-2">
                <h4 class="m-2">Ajouter un Fournisseur</h4>
                <form action="/new_fournisseur" method="POST" enctype="multipart/form-data"
                    class="container gap m-3 d-flex flex-column  w-75">
                    @csrf
                    <div>
                        <label for="titre" class="form-label">Nom Société :</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div>
                        <label for="titre" class="form-label">Téléphone :</label>
                        <input type="tel" name="phone" id="" class="form-control" required>
                    </div>
                    <button type="submit" class="submit">Ajouter</button>

                </form>
            </div>
            <div class="col-6 p-2">
                <h4 class="m-2">List des Fournisseur</h4>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <table class="tabel table table-bordered my-4">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nom Société</th>
                            <th>Téléphone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fournisseurs as $fournisseur)
                            <tr>
                                <td>{{ $fournisseur->id }}</td>
                                <td>{{ $fournisseur->name }}</td>
                                <td>{{ $fournisseur->phone }}</td>
                                <td>
                                    <a href="/remove_four/{{ $fournisseur->id }}" class="btn btn-danger w-100 delete"><i
                                            class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <span class="text-center">{{ $fournisseurs->links() }}</span>

            </div>
        </div>
    </div>
    <script src="/js/main.js"></script>
</body>

</html>
