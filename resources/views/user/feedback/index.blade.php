@extends('main.layouts.app')

@section('main-content')
<!-- Main section -->
<main class="main">
    <div class="container">
        <div class="feedback" id="feedback">
            @if(\Session::has('success'))
                <p class="theme__form--success">{{ \Session::get('success') }}</p>
            @endif
            <div class="feedback__header">
                <nav>
                    <ul>
                        <li><a class="feedback__tab--link active" href="#rate">Rate us</a></li>
                        <li><a class="feedback__tab--link" href="#idea">Idea</a></li>
                        <li><a class="feedback__tab--link" href="#question">Question</a></li>
                        <li><a class="feedback__tab--link" href="#problem">Problem</a></li>
                    </ul>
                </nav>
            </div>
            <div class="feedback__content">

                {{-- Rate Form Tab --}}
                <div id="rate" class="feedback__tab active">
                    <form action="{{ route('user.feedback.store') }}" class="feedback__form" method="POST">
                        @csrf

                        <!-- Name Input -->
                        <div class="form__block">
                            @error('user_name')
                                <p class="theme__form--alert">{{ $message }}</p>
                            @enderror
                            <input  name="user_name" 
                                    class="theme__form--input"
                                    placeholder="Name*"
                                    value="{{ auth()->user()->name }}">
                        </div>

                        <!-- Rating Input -->
                        <div class="form__block">
                            @error('rating')
                                <p class="theme__form--alert">{{ $message }}</p>
                            @enderror
                            <input  name="rating" 
                                    class="theme__form--input"
                                    id="rating"
                                    value="{{ old('rating') ? old('rating') : '5' }}">
                        </div>

                        <!-- Message Textarea -->
                        <div class="form__block">
                            @error('message')
                                <p class="theme__form--alert">{{ $message }}</p>
                            @enderror
                            <textarea class="theme__form--input" name="message">{{ old('message') ? old('message') : '' }}</textarea>
                        </div>

                        <input type="hidden" name="feedback_type" value="rate">
                        <button type="submit" id="robots-filter-btn" class="form__block--submit">Rate Us</button>
                    </form>
                </div>

                {{-- Idea Form tab --}}
                <div id="idea" class="feedback__tab">
                    <form action="{{ route('user.feedback.store') }}" class="feedback__form" method="POST">
                        @csrf

                        <!-- Name Input -->
                        <div class="form__block">
                            @error('user_name')
                                <p class="theme__form--alert">{{ $message }}</p>
                            @enderror
                            <input  name="user_name" 
                                    class="theme__form--input"
                                    placeholder="Name*"
                                    value="{{ auth()->user()->name }}">
                        </div>

                        <!-- Message Textarea -->
                        <div class="form__block">
                            @error('message')
                                <p class="theme__form--alert">{{ $message }}</p>
                            @enderror
                            <textarea class="theme__form--input" name="message">{{ old('message') ? old('message') : '' }}</textarea>
                        </div>

                        <input type="hidden" name="feedback_type" value="idea">
                        <button type="submit" id="robots-filter-btn" class="form__block--submit">Send an idea</button>
                    </form>
                </div>

                {{-- Question Form Tab --}}
                <div id="question" class="feedback__tab">
                    <form action="{{ route('user.feedback.store') }}" class="feedback__form" method="POST">
                        @csrf

                        <!-- Name Input -->
                        <div class="form__block">
                            @error('user_name')
                                <p class="theme__form--alert">{{ $message }}</p>
                            @enderror
                            <input  name="user_name" 
                                    class="theme__form--input"
                                    placeholder="Name*"
                                    value="{{ auth()->user()->name }}">
                        </div>

                        <!-- Message Textarea -->
                        <div class="form__block">
                            @error('message')
                                <p class="theme__form--alert">{{ $message }}</p>
                            @enderror
                            <textarea class="theme__form--input" name="message">{{ old('message') ? old('message') : '' }}</textarea>
                        </div>

                        <input type="hidden" name="feedback_type" value="question">
                        <button type="submit" id="robots-filter-btn" class="form__block--submit">Send a question</button>
                    </form>
                </div>

                {{-- Problem Form Tab --}}
                <div id="problem" class="feedback__tab">
                    <form action="{{ route('user.feedback.store') }}" class="feedback__form" method="POST">
                        @csrf

                        <!-- Name Input -->
                        <div class="form__block">
                            @error('user_name')
                                <p class="theme__form--alert">{{ $message }}</p>
                            @enderror
                            <input  name="user_name" 
                                    class="theme__form--input"
                                    placeholder="Name*"
                                    value="{{ auth()->user()->name }}">
                        </div>

                        <!-- Message Textarea -->
                        <div class="form__block">
                            @error('message')
                                <p class="theme__form--alert">{{ $message }}</p>
                            @enderror
                            <textarea class="theme__form--input" name="message">{{ old('message') ? old('message') : '' }}</textarea>
                        </div>

                        <input type="hidden" name="feedback_type" value="problem">
                        <button type="submit" id="robots-filter-btn" class="form__block--submit">Send problem</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection