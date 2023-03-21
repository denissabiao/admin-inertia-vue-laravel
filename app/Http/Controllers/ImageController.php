<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class ImageController extends Controller
{
    private $image;

    public function __construct(Image $image)
    {
        $this->image = $image;
    }

    public function index()
    {
        $images = $this->image->all();
        return Inertia::render('Image/List', ['images' => $images]);
    }

    public function create()
    {
        return Inertia::render('Image/Create');
    }

    public function store(Request $request)
    {
        $message = [
        ];

        $request->validate([
            'src' => 'required',
            'alt' => 'required',
            'image_id' => 'required | unique:images,image_id',
        ], $message);

        $this->image->fill($request->input());
        $this->image->save();

        return redirect()->back()->with('success', 'Variação Cadastrada com Sucesso');
    }

    public function show($id)
    {
        DB::beginTransaction();

        try {
            $image = $this->image->findOrFail($id);
            DB::commit();
            return Inertia::render('Image/Edit', ['image' => $image]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors('Error', $th);
        }

    }



    public function update(Request $request, $id)
    {
        $message = [
        ];

        $request->validate([
            'src' => 'required',
            'alt' => 'required',
        ], $message);

        try {
            $this->image->findOrFail($request->input($id))->update($request->except('id'));
            DB::commit();
            return redirect()->back()->with('success', 'Imagem alterada com sucesso.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors('Error', $th);
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $this->image->destroy($id);
            DB::commit();
            return redirect()->back()->with('success', 'Imagem excluida com sucesso.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors('Error', $th);
        }
    }
}