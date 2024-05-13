<?php

namespace App\Http\Controllers\Channels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\ChatRequest;
use App\Models\User\ChatMessage;
use App\Models\User\ContactMessage;
use App\Models\Admin\Channel;
use App\Models\User;

class ChatController extends Controller
{
    public function store(ChatRequest $request, Channel $channel) {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['channel_id'] = $channel->id;

        ChatMessage::create($data);

        $response = 'Message sent';
        return response()->json($response);
    }

    function formatRelativeTime($timestamp) {
        $currentTime = new \DateTime();
        $messageTime = new \DateTime($timestamp);
        $timeDifference = $currentTime->getTimestamp() - $messageTime->getTimestamp();
        
        // Calculate time units
        $seconds = floor($timeDifference);
        $minutes = floor($seconds / 60);
        $hours = floor($minutes / 60);
        $days = floor($hours / 24);
    
        if ($seconds < 60) {
            return 'just now';
        } elseif ($minutes < 60) {
            return $minutes . ' min ago';
        } elseif ($hours < 24) {
            return $hours . ' hr ago';
        } else {
            return $days . ' days ago';
        }
    }

    public function get_messages(Channel $channel){
        $start = ($_GET['start']) ? $_GET['start'] : 0;
        
        $messages = $channel->chatMessages()->where('id', '>', $start)->get()->toArray();
        
        if($messages){
            foreach($messages as $k => $value){
                $user = User::find($value['user_id']);
                
              	if ($user) {
                	$messages[$k]['user_name'] = $user->name;
                	if(!empty($user->avatar)){
                    		$messages[$k]['avatar'] = asset('storage/app/content/user/avatars/' . $user->avatar);
                	} else {
                    		$messages[$k]['avatar'] = asset('public/img/content/avatars/no_avatar.png');
                	}
              	}
              	
                $messages[$k]['date'] = $this->formatRelativeTime($value['created_at']);
                
            }
        }
        return response()->json($messages);
    }
}
