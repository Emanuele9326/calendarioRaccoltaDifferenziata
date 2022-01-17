<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\conf_ora;

class DBcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $array_giorni = array('Lunedi', 'Martedi', 'Mercoledi', 'Giovedi', 'Venerdi', 'Sabato', 'Domenica');
        for ($i = 0; $i < count($array_giorni); $i++) {
            $users = DB::table('giorno_conferimento')
                ->join('conf_ora', 'giorno_conferimento.id', '=', 'conf_ora.idG')
                ->select('giorno', 'conferimento', 'oraInizio', 'oraFine')
                ->orderBy('idG','asc')
                ->get();
            return view('weekly_collection',['users'=>$users]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('viewaddConf');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $array_day = array('Lunedi', 'Martedi', 'Mercoledi', 'Giovedi', 'Venerdi', 'Sabato', 'Domenica');
        $day = $request->input('giorno');
        $conf = $request->input('conferimento');
        $nowStart = $request->input('oraInizio');
        $nowEnd = $request->input('oraFine');


        if ((array_search($day, $array_day) + 1)) {
            $ind = array_search($day, $array_day);
            $results = DB::select('select idG,conferimento,oraInizio,oraFine from `conf_ora` where idG = :id', ['id' => $ind]);
            print_r(count($results));

            if (!count($results)) {
                for ($i = 0; $i < count($conf); $i++) {

                    if ($day != "" && $conf[$i] != "" && $nowStart[$i] != "" && $nowEnd[$i] != "") {
                        DB::insert('insert into `conf_ora` (idG, conferimento,oraInizio,oraFine) values (?, ?,?,?)', [$ind, $conf[$i], $nowStart[$i], $nowEnd[$i]]);
                    }
                }
            } else {
                $idg = $results[0]->idG;
                if ($idg == $ind) {
                    DB::delete('delete from `conf_ora` where idG=:id', ['id' => $idg]);
                }

                for ($i = 0; $i < count($conf); $i++) {

                    if ($day != "" && $conf[$i] != "" && $nowStart[$i] != "" && $nowEnd[$i] != "") {
                        DB::insert('insert into `conf_ora` (idG, conferimento,oraInizio,oraFine) values (?, ?,?,?)', [$idg, $conf[$i], $nowStart[$i], $nowEnd[$i]]);
                    }
                }
            }
        }
        return redirect('/viewaddConf')->with('completed', 'Inserimento avvenuto con successo!');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
