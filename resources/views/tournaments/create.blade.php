@extends('layouts.app')

@section('customCSS')
  <style media="screen">
    .container,
    .row {
      height: 100%;
    }
    .container {
      margin-top: 15px;
    }
  </style>
@endsection

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-sm-12 col-md-8">
      <div class="card">

        <div class="card-body">
          <h3>Create a New Tournament</h3>
          <form action="/tournaments" method="post">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="name">Tournament name:</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
              <label for="sport_id">Choosa a Sport:</label>
              <select class="form-control" id="sport_id" name="sport_id" required>
                <option value="">Choose One...</option>
                @foreach ($sports as $sport)
                  <option value="{{ $sport->id }}" {{ old('sport_id') == $sport->id ? 'selected' : '' }}>
                    {{ ucwords($sport->name) }}
                  </option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="date">Date:</label>
              <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}" required>
            </div>
            <div class="form-group">
              <label for="teamSize">Team size:</label>
              <input type="number" class="form-control" id="teamSize" name="teamSize" value="{{ old('teamSize') ? old('teamSize') : 1 }}" min="1" required>
            </div>
            <div class="form-group">
              <label for="description">Tournament description:</label>
              <textarea class="form-control" id="description" name="description" value="{{ old('description') }}" rows="4" required></textarea>
            </div>
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
