@extends('layouts.app')

@section('customCSS')
  <link rel="stylesheet" href="{{ asset('css/jquery.atwho.min.css') }}" type="text/css" />
  <style media="screen">
    .container {
      margin-top: 15px;
      margin-bottom: 25px;
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

{{-- @section('customJS')
  <script src="{{ asset('js/jquery.atwho.js') }}" type="text/javascript"></script>
  <script type="text/javascript">
  var added = {};
  for(var i = 2; i <= {{$size}}; i++) {
    var id = "#player" + i;
    $(id).atwho({
      at: "@",
      headerTpl: "<h4>Select a user</h4>",
      insertTpl: "${name},${id}",
      displayTpl: '<li><img src="${avatar_path}" width="30" height="30">${name} <small>${email}</small></li>',
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
@endsection --}}

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <team-form :tournament="{{ $tournament }}" :user="{{ auth()->user() }}"></team-form>

    </div>
  </div>
</div>
@endsection
