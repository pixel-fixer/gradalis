<div class="navbar-item has-dropdown is-hoverable navbar-lang">
    <a class="navbar-link">
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
    </a>
    <div class="navbar-dropdown">
        @foreach (Config::get('app.locales') as $lang => $language)
            @if ($lang != App::getLocale())
                <a href="{{ route('lang.switch', $lang) }}" class="navbar-item">
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
