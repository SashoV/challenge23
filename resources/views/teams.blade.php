@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Teams') }}
                    <a href="{{ route('createTeam') }}" class="float-right">Create new team</a>
                </div>
                <div class="card-body custom-card-body">
                    <ol>
                        @foreach ($teams as $team)
                        <li>
                            <a href="{{ route('team', $team->id) }}">{{ $team->name }}</a>
                            <form action="{{ route('deleteTeam', $team->id) }}" method="post" class="pl-3 float-right">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                            <a href="{{ route('editTeam', $team->id) }}" class="pl-3 float-right">Edit</a>
                        </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
    @endsection