<?php

namespace App\Http\Controllers\Admin\RepeatRequests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/* Models */
use App\Models\User\RepeatRequest;

class RepeatRequestsController extends Controller
{
    public function index(){
        $total = RepeatRequest::count();
        $requestsQuery = RepeatRequest::query();
        /* Getting first 20 most popular songs */
        $requestGroups = DB::table('repeat_requests')->select('artist_name','song_name', DB::raw('count(*) as total'))
                                ->groupBy('artist_name','song_name')
                                ->orderBy('total', 'desc')
                                ->limit(20)
                                ->get()
                                ->toArray();
        /* Geo position */
        $countByState = DB::table('repeat_requests')->select('region_name', DB::raw('count(*) as total'))
                                ->groupBy('region_name')
                                ->orderBy('total', 'desc')
                                ->get()
                                ->toArray();
        $countByStateJSON = json_encode($countByState);
        //dd($countByStateJSON);
        /* For charts */
        $requestGroupsJSON = json_encode($requestGroups);
        //dd($total);
        return view('admin.repeat-requests.index', compact('requestGroups', 'requestGroupsJSON', 'total', 'countByStateJSON'));
    }
}
