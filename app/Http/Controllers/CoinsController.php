<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coin;
use App\Jobs\CoinCalculator;

class CoinsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coins = Coin::all();
        //dd($coins); //Imprime el contenido de coins
        //$arreglo = array() OR [];
        //$arreglo = new Coin;
        return view('coins.index', ['coins' => $coins]); //index.blade.php
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arr = $request->input();
        $coin = new Coin();
        $coin->short_name = $arr['short_name'];
        $coin->name = $arr['name'];
        $coin->save();

        //Everytime a coin stores, our CoinCalculator queue will execute
        CoinCalculator::dispatch();
        
        return redirect()->route('coins.index');
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
        $coins = Coin::find($id);
        return view('coins.put', ['coin' => $coins]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $arr = $request->input();
        //dd($arr);
        $coin = Coin::find($id);

        $coin->short_name = $arr['short_name'];
        $coin->name = $arr['name'];
        $coin->save();
        
        return redirect()->route('coins.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coin = Coin::find($id);
        $coin->delete();
        return redirect()->route('coins.index');

    }
}
