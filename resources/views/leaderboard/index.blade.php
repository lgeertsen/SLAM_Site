@extends('layouts.app')

@section('customCSS')
  <style media="screen">
    .container {
      padding-top: 15px;
      text-align: center;
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
      width: 10%;
      text-align: center;
    }
    .elo {
      width: 10%;
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
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h3 class="display-4">Leaderboard</h3>
        <ul id="accordion" class="list-group">
          <li class="list-group-item list-group-item-dark">
            <div class="rank">
              <h6>RANK</h6>
            </div>
            <div class="flex">
              <h5>PLAYER</h5>
            </div>
            <div class="elo">
              <h6>ELO</h6>
            </div>
          </li>
          @foreach ($users as $key => $user)
            <li class="list-group-item">
              <div class="rank">
                <h6>{{$key+1}}</h6>
              </div>
              <div class="flex">
                <a class="profileLink" href="/profiles/{{$user->id}}">
                  <img class="avatar" src="{{$user->avatar_path}}" alt="">
                  <h5>{{$user->fullName()}}</h5>
                </a>
              </div>
              <div class="elo">
                <span class="badge badge-primary badge-pill">{{$user->elo}}</span>
              </div>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
@endsection
