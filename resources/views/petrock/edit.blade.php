@extends('layout')

@section('content')
    <h1>Editing Rock: {{$petRock->name}}</h1>
    <div class="card">
        <x-pet-rock-form 
            formMethod="PUT"
            formAction="/petrock/{{$petRock->id}}"
            :petRock="$petRock"/>
    </div>
@endsection