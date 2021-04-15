@extends('layout')

@section('content')
    <h1>Create a New Rock</h1>
    <div class="card">
        <x-pet-rock-form 
            formMethod="POST"
            formAction="/petrock"/>
    </div>
@endsection