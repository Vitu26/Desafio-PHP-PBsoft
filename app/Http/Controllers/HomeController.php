<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

/**
 * Esse controlador permite que a aplicação realize operações CRUD (criar, ler, atualizar e excluir) para produtos e exiba a lista de produtos, permitindo que o usuário crie, edite, visualize e exclua produtos através das diferentes ações definidas no controlador.
 */

class HomeController extends Controller
{


    //método responsável por exibir a lista paginada de produtos na pagina inicial
    public function index()
    {
        $products = Product::paginate(10);//exibe 10 produtos pro pagina
        return view('index', compact('products'));//retorna a view index e compacta os produtos retornados
    }

    //método que exibe o formulario de criação
    public function create()
    {
        return view('create');
    }


    //Processa a submissão do formulario de criação
    //valida os dados recebidos usando a classe productstorerequest que contém as regras de validação
    public function store(ProductStoreRequest $request)
    {
        $register= Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'category' => $request->category,
            'value' => $request->value,
            'quanty' => $request->quanty,

        ]);
        //se os dados forem válidos, cria um novo produto na tabela products e retorna a view
        if ($register) {
            return redirect('products');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * método responsável por exibir os detalhes de um produto em especifico com base no ID
     */
    public function show($id)
    {
        $products= Product::find($id);//procura o produto no banco de dados usando o ID
        return view('show', compact('products'));//retorna a view e compacta os detalhes do produto
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * Esse método exibe o formulário de edição de produto para um produto específico com base no ID fornecido.
     */
    public function edit($id)
    {
        $products = Product::find($id);//procura o produto no banco de dados com base no id
        return view('create', compact('products'));//retorna a view 'create'(usada tanto pra criação quanto para edição)e compacta os detalhes do produto para serem usados na view.
    }



    /**
     * Esse método é responsável por processar a submissão do formulário de edição de produto.
     */
    public function update(ProductStoreRequest $request, $id)
    {
        Product::where(['id' => $id])->update([
            'name' => $request->name,
            'description' => $request->description,
            'category' => $request->category,
            'value' => $request->value,
            'quanty' => $request->quanty,
        ]);
        /**
         * Ele valida os dados recebidos usando a classe ProductStoreRequest, que contém as regras de validação para a atualização de produtos.
         * Se os dados forem válidos, ele atualiza o produto no banco de dados usando o modelo Product e o ID fornecido.
         */
        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     * Esse método é responsável por excluir um produto com base no ID fornecido.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);//Ele exclui o produto do banco de dados usando o modelo Product e o ID fornecido.
        return redirect('products');//Após a exclusão do produto, ele redireciona o usuário para a página de lista de produtos.
    }
}
