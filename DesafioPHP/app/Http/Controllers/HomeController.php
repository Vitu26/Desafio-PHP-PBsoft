<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class HomeController extends Controller
{


    public function index()
    {
        $products = Product::paginate(10);
        return view('index', compact('products'));
    }


    public function create()
    {
        return view('create');
    }


    public function store(ProductStoreRequest $request)
    {
        $register= Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'category' => $request->category,
            'value' => $request->value,
            'quanty' => $request->quanty,

        ]);
        if ($register) {
            return redirect('products');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products= Product::find($id);
        return view('show', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::find($id);
        return view('create', compact('products'));
    }


    public function update(ProductStoreRequest $request, $id)
    {
        Product::where(['id' => $id])->update([
            'name' => $request->name,
            'description' => $request->description,
            'category' => $request->category,
            'value' => $request->value,
            'quanty' => $request->quanty,
        ]);
        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('products');
    }
}
