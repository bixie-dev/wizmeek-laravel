@extends('main.layouts.app')

@section('main-content')

<main class="main">
    
    <form action="{{ route('requests.store') }}" class="theme__form" method="POST" id="robots-filter">
        @csrf

        @if (\Session::has('success'))
            <p class="theme__form--success">{!! \Session::get('success') !!}</p>
        @endif
        @if (\Session::has('error'))
            <p class="theme__form--alert">{{ \Session::get('error') }}</p>
        @endif

        <!-- Name Input -->
        <div class="form__block">
            @error('name')
                <p class="theme__form--alert">{{ $message }}</p>
            @enderror
            <input  name="name" 
                    class="theme__form--input"
                    placeholder="Name*"
                    value="{{ old('name') ? old('name') : '' }}">
        </div>

        <!-- Subject Input -->
        <div class="form__block">
            @error('subject')
                <p class="theme__form--alert">{{ $message }}</p>
            @enderror
            <input  name="subject" 
                    class="theme__form--input"
                    placeholder="Subject*"
                    value="{{ old('subject') ? old('subject') : '' }}">
        </div>

        <!-- Message Textarea -->
        <div class="form__block">
            @error('message')
                <p class="theme__form--alert">{{ $message }}</p>
            @enderror
            <textarea name="message" id="robots-filter-check" class="theme__form--input" placeholder="Your message*">{{ old('message') ? old('message') : '' }}</textarea>
        </div>

        <input type="hidden" name="robots_filter" id="robots-filter-key-count">
        <button type="submit" id="robots-filter-btn" class="form__block--submit">Send</button>
    </form>
</main>

@endsection