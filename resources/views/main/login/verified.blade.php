@extends('main/layouts/app')

@section('main-content')
<div class="centered__wrapper">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="verify__card">
                <div class="verify__card--icon">
                <svg class="verify__card--icon__check" version="1.1" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">
                    <title>check</title>
                    <path d="M26.109 8.844c0 0.391-0.156 0.781-0.438 1.062l-13.438 13.438c-0.281 0.281-0.672 0.438-1.062 0.438s-0.781-0.156-1.062-0.438l-7.781-7.781c-0.281-0.281-0.438-0.672-0.438-1.062s0.156-0.781 0.438-1.062l2.125-2.125c0.281-0.281 0.672-0.438 1.062-0.438s0.781 0.156 1.062 0.438l4.594 4.609 10.25-10.266c0.281-0.281 0.672-0.438 1.062-0.438s0.781 0.156 1.062 0.438l2.125 2.125c0.281 0.281 0.438 0.672 0.438 1.062z"></path>
                </svg>
                </div>
                <div class="verify__card--header">{{ __('Your E-mail has been successfully verified') }}</div>

                <div class="verify__card--main">
                    <p class="verify__card--message">{{ __('Now you have more available functions') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
