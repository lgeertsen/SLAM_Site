@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="">
          <h1>Tournaments</h1>
          <a class="btn btn-success btn-xs" href="/tournaments/create">
            Create Tournament
          </a>
        </div>
        @foreach ($tournaments as $tournament)
          <div class="panel panel-default">
            <div class="panel-body">
              <h2>{{ $tournament->name }}</h2>
              {{-- <h5>{{ $sports[$tournament->sport-1]->name }}</h5> --}}
              <h5>{{ $tournament->sport->name }}</h5>
              <p>{{ $tournament->date }}</p>
              <a class="btn btn-primary btn-xs" href="{{ $tournament->path() }}">
                Show Tournament
              </a>

            </div>
          </div>
        @endforeach


      </div>
    </div>
  </div>
@endsection
