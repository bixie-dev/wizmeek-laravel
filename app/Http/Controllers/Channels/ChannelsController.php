<?php

namespace App\Http\Controllers\Channels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Channel;
use App\Models\User\ChatMessage;
use App\Models\User\ChannelUserLike;
use App\Models\OnlineUser;
use App\Models\User;

class ChannelsController extends Controller
{
    /* Returns all the channels fron DB */
    public function index() {
        $channels = Channel::all();
        return view('main.channels.channels', compact('channels'));
    }

    /* Channel page */
    public function show($channel, ChatMessage $message) {

        $channel_id = Channel::where('slug', $channel)->first()->id;
        $channel = Channel::find($channel_id);
        // dd($channel);
        /* Geo positioning - ip-api */
        $user_ip = $_SERVER['REMOTE_ADDR'];
        if($geo_data_json_encoded = file_get_contents("http://ip-api.com/json/{$user_ip}")){
            $geo_data_json_decoded = json_decode($geo_data_json_encoded);
            if($geo_data_json_decoded->status == 'success'){
                $geo_data_array = [
                    'status' => $geo_data_json_decoded->status,
                    'country' => $geo_data_json_decoded->country,
                    'countryCode' => $geo_data_json_decoded->countryCode,
                    'regionName' => $geo_data_json_decoded->regionName,
                    'region' => $geo_data_json_decoded->region,
                    'city' => $geo_data_json_decoded->city,
                ];
            } else {
                $geo_data_array = ['status' => 'fail'];
            }
        }
        $related_channels = Channel::whereNotIn('id', [$channel->id])->get();
        $chat_messages = $channel->chatMessages;
        $has_likes = count($channel->hasLikes);

        // Sving an online user
        $user_id = auth()->user()->id;

        $current_date = time();
        $date_to_find = $current_date - 3600;

        $online_check = OnlineUser::where([
            ['user_id', '=', $user_id],
            ['channel_id', '=', $channel->id],
            ['time', '>', $date_to_find],
        ])->first();
        if(!$online_check) {
            $online_user_store_data = [
                'user_id' => $user_id,
                'channel_id' => $channel->id,
                'time' => time(),
            ];
            OnlineUser::create($online_user_store_data);
        }
        

        // Getting online users
        $online_users_instance = OnlineUser::where([
            ['channel_id', '=', $channel->id],
            ['time', '>', $date_to_find],
        ])->get();
        $online_users = count($online_users_instance);


        return view('main.channels.channel', compact('channel', 'chat_messages', 'message', 'has_likes', 'geo_data_array', 'related_channels', 'online_users'));
    }

    /* Channel favorites */
    public function favorites(Channel $channel) {
        auth()->user()->favoriteChannels()->toggle($channel->id);
        
        return response()->json(['success'=>'Favorites action complete']);
    }

    public function playertest() {
        return view('main.channels.player');
    }
}
