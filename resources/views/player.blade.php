@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $player->first_name }} {{ $player->last_name }}</h4><span class="float-right">Team: <a
                            href="{{ route('team', $player->team_id) }}">{{ $player->team->name }}</a></span>
                    <div>Born: {{ $player->date_of_birth }}</div>
                </div>
                <div class="card-body custom-card-body">
                    <div>Games played: </div>
                </div>
                @foreach ($player->games->sortBy('date') as $game)
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
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection