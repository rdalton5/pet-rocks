@extends('layout')

@section('content')
    <div class="center">
        <h1>Pet Rock Collection</h1>
        <p><a class="create-button" href="/petrock/create">Create a New Rock</a></p>
        <div class="container">
            @foreach ($petRocks as $petRock)
                <div class="card">
                    <div class="right">
                        {{-- Make this edit button a form so that it looks like the delete button --}}
                        <form class="button-form" action="/petrock/{{ $petRock->id }}/edit">
                            {{-- a pencil icon --}}
                            <button style="font-size: 1.5em" type="submit">&#9998;</button>
                        </form>
                        <x-delete-button deleteRoute="/petrock/{{ $petRock->id }}" />
                        
                    </div>
                    <h3><b>{{ $petRock->name }}</b></h3>

                    <img class="{{$petRock->size}}-rock-image" src="/img/rock.png" alt="a rock with eyeballs">
                    <p>{{ $petRock->bio }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
