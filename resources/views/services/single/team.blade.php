@extends('layouts.app')

@section('content')

    @include('includes.breadcrumb')

    <div class="services-single">
        @include('services.parts.single-header')

        <section class="section">
            <div class="container">
                <div class="columns is-multiline">
                    <div class="column is-8">
                        <div class="box">
                            <div class="content">
                                <h1 class="mb-2">Команда профессионалов</h1>
                                @include('services.parts.single-team-item')
                                <hr class="hr-basic">
                                @include('services.parts.single-team-item')
                                <hr class="hr-basic">
                                @include('services.parts.single-team-item')
                            </div>
                        </div>
                        @include('services.parts.single-bottom-nav')
                    </div>
                    <div class="column is-4">
                        @include('services.parts.single-aside')
                    </div>
                </div>
            </div>
        </section>
        @include('services.parts.single-similar')
    </div>
@endsection
