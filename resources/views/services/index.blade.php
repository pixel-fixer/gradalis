@extends('layouts.app')

@section('content')

    @include('includes.breadcrumb')
    <div class="services-index">
        <section class="section section-filter-services is-flex">
            <div class="container is-flex-1">
                <div class="section-filter-services__title has-text-white has-text-weight-bold has-text-centered mb-1-75">
                    Биржа бизнес услуг
                </div>

                <services-filter></services-filter>
            </div>
        </section>


        <section class="section pt-1 pb-1 services-index__section-list-category">
            @include('services.parts.list-category')
        </section>

        <div class="category-service-list-wrap">
            <section class="section pt-1 pb-1">
                <div class="container">
                    <h1 class="section-title is-flex section-title_category-service">
                        <figure class="section-title_category-service__icon">
                            <img src="/svg/icons/services/category/ic_shopping-cart.svg" class="svg" alt="">
                        </figure>
                        <span>Каталог услуг и продуктов для покупателя</span>
                    </h1>
                    <hr class="hr-basic is-marginless">
                </div>
            </section>

            <section class="section pt-1 pb-1">
                <div class="container">
                    <div class="columns is-multiline">
                        <div class="column is-4-desktop is-6-tablet">
                            @include('services.parts.card')
                        </div>
                        <div class="column is-4-desktop is-6-tablet">
                            @include('services.parts.card')
                        </div>
                        <div class="column is-4-desktop is-6-tablet">
                            @include('services.parts.card')
                        </div>
                        <div class="column is-4-desktop is-6-tablet">
                            @include('services.parts.card')
                        </div>
                        <div class="column is-4-desktop is-6-tablet">
                            @include('services.parts.card')
                        </div>
                        <div class="column is-4-desktop is-6-tablet">
                            @include('services.parts.card')
                        </div>
                        <div class="column is-4-desktop is-6-tablet">
                            @include('services.parts.card')
                        </div>
                        <div class="column is-4-desktop is-6-tablet">
                            @include('services.parts.card')
                        </div>
                        <div class="column is-4-desktop is-6-tablet">
                            @include('services.parts.card')
                        </div>
                        <div class="column is-4-desktop is-6-tablet">
                            @include('services.parts.card')
                        </div>
                        <div class="column is-4-desktop is-6-tablet">
                            @include('services.parts.card')
                        </div>
                        <div class="column is-4-desktop is-6-tablet">
                            @include('services.parts.card')
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <section class="section py-1">
            <div class="container">
                @include('includes.pagination')
            </div>
        </section>
    </div>
@endsection
