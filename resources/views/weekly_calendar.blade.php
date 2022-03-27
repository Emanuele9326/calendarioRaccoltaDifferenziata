@extends('layout')
@section('section')
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
            
            @foreach ($day_weekly as $key=>$value) 
            
                <tr>
                    <th>{{$value->days}}</th>
                    <td>{{$value->withdraw}}</td>
                    <td>{{$value->start}}</td>
                    <td>{{$value->end}}</td>
                </tr>
                
            @endforeach
        </tbody>
    </table>
</div>
@endsection
