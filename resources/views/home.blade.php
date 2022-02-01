@extends('layout')
@section('section')
 <h1>@php echo date("d/m/Y")@endphp</h1>

 @if(count($result)==0)
   <p>Oggi non è previsto nuessun ritiro</p>
 @elseif(count($result)==1)
   <h3>{{$result[0]['days']}}</h3>
   <br>
   <h4>Oggi conferire:{{$result[0]['material']}}</h4>
   <h5>Dalle ore {{$result[0]['start_now']}} fino alle ore {{$result[0]['end_now']}} </h5>  
 @elseif(count($result)>1)
   <h3>{{$result[0]['days']}}</h3>
   <br>
   <h4>La raccolta di oggi è:</h4>
   @foreach ($result as $row)
      <h4>{{$row['material']}}</h4>
      <h5>Dalle ore {{$row['start_now']}} fino alle ore {{$row['end_now']}} </h5>
   @endforeach
 @endif

@endsection