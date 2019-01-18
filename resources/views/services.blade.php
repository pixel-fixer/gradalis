@extends('layouts.app')

@section('content')

    @include('includes.breadcrumb')

    <!-- Section services -->
    <section class="section pt-1">
        <div class="container">
            <h1 class="section-title">Продукты для продавца</h1>
            <!-- Cards services -->
            <div class="columns is-multiline">
                <div class="column is-4">
                    @include('parts.card-service')
                </div>
                <div class="column is-4">
                    @include('parts.card-service')
                </div>
                <div class="column is-4">
                    @include('parts.card-service')
                </div>
                <div class="column is-4">
                    @include('parts.card-service')
                </div>
                <div class="column is-4">
                    @include('parts.card-service')
                </div>
                <div class="column is-4">
                    @include('parts.card-service')
                </div>
            </div>
        </div>
    </section>
    <section class="section pt-1">
        <div class="container">
            <h1 class="section-title">Продукты для покупателя</h1>
            <!-- Cards services -->
            <div class="columns is-multiline">
                <div class="column is-4">
                    @include('parts.card-service')
                </div>
                <div class="column is-4">
                    @include('parts.card-service')
                </div>
                <div class="column is-4">
                    @include('parts.card-service')
                </div>
                <div class="column is-4">
                    @include('parts.card-service')
                </div>
                <div class="column is-4">
                    @include('parts.card-service')
                </div>
                <div class="column is-4">
                    @include('parts.card-service')
                </div>
            </div>
        </div>


    </section>
@endsection
