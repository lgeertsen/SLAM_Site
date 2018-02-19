@extends('layouts.app')

@section('customCSS')
  <link rel="stylesheet" href="{{ asset('css/jquery.atwho.min.css') }}" type="text/css" />
@endsection

@section('customJS')
  <script type="text/javascript">
  var added = {};
  for(var i = 2; i <= {{$size}}; i++) {
    var id = "#player" + i;
    $(id).atwho({
      at: "@",
      headerTpl: "<h4>Select a user</h4>",
      insertTpl: "${name},${id}",
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
          console.log(this.id);
          let values = value.split(",");
          let name = '<b>' + values[0] + '</b>';
          $("#" + this.id + "id").val(values[1]);
          $("#" + this.id + "name").val(values[0]);
          $("#" + this.id).blur();
          $("#" + this.id).attr("contenteditable", false);
          return name;
        }
      }
    }).keydown(function(e){ return e.which != 13; });
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
          <form action="{{ "/tournaments/{$tournament->sport->slug}/{$tournament->id}" }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="name">Team name:</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
              <label for="players[]">Player 1:</label>
              <div class="form-control" id="player1"><b>{{ auth()->user()->name }}</b></div>
              <input type="text" name="playersId[]" value="{{auth()->user()->id}}" required/>
              <input type="text" name="players[]" value="{{auth()->user()->name}}" required/>
            </div>

            <h5>You can use <code>@</code> to find your friends</h5>

            @for($i=2; $i <= $size; $i++)
              {{-- <div class="form-group">
                <label for="players[]">Player {{$i}}:</label>
                <input type="text" class="form-control" id="player{{$i}}" name="players[]" value="{{ old("players[{$i}]") }}" required>
              </div> --}}
              {{-- <player :index={{$i}}></player> --}}
              <div class="form-group">
                <label for="players[]">Player {{$i}}:</label>
                <div contentEditable="true" class="form-control" id="player{{$i}}"></div>
                <input type="text" id="player{{$i}}id" name="playersId[]"/>
                <input type="text" id="player{{$i}}name" name="players[]" required/>
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
