<?php

namespace App\Http\Controllers;

use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class VariantController extends Controller
{
    private $variant;

    public function __construct(Variant $variant)
    {
        $this->variant = $variant;
    }

    public function index()
    {
        $variants = $this->variant->all();
        return Inertia::render('Variant/List', ['variants' => $variants]);
    }

    public function create()
    {
        return Inertia::render('Variant/Create');
    }

    public function store(Request $request)
    {
        $message = [
        ];

        $request->validate([
            'sku' => "required",
            'size' => "required",
            'color' => "required",
        ], $message);

        $this->variant->fill($request->input());
        $this->variant->save();

        return redirect()->back()->with('success', 'Variação Cadastrada com Sucesso');
    }

    public function show($id)
    {
        DB::beginTransaction();

        try {
            $variant = $this->variant->findOrFail($id);
            DB::commit();
            return Inertia::render('Variant/Edit', ['variant' => $variant]);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

    }

    public function update(Request $request, $id)
    {
        $message = [
        ];

        $request->validate([
            'sku' => "required",
            'size' => "required",
            'color' => "required",
        ], $message);

        DB::beginTransaction();
        try {
            $this->variant->findOrFail($request->input($id))->update($request->except('id'));
            DB::commit();
            return redirect()->back()->with('success', 'Variação alterado com sucesso.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors('Error', $th);
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $this->variant->destroy($id);
            DB::commit();
            return redirect()->back()->with('success', 'Variação excluida com sucesso.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors('Error', $th);
        }
    }
}