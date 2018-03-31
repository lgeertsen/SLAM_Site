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
                  {{-- <h6 class="card-subtitle mb-2 text-muted">{{ $tournament->sport->name }}</h6> --}}
                  <h6>{{ date('D d F', strtotime($tournament->date)) }}</h6>

                </div>
                <div class="card-footer">
                  <a class="btn btn-outline-info btn-sm" href="{{ $tournament->path() }}">
                    More info
                  </a>
                  <a class="btn btn-outline-success btn-sm" href="{{ "/tournaments/{$tournament->id}/participate" }}">
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
