@extends('layout')
@section('content')

<div class="card push-top">
  <div class="card-header">
    Aggiungi conferiemto
  </div>
  <div class="card-body">
    @if(session()->exists('completed'))
     <div class="alert alert-danger">{{session()->get('completed')}}</div>
     <br/>
    @endif
    <form method="post" action="{{url('store-conf')}}">
      <table id="employee_table">
        <tr id="row1">
          <td>
            <select id="giorno" name="giorno">
              <option value="Lunedi">Lunedi</option>
              <option value="Martedi">Martedi</option>
              <option value="Mercoledi">Mercoledi</option>
              <option value="Giovedi">Giovedi</option>
              <option value="Venerdi">Venerdi</option>
              <option value="Sabato">Sabato</option>
              <option value="Domenica">Domenica</option>
            </select>
          </td>
          @csrf
          <td><input type="text" name="conferimento[]" placeholder="Plastica" required></td>

          <td><label for="ora-inizio">ora inizio:</label><input type="time" id="ora-inizio" step="1" name="oraInizio[]" required></td>

          <td><label for="ora-fine"> ora fine: </label><input type="time" id="ora-fine" step="1" name="oraFine[]" required></td>
        </tr>
      </table>
      <input type="button" onclick="addMore()" value="Aggiungi Riga">
      <input type="submit" name="submit_row" value="INVIA">
    </form>
  </div>
</div>
@endsection