<?php

namespace App\Http\Controllers;

use App\Models\Band;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('main.home');
    }



    public function allBands()
    {

        //return view ('bands.all-bands', compact('bandas'));
    }

    /**
     * Show the form for add a new band
     */
    public function addBand()
    {

        return view ('bandas.add-band');

    }


    /**
     * Show the form for creating a new resource.
     */
    public function createBand(Request $request)
    {
        $request->validate([
            'nome_bd' =>'required|string|max:50'
        ]);

        $foto_bd = null;

        if($request->has('foto_bd')){
            $foto_bd = Storage::putFile('uploadImage', $request->foto_bd);
        }

        DB::table('bandas')->insert([
            'nome_bd' => $request->nome_bd,
            'foto_bd' => $foto_bd,
        ]);

        return redirect()->route('home.index')->with('message', 'Banda criada com sucesso!!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    private function getAllBands()
    {
        $bandas = DB::table('bandas')->get();

        return $bandas;
    }

    public function show()
    {
        $allbandas = $this->getAllBands();

        foreach ($allbandas as $item) {
            //$item->albuns_qtd = Album::where('bandas_id', $item->id)->count();
        }


        return view('main.home', compact('allbandas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editBanda($id)
    {
        $myBand = DB::table('bandas')
        ->where('id', $id)
        ->first();

        return view('bandas.view_banda', compact('myBand'));

    }


    public function updateBanda(Request $request)
    {
        $request->validate([
            'nome_bd' => 'required|string|max:50',
        ]);

        $bandas = Band::findOrFail($request->id);


        if($request->has('foto_bd')){
            $foto_bd = Storage::putFile('uploadImage', $request->foto_bd);
        } else {
            $foto_bd = $bandas->foto_bd;
        }

        Band::where('id', $request->id)
        ->update([
            'nome_bd' => $request->nome_bd,
            'foto_bd' => $foto_bd,
        ]);

        return redirect()->route('home.index')->with('message', 'Banda atualizada com sucesso!!');

    }

    public function deleteBanda($id){
        DB::table('bandas')
        ->where('id', $id)
        ->delete();

        return back();
    }



}
