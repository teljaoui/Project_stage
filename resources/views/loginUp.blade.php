<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Modifier mote de passe</title>
    <link rel="stylesheet" href="/css/style.css">

</head>

<body>
    <div class="container">
        <h2 class="text-center">Modifier mote de passe</h2>
        <a href="/" class="home">Home</a>
        <div class="row">
            <div class="col-12">
                <form action="/password_up" method="POST" enctype="multipart/form-data"
                    class="container gap m-3 d-flex flex-column w-50 mx-auto">
                    @csrf
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @elseif(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div>
                        <label for="" class="form-label">New Password</label>
                        <input type="password" name="password" id="" class="form-control" required>
                    </div>
                    <div>
                        <label for="" class="form-label">Confirme Password</label>
                        <input type="password" name="password_confirme" id="" class="form-control" required>
                    </div>

                    <button type="submit" class="submit">Modifier</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
