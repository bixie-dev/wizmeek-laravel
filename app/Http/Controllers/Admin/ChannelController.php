<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Admin\Channel;
use App\Http\Requests\Admin\Channels\StoreRequest;
use App\Http\Requests\Admin\Channels\UpdateRequest;
use Illuminate\Support\Str;
use App\Http\Requests\Admin\Chat\FilterRequest;
use Illuminate\Pagination\LengthAwarePaginator;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role == 'admin'){
            $channels = Channel::all();
            return view('admin.channels.index', compact('channels'));
        } else {
            return redirect(route('homepage'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->role == 'admin'){
            return view('admin.channels.create');
        } else {
            return redirect(route('homepage'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        if(auth()->user()->role == 'admin'){
            $data = $request->validated();

            if($request->hasFile('logo')){
                $logo = $request->file('logo');
                $logoPath = $logo->store('channels/logos');
            }
            if($request->hasfile('poster')){
                $poster = $request->file('poster');
                $posterPath = $poster->store('channels/posters');
            }
    
            $data['logo'] = $logoPath;
            $data['poster'] = $posterPath;
            $data['slug'] = Str::slug($data['name']);
            $cahnnel = Channel::create($data);
            // dd($cahnnel);
            return redirect()->route('admin.channels.index');
        } else {
            return redirect(route('homepage'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Channelbase  $channelbase
     * @return \Illuminate\Http\Response
     */
    private $messageFilterData;
    public function show(Channel $channel, FilterRequest $filterRequest)
    {
        $this->messageFilterData = $filterRequest;

        if(auth()->user()->role == 'admin'){
            $songList = $channel->repeat_requests;
            $chatMessages = $this->getChatMessages($channel);
            // dd($chatMessages);
            return view('admin.channels.show', compact('channel', 'songList', 'chatMessages'));
        } else {
            return redirect(route('homepage'));
        }
    }

    private function getChatMessages($channel)
    {
        $messages = $channel->chatMessages()
            ->where('message', 'like', '%' . $this->messageFilterData['chat_message'] . '%')
            ->orderBy('created_at', 'DESC')
            ->get();

        $responseArray = [];
        if (count($messages)) {
            foreach ($messages as $message) {
                $responseArray[] = [
                    'message_id' => $message->id,
                    'user_id' => $message->user ? $message->user->id : 'User was deleted',
                    'user_name' => $message->user ? $message->user->name : 'User was deleted',
                    'message' => $message->message,
                    'date' => date('M d Y, H:i', strtotime($message->created_at)),
                ];
            }
        }

        // Create a LengthAwarePaginator instance from the response array
        $perPage = 10; // Number of items per page
        $currentPage = request()->get('page', 1); // Get the current page from the request

        $paginatedResponse = new LengthAwarePaginator(
            array_slice($responseArray, ($currentPage - 1) * $perPage, $perPage),
            count($responseArray),
            $perPage,
            $currentPage
        );
        $paginatedResponse->setPath(route('admin.channel.show', ['channel' => $channel->id]));

        return $paginatedResponse;
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Channelbase  $channelbase
     * @return \Illuminate\Http\Response
     */
    public function edit(Channel $channel)
    {
        if(auth()->user()->role == 'admin'){
            return view('admin.channels.edit', ['channel' => $channel]);
        } else {
            return redirect(route('homepage'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Channelbase  $channelbase
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Channel $channel)
    {
        if(auth()->user()->role == 'admin'){
            $data = $request->validated();

            if($request->hasFile('logo')){
                if($prevLogoPath = asset('public/storage/' . $channel['logo'])){
                    $prevLogoPath = $channel['logo'];
                    Storage::delete($prevLogoPath);
                }
    
                $logo = $request->file('logo');
                $logoPath = $logo->store('channels/logos');
    
                $data['logo'] = $logoPath;
            }
            if($request->hasfile('poster')){
                if($prevPosterPath = asset('public/storage/' . $channel['poster'])){
                    $prevPosterPath = $channel['poster'];
                    Storage::delete($prevPosterPath);
                }
    
                $poster = $request->file('poster');
                $posterPath = $poster->store('channels/posters');
    
                $data['poster'] = $posterPath;
            }
            $data['slug'] = Str::slug($data['name']);
            // dd($data);
            $channel->update($data);
            return redirect(route('admin.channels.index'));
        } else {
            return redirect(route('homepage'));
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Channelbase  $channelbase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Channel $channel)
    {
        if(auth()->user()->role == 'admin'){
            if($prevLogoPath = asset('public/storage/' . $channel['logo'])){
                $prevLogoPath = $channel['logo'];
                Storage::delete($prevLogoPath);
                
            }
            
            if($prevPosterPath = asset('public/storage/' . $channel['poster'])){
                $prevPosterPath = $channel['poster'];
                Storage::delete($prevPosterPath);
            }
            
    
            $channel->delete();
            return redirect(route('admin.channels.index'));
        } else {
            return redirect(route('homepage'));
        }
    }
}
