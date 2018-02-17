@extends('layouts.app')

@section('customCSS')
  <link rel="stylesheet" href="{{ asset('css/jquery.atwho.min.css') }}" type="text/css" />
  <style media="screen">
    .azer {
      width: 100%;
      height: 100px;
      border: 1px solid black;
      padding: 10px;
    }
  </style>
@endsection

@section('customJS')
  <script type="text/javascript">
  var added = {};
  for(var i = 2; i <= {{$size}}; i++) {
    var id = "#player" + i;
    $(id).atwho({
      at: "@",
      headerTpl: "<h4>Select a user</h4>",
      insertTpl: "<b>${name}</b>",
      displayTpl: "<li>${name} <small>${email}</small></li>",
      // data:['Peter', 'Tom', 'Anne']
      delay: 750,
      callbacks: {
        remoteFilter: function(query, callback) {
          $.getJSON("/vue/users", {name: query}, function(usernames) {
            callback(usernames)
          });
        },
        beforeInsert: function(value, $li) {
          return value;
        }
      }
    });//.keypress(function(e){ return e.which != 13; });
  }

  function check(e) {
    console.log(e.target.value);
  }
  </script>
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Create a your Team</div>

        <div class="panel-body">
          <form action="/tournaments" method="post">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="name">Team name:</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
              <label for="players[]">Player 1:</label>
              <div class="form-control" id="player1" name="players[]" required><b>{{ auth()->user()->name }}</b></div>
            </div>

            <h5>You can use <code>@</code> to find players</h5>

            @for($i=2; $i <= $size; $i++)
              {{-- <div class="form-group">
                <label for="players[]">Player {{$i}}:</label>
                <input type="text" class="form-control" id="player{{$i}}" name="players[]" value="{{ old("players[{$i}]") }}" required>
              </div> --}}
              {{-- <player :index={{$i}}></player> --}}
              <div class="form-group">
                <label for="players[]">Player {{$i}}:</label>
                <div contentEditable="true" class="form-control" id="player{{$i}}" name="players[]"></div>
              </div>
            @endfor

            <div class="form-group">
              <button type="submit" class="btn btn-primary">Create</button>
            </div>
            @if (count($errors))
            <ul class="alert alert-danger">
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
            @endif
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
