<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Band;
use App\Models\Albun;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    private function getAllBands() {

        $bands = DB::table('bandas')
        ->get();

        return $bands;
    }

    public function addAlbum(){

        $bands = $this->getAllBands();

        return view ('albuns.add-album', compact('bands'));
    }

    public function createAlbum(Request $request)
    {
       //$banda = Band::all();
       //dd($request->all());

        $request->validate([
            'nome_album' =>'required|string|max:50',
            'lancamento' =>'required',
            'banda_id' => 'required'

        ]);

        $imagem_album = null;

        if($request->has('foto_bd')){
            $imagem_album = Storage::putFile('uploadImage', $request->imagem_album);
        }



        DB::table('albuns')
        ->insert([
            'nome_album' => $request->nome_album,
            'lancamento' => $request->lancamento,
            'imagem_album' => $imagem_album,
            'banda_id' => $request->banda_id
        ]);

        // foreach ($bands as $bands) {
        //     $bands->albuns_qtd = Albun::where('banda_id', $banda->id)->count();
        //     $bands->save(); // Salvar as atualizações
        // }

        return redirect()->route('home.index')->with('message', ' Album adicionado a banda!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    private function getAllAlbuns()
    {
        $albuns = DB::table('albuns')->get();

        return $albuns;
    }
    /**
     * Display the specified resource.
     */
    public function show()
    {
        $albuns = $this->getAllAlbuns();

        foreach($albuns as $item){
            //
        }

        return view('albuns.all-albuns', compact('albuns'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function updateAlbum(Request $request, string $id)
    {
        $request->validate([
            'nome_bd' => 'required|string|max:50',
        ]);

        $$bandas = DB::table('bandas')
        ->where('id', $request->id)
        ->update([
            'nome_bd' => $request->name,
            'description' => $request->description,
            'user_id' => $request->user_id
        ]);

        return redirect()->route('home.index')->with('message', 'Task atualizada!'); //alterar a route

    }

    public function deleteAlbum($id){
        DB::table('albuns')
        ->where('id', $id)
        ->delete();

        return back();
    }

    public function allAlbum($id)
    {

        $band = DB::table('bandas')->where('id', $id)->first();

        $albuns = DB::table('albuns')
            ->where('banda_id', $id);

        $albuns = $albuns->get();

        return view('albuns.all-albuns', compact('albuns', 'band'));
    }
}
