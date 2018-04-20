@extends('layouts.app')

@section('customCSS')
  <style media="screen">
    .container {
      padding-top: 15px;
    }
    #fileInput {
      width: 0.1px;
    	height: 0.1px;
    	opacity: 0;
    	overflow: hidden;
    	position: absolute;
    	z-index: -1;
    }
    .avatarContainer {
      position: relative;
      height: 210px;
      width: 210px;
      border: 5px solid #eee;
      border-radius: 3px;
    }
    .avatarContainer label {
      text-align: center;
      position: absolute;
      bottom: 0;
      left: 0;
      margin: 0;
      padding: 5px;
      width: 100%;
      background-color: rgba(255, 255, 255, 0.7);
      font-weight: bold;
      cursor: pointer;
    }
    .avatarContainer label:hover {
      background-color: rgba(255, 255, 255, 0.95);
    }
    .avatarContainer .fa-upload {
      margin-right: 8px;
    }
    .header {
      height: 300px;
      width: 100%;
      padding: 20px 20%;
      background-image: url("https://images.unsplash.com/photo-1519672808815-bdd52bb3bd41?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=cdd94e68a0b91f05fbc68d4369ff1e2f&auto=format&fit=crop&w=1200&q=80");
      background-position: center 20%;
      background-repeat: no-repeat;
      background-size: cover;
      background-color: #3498db;
      display: flex;
      align-items: flex-end;
    }
    .profilePicture {
      margin-right: 30px;
    }
    .profileTitle {
      color: #fff;
    }
    .profileTitle h1,
    .profileTitle h3 {
      text-shadow: 0 0 3px rgba(0, 0, 0, 0.7);
    }
    .card {
      margin: 10px 0;
      height: 200px;
    }
    .card-footer {
      text-align: right;
    }
  </style>
@endsection

@section('content')
  <div class="header">
    <div class="profilePicture">
      <avatar-form :user="{{ $profileUser }}"></avatar-form>
    </div>
    <div class="profileTitle">
      <h1 class="display-4">{{$profileUser->fullName()}}</h1>
      <h3>Elo: {{$profileUser->elo}}</h3>
    </div>
  </div>
  <div class="container">
    @if (sizeof($elo) > 0)
      <chart elo="{!! json_encode($elo) !!}"></chart>
      <h3 class="display-4">Tournaments</h3>
      <div class="row">
        @foreach ($tournaments as $tournament)
          <div class="col-sm-4">
            <div class="card">
              <div class="card-body">
                <h5>{{ $tournament->name }}</h5>
                <h6>{{ $tournament->rank }}</h6>
              </div>
              <div class="card-footer">
                <a class="btn btn-outline-info btn-sm" href="/tournaments/{{ $tournament->tournament_id }}">
                  Results
                </a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @endif
    <div class="row">

    </div>
  </div>
@endsection
