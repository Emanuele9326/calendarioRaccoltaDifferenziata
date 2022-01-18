@extends('layout')
@section('content')

<div class="main-view">
  <h1>@php echo date("d/m/Y"); @endphp</h1>
  @php
   $day = array('Lunedi', 'Martedi', 'Mercoledi', 'Giovedi', 'Venerdi', 'Sabato', 'Domenica');
   $date = date('N');
  @endphp

  @for ($i = 0; $i <= (count($day) - 1); $i++) 
   @if (($date - 1)==$i) 
      @php $ind=($date - 1);@endphp 
     <h3>@php echo $day[$i]; @endphp</h3>

     <!--$ conf is an array see MainView controllers-->
     
     @if(count($conf)==0)
        <p>Nessun ritiro</p>
     @elseif (count($conf)== 1) 
       @php 
          $array=print('<h4>Oggi conferire:' . $conf[0]->conferimento. '</h4>'); 
          print("<p>La raccolta avverà dalle ore: " . $conf[0]->oraInizio . " fino alle ore " . $conf[0]->oraFine . "</p>"); 
        @endphp
     @else 
       <h4>La raccolta di oggi è:</h4>
       @foreach ($conf as $value)
         @php 
           $conferment = print('<h4>' . $value->conferimento . '</h4>');
           print("<p>Dalle ore: " . $value->oraInizio . " fino alle ore " . $value->oraFine . "</p>");
         @endphp
       @endforeach
     @endif
    @endif
  @endfor

</div>
@endsection