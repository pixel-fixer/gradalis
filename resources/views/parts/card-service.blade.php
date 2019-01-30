<!-- Example Layout card service -->
<div class="card card-service">
    <div class="card-service__body">
        <div class="is-flex">
            @if($service->icon)
                <figure class="card-service__icon">
                    <img src="/storage/{{ $service->icon }}" alt="">
                </figure>
            @endif
            <h4 class="card-service__title">{{$service->name}}</h4>
        </div>
        <div class="card-service__info">
            <div class="card-service__excerpt is-size-875">
                {{$service->small_text}}
            </div>
            <div class="card-service__price">€{{$service->price_eur}}
                @if($service->price_for)
                    {{$service->price_for}}
                @endif
            </div>
        </div>
    </div>
    <div class="card-service__footer">
        @if($service->type == 1)
            <a class="button is-warning is-outlined is-size-875 h-3">Заказать</a>
        @else
            <a class="button is-link is-outlined is-size-875 h-3">Заказать</a>
        @endif
        <a class="button is-clear is-clear_close is-size-875 h-3" href="/services/{{$service->slug}}"><span class="has-text-decoration-underline">Подробнее</span></a>
    </div>
</div>
