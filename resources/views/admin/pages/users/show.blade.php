@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard - Show User</h1>
@stop

@section('content')
@if (session('status'))
    <div id="success-alert" class="alert alert-success">
      {{ session('status') }}
    </div>
@endif
<div class="row">
        <div class="card col-3" >
            @if ($user->image()->exists())
            <img src="{{ asset('storage/'. $user->image->path) }}" class="card-img-top mt-1" alt="{{ __('Profile Picture') }}">
            <div class="card-body">
              <h5 class="card-title">{{ __('Profile Picture') }}</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="{{ route('admin.users.edit', $user->username) }}" class="btn btn-primary">{{ __('Edit user') }}</a>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Image Id: {{ $user->image->id }}</li>
                <li class="list-group-item">{{ __('Guess Extension:') .' '. $user->image->guess_extension }}</li>
                <li class="list-group-item">{{ __('Mime Type:') .' '. $user->image->mime_type }}</li>
                <li class="list-group-item">{{ __('Client Original Name:') .' '. $user->image->client_original_name }}</li>
                <li class="list-group-item">{{ __('Client Original Extension:') .' '. $user->image->client_original_extension }}</li>
                <li class="list-group-item">{{ __('Client Mime Type:') .' '. $user->image->client_mime_type }}</li>
                <li class="list-group-item">{{ __('Guess Client Extension:') .' '. $user->image->guess_client_extension }}</li>
                <li class="list-group-item">{{ __('Path:') .' '. $user->image->path }}</li>
                <li class="list-group-item">{{ __('Image modified at:') .' '. $user->image->modified_at }}</li>
                <li class="list-group-item">{{ __('Image created at:') .' '. $user->image->created_at }}</li>
              </ul> 
            @else
            <img src="{{ fallback_image('users') }}" class="card-img-top mt-1" alt="{{ __('Profile Picture') }}">
            <div class="card-body">
              <h5 class="card-title">{{ __('Missing Profile Picture') }}</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="{{ route('admin.users.edit', $user->username) }}" class="btn btn-primary">{{ __('Edit user') }}</a>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">{{ __('Image Id:') }}</li>
                <li class="list-group-item">{{ __('Guess Extension:') }}</li>
                <li class="list-group-item">{{ __('Mime Type:') }}</li>
                <li class="list-group-item">{{ __('Client Original Name:') }}</li>
                <li class="list-group-item">{{ __('Client Original Extension:') }}</li>
                <li class="list-group-item">{{ __('Client Mime Type:') }}</li>
                <li class="list-group-item">{{ __('Guess Client Extension:') }}</li>
                <li class="list-group-item">{{ __('Path:') }}</li>
                <li class="list-group-item">{{ __('Image modified at:') }}</li>
                <li class="list-group-item">{{ __('Image created at:') }}</li>
              </ul> 
            @endif
          </div>
    <div class="col-9">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">User Id: {{ $user->id }}</li>
            <li class="list-group-item">{{ __('First Name:') .' '. $user->first_name }} </li>
            <li class="list-group-item">{{ __('Last Name:') .' '. $user->last_name }}</li>
            <li class="list-group-item">{{ __('Username:') .' '. $user->username }}</li>
            <li class="list-group-item">{{ __('Email:') .' '. $user->email }}</li>
            <li class="list-group-item">{{ __('Email verified at:') .' '. $user->email_verified_at }}</li>
            <li class="list-group-item">{{ __('User modified at:') .' '. $user->modified_at }}</li>
            <li class="list-group-item">{{ __('User created at:') .' '. $user->created_at }}</li>
          </ul>
    </div>
</div>


@stop

@section('css')

@stop

@section('js')
    <script>
    // Smooth slide-up
    $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
        $("#success-alert").slideUp(500);
    });
    
    </script>
@stop