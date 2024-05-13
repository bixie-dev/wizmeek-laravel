<?php

namespace App\Http\Controllers\Admin\RepeatRequests;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RepeatRequests\StoreSongRequest;
use App\Models\Admin\RepeatRequest;

class StoreSongController extends Controller
{
    public function store(StoreSongRequest $request)
    {
        $storeData = $request->validated();

        $result = RepeatRequest::create($storeData);

        return redirect()->route('admin.channel.show', $storeData['channel_id']);
    }
}
