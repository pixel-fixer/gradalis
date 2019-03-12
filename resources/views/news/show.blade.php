@extends('layouts.app')

@section('content')

    @include('includes.breadcrumb')

    <!-- Section business -->
    <section class="section section-list-objects pt-1">
        <div class="container">
            <div class="columns is-multiline">
                <div class="column is-12-tablet is-8-desktop">
                    <main class="news-single box">
                        <div class="news-single__header">
                            <h1 class="section-title">{{$news->title}}</h1>
                            <div class="news-single__header__info is-flex">
                                <div class="news-single__header__tag-cat-list">
                                    <a href="#" class="news-tag-cat"><img src="/svg/icons/{{$news->category->icon}}" class="svg">{{$news->category->title}}</a>
                                </div>
                                <time class="is-size-875">{{ $news->created_at->format('d M Y')}}</time>
                            </div>
                        </div>
                        <div class="news-single__thumb">
                            @if(empty($news->video))
                                @php
                                    $media = $news->media->first();
                                    $image = "/storage/".$media->id."/".$media->file_name;
                                @endphp
                                <img src="{{$image}}" alt="" class="has-border-radius"/>
                            @else
                                <video class="w-full" controls="">
                                    <source src="{{$news->video}}" type="video/mp4">
                                    Your browser does not support HTML5 video.
                                </video>
                            @endif
                        </div>
                        <div class="content">
                            {!! $news->description !!}
                        </div>
                        <div class="tags">
                            <span class="tag tag_big">fashion</span>
                            <span class="tag tag_big">тенденции</span>
                            <span class="tag tag_big">аналитика</span>
                        </div>
                        <hr class="my-1">
                        <div class="share-list">
                            <a href="#" class="share-item is-fb button">Поделиться в Facebook</a>
                            <a href="#" class="share-item is-ok button">Поделиться в Одноклассниках</a>
                        </div>
                    </main>
                </div>
                <div class="column is-12-tablet is-4-desktop">
                    <aside class="news-single-aside">
                        <div class="columns is-multiline">
                            <div class="column is-8-tablet is-12-desktop">
                                <section>
                                    <h2>Популярные статьи</h2>
                                    <div class="columns is-multiline">
                                        <div class="column is-6-tablet is-12-desktop">
                                            <article class="card-news">
                                                <figure class="card-news__thumb">
                                                    <img
                                                        src="https://avatars.mds.yandex.net/get-pdb/25978/51b72f68-915e-4759-b9c6-b9d4246eb992/s1200"
                                                        alt="">
                                                </figure>
                                                <div class="card-news__tags">
                                                    <a href="#" class="news-tag-cat">Новости</a>
                                                </div>
                                                <h3 class="card-news__title title">Председатель Федеральной резервной
                                                    системы
                                                    поддержал
                                                    рубль</h3>
                                                <div class="card-news__excerpt">
                                                    Курс доллара в четверг падал ниже 66 рублей, евро подбирался к 75
                                                    рублям
                                                </div>
                                                <div class="mt-1">
                                                    <a href="/news-single"
                                                       class="button is-info is-size-875">Подробнее</a>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="column is-6-tablet is-12-desktop">
                                            <article class="card-news">
                                                <figure class="card-news__thumb">
                                                    <img
                                                        src="https://avatars.mds.yandex.net/get-pdb/25978/51b72f68-915e-4759-b9c6-b9d4246eb992/s1200"
                                                        alt="">
                                                </figure>
                                                <div class="card-news__tags">
                                                    <a href="#" class="news-tag-cat">Новости</a>
                                                </div>
                                                <h3 class="card-news__title title">Председатель Федеральной резервной
                                                    системы
                                                    поддержал
                                                    рубль</h3>
                                                <div class="card-news__excerpt">
                                                    Курс доллара в четверг падал ниже 66 рублей, евро подбирался к 75
                                                    рублям
                                                </div>
                                                <div class="mt-1">
                                                    <a href="/news-single"
                                                       class="button is-info is-size-875">Подробнее</a>
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <div class="column is-4-tablet is-12-desktop">
                                <section>
                                    <h2>Рекомендуем</h2>
                                    <div class="card card-object card-object_promo">
                                        <div class="card-image">
                                            <figure class="image is-16by9">
                                                <img
                                                    src="http://laudator.ru/wp-content/uploads/2013/08/magazin-odezhdyi.jpg"
                                                    alt="Placeholder image">
                                            </figure>
                                            <span class="tag tag-payback">
                            <span class="name">окупаемость</span>
                            <span class="term">38 месяцев</span>
                        </span>
                                            <span class="info-icon object-promo">
                            <img src="{{ asset('/svg/icons/ic_recommended.svg') }}" alt="Recommended">
                        </span>
                                            <a href="#" class="info-icon object-favorite"
                                               v-tooltip="'Добавить в избранное'">
                                                <img src="{{ asset('/svg/icons/ic_favorites_white.svg') }}" alt="Fav">
                                            </a>

                                        </div>
                                        <div class="card-content">
                                            <div class="card-object__header">
                                                <h3 class="title">Мини-отель в собственность с видом на Невский
                                                    проспект</h3>
                                                <p class="location"><img src="{{ asset('/svg/icons/ic_location.svg') }}"
                                                                         alt="Fav"><span>Россия, г. Санкт-Петербург</span>
                                                </p>
                                            </div>

                                            <div class="content card-object__content">
                                                <div class="list-properties">
                                                    <div class="list-properties__item">
                                                        <span>Категория</span>
                                                        <span>Коммерческая</span>
                                                    </div>
                                                    <div class="list-properties__item">
                                                        <span>Выручка</span>
                                                        <span><b>$48 000</b></span>
                                                    </div>
                                                    <div class="list-properties__item">
                                                        <span>Прибыль</span>
                                                        <span><b>$23 000</b></span>
                                                    </div>
                                                    <div class="list-properties__item">
                                                        <span>Доходность</span>
                                                        <span><b>78%</b></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-object__footer">
                                                <div class="price-info">
                                                    <div class="price">$18 000 560</div>
                                                </div>
                                                <a class="button is-success is-outlined is-fullwidth has-text-weight-bold">Подробнее
                                                    о
                                                    бизнесе</a>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
@endsection
