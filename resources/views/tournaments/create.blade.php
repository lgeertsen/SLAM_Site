@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Create a New Tournament</div>

        <div class="panel-body">
          <form action="/tournaments" method="post">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="name">Tournament name:</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
              <label for="sport">Sport:</label>
              <input type="text" class="form-control" id="sport" name="sport" value="{{ old('sport') }}" required>
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
