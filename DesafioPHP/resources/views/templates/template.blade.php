<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CNDS -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('dist/app.css') }}"> --}}
    <link rel="stylesheet" href="/css/app.css">

    <title>Estoque - Produtos</title>
</head>

<body>
    <!-- Cabeçalho basico -->
    <div id="header">
        <div id="header-div1">
            <h1 class="header-title"><a href="{{ url('products') }}">Desafio Estoque</a></h1>
        </div>
        <div id="header-div2">
            <button type="button" class="btn btn-success">
                <a href="{{ url('products/create') }}" class="btn_orange">Cadastrar</a>
            </button>

        </div>


    </div>
    @yield('content')
</body>

</html>
