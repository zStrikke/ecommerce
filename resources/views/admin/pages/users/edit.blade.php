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
      <input type="text" name="first_name" value="{{ $user->first_name }}" class="form-control @error('first_name') is-invalid @enderror" id="inputUserFirstName">
      @error('first_name')
        <div id="validationServerUserFirstNameFeedback" class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="form-group col-md-6">
      <label for="inputUserLastName">{{ __('Last Name') }}</label>
      <input type="text" name="last_name" value="{{ $user->last_name }}" class="form-control @error('last_name') is-invalid @enderror" id="inputUserLastName">
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
        <input type="text" name="username" value="{{ $user->username }}" class="form-control @error('username') is-invalid @enderror" id="inputUserUsername">
        @error('username')
          <div id="validationServerUserUsernameFeedback" class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-group col-md-6">
        <label for="inputUserEmail">{{ __('Email') }}</label>
        <input type="text" name="email" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror" id="inputUserEmail">
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
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputUserImage">{{ __('Image') }}</label>
      <div class="custom-file">
        <input type="file" name="file" multiple class="custom-file-input @error('file') is-invalid @enderror" id="inputUserImage">
        <label class="custom-file-label" for="inputUserImage">{{ __('Choose file') }}</label>
        @error('file')
          <div id="validationServerUserImageFeedback" class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
    </div>
  </div>
  <h2>Optional</h2>
<div class="form-row">
  <div class="form-group form-check">
    <input type="checkbox" {{ old('edit_user_address') ? 'checked' : ''}} name="edit_user_address" class="form-check-input" id="userAddresCheck">
    <label class="form-check-label" for="userAddresCheck">Edit user Address</label>
  </div>
</div>
    <div class="form-row">
      <div class="form-group col-md-12">
        <label for="inputUserAddress1">{{ __('Address') }}</label>
        <input type="text" name="address_line1" value="{{ $user->profile()->first()->address_line1 }}" class="form-control @error('address_line1') is-invalid @enderror" id="inputUserAddress1" placeholder="1234 Main St">
        @error('address_line1')
        <div id="validationServerUserAddressLine1Feedback" class="invalid-feedback">
          {{ $message }}
        </div>
    @enderror
      </div>
      <div class="form-group col-md-12">
        <label for="inputUserAddress2">{{ __('Address 2') }}</label>
        <input type="text" name="address_line2" value="{{ $user->profile()->first()->address_line2 }}" class="form-control @error('address_line2') is-invalid @enderror" id="inputUserAddress2" placeholder="Apartment, studio, or floor">
        @error('address_line2')
        <div id="validationServerUserAddressLine2Feedback" class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
    </div>
    <div class="form-row">
      <div class="form-group">
        <label for="inputUserPhone">{{ __('Phone') }}</label>
        <input type="text" name="phone" value="{{ $user->profile()->first()->phone }}" class="form-control @error('phone') is-invalid @enderror" id="inputUserPhone" placeholder="666 66 66 66">
        @error('phone')
        <div id="validationServerUserPhoneFeedback" class="invalid-feedback">
          {{ $message }}
        </div>
    @enderror
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputUserCity">{{ __('City') }}</label>
        <input type="text" name="city" value="{{ $user->profile()->first()->city }}" class="form-control @error('city') is-invalid @enderror" id="inputUserCity">
        @error('city')
        <div id="validationServerUserCityFeedback" class="invalid-feedback">
          {{ $message }}
        </div>
    @enderror
      </div>
      <div class="form-group col-md-4">
        <label for="inputUserCountry">{{ __('Country') }}</label>
        <select name="country" class="custom-select form-control @error('country') is-invalid @enderror" id="inputUserCountry">
          <option selected value="">{{ __('Choose') }}</option>
            @foreach (config('constants.countries') as $item)
            <option value="{{ $item }}" {{ $user->profile()->first()->country == $item ? 'selected' : '' }}>{{ $item }}</option>
            @endforeach
        </select>
        @error('country')
        <div id="validationServerUserCountryFeedback" class="invalid-feedback">
          {{ $message }}
        </div>
    @enderror
      </div>
      <div class="form-group col-md-2">
        <label for="inputUserPostalCode">{{ __('Postal Code') }}</label>
        <input type="text" name="postal_code" value="{{ $user->profile()->first()->postal_code }}" class="form-control @error('postal_code') is-invalid @enderror" id="inputUserPostalCode">
        @error('postal_code')
        <div id="validationServerUserPostalCodeFeedback" class="invalid-feedback">
          {{ $message }}
        </div>
    @enderror
      </div>
    </div>
  @csrf
  <div class="form-row">
    <div class="form-group col-md-12">
      <button class="btn btn-primary" type="submit">{{ __('Edit') }}</button>
    </div>
  </div>
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