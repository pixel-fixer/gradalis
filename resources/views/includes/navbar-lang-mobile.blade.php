<div class="dropdown is-right navbar-item navbar-lang">

    <div class="dropdown-trigger">
        <div class="navbar-link" aria-haspopup="true" aria-controls="dropdown-menu-lang-mobile">
                @switch(App::getLocale())
                @case('ru')
                    <img src="{{ asset('/svg/icons/ic_flag_russian.svg') }}" alt="Lang" class="icon">
                    @break
                @case('pl')
                    <img src="{{ asset('/svg/icons/ic_flag_poland.svg') }}" alt="Lang" class="icon">
                    @break
                @case('en')
                    <img src="{{ asset('/svg/icons/ic_flag_uk.svg') }}" alt="Lang" class="icon">
                    @break
            @endswitch
            <span>{{ Config::get('app.locales')[App::getLocale()] }}</span>
        </div>
    </div>
    <div class="dropdown-menu" id="dropdown-menu-lang-mobile" role="menu">
        <div class="dropdown-content">
                @foreach (Config::get('app.locales') as $lang => $language)
                @if ($lang != App::getLocale())
                    <a href="{{ route('lang.switch', $lang) }}" class="dropdown-item navbar-item">
                        @switch($lang)
                            @case('ru')
                                <img src="{{ asset('/svg/icons/ic_flag_russian.svg') }}" alt="Lang" class="icon">
                                @break
                            @case('pl')
                                <img src="{{ asset('/svg/icons/ic_flag_poland.svg') }}" alt="Lang" class="icon">
                                @break
                            @case('en')
                                <img src="{{ asset('/svg/icons/ic_flag_uk.svg') }}" alt="Lang" class="icon">
                                @break
                        @endswitch
                        <span>{{$language}}</span>
                    </a>
                @endif
            @endforeach
        </div>
    </div>
</div>