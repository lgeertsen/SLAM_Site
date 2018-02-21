@extends('layouts.app')

@section('customCSS')
  <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">

  <style media="screen">
    #header {
      width: 100%;
      height: 60vh;
      background-image: linear-gradient(transparent, #fff),
                        url('{{$tournament->sport->url}}');
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      /* padding-top: 50px; */
      text-align: center;
      display: flex;
      justify-content: center;
      /* flex-direction: column; */
    }
    #header div {
      /* padding: 20px; */
      /* background: rgba(255, 255, 255, 0.6); */
      align-self: center;
      max-width: 70%;
    }
    #header h1 {
      font-size: 5em;
      font-family: 'Poiret One', sans-serif;
      margin: 0;
    }
    .tournaments {
      margin-top: 20px;
    }
    .row.card-deck {
      margin: 10px 0;
    }
    .card.col-sm-4 {
      padding: 0;
    }
    .card-footer {
      text-align: right;
    }
  </style>
@endsection

@section('content')
  <div id="header">
    <div class="">
      <h1>{{ $tournament->name }}</h1>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10 offset-md-2">
        <div class="">
          <h3>{{ $tournament->sport->name }}</h3>
          <h3>{{ $tournament->date }}</h3>
        </div>

        <a href="{{ "/tournaments/{$tournament->sport->slug}/{$tournament->id}/participate" }}" class="btn btn-success">Participate</a>

        <div class="panel panel-default">
          <div class="panel-body">

            <h3>Participants</h3>
            {{-- <form method="post" action="{{ "/tournaments/{$tournament->id}/participate" }}">
              {{ csrf_field() }}
              <button type="submit" class="btn btn-warning btn-xs">Participate</button>
            </form> --}}
            @foreach ($teams as $team)
              <h6>
                <a href="{{ "/tournaments/{$tournament->sport->slug}/{$tournament->id}/{$team->id}" }}">
                  {{ $team->name }}
                </a>
              </h6>
            @endforeach
          </div>
        </div>


      </div>
    </div>
  </div>
@endsection
