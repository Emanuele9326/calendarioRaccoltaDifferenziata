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
            @foreach ($errors->all() as $error)
                <li class="list-group-item">{{ $error }}</li>
            @endforeach
        </ul>
     </div>
    @endif
   @if(session()->exists('completed'))
     <div class="alert alert-danger">{{session()->get('completed')}}</div>
     <br/>
   @endif
  
   
    {!! Form::open(['url'=>'element']) !!}
    
    <table id="table">
        <tr id="row1 mt-5">
          <td>
            {!! Form::select('day', ['Lunedi' => 'Lunedi', 'Martedi' => 'Martedi','Mercoledi'=>'Mercoledi','Giovedi'=>'Giovedi','Venerdi'=>'Venerdi','Sabato'=>'Sabato','Domenica'=>'Domenica'], null, ['id'=>'day','placeholder' => 'Scegli giorno..']) !!}
          </td>
          <td>&nbsp{!!Form::label('material', 'Materiale da conferire:')!!}{!!Form::text('material[]')!!}</td>
          <td>&nbsp{!!Form::label('start_time', 'Ora di inizio:')!!}{!! Form::time('start_time[]', null, ['step'=>1]) !!}</td>
          <td>&nbsp{!!Form::label('end_time', 'Ora di fine:')!!}{!! Form::time('end_time[]', null, ['step'=>1]) !!}</td>
        </tr>
    </table>
        <button type="button" name="+row" onclick="addRow()">+RIGA</button>
        {!! Form::submit('INVIA', ['name'=>'submit']) !!}
        
    {!! Form::close() !!}
  </div>
</div>
@endsection