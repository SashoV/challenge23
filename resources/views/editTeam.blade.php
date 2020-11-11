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
                <div class="card-header">{{ __('Edit Team') }}
                </div>
                <div class="card-body custom-card-body">
                    <form action="{{ route('updateTeam', $team->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Team Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="@if(old('name') == ''){{ $team->name }}@else {{ old('name') }} @endif">
                        </div>
                        <div class="form-group">
                            <label for="year_founded">Year founded</label>
                            <input type="text" class="form-control" id="year_founded" name="year_founded"
                                value="@if(old('year_founded') == ''){{ $team->year_founded }}@else {{ old('year_founded') }} @endif">
                        </div>
                        <button type="submit" class="btn btn-default">Save</button>
                        <a href="{{ route('teams') }}" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection