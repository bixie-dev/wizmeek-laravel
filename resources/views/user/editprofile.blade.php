@extends('main.layouts.app')

@section('main-content')
<!-- Main section -->
<main class="main">
    <div class="container">
        <div class="main-box">
            <div class="private__wrapper" style="width:60%">
                <div class="private__block--left">
                    @if(auth()->user()->avatar)
                        <div class="private__block--avatar" style="background-image: url('{{ asset('storage/app/content/user/avatars/' . $user->avatar) }}')"></div>
                    @elseif(auth()->user()->google_avatar)
                        <div class="private__block--avatar__update--avatar__old" style="background-image: url('{{ $user->google_avatar }}')"></div>
                    @else
                        <div class="private__block--avatar" style="background-image: url('{{ asset('public/img/content/avatars/no_avatar.png') }}')"></div>
                    @endif
                    <a id="avatar_popup_btn" class="private__block--avatar__link">
                        <svg class="private__block--avatar__icon" xmlns="http://www.w3.org/2000/svg" height="48" width="48" viewBox="0 0 48 48">
                            <path d="M29.45 6v3H9v30h30V18.6h3V39q0 1.2-.9 2.1-.9.9-2.1.9H9q-1.2 0-2.1-.9Q6 40.2 6 39V9q0-1.2.9-2.1Q7.8 6 9 6ZM38 6v4.05h4.05v3H38v4.05h-3v-4.05h-4.05v-3H35V6ZM12 33.9h24l-7.2-9.6-6.35 8.35-4.7-6.2ZM9 9v30V9Z"/>
                        </svg>
                    </a>
                    <p class="private__block--avatar__name">{{ auth()->user()->name }}</p>
                </div>

                <!-- Avatar update pop-up -->
                <div id="avatar_popup" class="private__block--avatar__update--popUp">
                    <div class="private__block--avatar__update--popUp__inner">
                        @if($user->avatar)
                            <div class="private__block--avatar__update--avatar__old" style="background-image: url('{{ asset('storage/app/content/user/avatars/' . $user->avatar) }}')"></div>
                        @elseif($user->google_avatar)
                            <div class="private__block--avatar__update--avatar__old" style="background-image: url('{{ $user->google_avatar }}')"></div>
                        @else
                            <div class="private__block--avatar__update--avatar__old" style="background-image: url('{{ asset('public/img/content/avatars/no_avatar.png') }}')"></div>
                        @endif


                        <form class="private__block--avatar__update--form" action="{{ route('user.updateAvatar', ['user' => auth()->user()->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form__block">
                                <!-- <label class="theme__form--label">Choose a video</label> -->
                                <input type='file' id='file' class="form__block--file__input" name='file' />
                                <div class="form__block--file__holder">
                                    <span id="inputTmpLink" class="alone">Choose image</span>
                                    <label for="file" class="form__block--file__label" role="button">
                                        <svg class="form__block--file__upload--icon" xmlns="http://www.w3.org/2000/svg" height="48" width="48" viewBox="0 0 48 48">
                                            <title>Attach file</title>
                                            <path d="M23 44q-4.55 0-7.775-3.125Q12 37.75 12 33.2V11.7q0-3.2 2.275-5.45T19.75 4q3.25 0 5.5 2.25t2.25 5.5v19.7q0 1.9-1.3 3.225Q24.9 36 23 36q-1.9 0-3.2-1.425-1.3-1.425-1.3-3.375V11.6h2v19.75q0 1.1.725 1.875Q21.95 34 23 34q1.05 0 1.775-.75.725-.75.725-1.8V11.7q0-2.4-1.675-4.05T19.75 6q-2.4 0-4.075 1.65Q14 9.3 14 11.7v21.6q0 3.65 2.65 6.175T23 42q3.75 0 6.375-2.55T32 33.2V11.6h2v21.55q0 4.55-3.225 7.7Q27.55 44 23 44Z"/>
                                        </svg>
                                        
                                    </label> 
                                    <div id="upload_video" class="form__block--file__upload">
                                        <svg class="form__block--file__upload--icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                            <title>Upload file</title>
                                            <path d="M144 480C64.5 480 0 415.5 0 336c0-62.8 40.2-116.2 96.2-135.9c-.1-2.7-.2-5.4-.2-8.1c0-88.4 71.6-160 160-160c59.3 0 111 32.2 138.7 80.2C409.9 102 428.3 96 448 96c53 0 96 43 96 96c0 12.2-2.3 23.8-6.4 34.6C596 238.4 640 290.1 640 352c0 70.7-57.3 128-128 128H144zm79-217c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l39-39V392c0 13.3 10.7 24 24 24s24-10.7 24-24V257.9l39 39c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-80-80c-9.4-9.4-24.6-9.4-33.9 0l-80 80z"/>
                                        </svg>
                                    </div>
                                </div>
                        
                    
                                <div class="form__block--progress__bar" id='form__block--progress__bar'>
                                    <div class="form__block--progress_line" id="form__block--progress_line" style="width:0%;"></div>
                                    <p class="form__block--percentage" id="form__block--percentage">50%</p>
                                </div>
                            </div>

                            <button type="submit" class="private__block--avatar__update--form__button">Change avatar</button>
                        </form>
                    </div>
                </div>
                
                <!-- / Avatar update pop-up -->

                <div class="private__block--main">
                    <form action="{{ route('user.update', ['user' => auth()->user()->id]) }}" method="post" class="private__block--main__form">
                        @csrf
                        @method('patch')

                        @error('name')
                        <div class="">{{ $message }}</div>
                        @enderror
                        <label for="" class="private__block--main__form--label">
                            <p class="private__block--main__form--p">Name</p>
                            <input  type="text" 
                                    class="private__block--main__form--input" 
                                    name="name" 
                                    value="{{ old('name') ? old('name') : $user->name }}">
                        </label>

                        @error('nickname')
                        <div class="">{{ $message }}</div>
                        @enderror
                        <label for="nickname" class="private__block--main__form--label">
                            <p class="private__block--main__form--p">Nickname</p>
                            <input  type="text" 
                                    class="private__block--main__form--input" 
                                    name="nickname" 
                                    value="{{ old('nickname') ? old('nickname') : $user->nickname }}">
                        </label>

                        @error('name')
                        <div class="">{{ $description }}</div>
                        @enderror
                        <label for="description" class="private__block--main__form--label">
                            <p class="private__block--main__form--p">Tell us about yourself</p>
                            <textarea class="private__block--main__form--textarea" id="description" name="description">{{ old('description') ? old('description') : $user->description }}</textarea>
                        </label>
                        <button type="submit" class="private__block--button__save" value="Save changes">Save changes</button>
                    </form>
                    
                </div>
            </div>
            <div class="private-information__change" style="width:40%">
            @if(session('message'))
            <div class="private-notification">
                <div class="alert__danger--static" style="margin-bottom: 0px!important;">{{ session('message') }}</div>
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            </div>
            @endif
                <div class="email-change">
                    <h1 class="private__block--avatar__name">Email Change</h1>
                    <div class="main-content">
                        <p class="video__chat--message__text"> Your email address is {{auth()->user()->email}}</p>
                        <button class="private__block--button__save" id="email-change">change</button>
                    </div>
                </div>
                
                <div class="password-change">
                    <h1 class="private__block--avatar__name">Password Change</h1>
                    @if (session('error'))
                        <div class="alert__danger--static">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert__danger--static">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form id="updatePassword" action="{{ route('user.updatePassword', ['user' => auth()->user()->id]) }}" method="post">
                        @csrf
                        <div class="main-content">
                            <div class="main-content__form">
                                <div class="main-content__form--new__password">
                                    <p class="private__block--main__form--p">New Pasword</p>
                                    @error('newPassword')
                                        <div class="alert__danger--static">{{$message}}</div>
                                    @enderror
                                    <input class="private__block--main__form--input" type="password" name="newPassword">
                                </div>
                                <div class="main-content__form--current__password">
                                    <p class="private__block--main__form--p">Current Pasword</p>
                                    @error('currentPassword')
                                        <div class="alert__danger--static">{{$message}}</div>
                                    @enderror
                                    <input class="private__block--main__form--input" type="password" name="currentPassword">
                                </div>
                            </div>
                            <div class="main-content__forgot--password">
                                <p class="video__chat--message__text">Can't remember your current password</p>
                                <a href="/password/forget" class="video__chat--message__text" style="text-decoration:none; color:white!important">Forgot password?</a>
                            </div>
                            <div class="form-btn">
                                <button type="submit" class="private__block--button__save" style="margin-top:10px">Save Password</button>
                            </div>
                        </div>
                    </form> 
                </div>
                
                <div class="delete-account" style="display:none;">
                    <h1 class="private__block--avatar__name">Delete Account</h1>
                    <form id="delete-account-form" action="{{ route('user.deleteaccount', ['user' => auth()->user()->id]) }}" method="post">
                        @csrf
                        <div class="main-content">
                            <p class="video__chat--message__text">Would like to delete your account?</p>
                            <p class="video__chat--message__text">Deleting your account will remove all the content associate with it</p>
                        </div>
                        
                        <a id="delete_btn" class="video__chat--message__text" style="text-decoration:none; color:white!important; ">I want to delete my account</a>
                    </form>
                </div>
                <script>
                    $(document).ready(function() {
                        $("#delete_btn").click(function() {
                            if (confirm('Are you sure you want to delete your account? This action is irreversible.')) {
                                $("#delete-account-form").submit();
                            }
                        })
                    })
                </script>
            </div>
            <div class="private__block--avatar__update--popUp" id="email_popup">
                
                    <form class="private__block--avatar__update--form" action="{{ route('user.updateEmail', ['user' => auth()->user()->id]) }}" method="post" >
                        @csrf
                        <label for="newEmail" class="private__block--avatar__update--form__label">Choose your new Email</label>
                        <div style="margin-top:30px">
                            <input id="newEmail" type="email" name="newEmail" class="private__block--main__form--input" require>
                        </div>
                        
                        <button type="submit" class="private__block--avatar__update--form__button">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
