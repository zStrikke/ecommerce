<div class="mid-section main-info-area">
    <!-- Logo -->
    <div class="wrap-logo-top left-section">
        <a href="index.html" class="link-to-home"><img src="assets/images/logo-top-1.png"
                alt="mercado"></a>
    </div>
    <!-- END Logo -->
    <!-- search + Category List Select -->
        @include('front.components.search')
    <!-- END Category List For Search -->
    <div class="wrap-icon right-section">
        <!-- Wish List -->
        @include('front.components.wish-list')
        <!-- END Wish List -->
        <!-- Cart -->
        @include('front.components.cart')
        <!-- END Cart -->
        <div class="wrap-icon-section show-up-after-1024">
            <a href="#" class="mobile-navigation">
                <span></span>
                <span></span>
                <span></span>
            </a>
        </div>
    </div>
</div>