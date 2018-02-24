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
  </style>
@endsection

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <avatar-form :user="{{ $profileUser }}"></avatar-form>
      </div>
    </div>
  </div>
  @endsection
