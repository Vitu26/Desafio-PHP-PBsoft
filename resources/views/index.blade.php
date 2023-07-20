
@extends('templates.template')
<!-- Template principal -->
@section('content')

    <!-- Tabela de dados -->
    <div class="container text-center" id="main">
        <table class="table table-bordered table table-sm" id="table-main">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>




            <!-- Loop de dados -->
            @foreach ($products as $product)

                <tbody>
                    <tr>
                        <th scope="row" class="id_table">{{ $product->id }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->category }}</td>
                        <td>R${{ $product->value }}</td>
                        <td>{{ $product->quanty }}</td>
                        <td class="link-buttons">
                            <a href='{{ url('products/' . $product->id) }}'>
                                <button class="btn btn-info">Visualizar</button>
                            </a>
                            <a href="{{ url('products/' . $product->id . '/edit') }}">
                                <button class="btn btn-primary">Editar</button>
                            </a>
                            <form action="{{ url('products/' . $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>
@endsection
