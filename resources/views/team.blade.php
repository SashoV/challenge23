@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $team->name }} <span class="float-right">founded:
                        {{ $team->year_founded }}</span></div>
                <div class="card-body custom-card-body">
                    <h5>Players list:</h5>
                    <ol>
                        @foreach ($players as $player)
                        <li><a href="{{ route('player', $player->id) }}">{{ $player->first_name }}
                                {{ $player->last_name }}</a></li>
                        @endforeach
                    </ol>
                </div>

                <div class="card-header">{{ $team->name }} games:</div>
                @foreach ($teamGames as $game)
                <div class="card-body custom-card-body text-center">
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