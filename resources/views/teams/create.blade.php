@extends('layouts.app')

@section('customCSS')
  <link rel="stylesheet" href="{{ asset('css/jquery.atwho.min.css') }}" type="text/css" />
  <style media="screen">
    .container-fluid {
      padding-top: 15px;
      padding-bottom: 25px;
      background-image: url('{{ $tournament->sport->url }}');
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
    }
    .card {
      background-color: rgba(255, 255, 255, 0.7);
    }
    .playerBadge.badge {
      font-size: 15px;
      display: flex;
      /* justify-content: center; */
      align-items: center;
      padding-left: 15px;
      padding-right: 15px;
    }
    .playerBadge img,
    .playerBadge small {
      margin-right: 8px;
    }
    .playerBadge div {
      text-align: left;
      flex: 1;
    }
    .playerBadge i {
      margin-left: 8px;
      cursor: pointer;
    }
  </style>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-sm-12 col-md-6">
      {{-- <team-form :tournament="{{ $tournament }}" :user="{{ auth()->user() }}"></team-form> --}}
      <div class="card">
        <div class="card-body">
          <h3>Create a your Team</h3>
          <form action="{{ "/tournaments/{$tournament->sport->slug}/{$tournament->id}" }}" method="post">
            <div class="form-group">
              <label for="name">Team name:</label>
              <input type="text" class="form-control" id="name" name="name" value="" required>
            </div>

            <div class="form-group">
              <label for="players[]">Player 1:</label>
              <div id="player1">
                <div class="playerBadge badge badge-info">
                  <img src="{{ auth()->user()->avatar_path }}" width="30" height="30">
                  <div>{{ auth()->user()->name }}</div>
                </div>
              </div>
              <input type="hidden" name="playersId[]" value="{{ auth()->user()->id }}" required/>
              <input type="hidden" name="players[]" value="{{ auth()->user()->name }}" required/>
            </div>

            <h5>You can use <code>@</code> to find your friends</h5>

            @for ($i = 1; $i < $tournament->teamSize; $i++)
              <player :index="{{$i}}"></player>
            @endfor

            <div class="form-group">
              <button type="submit" class="btn btn-primary">Create</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
