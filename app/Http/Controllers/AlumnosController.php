<?php

namespace App\Http\Controllers;

use App\Models\Alumnos;
use Illuminate\Http\Request;

class AlumnosController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-alumnos | crear-alumnos | editar-alumnos | borrar-alumnos',['only'=>['index']]);
        $this->middleware('permission:crear-alumnos',['only'=>['create', 'store']]);
        $this->middleware('permission:editar-alumnos',['only'=>['edit', 'update']]);
        $this->middleware('permission:borrar-alumnos',['only'=>['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumn = Alumnos::paginate(5);
        return view('alumnos.index', compact('alumn'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alumnos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'titulo' => 'require',
            'contenido' => 'require'
        ]);
        Blog::create($request->all());
        return redirect()->route('alumnos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumnos $alumnos)
    {
        return view('alumnos.editar', compact('alumnos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumnos $alumnos)
    {
        request()->validate([
            'titulo' => 'require',
            'contenido' => 'require'
        ]);
        $alumnos->update($request->all());
        return redirect()->route('alumnos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumnos  $alumnos)
    {
        $alumnos->delete();
        return redirect()->route('alumnos.index');
    }
}
