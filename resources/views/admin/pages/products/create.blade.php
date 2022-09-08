@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard - Create New Product</h1>
@stop

@section('content')
@if (session('status'))
    <div id="success-alert" class="alert alert-success">
      {{ session('status') }}
    </div>
@endif
<form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputProductName">{{ __('Name') }}</label>
      <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="inputProductName">
      @error('name')
        <div id="validationServerProductNameFeedback" class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="form-group col-md-6">
      <label for="inputProductSKU">{{ __('SKU') }}</label>
      <input type="text" name="sku" value="{{ old('sku') }}" class="form-control @error('sku') is-invalid @enderror" id="inputProductSKU">
      @error('sku')
        <div id="validationServerProductSKUFeedback" class="invalid-feedback">
          {{ $message }}
        </div>
    @enderror
    </div>
  </div>
  <div class="form-group">
    <label for="textareaProductDescription">{{ __('Description') }}</label>
    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="textareaProductDescription" rows="3">{{ old('description') }}</textarea>
    @error('description')
      <div id="validationServerProductDescriptionFeedback" class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputProducImage">{{ __('Image') }}</label>
      <div class="custom-file">
        <input type="file" name="file" multiple class="custom-file-input @error('file') is-invalid @enderror" id="inputProducImage">
        <label class="custom-file-label" for="inputProducImage">{{ __('Choose file') }}</label>
        @error('file')
          <div id="validationServerProductImageFeedback" class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
    </div>
    <div class="form-group col-md-2">
      <label for="inputProductPrice">{{ __('Price') }}</label>
      <input type="text" name="price" value="{{ old('price') }}" class="form-control @error('price') is-invalid @enderror" id="inputProductPrice">
      @error('price')
        <div id="validationServerProductPriceFeedback" class="invalid-feedback">
          {{ $message }}
        </div>
    @enderror
    </div>
    <div class="form-group col-md-2">
      <label for="selectProductDiscount">{{ __('Discount') }}</label>
      <select id="selectProductDiscount" name="discount" class="form-control @error('discount') is-invalid @enderror">
        <option disabled selected>{{ __('Choose discount') }}</option>
          @forelse ($discounts as $discount)
              <option value="{{ $discount->id }}" {{ old('discount') == $discount->id ? 'selected' : '' }}>{{ $discount->name }}</option>
          @empty
              <option disabled>{{ __('There is no available discounts') }}</option>
          @endforelse
      </select>
      @error('discount')
        <div id="validationServerProductDiscountFeedback" class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="form-group col-md-2">
      <label for="selectProductCategory">{{ __('Category') }}</label>
      <select id="selectProductCategory" name="category" class="form-control @error('category') is-invalid @enderror">
          <option disabled selected>{{ __('Choose a category') }}</option>
          @forelse ($categories as $parentCategory)
              <optgroup label="{{ $parentCategory->name }}">
                @forelse ($parentCategory->childrens as $childCategory)
                    <option value="{{ $childCategory->id }}" {{ old('category') == $childCategory->id ? 'selected' : '' }}> &#8627;{{ $childCategory->name }}</option>
                @empty
                    <option disabled>{{ __('This category has no childs') }}</option>
                @endforelse
              </optgroup>
          @empty
                <option disabled>{{ __('There is no parent categories') }}</option>
          @endforelse
      </select>
      @error('category')
        <div id="validationServerProductCategoryFeedback" class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="form-group col-md-2">
      <label for="selectProductCategory">{{ __('Extra') }}</label>
      <div class="custom-control custom-switch">
        <input type="checkbox" value="1" name="public" {{ old('public') == '1' ? 'checked' : '' }} class="custom-control-input @error('public') is-invalid @enderror" id="inputProductPublic">
        <label class="custom-control-label" for="inputProductPublic">{{ __('Public') }}</label>
        @error('public')
          <div id="validationServerProductOnSaleFeedback" class="invalid-feedback">
            {{ $message }}
          </div>  
        @enderror
      </div>
      <div class="custom-control custom-switch">
        <input type="checkbox" value="1" name="onsale" {{ old('onsale') == '1' ? 'checked' : '' }} class="custom-control-input @error('onsale') is-invalid @enderror" id="inputProductOnSale">
        <label class="custom-control-label" for="inputProductOnSale">On Sale</label>
        @error('onsale')
          <div id="validationServerProductOnSaleFeedback" class="invalid-feedback">
            {{ $message }}
          </div>  
        @enderror
      </div>
    </div>
  </div>
  @csrf
  <button class="btn btn-primary" type="submit">{{ __('Create') }}</button>
</form>
@stop

@section('css')

@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>

      // Show the name of the file input or number of files
      document.querySelector('.custom-file-input').addEventListener('change',function(e){
        var files = Array.from(this.files);
        var filename = '';
          if(files.length > 1) {
            fileName = files.length + ' files';
          } else {
            fileName = files[0].name;
          }
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    // Smooth slide-up
    $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
        $("#success-alert").slideUp(500);
    });
    
    </script>
@stop