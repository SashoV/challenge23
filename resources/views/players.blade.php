@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Players') }}
                    <a href="{{ route('createPlayer') }}" class="float-right">Add new player</a>
                </div>
                <div class="card-body custom-card-body">
                    <ol>
                        @foreach ($players->sortBy('team_id') as $player)
                        <li>
                            <a href="{{ route('player', $player->id) }}">{{ $player->first_name }} {{ $player->last_name }}</a>
                            <small>( {{ $player->team->name }} )</small>
                            <form action="{{ route('deletePlayer', $player->id) }}" method="post" class="pl-3 float-right">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                            <a href="{{ route('editPlayer', $player->id) }}" class="pl-3 float-right">Edit</a>
                        </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
    @endsection