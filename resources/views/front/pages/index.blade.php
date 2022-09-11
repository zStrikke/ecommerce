@extends('front.layouts.app')

@section('title', 'Home')

@section('content')
<main id="main">
    <div class="container">

        <!-- Main Slide -->
        @include('front.components.index.main-slider')
        <!-- END Main Slide -->

        <!-- Banner Twin -->
        @include('front.components.index.banner-twin')
        <!-- END Banner Twin -->

        <!-- On Sale -->
        @include('front.components.index.on-sale', ['productsOnSale' => $products->filter(function ($value, $key) {
            return $value->is_onsale;
        })]) {{-- En principio las vistas incluidas heredan los datos de la vista padre, pero me da que seria mejor pasarla igualmente para hacerlo mas explicito... O al menos especificar que va a necesitar x datos--}}
        <!-- END On Sale -->

        <!-- Latest Products -->
        @include('front.components.index.latest-products')
        <!-- END Latest Products -->

        <!-- Product Categories -->
        @include('front.components.index.product-categories')
        <!-- END Product Categories -->

    </div>
</main>
@endsection
