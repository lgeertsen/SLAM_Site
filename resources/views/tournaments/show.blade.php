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
    .list-group {
      margin-bottom: 25px;
    }
    .list-group-item {
      display: flex;
      align-items: center;
    }
    .list-group-item > div {
      display: inline-block;
      padding: 0 10px;
    }
    .rank {
      width: 15%;
    }
    .elo {
      width: 8%;
      text-align: center;
    }
    .flex {
      flex: 1;
    }
    .avatar {
      width: 50px;
      height: 50px;
      margin-right: 15px;
    }
    .profileLink {
      display: flex;
      align-items: center;
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
            <h2>{{ ucwords($tournament->name) }}</h2>
            <h5>{{ date('D d F', strtotime($tournament->date)) }}</h5>
          </div>
          <div class="">

            @if(!$tournament->finished)
              {{-- <a href="{{ "/tournaments/{$tournament->id}/participate" }}" class="btn btn-outline-success">Participate</a> --}}
              <form method="post" action="{{ "/tournaments/{$tournament->id}/participate" }}">
              {{ csrf_field() }}
              <button type="submit" class="btn btn-warning btn-xs">Participate</button>
            </form>
            @endif
          </div>
        </div>
        <p>{{ $tournament->description }}</p>

        <div class="panel panel-default">
          <div class="panel-body">
            @if(!$tournament->finished)
              <h3>Participants</h3>
              <ul id="accordion" class="list-group">
                @foreach ($participants as $participant)
                  <li class="list-group-item">
                    <a class="profileLink" href="/profiles/{{$participant->user_id}}">
                      <img class="avatar" src="{{$participant->user->avatar_path}}" alt="">
                      <h6>{{$participant->user->fullName()}}</h6>
                    </a>
                  </li>
                @endforeach
              </ul>
            @else
              <h3>Ranking</h3>
              <ul id="accordion" class="list-group">
                <li class="list-group-item list-group-item-dark">
                  <div class="rank">
                    <h6>RANK</h6>
                  </div>
                  <div class="flex">
                    <h5>PLAYER</h5>
                  </div>
                  <div class="elo">
                    <h6>OLD ELO</h6>
                  </div>
                  <div class="elo">
                    <h6>NEW ELO</h6>
                  </div>
                </li>
                @foreach ($participants as $participant)
                  <li class="list-group-item">
                    <div class="rank">
                      <h6>{{$participant->rank}}</h6>
                    </div>
                    <div class="flex">
                      <a class="profileLink" href="/profiles/{{$participant->user_id}}">
                        <img class="avatar" src="{{$participant->user->avatar_path}}" alt="">
                        <h5>{{$participant->user->fullName()}}</h5>
                      </a>
                    </div>
                    <div class="elo">
                      <span class="badge badge-danger badge-pill">{{$participant->oldElo}}</span>
                    </div>
                    <div class="elo">
                      <span class="badge badge-primary badge-pill">{{$participant->newElo}}</span>
                    </div>
                  </li>
                @endforeach
              </ul>
            @endif
          </div>
        </div>


      </div>
    </div>
  </div>
@endsection
