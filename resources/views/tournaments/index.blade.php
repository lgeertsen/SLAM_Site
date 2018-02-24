@extends('layouts.app')

@section('customCSS')
  <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">

  <style media="screen">
    #header {
      width: 100%;
      height: 60vh;
      @if(isset($url))
      background-image: linear-gradient(transparent, #fff),
                        url('{{$url}}');
      @else
        background-image: linear-gradient(transparent, #fff),
                          url('{{$sports[array_rand($sports->toArray(), 1)]->url}}');
      @endif
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
      @if (isset($sport))
        <h1>{{ ucwords($sport) }}</h1>
      @else
        <h1>Tournaments</h1>
      @endif
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10 offset-md-1 tournaments">

          @foreach ($tournaments as $tournament)
            @if ($loop->index % 3 == 0)

            <div class="card-deck row justify-content-md-center">
            @endif
              <div class="card col-sm-4">
                <div class="card-body">
                  <h5 class="card-title">{{ $tournament->name }}</h5>
                  <h6 class="card-subtitle mb-2 text-muted">{{ $tournament->sport->name }}</h6>
                  <h6>{{ date('D d F', strtotime($tournament->date)) }}</h6>

                </div>
                <div class="card-footer">
                  <a class="btn btn-outline-info btn-sm" href="{{ $tournament->path() }}">
                    More info
                  </a>
                  <a class="btn btn-outline-success btn-sm" href="{{ "/tournaments/{$tournament->sport->slug}/{$tournament->id}/participate" }}">
                    Participate
                  </a>
                </div>
              </div>
            @if ($loop->index % 3 == 2)
              </div>
            @endif
          @endforeach
      </div>
    </div>
  </div>
@endsection
