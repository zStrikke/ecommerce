@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard - Create New User</h1>
@stop

@section('content')
@if (session('status'))
    <div id="success-alert" class="alert alert-success">
      {{ session('status') }}
    </div>
@endif
<form method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputUserFirstName">{{ __('First Name') }}</label>
      <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control @error('first_name') is-invalid @enderror" id="inputUserFirstName">
      @error('first_name')
        <div id="validationServerUserFirstNameFeedback" class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="form-group col-md-6">
      <label for="inputUserLastName">{{ __('Last Name') }}</label>
      <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control @error('last_name') is-invalid @enderror" id="inputUserLastName">
      @error('last_name')
        <div id="validationServerUserLastNameFeedback" class="invalid-feedback">
          {{ $message }}
        </div>
    @enderror
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputUserUsername">{{ __('Username') }}</label>
        <input type="text" name="username" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror" id="inputUserUsername">
        @error('username')
          <div id="validationServerUserUsernameFeedback" class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-group col-md-6">
        <label for="inputUserEmail">{{ __('Email') }}</label>
        <input type="text" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="inputUserEmail">
        @error('email')
          <div id="validationServerUserEmailFeedback" class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror
      </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputUserPassword">{{ __('Password') }}</label>
        <input type="password" name="password" value="" class="form-control @error('password') is-invalid @enderror" id="inputUserPassword">
        @error('password')
          <div id="validationServerUserPasswordFeedback" class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-group col-md-6">
        <label for="inputUserPasswordConfirmation">{{ __('Confirm Password') }}</label>
        <input type="password" name="password_confirmation" value="" class="form-control @error('email') is-invalid @enderror" id="inputUserPasswordConfirmation">
        @error('password_confirmation')
          <div id="validationServerUserPasswordConfirmationFeedback" class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror
      </div>
  </div>
  @csrf
  <button class="btn btn-primary" type="submit">{{ __('Create') }}</button>
</form>
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