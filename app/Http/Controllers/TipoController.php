<?php
namespace App\Http\Controllers;
use App\Models\Tipo;
use Illuminate\Http\Request;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['tipos'] = Tipo::paginate(2);
        return view('tipo.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tipo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $campos=[
            'Tipo'=>'required|string|max:100'
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);
        //$datosEmpleado = request()->all();
        $datosTipo = request()->except('_token');
        
        Tipo::insert($datosTipo);
        //return response()->json($datosEmpleado);
        return redirect('tipo')->with('mensaje','Tipo agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function show(Tipo $tipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipo = Tipo::findOrFail($id);
        return view('tipo.edit', compact('tipo') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tipo $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'Tipo'=>'required|string|max:100',           
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',            
        ];

        $this->validate($request, $campos, $mensaje);
        $datosTipo = request()->except(['_token','_method']);
        Tipo::where('id','=',$id)->update($datosTipo);
        $tipo=Tipo::findOrFail($id);
        return redirect('tipo')->with('mensaje','Tipo Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo=Tipo::findOrFail($id);
        Tipo::destroy($id);
        return redirect ('tipo')->with('mensaje','Tipo borrado');
    }
}
