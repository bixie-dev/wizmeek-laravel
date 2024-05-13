<?php

namespace App\Http\Controllers\Admin\Subscribers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Subscriptions\Subscriber;

use App\Http\Requests\Admin\Subscribers\StoreRequest;

class SubscriberController extends Controller
{
    public function index() {
        $subscriptions = Subscriber::paginate(50);
        return view('admin.subscriptions.index', compact('subscriptions'));
    }

    public function store(StoreRequest $request) {
        $data = $request->validated();
        $subscription = Subscriber::where('email', 'like', $data['email'])->first();
        if(!$subscription){
            $subscription = Subscriber::firstOrCreate($data);
            $message = "You have been successfully subscribed for Wizmeek's news-letters and digests.";
            return view('main.subscriptions.success', compact('message', 'subscription'));
        } else {
            $message = "You are already subscribed for Wizmeek's news-letters and digests.";
            return view('main.subscriptions.error', compact('message', 'subscription'));
        }
    }

    public function destroy(Subscriber $subscription) {
        if($subscription){
            $subscription->delete();
            $message = "You have been successfully unsubscribed from Wizmeek's news-letters and digests";
            return view('main.subscriptions.unsubscribe', compact('message'));
        }
        
    }
}
