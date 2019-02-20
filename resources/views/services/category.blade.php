@extends('layouts.app')

@section('content')

    @include('includes.breadcrumb')

    <section class="section pt-1 pb-1">
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

@endsection
