<?php

namespace App\Http\Controllers;

use App\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = Marca::paginate(7);
        return view('adminMarcas', [ 'marcas'=>$marcas ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agregarMarca');
    }

    

    public function validar(Request $request)
    {
        $request->validate(
            [
                'mkNombre'=>'required|min:2|max:50'
            ]
        );
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $mkNombre = $request->input('mkNombre');
        //validación
        $this->validar($request);

        //guardamos
        $Marca = new Marca;
        $Marca->mkNombre = $mkNombre;
        $Marca->save();

        return redirect('/adminMarcas')
                    ->with('mensaje', 'Marca: '.$mkNombre. ' agregada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //obtenemos datos de la categoría
        $Marca = Marca::find($id);
        //retornamos la vista del form con esos datos
        return view('modificarMarca',
                        [
                            'marca'=>$Marca
                        ]
                    );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //capturamos datos enviados por el form
        $mkNombre = $request->input('mkNombre');
        //validación
        $this->validar($request);

        //obtenemos datos de la categoría
        $Marca = Marca::find( $request->input('idMarca') );
        //modificamos
        $Marca->mkNombre = $mkNombre;
        $Marca->save();
        //retornamos vista con mensaje de confirmación
        return redirect('adminMarcas')
                    ->with('mensaje', 'Marca: '.$mkNombre.' modificada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Marca = Marca::find($id);
        $Marca->delete();
        return redirect('adminMarcas')
                    ->with('mensaje', 'Marca eliminada correctamente.');
    }
}
