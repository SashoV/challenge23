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
                    <form action="{{ route('storeGame') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="team1">Select Home Team</label>
                            <select class="custom-select" id="team1" name="team1_id">
                                @foreach ($teams as $team)
                                <option value="{{ $team->id }}">{{ $team->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="team2">Select Away Team</label>
                            <select class="custom-select" id="team2" name="team2_id">
                                @foreach ($teams as $team)
                                <option value="{{ $team->id }}">{{ $team->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="team1_score">Home Team Score <small> (for creating finished games)</small></label>
                            <input type="number" class="form-control" id="team1_score" name="team1_score"
                                value="{{ old('team1_score') }}">
                        </div>
                        <div class="form-group">
                            <label for="team2_score">Away Team Score <small> (for creating finished games)</small></label>
                            <input type="number" class="form-control" id="team2_score" name="team2_score"
                                value="{{ old('team2_score') }}">
                        </div>
                        <div class="form-group">
                            <label for="date">Date of Game</label>
                            <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}">
                        </div>
                        <div class="form-group">
                            <label for="is_finished">Is Finished</label>
                            <select class="custom-select" id="is_finished" name="is_finished">
                                <option value="0">Scheduled Game</option>
                                <option value="1">Finished Game</option>
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