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
                <div class="card-header">{{ __('Edit Player') }}
                </div>
                <div class="card-body custom-card-body">
                    <form action="{{ route('updatePlayer', $player->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control" id="firstname" name="firstname"
                                value="@if(old('firstname') == ''){{ $player->first_name }}@else {{ old('firstname') }} @endif">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control" id="lastname" name="lastname"
                                value="@if(old('lastname') == ''){{ $player->last_name }}@else {{ old('lastname') }} @endif">
                        </div>
                        <div class="form-group">
                            <label for="date_of_birth">Birthday</label>
                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                                value="@if(old('date_of_birth') == ''){{ $player->date_of_birth }}@else {{ old('date_of_birth') }} @endif">
                        </div>
                        <div class="form-group">
                            <label for="team">Team</label>
                            <select class="custom-select" id="team" name="team_id">
                                @foreach ($teams as $team)
                                <option value="{{ $team->id }}" @if($team->id == $player->team_id) {{ "selected" }}
                                    @endif>{{ $team->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-default">Save</button>
                        <a href="{{ route('players') }}" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection