@extends('layouts.app')

@section('content')

    @include('includes.breadcrumb')

    <section class="section pt-1">
        <div class="container">
            <h1 class="section-title">Продукты для продавца</h1>
            <div class="columns is-multiline">
                @foreach($services as $service)
                    @if($service->type == 1)
                        <div class="column is-4">
                            @include('parts.card-service')
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <section class="section pt-1">
        <div class="container">
            <h1 class="section-title">Продукты для покупателя</h1>
            <!-- Cards services -->
            <div class="columns is-multiline">
                @foreach($services as $service)
                    @if($service->type == 2)
                        <div class="column is-4">
                            @include('parts.card-service')
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

@endsection
