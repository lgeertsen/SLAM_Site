@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="page-header level">
      <h1 class="flex">
        {{ $profileUser->name }}
      </h1>
    </div>

    <div class="row">
      <div class="col-md-6">

        <div class="list-group">

        </div>
      </div>
    </div>
  </div>
  @endsection
