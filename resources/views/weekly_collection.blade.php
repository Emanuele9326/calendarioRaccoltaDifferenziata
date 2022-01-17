@extends('layout')
@section('content')

<div class="container push-top">
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Giorno</th>
                <th scope="col">Materiale da conferire</th>
                <th scope="col">Ora di inizio</th>
                <th scope="col">Ora fine</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($users as $key => $value) 
                <tr>
                    <th>{{$value->giorno}}</th>
                    <td>{{$value->conferimento}}</td>
                    <td>{{$value->oraInizio}}</td>
                    <td>{{$value->oraFine}}</td>
                </tr>
                
            @endforeach
        </tbody>
    </table>
</div>
@endsection