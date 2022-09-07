<div class="topbar-menu-area">
    <div class="container">
        <div class="topbar-menu left-menu">
            <ul>
                <li class="menu-item">
                    <a title="Hotline: (+123) 456 789" href="#"><span
                            class="icon label-before fa fa-mobile"></span>Hotline: (+123) 456 789</a> <!-- TODO: phone number -->
                </li>
            </ul>
        </div>
        <div class="topbar-menu right-menu">
            <ul>
                <li class="menu-item"><a title="Register or Login" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                <li class="menu-item"><a title="Register or Login" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                <!-- Select Language Component -->
                    @include('front.components.select-language')
                <!-- END Select Language Component -->
                <!-- Select Money Component -->
                    @include('front.components.select-money')
                <!-- END Select Money Component -->
            </ul>
        </div>
    </div>
</div>