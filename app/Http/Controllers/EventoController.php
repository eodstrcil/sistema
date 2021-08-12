<?php
namespace App\Http\Controllers;
use App\Models\Evento;
use App\Models\Tipo;
use App\Models\Institucion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['eventos'] = Evento::paginate(4);
        return view('evento.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $instituciones = Institucion::all();
        $tipos = Tipo::all();
        return view('evento.create', compact('tipos','instituciones'));
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
            'Titulo'=>'required|string|max:100',
            'Descripcion'=>'required|string|max:100',
            'Cuando'=>'required|string|max:100',
            'FechaMostrar'=>'date|nullable',
            'FechaOcultar'=>'date|nullable',
            'Gratis'=>'required|boolean|max:1',
            'Foto'=>'required|max:10000|mimes:jpeg,png,jpg',
        ];

        $mensaje=[
            'required'=>'Campo :attribute es requerido',
            'Foto.required'=>'La foto es requerida'
        ];

        $this->validate($request, $campos, $mensaje);
        $datosEvento = request()->except('_token');
        if($request->hasFile('Foto')){
            $datosEvento['Foto'] = $request->file('Foto')->store('uploads','public');
        }
        
        Evento::insert($datosEvento);
        return redirect('evento')->with('mensaje','Evento agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $instituciones = Institucion::all();
        $tipos = Tipo::all();
        $evento = Evento::findOrFail($id);
        return view('evento.edit', compact('evento','tipos','instituciones') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'Titulo'=>'required|string|max:100',
            'Descripcion'=>'required|string|max:100',
            'Cuando'=>'required|string|max:100',
            'FechaMostrar'=>'date|nullable',
            'FechaOcultar'=>'date|nullable',
            'Gratis'=>'required|boolean|max:1',
            'Foto'=>'max:10000|mimes:jpeg,png,jpg',
        ];

        $mensaje=[
            'required'=>'Campo :attribute es requerido',
            'Foto.required'=>'La foto es requerida'
        ];

        if($request->hasFile('Foto') ){
            $campos=[ 'Foto'=>'required|max:10000|mimes:jpeg,png,jpg',];
            $mensaje=['Foto.required'=>'La foto es requerida'];
        }

        $this->validate($request, $campos, $mensaje);
        //
        $datosEvento = request()->except(['_token','_method']);

        if($request->hasFile('Foto') ){
            $evento=Evento::findOrFail($id);
            Storage::delete('public/'.$evento->Foto);
            $datosEvento['Foto'] = $request->file('Foto')->store('uploads','public');
        }
        Evento::where('id','=',$id)->update($datosEvento);
        $evento=Evento::findOrFail($id);
        return redirect('evento')->with('mensaje','Evento Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evento=Evento::findOrFail($id);
        if(Storage::delete('public/' . $evento->Foto)){
            Evento::destroy($id);
        }
        return redirect ('evento')->with('mensaje','Evento borrado');
    }
}
