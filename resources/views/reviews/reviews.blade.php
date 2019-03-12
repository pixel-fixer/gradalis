@extends('layouts.app')

@section('content')

    @include('includes.breadcrumb')


    <div class="container">
        <div class="columns is-multiline">
            <div class="column is-8">
                <h1 class="section-title mb-1">Отзывы</h1>
            </div>
            <div class="column is-4 has-text-right has-text-left-mobile">
                <button class="button is-info h-3 is-size-875 has-text-weight-bold px-1"
                        @click="reviews.showAddReviewModal = true">Добавить отзыв</button>
            </div>
        </div>
    </div>
    </section>
    <section class="section pt-1 pb-1">
        <div class="container">
            <div class="columns is-multiline">
                @if(!empty($reviews))
                    @foreach($reviews as $review)
                        <div class="column is-4">
                            <article class="card-review" @click="showSingleReviewModal({{ $review->id }})">
                                <figure class="mb-0-5">
                                    <img
                                        src="{{ $review->getFirstMediaUrl('review') }}"
                                        alt="">
                                </figure>
                                <h3 class="mb-0-5">{{ $review->name }}</h3>
                                <div class="is-size-875 has-text-basic">
                                    {{ mb_substr($review->article, 0, 140) }}
                                </div>
                            </article>
                        </div>
                    @endforeach
                @else
                    <h2 class="section-title mb-1">Скоро здесь появятся отзывы</h2>
                @endif
            </div>
        </div>
    </section>

    <section class="section py-1">
        <div class="container">
            @include('reviews.pagination')
        </div>
    </section>

    <add-review v-model="reviews.showAddReviewModal"></add-review>
    <show-review v-model="reviews.showSingleReviewModal" :id="reviews.showSingleReviewModalID"></show-review>
@endsection
