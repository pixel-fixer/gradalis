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
                <div class="column is-4">
                    <article class="card-review" @click="showSingleReviewModal(1)">
                        <figure class="mb-0-5">
                            <img
                                src="https://avatars.mds.yandex.net/get-pdb/25978/51b72f68-915e-4759-b9c6-b9d4246eb992/s1200"
                                alt="">
                        </figure>
                        <h3 class="mb-0-5">Анна Алексеева</h3>
                        <div class="is-size-875 has-text-basic">
                            Петербургская лизинговая компания "Роделен" начала размещение на Московской бирже
                            трехлетних биржевых облигаций на 200 млн.
                        </div>
                    </article>
                </div>
                <div class="column is-4">
                    <article class="card-review"  @click="showSingleReviewModal(2)">
                        <figure class="mb-0-5">
                            <img
                                src="https://avatars.mds.yandex.net/get-pdb/25978/51b72f68-915e-4759-b9c6-b9d4246eb992/s1200"
                                alt="">
                        </figure>
                        <h3 class="mb-0-5">Анна Алексеева</h3>
                        <div class="is-size-875 has-text-basic">
                            Петербургская лизинговая компания "Роделен" начала размещение на Московской бирже
                            трехлетних биржевых облигаций на 200 млн.
                        </div>
                    </article>
                </div>
                <div class="column is-4">
                    <article class="card-review"  @click="showSingleReviewModal(3)">
                        <figure class="mb-0-5">
                            <img
                                src="https://avatars.mds.yandex.net/get-pdb/25978/51b72f68-915e-4759-b9c6-b9d4246eb992/s1200"
                                alt="">
                        </figure>
                        <h3 class="mb-0-5">Анна Алексеева</h3>
                        <div class="is-size-875 has-text-basic">
                            Петербургская лизинговая компания "Роделен" начала размещение на Московской бирже
                            трехлетних биржевых облигаций на 200 млн.
                        </div>
                    </article>
                </div>
                <div class="column is-4">
                    <article class="card-review"  @click="showSingleReviewModal(4)">
                        <figure class="mb-0-5">
                            <img
                                src="https://avatars.mds.yandex.net/get-pdb/25978/51b72f68-915e-4759-b9c6-b9d4246eb992/s1200"
                                alt="">
                        </figure>
                        <h3 class="mb-0-5">Анна Алексеева</h3>
                        <div class="is-size-875 has-text-basic">
                            Петербургская лизинговая компания "Роделен" начала размещение на Московской бирже
                            трехлетних биржевых облигаций на 200 млн.
                        </div>
                    </article>
                </div>
                <div class="column is-4">
                    <article class="card-review"  @click="showSingleReviewModal(5)">
                        <figure class="mb-0-5">
                            <img
                                src="https://avatars.mds.yandex.net/get-pdb/25978/51b72f68-915e-4759-b9c6-b9d4246eb992/s1200"
                                alt="">
                        </figure>
                        <h3 class="mb-0-5">Анна Алексеева</h3>
                        <div class="is-size-875 has-text-basic">
                            Петербургская лизинговая компания "Роделен" начала размещение на Московской бирже
                            трехлетних биржевых облигаций на 200 млн.
                        </div>
                    </article>
                </div>
                <div class="column is-4">
                    <article class="card-review"  @click="showSingleReviewModal(6)">
                        <figure class="mb-0-5">
                            <img
                                src="https://avatars.mds.yandex.net/get-pdb/25978/51b72f68-915e-4759-b9c6-b9d4246eb992/s1200"
                                alt="">
                        </figure>
                        <h3 class="mb-0-5">Анна Алексеева</h3>
                        <div class="is-size-875 has-text-basic">
                            Петербургская лизинговая компания "Роделен" начала размещение на Московской бирже
                            трехлетних биржевых облигаций на 200 млн.
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section class="section py-1">
        <div class="container">
            @include('includes.pagination')
        </div>
    </section>

    <add-review v-model="reviews.showAddReviewModal"></add-review>
    <show-review v-model="reviews.showSingleReviewModal" :id="showSingleReviewModalID"></show-review>
@endsection
