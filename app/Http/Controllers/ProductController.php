<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

use function Termwind\render;

class ProductController extends Controller
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        $products = $this->product->all();
        return Inertia::render('Product/List', ['products' => $products]);
    }


    public function create()
    {
        return Inertia::render('Product/Create');
    }

    public function store(Request $request)
    {
        $message = [];

        $request->validate([
            'title' => "required",
            'description' => "required",
            'type' => "required",
            'brand' => "required",
            'category' => "required",
            'price' => "required",
            'stock' => "required",
        ], $message);

        $this->product->fill($request->input());
        $this->product->save();

        return redirect()->back()->with('success', 'Produto Cadastrado com Sucesso');

    }


    public function show($id)
    {
        $product = $this->product->find($id);
        return Inertia::render('Product/Edit', ['product' => $product]);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request)
    {
        $message = [];

        $request->validate([
            'title' => "required",
            'description' => "required",
            'type' => "required",
            'brand' => "required",
            'category' => "required",
            'price' => "required",
            'sale' => "required",
            'stock' => "required",
        ], $message);

        $this->product->find($request->input('id'))->update($request->except('id'));
        return redirect()->back()->with('success', 'Produto alterado com sucesso.');
    }


    public function destroy($id)
    {
        $this->product->destroy($id);

        return redirect()->back()->with('success', 'Produto excluido com sucesso.');
    }
}