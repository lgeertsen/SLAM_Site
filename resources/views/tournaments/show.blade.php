@extends('layouts.app')

@section('customCSS')
  <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">

  <style media="screen">
    #header {
      width: 100%;
      height: 60vh;
      background-image: linear-gradient(transparent, #fff),
      url('https://images.unsplash.com/photo-1485908953667-cf6d88997642?ixlib=rb-0.3.5&s=32b5c9feaa9744b23a6003e4e85c3657&auto=format&fit=crop&w=1440&q=80');
      background-position: center 35%;
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
    .flex-1 {
      flex: 1;
    }
    h2 {
      font-family: 'Raleway', sans-serif;
    }
  </style>
@endsection

@section('content')
  <div id="header">
    <div class="">
      <h1>{{ ucwords($tournament->name) }}</h1>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-sm-8">
        <div class="d-flex align-items-center">
          <div class="flex-1">
            <h2>{{ ucwords($tournament->name) }} Tournament</h2>
            <h5>{{ date('D d F', strtotime($tournament->date)) }}</h5>
          </div>
          <div class="">

            <a href="{{ "/tournaments/{$tournament->id}/participate" }}" class="btn btn-outline-success">Participate</a>
          </div>
        </div>
        <p>{{ $tournament->description }}</p>

        <div class="panel panel-default">
          <div class="panel-body">

            <h3>Participants</h3>
            {{-- <form method="post" action="{{ "/tournaments/{$tournament->id}/participate" }}">
              {{ csrf_field() }}
              <button type="submit" class="btn btn-warning btn-xs">Participate</button>
            </form> --}}
            <ul id="accordion" class="list-group">
            @foreach ($participants as $participant)
              <li class="list-group-item">
                <h6>{{$participant->user->name}}</h6>
                  {{-- <a href="{{ "/tournaments/{$tournament->sport->slug}/{$tournament->id}/{$team->id}" }}">
                    {{ $team->name }}
                  </a> --}}
                  {{-- <button class="btn btn-outline-danger"
                  data-toggle="collapse"
                  data-target="#team{{$team->id}}"
                  aria-expanded="true"
                  aria-controls="team{{$team->id}}">{{$team->name}}</button>
                </h6>
                <div id="team{{$team->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                  <ul>
                    @foreach ($team->members as $member)
                      <li>{{ $member->user->name }}</li>
                    @endforeach
                  </ul>
                </div> --}}
              </li>
            @endforeach
          </ul>
          </div>
        </div>


      </div>
    </div>
  </div>
@endsection
