<?php

namespace App\Http\Controllers;

use App\Models\WithdrawalDay;
use Illuminate\Http\Request;

class WithdrawalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $day_weekly= WithdrawalDay::orderBy('days')->get();
       
        
        return view('weekly_calendar', ['day_weekly' => $day_weekly]);   
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
            'withdraw.*' => 'required',
            'start.*' => 'required',
            'end.*' => 'required'
        ]);
       
        //withdrawals to be included;
        $withdraw = $validate['withdraw'];
    
        $start_time = $validate['start'];
        
        $end_time = $validate['end'];
        
        
        
      
       //returns the withdrawals for the chosen day, if they are present in the table
        $withdrawal_present = WithdrawalDay::where('days',$validate['day'])
        ->get();
        
   
       
        if (!count( $withdrawal_present)) {
            
           foreach($withdraw as $id=>$value){
            WithdrawalDay::create([
                'days' => $validate['day'],
                'withdraw' => $withdraw[$id],
                'start' => $start_time[$id],
                'end'=> $end_time[$id]
                
                ]);
           }
          
           //number of withdrawals to enter = number of withdrawals in the table;
           // withdrawals in the table are updated;
        } elseif(count($withdraw) == count( $withdrawal_present)) {
            
           foreach( $withdrawal_present as $id=>$value){
                $withdrawaldays=WithdrawalDay::find($value->id);
                $withdrawaldays->withdraw=$withdraw[$id];
                $withdrawaldays->start=$start_time[$id];
                $withdrawaldays->end=$end_time[$id];
                $withdrawaldays->save();
            
           }
            
        }elseif(count( $withdrawal_present) < count($withdraw)){

            foreach ( $withdrawal_present as $key => $value) {
                $withdrawaldays = WithdrawalDay::find($value->id);
                $withdrawaldays->withdraw = $withdraw[$key];
                $withdrawaldays->start = $start_time[$key];
                $withdrawaldays->end = $end_time[$key];
                $withdrawaldays->save();
            }
            
            
            for($i=count( $withdrawal_present); $i <count($withdraw); $i++) {
                WithdrawalDay::create([
                'days' => $validate['day'],
                'withdraw' => $withdraw[$i],
                'start' => $start_time[$i],
                'end'=> $end_time[$i]
                
                ]);

            }
                
           
        }else{
            //The withdrawals entered are less than those shown in the table;
            for($i=0; $i < count($withdraw); $i++) {

                $withdrawaldays = WithdrawalDay::find( $withdrawal_present[$i]->id);
                $withdrawaldays->withdraw = $withdraw[$i];
                $withdrawaldays->start = $start_time[$i];
                $withdrawaldays->end = $end_time[$i];
                $withdrawaldays->save();

            }
            //The withdrawals present in the table that are in excess are canceled;
            $id=array();
            for($i=count($withdraw); $i <count( $withdrawal_present); $i++) {
              array_push($id, $withdrawal_present[$i]->id);
            }
           
           WithdrawalDay::destroy(collect($id));

        }
        return redirect('/resource')->with('completed', 'Inserimento avvenuto con successo!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WithdrawalDay  $withdrawalDay
     * @return \Illuminate\Http\Response
     */
    public function show(WithdrawalDay $withdrawalDay)
    {
        $days_week=array('Lunedì','Martedì','Mercoledì','Giovedì','Venerdì','Sabato','Domenica');
        $today=$days_week[date('N')-1];
     
         $withdrawal_days= WithdrawalDay::where('days',$today)
                ->orderBy('id')
                ->get();
     
         return view('home', ['withdrawal_day' => $withdrawal_days]);
    }


}
