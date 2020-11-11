@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Games') }}
                    <a href="{{ route('createGame') }}" class="float-right">Add new game</a>
                </div>
                <div class="card-body custom-card-body">
                    <ol>
                        @foreach ($games as $game)
                        @if ($game->is_finished == 1)
                        <li>
                            <a href="{{ route('game', $game->id) }}">{{ $game->team1->name }} {{$game->team1_score}}
                                : {{ $game->team2_score }} {{ $game->team2->name }}</a>
                            <form action="{{ route('deleteGame', $game->id) }}" method="post" class="pl-3 float-right">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                            <a href="{{ route('editGame', $game->id) }}" class="pl-3 float-right">Edit</a>
                        </li>
                        @else
                        <li>
                            <a href="{{ route('game', $game->id) }}">{{ $game->team1->name }} ? : ?
                                {{ $game->team2->name }}</a>
                            <form action="{{ route('deleteGame', $game->id) }}" method="post" class="pl-3 float-right">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                            <a href="{{ route('editGame', $game->id) }}" class="pl-3 float-right">Edit</a>
                        </li>
                        @endif
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
    @endsection