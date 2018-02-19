@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="">
          <h1>{{ $team->name }}</h1>
          <h3>{{ $tournament->sport->name }}</h3>
        </div>

        <div class="panel panel-default">
          <div class="panel-body">

            <h3>Team Members</h3>
            {{-- <form method="post" action="{{ "/tournaments/{$tournament->id}/participate" }}">
              {{ csrf_field() }}
              <button type="submit" class="btn btn-warning btn-xs">Participate</button>
            </form> --}}
            @foreach ($teamMembers as $teamMember)
              <h6>
                <a href="{{ route('profile', ['user' => $teamMember->user_id]) }}">
                  {{ $teamMember->user->name }}
                </a>
              </h6>
            @endforeach
          </div>
        </div>


      </div>
    </div>
  </div>
@endsection
