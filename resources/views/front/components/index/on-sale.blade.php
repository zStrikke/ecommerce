<div class="wrap-show-advance-info-box style-1 has-countdown">
    <h3 class="title-box">{{ __('On Sale') }}</h3>
    <!-- Bloque del countDown -->
    <div class="wrap-countdown mercado-countdown" data-expire="2020/12/12 12:34:56"></div>
    {{-- ENd Bloque del countDown --}}
    <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'> <!-- TODO: No entiendo esto -->

        @foreach ($productsOnSale as $product)
        <div class="product product-style-2 equal-elem ">
            <div class="product-thumnail">
                <a href="{{ '#' }}" title="{{ $product->name }}"> {{-- TODO: route Details --}}
                    <figure><img src="{{ asset('storage/' . $product->thumbnail) }}" width="800" height="800" alt="{{ $product->name }} [image]"></figure>
                </a>
                <div class="group-flash">
                    <span class="flash-item sale-label">{{ __('Sale') }}</span>
                </div>
                <div class="wrap-btn">
                    <a href="#" class="function-link">{{ __('Quick View') }}</a> {{-- TODO: vista diferente? --}}
                </div>
            </div>
            <div class="product-info">
                <a href="{{ '#' }}" class="product-name"><span>{{ $product->name }}</span></a> {{-- TODO: route details --}}
                @if ($product->discount)
                <div class="wrap-price"><ins><p class="product-price">${{ $product->price }}</p></ins> <del><p class="product-price">${{ $product->priceWithDiscount }}</p></del></div> {{-- TODO: discount_percent -> percent + ponerlo del tipo int + mirar una forma de setearlo directamente en el modelo para que aqui halla la menos logica posible --}}
                @else
                <div class="wrap-price"><span class="product-price">${{ $product->price }}</span></div>
                @endif
            </div>
        </div>            
        @endforeach
    </div>
</div>