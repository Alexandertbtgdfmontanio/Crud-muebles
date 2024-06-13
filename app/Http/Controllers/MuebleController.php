<?php

namespace App\Http\Controllers;

use App\Models\Mueble;
use Illuminate\Http\Request;

class MuebleController extends Controller
{
    public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        $muebles = Mueble::where('mueble', 'LIKE', '%' . $texto . '%')
                        ->orWhere('material', 'LIKE', '%' . $texto . '%')
                        ->orderBy('id', 'asc')
                        ->paginate(10);

        return view('almacen.mueble.index', compact('muebles', 'texto'));
    }

    public function create()
    {
        return view('almacen.mueble.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'mueble' => 'required|string|max:255',
            'material' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'imagen' => 'nullable|image|max:2048',
        ]);

        $mueble = new Mueble();
        $mueble->mueble = $request->mueble;
        $mueble->material = $request->material;
        $mueble->precio = $request->precio;

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('imagenes/muebles'), $filename);
            $mueble->imagen = $filename;
        }

        $mueble->save();

        return redirect()->route('mueble.index')->with('success', 'Mueble creado correctamente.');
    }

    public function edit($id)
    {
        $mueble = Mueble::findOrFail($id);
        return view('almacen.mueble.edit', compact('mueble'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'mueble' => 'required|string|max:255',
            'material' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'imagen' => 'nullable|image|max:2048',
        ]);

        $mueble = Mueble::findOrFail($id);
        $mueble->mueble = $request->mueble;
        $mueble->material = $request->material;
        $mueble->precio = $request->precio;

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('imagenes/muebles'), $filename);

            if ($mueble->imagen && file_exists(public_path('imagenes/muebles/' . $mueble->imagen))) {
                unlink(public_path('imagenes/muebles/' . $mueble->imagen));
            }

            $mueble->imagen = $filename;
        }

        $mueble->save();

        return redirect()->route('mueble.index')->with('success', 'Mueble actualizado correctamente.');
    }

    public function destroy($id)
    {
        $mueble = Mueble::findOrFail($id);

        if ($mueble->imagen && file_exists(public_path('imagenes/muebles/' . $mueble->imagen))) {
            unlink(public_path('imagenes/muebles/' . $mueble->imagen));
        }

        $mueble->delete();

        return redirect()->route('mueble.index')->with('success', 'Mueble eliminado correctamente.');
    }
}