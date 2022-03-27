@extends('layout')
@section('section')

<div class="card push-top">
  <div class="card-header">
    Aggiungi conferimento
  </div>
  <div class="card-body">
    @if ($errors->any())
     <div class="alert alert-danger">
       <ul class="list-group">

         @foreach($errors->get('day') as $error)
           <li style="list-style: none">{{$error}}</li>
         @endforeach

         @foreach($errors->get('withdraw.*') as $key => $error)
           @foreach($error as $id => $value)
             <li style="list-style: none">{{$key}} {!!':'!!} {{$value}}</li>
           @endforeach
         @endforeach

         @foreach($errors->get('start.*') as $key => $error)
           @foreach($error as $id => $value)
             <li style="list-style: none">{{$key}} {!!':'!!} {{$value}}</li>
           @endforeach
         @endforeach

         @foreach($errors->get('end.*') as $key => $error)
           @foreach($error as $id => $value)
             <li style="list-style: none">{{$key}} {!!':'!!} {{$value}}</li>
           @endforeach
         @endforeach

       </ul>
     </div>
    @endif
    
    @if(session()->exists('completed'))
       <div class="alert alert-danger">{{session()->get('completed')}}</div>
       <br />
    @endif


    {!! Form::open(['url'=>'element']) !!}

    <table id="table">
      <tr id="row1 mt-5">
        <td>
          {!! Form::select('day', ['Lunedi' => 'Lunedi', 'Martedi' =>
          'Martedi','Mercoledi'=>'Mercoledi','Giovedi'=>'Giovedi','Venerdi'=>'Venerdi','Sabato'=>'Sabato','Domenica'=>'Domenica'],
          null, ['id'=>'day','placeholder' => 'Scegli giorno..']) !!}
        </td>
        <td>&nbsp{!!Form::label('material', 'Materiale da conferire:')!!}{!!Form::select('withdraw', ['Umido' =>
          'Umido', 'Plastica' => 'Plastica','Carta'=>'Carta','Vetro'=>'Vetro','Indiferenziato'=>'Indiferenziato'], null,
          ['id'=>'withdraw','name'=>'withdraw[]','placeholder' => '']) !!}</td>
        <td>&nbsp{!!Form::label('start', 'Ora di inizio:')!!}{!! Form::time('start[]', null, ['step'=>1]) !!}</td>
        <td>&nbsp{!!Form::label('end', 'Ora di fine:')!!}{!! Form::time('end[]', null, ['step'=>1]) !!}</td>
      </tr>
    </table>
    <button type="button" name="+row" onclick="addRow()">+RIGA</button>
    {!! Form::submit('INVIA', ['name'=>'submit']) !!}

    {!! Form::close() !!}
  </div>
</div>
@endsection