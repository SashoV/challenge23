@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Game Info') }}
                    @if ($game->is_finished == 1)
                    <div><a href="{{ route('team', $game->team1_id) }}">{{ $game->team1->name }} </a> <a
                            href="{{ route('game', $game->id) }}">{{$game->team1_score}}
                            : {{ $game->team2_score }} </a>
                        <a href="{{ route('team', $game->team2_id) }}"> {{ $game->team2->name }} </a>
                    </div>
                    @else
                    <div><a href="{{ route('team', $game->team1_id) }}">{{ $game->team1->name }} </a> vs
                        <a href="{{ route('team', $game->team2_id) }}"> {{ $game->team2->name }} </a>
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    @if ($game->is_finished == 1)
                    <div>Game played: {{ $game->date }}</div>
                    <hr>
                    <div>
                        <div>{{ $game->team1->name }} players:</div>
                        <ol>
                            @foreach ($game->team1->players as $player)
                            <li>{{ $player->first_name }} {{ $player->last_name }}</li>
                            @endforeach
                        </ol>
                    </div>
                    <div>
                        <div>{{ $game->team2->name }} players:</div>
                        <ol>
                            @foreach ($game->team2->players as $player)
                            <li>{{ $player->first_name }} {{ $player->last_name }}</li>
                            @endforeach
                        </ol>
                    </div>
                    @endif
                    @if ($game->is_finished == 0)
                    <div>Game scheduled: {{ $game->date }}</div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection