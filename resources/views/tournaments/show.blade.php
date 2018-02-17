@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="">
          <h1>{{ $tournament->name }}</h1>
          <h3>{{ $tournament->sport }}</h3>
          <h3>{{ $tournament->date }}</h3>
        </div>

        <a href="{{ "/tournaments/{$tournament->id}/participate" }}" class="btn btn-success">Participate</a>

        <div class="panel panel-default">
          <div class="panel-body">

            <h3>Participants</h3>
            {{-- <form method="post" action="{{ "/tournaments/{$tournament->id}/participate" }}">
              {{ csrf_field() }}
              <button type="submit" class="btn btn-warning btn-xs">Participate</button>
            </form> --}}
            @foreach ($teams as $team)
              <h6>{{ $team->name }}</h6>
            @endforeach
          </div>
        </div>


      </div>
    </div>
  </div>
@endsection
