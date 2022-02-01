<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\days_table;
use App\Models\withdrawal_table;

class ControllerCRUD extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $days_week = array('Lunedi', 'Martedi', 'Mercoledi', 'Giovedi', 'Venerdi', 'Sabato', 'Domenica');
        $result = [];

        //for loop iterates over $days_week;
        for ($i = 0; $i < count($days_week); $i++) {
            
            //A one-to-many relationship 
            $collection = days_table::find($i+1)->withdraw;

            foreach ($collection as $value) {

                $stack = array(
                    'days' => $days_week[$i],
                    'material' => $value->material,
                    'start_now' => $value->start_now,
                    'end_now' => $value->end_now
                );
                array_push($result, $stack);
            }
        }  
        return view('weekly_calendar', ['result' => $result]);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_calendar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'day' => 'required',
            'material.*' => 'required',
            'start_time.*' => 'required',
            'end_time.*' => 'required'

        ]);
        $material = $validate['material'];
        $start_time = $validate['start_time'];
        $end_time = $validate['end_time'];
        
        
        $days_week = array('Lunedi', 'Martedi', 'Mercoledi', 'Giovedi','Venerdi','Sabato','Domenica');

        $collection = withdrawal_table::select('id','foreign_key', 'material', 'start_now', 'end_now')
            ->where('foreign_key',array_search($validate['day'],$days_week)+1)
            ->orderBy('id')
            ->get();
       
        if (!count($collection)) {
            for ($i = 0; $i < count($material); $i++) {
              
                $create = withdrawal_table::create([
                    //sets 'foreign_key' which corresponds to the day of the week(1-> 7);
                    'foreign_key' => array_search($validate['day'],$days_week)+1,
                    'material' => $material[$i],
                    'start_now' => $start_time[$i],
                    'end_now' => $end_time[$i]
                ]);
            }
        } else {
            $deleted = withdrawal_table::where('foreign_key', array_search($validate['day'], $days_week) + 1)->delete();

            for ($i = 0; $i < count($material); $i++) {

                $create = withdrawal_table::create([
                    //sets 'foreign_key' which corresponds to the day of the week(1-> 7);
                    'foreign_key' => array_search($validate['day'], $days_week) + 1,
                    'material' => $material[$i],
                    'start_now' => $start_time[$i],
                    'end_now' => $end_time[$i]
                ]);
            }
            
        }
        return redirect('/resource')->with('completed', 'Inserimento avvenuto con successo!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //numeric representation of the day of the week, 1 (for Monday) through 7 (for Sunday);
        $today = date('N');

        //Relation One To Many  (table:days_table --> table:withdrawal_table);
        $collection = days_table::find($today)->withdraw;

        //Relation One To Many (Inverse) / Belongs To (table:withdrawal_table -->table:days_table);
        $days= withdrawal_table::where('foreign_key',$today)->first();
       
        $result = [];

        foreach ($collection as $value) {
           
            $stack = array(
                'id' => $value->foreign_key,
                'days' => $days->day->days,
                'material' => $value->material,
                'start_now' => $value->start_now,
                'end_now' => $value->end_now
            );

            array_push($result, $stack);
        }

        return view('home', ['result' => $result]);
    }

    
}
