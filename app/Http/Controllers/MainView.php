<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;


class MainView extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public  function __invoke()
    {
        $days = array('Lunedi', 'Martedi', 'Mercoledi', 'Giovedi', 'Venerdi', 'Sabato', 'Domenica');
        $date = date('N');
        for ($i = 0; $i < count($days); $i++) {
            if (($date - 1) == $i) {
                $ind = ($date - 1);
                $conf = DB::select('select `idG`,conferimento,oraInizio,oraFine from `conf_ora` where `idG` = :id', ['id'=>$ind]);
                
                return view('mainView', ['conf' => $conf]);
            }
        }
    }
}
