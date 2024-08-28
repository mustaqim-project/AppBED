<div class="menu-header">
    <a href="#" data-toggle-theme class="border-right-0">
        <i class="fa font-12 color-yellow1-dark fa-lightbulb"></i>
    </a>
    <a href="#" data-menu="menu-highlights" class="border-right-0">
        <i class="fa font-12 color-green1-dark fa-brush"></i>
    </a>
    <a href="#" data-menu="menu-share" class="border-right-0">
        <i class="fa font-12 color-red2-dark fa-share-alt"></i>
    </a>
    <a href="#" class="border-right-0">
        <i class="fa font-12 color-blue2-dark fa-cog"></i>
    </a>
    <a href="#" class="border-right-0">
        <i class="fa font-12 color-red2-dark fa-times"></i>
    </a>
</div>

<div class="menu-logo text-center">
    <a href="#"><img class="rounded-circle bg-highlight" width="80" src="images/avatars/5s.png"></a>
    <h1 class="pt-3 font-800 font-28 text-uppercase">
        @if (session('lang') === 'id')
            {{ 'asbed' }}
        @else
            {{ $translate->translate('asbed') }}
        @endif
    </h1>
    <p class="font-11 mt-n2">
        @if (session('lang') === 'id')
            {{ 'Masukkan sedikit' }} <span class="color-highlight">{{ 'warna' }}</span> {{ 'dalam hidup Anda.' }}
        @else
            {{ $translate->translate('Put a little') }} <span class="color-highlight">{{ $translate->translate('color') }}</span> {{ $translate->translate('in your life.') }}
        @endif
    </p>
</div>

<div class="menu-items">
    <h5 class="text-uppercase opacity-20 font-12 pl-3">
        @if (session('lang') === 'id')
            {{ 'Menu' }}
        @else
            {{ $translate->translate('Menu') }}
        @endif
    </h5>
    <a id="nav-welcome" href="index.blade.php">
        <i data-feather="home" data-feather-line="1" data-feather-size="16" data-feather-color="blue2-dark" data-feather-bg="blue2-fade-dark"></i>
        <span>
            @if (session('lang') === 'id')
                {{ 'Selamat Datang' }}
            @else
                {{ $translate->translate('Welcome') }}
            @endif
        </span>
        <em class="badge bg-highlight color-white">
            @if (session('lang') === 'id')
                {{ 'PANAS' }}
            @else
                {{ $translate->translate('HOT') }}
            @endif
        </em>
        <i class="fa fa-circle"></i>
    </a>
    <a id="nav-starters" href="pages-starters-list.blade.php">
        <i data-feather="star" data-feather-line="1" data-feather-size="18" data-feather-color="yellow1-dark" data-feather-bg="yellow1-fade-dark"></i>
        <span>
            @if (session('lang') === 'id')
                {{ 'Pemula' }}
            @else
                {{ $translate->translate('Starters') }}
            @endif
        </span>
        <i class="fa fa-circle"></i>
    </a>
    <a id="nav-features" href="components.blade.php">
        <i data-feather="heart" data-feather-line="1" data-feather-size="16" data-feather-color="red2-dark" data-feather-bg="red2-fade-dark"></i>
        <span>
            @if (session('lang') === 'id')
                {{ 'Fitur' }}
            @else
                {{ $translate->translate('Features') }}
            @endif
        </span>
        <i class="fa fa-circle"></i>
    </a>
    <a id="nav-pages" href="pages.blade.php">
        <i data-feather="file" data-feather-line="1" data-feather-size="16" data-feather-color="brown1-dark" data-feather-bg="brown1-fade-dark"></i>
        <span>
            @if (session('lang') === 'id')
                {{ 'Halaman' }}
            @else
                {{ $translate->translate('Pages') }}
            @endif
        </span>
        <i class="fa fa-circle"></i>
    </a>
    <a id="nav-media" href="media.blade.php">
        <i data-feather="image" data-feather-line="1" data-feather-size="16" data-feather-color="green1-dark" data-feather-bg="green1-fade-dark"></i>
        <span>
            @if (session('lang') === 'id')
                {{ 'Media' }}
            @else
                {{ $translate->translate('Media') }}
            @endif
        </span>
        <i class="fa fa-circle"></i>
    </a>
    <a href="#" data-submenu="sub-contact">
        <i data-feather="mail" data-feather-line="1" data-feather-size="16" data-feather-color="blue2-dark" data-feather-bg="blue2-fade-dark"></i>
        <span>
            @if (session('lang') === 'id')
                {{ 'Kontak' }}
            @else
                {{ $translate->translate('Contact') }}
            @endif
        </span>
        <strong class="badge bg-highlight color-white">1</strong>
        <i class="fa fa-circle"></i>
    </a>
    <div id="sub-contact" class="submenu">
        <a href="contact.blade.php" id="nav-contact">
            <i class="fa fa-envelope color-blue2-dark font-16 opacity-30"></i>
            <span>
                @if (session('lang') === 'id')
                    {{ 'Email' }}
                @else
                    {{ $translate->translate('Email') }}
                @endif
            </span>
            <i class="fa fa-circle"></i>
        </a>
        <a href="#">
            <i class="fa fa-phone color-green1-dark font-16 opacity-50"></i>
            <span>
                @if (session('lang') === 'id')
                    {{ 'Telepon' }}
                @else
                    {{ $translate->translate('Phone') }}
                @endif
            </span>
            <i class="fa fa-circle"></i>
        </a>
        <a href="#">
            <i class="fab fa-whatsapp color-whatsapp font-16 opacity-30"></i>
            <span>
                @if (session('lang') === 'id')
                    {{ 'WhatsApp' }}
                @else
                    {{ $translate->translate('WhatsApp') }}
                @endif
            </span>
            <i class="fa fa-circle"></i>
        </a>
    </div>
    <a id="nav-settings" href="settings.blade.php">
        <i data-feather="settings" data-feather-line="1" data-feather-size="16" data-feather-color="gray2-dark" data-feather-bg="gray2-fade-dark"></i>
        <span>
            @if (session('lang') === 'id')
                {{ 'Pengaturan' }}
            @else
                {{ $translate->translate('Settings') }}
            @endif
        </span>
        <i class="fa fa-circle"></i>
    </a>
    <a href="#" class="close-menu">
        <i data-feather="x" data-feather-line="3" data-feather-size="16" data-feather-color="red2-dark" data-feather-bg="red2-fade-dark"></i>
        <span>
            @if (session('lang') === 'id')
                {{ 'Tutup' }}
            @else
                {{ $translate->translate('Close') }}
            @endif
        </span>
        <i class="fa fa-circle"></i>
    </a>
</div>

<div class="text-center pt-2">
    <a href="#" class="icon icon-xs mr-1 rounded-s bg-facebook"><i class="fab fa-facebook"></i></a>
    <a href="#" class="icon icon-xs mr-1 rounded-s bg-twitter"><i class="fab fa-twitter"></i></a>
    <a href="#" class="icon icon-xs mr-1 rounded-s bg-instagram"><i class="fab fa-instagram"></i></a>
    <a href="#" class="icon icon-xs mr-1 rounded-s bg-linkedin"><i class="fab fa-linkedin-in"></i></a>
    <a href="#" class="icon icon-xs rounded-s bg-whatsapp"><i class="fab fa-whatsapp"></i></a>
    <p class="mb-0 pt-3 font-10 opacity-30">
        @if (session('lang') === 'id')
            {{ 'Hak Cipta' }} <span class="copyright-year"></span> {{ 'Enabled. Semua hak dilindungi' }}
        @else
            {{ $translate->translate('Copyright') }} <span class="copyright-year"></span> {{ $translate->translate('Enabled. All rights reserved') }}
        @endif
    </p>
</div>
