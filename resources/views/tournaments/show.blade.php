@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="">
          <h1>{{ $tournament->sport }} Tournament</h1>
          <h3>{{ $tournament->date }}</h3>
        </div>

        <div class="panel panel-default">
          <div class="panel-body">

            <h3>Participants</h3>
            <form method="post" action="{{ "/tournaments/{$tournament->id}/participate" }}">
              {{ csrf_field() }}
              <button type="submit" class="btn btn-warning btn-xs">Participate</button>
            </form>
            @foreach ($participants as $participant)
              <h6>{{ $participant->user->name }}</h6>
            @endforeach
          </div>
        </div>


      </div>
    </div>
  </div>
@endsection
