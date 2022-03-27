@extends('layout')
@section('section')
 <h1>@php  echo date("d/m/Y")@endphp</h1>

 @if(count($withdrawal_day)==0)
   <p>Oggi non è previsto nuessun ritiro</p>
  
 @elseif(count($withdrawal_day)==1)
   <h3>{{$withdrawal_day[0]->days}}</h3>
   <br>
   <h4>Oggi conferire:{{$withdrawal_day[0]->withdraw}}</h4>
   <h5>Dalle ore {{$withdrawal_day[0]->start}} fino alle ore {{$withdrawal_day[0]->end}} </h5>  
 @elseif(count($withdrawal_day)>1)
   <h3>{{$withdrawal_day[0]->days}}</h3>
   <br>
   <h4>La raccolta di oggi è:</h4>
   @foreach ($withdrawal_day as $withdrawal)
      <h4>{{$withdrawal->withdraw}}</h4>
      <h5>Dalle ore {{$withdrawal->start}} fino alle ore {{$withdrawal->end}} </h5>
   @endforeach
 @endif

@endsection