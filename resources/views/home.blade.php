@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Games and results') }}
                    @auth
                    @if (Auth::user()->role == 'admin')
                    <div class="float-right">
                        <a href="{{ route('teams') }}" class="pl-4">Teams</a>
                        <a href="{{ route('players') }}" class="pl-4">Players</a>
                        <a href="{{ route('games') }}" class="pl-4">Games</a>
                    </div>
                    @endif
                    @endauth
                </div>
                @foreach ($games as $game)
                <div class="card-body custom-card-body">
                    @if ($game->is_finished == 1)
                    <div class="row">
                        <div class="col-5 text-right"><a
                                href="{{ route('team', $game->team1_id) }}">{{ $game->team1->name }} </a>
                        </div>
                        <div class="col-2 text-center"><a href="{{ route('game', $game->id) }}">{{$game->team1_score}}
                                : {{ $game->team2_score }} </a></div>
                        <div class="col-5 text-left"><a href="{{ route('team', $game->team2_id) }}">
                                {{ $game->team2->name }} </a></div>
                    </div>
                    @else
                    <div class="row">
                        <div class="col-5 text-right"><a
                                href="{{ route('team', $game->team1_id) }}">{{ $game->team1->name }}</a></div>
                        <div class="col-2 text-center"><a href="{{ route('game', $game->id) }}">? : ?</a></div>
                        <div class="col-5 text-left"><a
                                href="{{ route('team', $game->team2_id) }}">{{ $game->team2->name }}</a></div>
                    </div>
                    @endif

                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection