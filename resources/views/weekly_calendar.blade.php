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
            
            @foreach ($result as $key=>$value) 
            
                <tr>
                    <th>{{$value['days']}}</th>
                    <td>{{$value['material']}}</td>
                    <td>{{$value['start_now']}}</td>
                    <td>{{$value['end_now']}}</td>
                </tr>
                
            @endforeach
        </tbody>
    </table>
</div>
@endsection
