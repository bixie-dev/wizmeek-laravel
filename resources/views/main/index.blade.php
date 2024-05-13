@extends('main.layouts.landing')


@section('main-content')

<!-- Section - Hello -->
    <section class="hello" id="home">
        <div class="container">
            <div class="hello__inner">
                <article class="hello__article">
                    <h2 class="landing__heading--secondary">{{ $text->main_heading }}</h2>
                    <p class="landing__text">{{ $text->main_text }}</p>
                </article>
                <div class="hello__image" style="background-image: url('{{ asset('storage/app/' . $text->main_img) }}')"></div>
                
            </div>
        </div>
    </section>
<!-- // Section - Hello -->

<!-- Section - Coming Soon -->
    <section class="soon" id="soon">
        <div class="container">
            <div class="soon__inner">
                <h2 class="landing__heading--secondary">{{ $text->soon_heading }}</h2>
                <!-- <form action="{{ route('subscribe') }}" method="post" class="soon__form--subscribe">
                    @csrf
                    <div class="soon__form--group">
                        <label for="subscribe" class="soon__form--label">Subscribe</label>
                        <input type="text" name="email" id="subscribe" class="soon__form--subscribe__input">
                        <button class="soon__form--button">Submit</button>
                    </div>
                </form> -->
                <form action="{{ route('user.eacsignup') }}" class="soon__form--eac" method="post">
                    @csrf
                    <div class="soon__form--group">
                        <label for="subscribe" class="soon__form--label">I have the early access code</label>
                        <input type="text" name="eac" id="subscribe" class="soon__form--eac__input">
                        <button class="soon__form--button">Go</button>
                    </div>
                </form>
                <p class="landing__text soon__account">Already have an account?</p>
                <a class="soon__login--btn" href="{{ route('user.login') }}">Login</a>
            </div>
        </div>
    </section>
<!-- // Sction - Coming Soon -->

<!-- Section - Priority -->
    <section class="priority" id="priority">
        <div class="container">
            <div class="priority__inner">
                <h2 class="landing__heading--secondary">{{ $text->priority_heading }}</h2>
                <p class="landing__text priority__text">{{ $text->priority_text }}</p>
            </div>
        </div>
    </section>
<!-- // Section - Priority -->

<!-- Section - Problematics -->
    <section class="problem" id="problematics">
        <div class="container">
            <div class="problem__inner">
                <h2 class="landing__heading--secondary">{{ $text->cases_heading }}</h2>
                <div class="problem__row">
                    <p class="landing__text problem__text">{{ $text->case1_text }}</p>
                    <div class="problem__img" style="background-image:url('{{ asset('storage/app/' . $text->case1_img) }}')"></div>
                </div>
                <div class="problem__row">
                    <div class="problem__img" style="background-image:url('{{ asset('storage/app/' . $text->case2_img) }}')"></div>
                    <p class="landing__text problem__text">{{ $text->case2_text }}</p>
                </div>
            </div>
        </div>
    </section>
<!-- // Section - Problematics -->

<!-- Section - Solution -->
    <section class="solution" id="solution">
        <div class="container">
            <div class="solution__inner">
                <h2 class="landing__heading--secondary">{{ $text->solution_heading }}</h2>
                <p class="landing__text solution__text">{{ $text->solution_text }}</p>
                <div class="solution__img" style="background-image:url('{{ asset('storage/app/' . $text->solution_img) }}')"></div>
            </div>
        </div>
    </section>
<!-- // Section - Solution -->

<!-- Section - Content -->
    <section class="content" id="content">
        <div class="container">
            <div class="content__inner">
                <h2 class="landing__heading--secondary">{{ $text->process_heading }}</h2>
                <div class="content__case">
                    <article class="content__article">
                        <h3 class="landing__heading--tertiary">{{ $text->process_step1_heading }}</h3>
                        <p class="landing__text">{{ $text->process_step1_text }}</p>
                    </article>
                    <div class="content__img" style="background-image:url('{{ asset('storage/app/' . $text->process_step1_img) }}')"></div>
                </div>
                <div class="content__case">
                    <article class="content__article">
                        <h3 class="landing__heading--tertiary">{{ $text->process_step2_heading }}</h3>
                        <p class="landing__text">{{ $text->process_step2_text }}</p>
                    </article>
                    <div class="content__img" style="background-image:url('{{ asset('storage/app/' . $text->process_step2_img) }}')"></div>
                </div>
                <div class="content__case">
                    <article class="content__article">
                        <h3 class="landing__heading--tertiary">{{ $text->process_step3_heading }}</h3>
                        <p class="landing__text">{{ $text->process_step3_text }}</p>
                    </article>
                    <div class="content__img" style="background-image:url('{{ asset('storage/app/' . $text->process_step3_img) }}')"></div>
                </div>
            </div>
        </div>
    </section>
<!-- // Section - Content -->

<!-- Section - Reviews -->
    <!-- <section class="reviews">
        <div class="container">
            <div class="reviews__inner">
                <h2 class="landing__heading--secondary">What are people Saying about Wizmeek</h2>
                <div class="reviews__case">
                    <img src="" alt="">
                    <article class="reviews__review">
                        <h3 class="landing__heading--tertiary">Andrew P</h3>
                        <p class="landing__text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
                    </article>
                </div>
                <div class="reviews__case">
                    <img src="" alt="">
                    <article class="reviews__review">
                        <h3 class="landing__heading--tertiary">Maria Blake</h3>
                        <p class="landing__text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
                    </article>
                </div>
                <div class="reviews__case">
                    <img src="" alt="">
                    <article class="reviews__review">
                        <h3 class="landing__heading--tertiary">Markus Jayson</h3>
                        <p class="landing__text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
                    </article>
                </div>
            </div>
        </div>
    </section> -->
<!-- // Section - Reviews -->
<style>
    section{
        padding-bottom: 50px;
    }
</style>
@endsection