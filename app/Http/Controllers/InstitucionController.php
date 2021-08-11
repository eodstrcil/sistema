<?php
namespace App\Http\Controllers;
use App\Models\Institucion;
use Illuminate\Http\Request;

class InstitucionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['instituciones'] = Institucion::paginate(2);
        return view('institucion.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('institucion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'Nombre'=>'required|string|max:150',
            'URL'=>'required|string|max:150',
            'Direccion'=>'required|string|max:150',
            'latitud'=>'unsignedDecimal|max:19',
            'longitud'=>'unsignedDecimal|max:20', 
        ];

        $mensaje=[
            'required'=>'Campo :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);
        $datosInstitucion = request()->except('_token');
        Institucion::insert($datosInstitucion);
        return redirect('institucion')->with('mensaje','Institucion agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function show(Institucion $institucion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $institucion = Institucion::findOrFail($id);
        return view('institucion.edit', compact('institucion') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'Nombre'=>'required|string|max:150',
            'URL'=>'required|string|max:150',
            'Direccion'=>'required|string|max:150',
            'latitud'=>'unsignedDecimal|max:19',
            'longitud'=>'unsignedDecimal|max:20',          
        ];

        $mensaje=[
            'required'=>'Campo :attribute es requerido',            
        ];

        $this->validate($request, $campos, $mensaje);
        $datosInstitucion = request()->except(['_token','_method']);
        Institucion::where('id','=',$id)->update($datosInstitucion);
        $institucion=Institucion::findOrFail($id);
        return redirect('institucion')->with('mensaje','Institucion Modificada');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $institucion=Institucion::findOrFail($id);
        Institucion::destroy($id);
        return redirect ('institucion')->with('mensaje','Institucion borrada');
    }
}
