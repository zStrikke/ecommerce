@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Create Category</h1>
@stop

@section('content')
<form method="POST" action="{{ route('admin.category.store') }}">
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="parent_cat-field">State</label>
            <select class="custom-select" name="category_parent_id" id="parent_cat-field">
              <option selected disabled value="">{{ __('Choose...') }}</option>
              @forelse ($parent_categories as $cat)
                  <option value="{{ $cat->id }}">{{ __($cat->name) }}</option>
              @empty
                  <option disabled>{{ __('No parent Categories yet') }}</option>
              @endforelse
            </select>
        </div>
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="name-field">{{ __('Name') }}</label>
        <input type="text" class="form-control" name="category_name" id="name-field" value="" required>
      </div>    
    </div>
    <div class="form-row">
        <div class="col-md-9 mb-3">
            <label for="desc-field">{{ __('Description') }}</label>
            <textarea class="form-control" name="category_desc" id="desc-field" required></textarea>
        </div>
    </div>
    @csrf
    <button class="btn btn-primary" type="submit">{{ __('Create') }}</button>
  </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop