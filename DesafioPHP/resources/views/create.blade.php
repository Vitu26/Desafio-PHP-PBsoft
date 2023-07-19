@extends('templates.template')

<!-- Template de edição e exclusão -->
@section('content')
    <div class="container" id="form_cad-edit">

        <!-- Titulo/ dependendo o botão apertado -->
        <h1 class="text-center title-form">@if (isset($products))Editar Produto @else Cadastro @endif</h1>

        <!-- Tratamento de erros -->
        @if (isset($errors) && count($errors) > 0)
            @foreach ($errors->all() as $erro)
                <p class="text-center alert-danger">{{ $erro }}</p>
            @endforeach
        @endif
        <br>

        <!-- Escolha do metodo a ser enviado, definindo se é o template de edição ou cadastro-->
        @if (isset($products))
            <form name="edit" id="edit" method="POST" action="{{ url('products/' . $products->id) }}">
                @method('PUT')
            @else
                <form name="cadastro" id="cad" method="POST" action="{{ url('products') }}">
        @endif
        @csrf


        <!-- Para exibir informações caso seja na opção editar -->
        <input id="i1" type="text" class="form-control input-txt" placeholder="Nome do Produto" name="name"
            value='{{ $products->name ?? '' }}' required>


        <input id="i2" type="text" class="form-control input-txt" placeholder="Descrição" name="description"
            value='{{ $products->description ?? '' }}' required>

        <!-- Apenas em caso de edição sera exibido lateralmente a categoria -->
        @if (isset($products))
            <div class="input-group">
                <div class="input-group-append">
                    <span class="input-group-text input-txt">{{ $products->category ?? '' }}</span>
                </div>
        @endif

        <select id="i3" class="form-control input-txt" name="category">
            <option value="Sem categoria selecionada">Selecione a categoria</option>
            <option value="Limpeza">Limpeza</option>
            <option value="Alimentação">Alimentação</option>
            <option value="Materiais de Construção">Materiais de Construção</option>
            <option value="Produtos Industriais">Produtos Industriais</option>
            <option value="Teste">Teste</option>
        </select>
        @if (isset($products))</div> @endif

        <div id="i4" class="row">
            <div class="col-md-6">
                <div class="input-group">
                    <div class="input-group-append">
                        <span class="input-group-text input-txt">R$</span>
                    </div>
                    <input type="number" class="form-control input-txt" placeholder="Preço" name="value" step="0.01"
                        value='{{ $products->value ?? '' }}' required>
                </div>
            </div>
            <div class="col-md-6">
                <input type="number" class="form-control input-txt" placeholder="Quantidade" name="quanty"
                    value='{{ $products->quanty ?? '' }}' required>
            </div>
        </div>
        <div class="text-center">
            <button class="btn btn-success"> Salvar</button>
        </div>
    </div>
    </form>
@endsection
