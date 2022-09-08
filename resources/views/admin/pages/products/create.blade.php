@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard - Create New Product</h1>
@stop

@section('content')
<form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputProductName">{{ __('Name') }}</label>
      <input type="text" name="name" class="form-control" id="inputProductName">
    </div>
    <div class="form-group col-md-6">
      <label for="inputProductSKU">{{ __('SKU') }}</label>
      <input type="text" name="sku" class="form-control" id="inputProductSKU">
    </div>
  </div>
  <div class="form-group">
    <label for="textareaProductDescription">{{ __('Description') }}</label>
    <textarea class="form-control" name="desc" id="textareaProductDescription" rows="3"></textarea>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputProducImage">{{ __('Image') }}</label>
      <div class="custom-file">
        <input type="file" name="image" multiple class="custom-file-input" id="inputProducImage">
        <label class="custom-file-label" for="inputProducImage">Choose file</label>
      </div>
    </div>
    <div class="form-group col-md-2">
      <label for="selectProductDiscount">{{ __('Discount') }}</label>
      <select id="selectProductDiscount" name="discount" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="selectProductCategory">{{ __('Category') }}</label>
      <select id="selectProductCategory" name="category" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="selectProductCategory">{{ __('Extra') }}</label>
      <div class="custom-control custom-switch">
        <input type="checkbox" name="public" class="custom-control-input" id="inputProductPublic">
        <label class="custom-control-label" for="inputProductPublic">Public</label>
      </div>
      <div class="custom-control custom-switch">
        <input type="checkbox" name="onsale" class="custom-control-input" id="inputProductOnSale">
        <label class="custom-control-label" for="inputProductOnSale">On Sale</label>
      </div>
    </div>
  </div>
  @csrf
  <button class="btn btn-primary" type="submit">{{ __('Create') }}</button>
</form>
{{-- <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationServer01">Name</label>
            <input type="text" name="name" class="form-control" id="validationServer01" >
          </div>
          <div class="col-md-6 mb-3">
            <label for="validationServer02">SKU</label>
            <input type="text" name="sku" class="form-control" id="validationServer02" >
          </div>
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="name-field">Price</label>
        <input type="text" class="form-control" name="price" id="name-field" value="" >
      </div>    
    </div>
    <div class="form-row">
        <div class="custom-file mb-3">
            <input type="file" name="file" class="custom-file-input" id="validatedCustomFile" required>
            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
          </div>        
    </div>
    @csrf
    <button class="btn btn-primary" type="submit">{{ __('Create') }}</button>
  </form> --}}
@stop

@section('css')

@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
      document.querySelector('.custom-file-input').addEventListener('change',function(e){
        var files = Array.from(this.files);
        var filename = '';
          if(files.length > 1) {
            fileName = files.length + ' files';
          } else {
            fileName = files[0].name;
          }
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    })
    </script>
@stop