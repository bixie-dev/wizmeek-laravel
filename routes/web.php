<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Main Routes */
Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('homepage');
Route::get('/verified', [App\Http\Controllers\HomeController::class, 'verified'])->name('verified');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/terms', [App\Http\Controllers\HomeController::class, 'terms'])->name('terms');
Route::get('/requests', 'Pages\Requests\IndexController')->name('requests');
Route::post('/requests', 'Pages\Requests\StoreController')->name('requests.store');
Route::get('/settings', [App\Http\Controllers\HomeController::class, 'settings'])->name('settings');
Route::get('/privacy-policy', [App\Http\Controllers\HomeController::class, 'privacy'])->name('privacy-policy');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/advertisement', [App\Http\Controllers\HomeController::class, 'advertisement'])->name('advertisement');

/* Test page for video player */
Route::get('/playertest', [App\Http\Controllers\Channels\ChannelsController::class, 'playertest'])->name('chan.playertest');

Route::get('/password/forget', [App\Http\Controllers\ForgotPasswordController::class, 'showForgetPasswordForm'])->name('password.request');
Route::post('/password/forget', [App\Http\Controllers\ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [App\Http\Controllers\ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [App\Http\Controllers\ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

/* Subscribe - users routes */
Route::post('/subscribe', [App\Http\Controllers\Admin\Subscribers\SubscriberController::class, 'store'])->name('subscribe');
Route::get('/{subscription}/unsubscribe', [App\Http\Controllers\Admin\Subscribers\SubscriberController::class, 'destroy'])->name('unsubscribe');


/* Channels - Users */
Route::group(['namespace' => 'ChannelsUsers', 'middleware' => 'auth', 'prefix' => 'chan'], function() {

    /* Index page with all channels available for users */
    Route::get('/', [App\Http\Controllers\Channels\ChannelsController::class, 'index'])->name('chan.index');
    /* Channel page */
    Route::get('/{channel}', [App\Http\Controllers\Channels\ChannelsController::class, 'show'])->name('chan.show');


    /* Channel favorite route for AJAX */
    Route::group(['namespace' => 'Favorites', 'prefix' => '{channel}/favorites'], function() {
        Route::post('/', [App\Http\Controllers\Channels\ChannelsController::class, 'favorites'])->name('ch.favorites.store');
    });

    /* Channel chat routes */
    Route::group(['namespace' => 'Chat', 'prefix' => '{channel}/chat'], function() {
        Route::post('/', [App\Http\Controllers\Channels\ChatController::class, 'store'])->name('ch.chat.store');
        Route::get('/', [App\Http\Controllers\Channels\ChatController::class, 'get_messages'])->name('ch.chat.messages');
    });

    /* Request Repeat */
    Route::group(['namespace' => 'RepeatRequest', 'prefix' => 'repeatrequest'], function(){
        Route::post('/', [App\Http\Controllers\User\RepeatRequestController::class, 'store'])->name('chan.repeatrequest.store');
    });
});

/* User Profile routes */
Route::get('/submit', [App\Http\Controllers\User\SubmitController::class, 'submit'])->name('user.submit.submit');
Route::post('/submit', [App\Http\Controllers\User\SubmitController::class, 'eacreq'])->name('user.submit.eacreq');
Route::post('/contactus', [App\Http\Controllers\User\ContactMessagesController::class, 'store'])->name('user.contactus.store');

Route::group(['namespace' => 'User\Followers', 'middleware' => 'auth'], function() {
    Route::get('/followers', 'FollowerController')->name('user.followers');
    Route::get('/following', 'FollowingController')->name('user.following');
});

Route::group(['namespace' => 'User\Feedback', 'middleware' => 'auth'], function() {
    Route::get('/feedback', 'IndexController')->name('user.feedback');
    Route::post('/feedback/store', 'StoreController')->name('user.feedback.store');
});

Route::group(['namespace' => 'User', 'middleware' => 'auth', 'prefix' => 'user'], function(){
    Route::get('/{user}', [App\Http\Controllers\User\UserController::class, 'profile'])->name('user.profile');
    Route::get('/{user}/edit', [App\Http\Controllers\User\UserController::class, 'edit'])->name('user.edit');
    Route::patch('/{user}', [App\Http\Controllers\User\UserController::class, 'update'])->name('user.update');
    Route::patch('/{user}/avatar', [App\Http\Controllers\User\UserController::class, 'avatarUpdate'])->name('user.updateAvatar');
    Route::post('/{user}/emailchange', [App\Http\Controllers\User\UserController::class, 'emailUpdate'])->name('user.updateEmail');
    Route::post('/{user}/passwordchange', [App\Http\Controllers\User\UserController::class, 'passwordUpdate'])->name('user.updatePassword');
    Route::post('/{user}/deleteaccount', [App\Http\Controllers\User\UserController::class, 'deleteAccount'])->name('user.deleteaccount');

    Route::post('/{user}', [App\Http\Controllers\User\UserController::class, 'follow'])->name('user.follow');
    

    Route::group(['namespace' => 'Submit', 'prefix' => 'submit'], function(){
        Route::get('/new', [App\Http\Controllers\User\SubmitController::class, 'index'])->name('user.submit.index');
        Route::post('/new', [App\Http\Controllers\User\SubmitController::class, 'store'])->name('user.submit.store');
        Route::post('/upload', [App\Http\Controllers\User\SubmitController::class, 'videoUpload'])->name('user.submit.video');
    });
});

/* Admin routes */
Route::group(['namespace' => 'Admin', 'middleware' => 'auth', 'prefix' => 'admin'], function() {
    Route::get('/panel', [App\Http\Controllers\Admin\AdminController::class, 'panel'])->name('admin.panel');

    /* Landing page texts */
    Route::group(['namespace' => 'LandingTextsAdmin', 'prefix' => 'landing'], function() {
        Route::get('/', [App\Http\Controllers\Admin\Landing\LandingController::class, 'edit'])->name('admin.landing.edit');
        Route::get('/about-edit', [App\Http\Controllers\Admin\Landing\LandingController::class, 'about'])->name('admin.landing.about');
        Route::get('/terms-edit', [App\Http\Controllers\Admin\Landing\LandingController::class, 'terms'])->name('admin.landing.terms');
        Route::get('/privacy-edit', [App\Http\Controllers\Admin\Landing\LandingController::class, 'privacy'])->name('admin.landing.privacy');
        Route::get('/submit-edit', [App\Http\Controllers\Admin\Landing\LandingController::class, 'submit'])->name('admin.landing.submit');
        Route::get('/advertisement-edit', [App\Http\Controllers\Admin\Landing\LandingController::class, 'advertisement'])->name('admin.landing.advertisement');
        Route::patch('/', [App\Http\Controllers\Admin\Landing\LandingController::class, 'update'])->name('admin.landing.update');
    });

    /* Channel group */
    Route::group(['namespace' => 'Channels-admin', 'prefix' => 'channels-admin'], function() {
        Route::get('/', [App\Http\Controllers\Admin\ChannelController::class, 'index'])->name('admin.channels.index');
        Route::get('/new-channel', [App\Http\Controllers\Admin\ChannelController::class, 'create'])->name('admin.channels.create');
        Route::post('/', [App\Http\Controllers\Admin\ChannelController::class, 'store'])->name('admin.channel.store');
        Route::get('/{channel}', [App\Http\Controllers\Admin\ChannelController::class, 'show'])->name('admin.channel.show');
        Route::get('/{channel}/edit', [App\Http\Controllers\Admin\ChannelController::class, 'edit'])->name('admin.channel.edit');
        Route::patch('/{channel}', [App\Http\Controllers\Admin\ChannelController::class, 'update'])->name('admin.channel.update');
        Route::delete('/{channel}', [App\Http\Controllers\Admin\ChannelController::class, 'destroy'])->name('admin.channel.destroy');
    });

    /* Feedback Routes */
    Route::group(['namespace' => 'Feedback', 'prefix' => 'feedback'], function () {
        Route::get('/rating', 'RateController')->name('admin.feedback.rate');
        Route::get('/ideas', 'IdeaController')->name('admin.feedback.idea');
        Route::get('/questions', 'QuestionController')->name('admin.feedback.questions');
        Route::get('/problems', 'ProblemController')->name('admin.feedback.problems');
    });

    /* Submits group */
    Route::group(['namespace' => 'Submits', 'prefix' => 'submits'], function() {
        Route::get('/', [App\Http\Controllers\Admin\Submits\SubmitsController::class, 'index'])->name('admin.submits.index');
        Route::get('/{submit}', [App\Http\Controllers\Admin\Submits\SubmitsController::class, 'show'])->name('admin.submits.show');
        Route::delete('/{submit}', [App\Http\Controllers\Admin\Submits\SubmitsController::class, 'destroy'])->name('admin.submits.destroy');
    });

    /* Submits/Genres group */
    Route::group(['namespace' => 'Genres', 'prefix' => 'genres'], function() {
            Route::get('/', [App\Http\Controllers\Admin\Submits\GenreController::class, 'index'])->name('admin.genres.index');
            Route::get('/new-genre', [App\Http\Controllers\Admin\Submits\GenreController::class, 'create'])->name('admin.genres.create');
            Route::post('/', [App\Http\Controllers\Admin\Submits\GenreController::class, 'store'])->name('admin.genres.store');
            Route::get('/{genre}', [App\Http\Controllers\Admin\Submits\GenreController::class, 'show'])->name('admin.genres.show');
            Route::get('/{genre}/edit', [App\Http\Controllers\Admin\Submits\GenreController::class, 'edit'])->name('admin.genres.edit');
            Route::patch('/{genre}', [App\Http\Controllers\Admin\Submits\GenreController::class, 'update'])->name('admin.genres.update');
            Route::delete('/{genre}', [App\Http\Controllers\Admin\Submits\GenreController::class, 'destroy'])->name('admin.genres.destroy');
    });

    /* Admin - Contact us messages routes */
    Route::group(['namespace' => 'AdminContactMessages', 'prefix' => 'contact-us'], function() {
        Route::get('/', [App\Http\Controllers\Admin\Messages\ContactUsMessagesController::class, 'index'])->name('admin.contactus.index');
        Route::get('/{message}', [App\Http\Controllers\Admin\Messages\ContactUsMessagesController::class, 'show'])->name('admin.contactus.show');
        Route::delete('delete-message-chat', [App\Http\Controllers\Admin\Messages\DeleteCahtMessageController::class, '__invoke'])->name('admin.chatmessages.delete');
    });

    /* Admin - User administration routes */
    Route::group(['namespace' => 'AdminUsers', 'prefix' => 'users'], function() {
        Route::get('/', [App\Http\Controllers\Admin\Users\AdminUserController::class, 'index'])->name('admin.users.index');
        Route::get('/new-user', [App\Http\Controllers\Admin\Users\AdminUserController::class, 'create'])->name('admin.users.create');
        Route::post('/', [App\Http\Controllers\Admin\Users\AdminUserController::class, 'store'])->name('admin.users.store');
        Route::get('/{user}', [App\Http\Controllers\Admin\Users\AdminUserController::class, 'show'])->name('admin.users.show');
        Route::get('/{user}/edit', [App\Http\Controllers\Admin\Users\AdminUserController::class, 'edit'])->name('admin.users.edit');
        Route::patch('/{user}', [App\Http\Controllers\Admin\Users\AdminUserController::class, 'update'])->name('admin.users.update');
        Route::delete('/{user}', [App\Http\Controllers\Admin\Users\AdminUserController::class, 'destroy'])->name('admin.users.destroy');
    });

    /* Admin - Subscriptions */
    Route::group(['namespace' => 'AdminSubscriptions', 'prefix' => 'subscriptions'], function() {
        Route::get('/', [App\Http\Controllers\Admin\Subscribers\SubscriberController::class, 'index'])->name('admin.subscriptions.index');
    });

    /* Admin - Early access codes routes */
    Route::group(['namespace' => 'AdminEAC', 'prefix' => 'eac'], function() {
        Route::get('/', [App\Http\Controllers\Admin\EAC\EacController::class, 'index'])->name('admin.eac.index');
        Route::get('/generate', [App\Http\Controllers\Admin\EAC\EacController::class, 'create'])->name('admin.eac.create');
        Route::post('/', [App\Http\Controllers\Admin\EAC\EacController::class, 'store'])->name('admin.eac.store');
        Route::get('/{eac}', [App\Http\Controllers\Admin\EAC\EacController::class, 'show'])->name('admin.eac.show');
        Route::get('/{eac}/delete', [App\Http\Controllers\Admin\EAC\EacController::class, 'delete'])->name('admin.eac.delete');
        Route::delete('/{eac}', [App\Http\Controllers\Admin\EAC\EacController::class, 'destroy'])->name('admin.eac.destroy');
    });

    /* Admin - Early access requests routes */
    Route::group(['namespace' => 'AdminEACRequest', 'prefix' => 'eac-requests'], function() {
        Route::get('/', [App\Http\Controllers\Admin\EAC\RequestEacController::class, 'index'])->name('admin.eacreq.index');
        Route::get('/{eacrequest}', [App\Http\Controllers\Admin\EAC\RequestEacController::class, 'show'])->name('admin.eacreq.show');
        Route::post('/{eacrequest}', [App\Http\Controllers\Admin\EAC\RequestEacController::class, 'process'])->name('admin.eacreq.process');
    });

    /* Admin - Repeat Requests routes */
    Route::group(['namespace' => 'AdminRepeatRequests', 'prefix' => 'repeatrequests'], function(){
        Route::get('/', [App\Http\Controllers\Admin\RepeatRequests\RepeatRequestsController::class, 'index'])->name('admin.repeatrequests.index');
        Route::get('/create', [App\Http\Controllers\Admin\RepeatRequests\CreateSongController::class, 'create'])->name('admin.repeatrequests.create');
        Route::post('/store', [App\Http\Controllers\Admin\RepeatRequests\StoreSongController::class, 'store'])->name('admin.repeatrequests.store');
    });
});
/* Email verification routes */
    // Notice page
    Route::get('/email/verify', function () {
        return view('auth.verify');
    })->middleware('auth')->name('verification.notice');

    //Verification handler
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
     
        return redirect()->route('verified');
    })->middleware(['auth', 'signed'])->name('verification.verify');

    //Resending the verification email
    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
     
        return back()->with('message', 'Verification link sent!');
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

/* End of Email verification routes */


Route::group(['middleware' => 'auth'], function(){
    Route::resource('channels', 'Admin\ChannelController');
});

Route::get('auth/google', [App\Http\Controllers\SocialController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/callback', [App\Http\Controllers\SocialController::class, 'callbackGoogle']);


Route::name('user.')->group(function(){
    //Route::get('/', 'HomeController@home')->name('main');
    Route::get('/private', 'HomeController@private')->middleware('auth')->name('private');

    Route::get('/login', 'HomeController@login')->name('login');
    Route::post('/login', [App\Http\Controllers\Login\RegisterController::class, 'login']);

    Route::get('/logout', [App\Http\Controllers\Login\RegisterController::class, 'logout'])->name('logout');

    Route::post('/eacsignup', [App\Http\Controllers\HomeController::class, 'eacsignup'])->name('eacsignup');
    Route::get('/signup', 'HomeController@signup')->name('signup');
    Route::post('/signup/store', [App\Http\Controllers\Login\RegisterController::class, 'newUser'])->name('create');
});








Route::get('/csstest', 'HomeController@csstest');


Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('route:cache');
    $exitCode = Artisan::call('optimize:clear');
    return 'Cache has been cleareddd';
});

Route::get('/migrate', function(){
    $exitCode = Artisan::call('migrate');
    dd('Migrate complited!');
});
/* Route::get('/migrate-fresh', function(){
    $exitCode = Artisan::call('migrate:fresh');
    dd('Migrate Fresh complited!');
}); */
Route::get('/rollback', function(){
    $exitCode = Artisan::call('migrate:rollback');
    dd('Rollback completed!');
});


Route::get('/storage-symlink', function () {
    $target = '/storage/app/public';
    $shortcut = '/public/storage';
    symlink($target, $shortcut);
    return 'Symbolic link has been created'; 
});

//Auth::routes();
