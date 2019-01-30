@extends('layouts.app')

@section('content')

    @include('includes.breadcrumb')
    <div class="container">
        <div class="columns">
            <div class="column is-4">
                @include('spa.aside')
            </div>
            <div class="column is-8 user-setting">
                <section class="section pt-1 px-0">
                    <div class="user-setting__header is-flex">
                        <figure>
                            <img src="https://image.freepik.com/free-photo/no-translate-detected_23-2147650966.jpg"
                                 alt="">
                        </figure>
                        <div>
                            <h2>Ткаченко Андрей</h2>
                            <div class="is-flex">
                                <div class="file">
                                    <label class="file-label">
                                        <input class="file-input" type="file" name="resume">
                                        <div class="button is-outlined is-info is-size-875 has-text-weight-bold h-3">
                                            Загрузить новую фотографию профиля
                                        </div>
                                    </label>
                                </div>
                                <div class="help-desc is-size-875">
                                    Оптимальный размер 160x160 пикселей, до 2 Мб.
                                </div>
                            </div>
                        </div>
                    </div>
                    <example-form-profile-spa></example-form-profile-spa>
                    <example-form-change-password></example-form-change-password>
                </section>
            </div>
        </div>
    </div>
@endsection
