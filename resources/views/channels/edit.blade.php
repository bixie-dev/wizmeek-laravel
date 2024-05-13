@extends('main.layouts.app')

@section('main-content')
<!-- Main section -->
<main class="main">
    <div class="container">

    <form action="/new-channel" class="channel__edit--form" method="post">
        @csrf
                        <h4 class="channel__edit--form__heading">Channel settings</h4>
                        <!-- Channel edit name -->
                        <label for="" class="channel__edit--form__label">
                            <p class="channel__edit--form__p">Channel name</p>
                            <input type="text" name="name" class="channel__edit--form__input" value="Cannel name">
                        </label>
                        <!-- Channel edit description short -->
                        <label for="" class="channel__edit--form__label">
                            <p class="channel__edit--form__p">Short description</p>
                            <textarea name="desc-short" class="channel__edit--form__textarea--short">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, voluptatem!</textarea>
                        </label>
                        <!-- Channel edit description full -->
                        <label for="" class="channel__edit--form__label">
                            <p class="channel__edit--form__p">Full description</p>
                            <textarea name="desc-full" class="channel__edit--form__textarea--full">Here goes full description... Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum fuga ea sapiente quae illo, obcaecati quaerat repellendus, error natus corporis quod blanditiis ullam sit perferendis hic, nesciunt et vitae minima. Voluptate numquam tenetur quisquam temporibus ducimus illum, rem, est cupiditate fuga expedita a, maiores velit inventore. Voluptatum possimus nihil odio incidunt? Temporibus earum unde quas illo tempore assumenda fuga nobis.</textarea>
                        </label>
                        <!-- Channel edit stream link -->
                        <label for="" class="channel__edit--form__label">
                            <p class="channel__edit--form__p">Stream link</p>
                            <input type="link" name="stream-link" class="channel__edit--form__input" value="https://stream-link.com/link">
                        </label>
                        <!-- Channel edit logo -->
                        <label for="" class="channel__edit--form__label">
                            <p class="channel__edit--form__p">Channel logo</p>
                            <div class="channel__edit--form__additional--wrapper">               
                                <div class="channel__edit--form__logo" style="backround-image: url('{{ asset('public/img/content/channels/exp.jpeg') }}');"></div>                 
                                <input type="file" name="logo" class="channel__edit--form__input">
                            </div>
                        </label>
                        <button class="channel__edit--form__submit">Save changes</button>
                    </form>

    </div>
</main>