@extends('layouts.app')

@section('content')
<div class="container">
    @if ($errors->any())
    <div class="row justify-content-center">
        <div class="alert alert-danger col-md-6" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New Game') }}
                </div>
                <div class="card-body custom-card-body">
                    <form action="{{ route('updateGame', $game->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="team1">Select Home Team</label>
                            <select class="custom-select" id="team1" name="team1_id">
                                @foreach ($teams as $team)
                                <option value="{{ $team->id }}" @if ( $team->id == $game->team1_id) {{ "selected" }}
                                    @endif>{{ $team->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="team2">Select Away Team</label>
                            <select class="custom-select" id="team2" name="team2_id">
                                @foreach ($teams as $team)
                                <option value="{{ $team->id }}" @if($team->id == $game->team2_id) {{ "selected" }}
                                    @endif>{{ $team->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="team1_score">Home Team Score <small> (for editing finished games)</small></label>
                            <input type="number" class="form-control" id="team1_score" name="team1_score"
                                value="@if(old('team1_score') == ''){{ $game->team1_score }}@else {{ old('team1_score') }} @endif">
                        </div>
                        <div class="form-group">
                            <label for="team2_score">Away Team Score <small> (for editing finished games)</small></label>
                            <input type="number" class="form-control" id="team2_score" name="team2_score"
                                value="@if(old('team2_score') == ''){{ $game->team2_score }}@else {{ old('team2_score') }} @endif">
                        </div>
                        <div class="form-group">
                            <label for="date">Date of Game</label>
                            <input type="date" class="form-control" id="date" name="date"
                                value="@if(old('date') == ''){{ $game->date }}@else {{ old('date') }} @endif">
                        </div>
                        <div class="form-group">
                            <label for="is_finished">Is Finished <small> (for schedule games scores are set to null)</small></label>
                            <select class="custom-select" id="is_finished" name="is_finished">
                                <option value="1"@if ( $game->is_finished == 1) {{ "selected" }}
                                    @endif>Finished Game</option>
                                <option value="0"@if ( $game->is_finished == 0) {{ "selected" }}
                                    @endif>Scheduled Game</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-default">Save</button>
                        <a href="{{ route('games') }}" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection