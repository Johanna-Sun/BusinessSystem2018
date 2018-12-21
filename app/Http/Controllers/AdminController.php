<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function resources() {
        $userId = Auth::id();
        if ($userId != 666) {
            return redirect('/home');
        }

        $resources = DB::table('resources')->get();
        return view('admin.resources')->with('resources',$resources);
    }

    public function changeResourcesStatus(Request $request) {
        $userId = Auth::id();
        if ($userId != 666) {
            return redirect('/home');
        }

        $currentResource = DB::table('resources')->where('id','=',$request->resourceId)->first();

        if ($request->resourceId == -1) {
            DB::table('resources')->increment('year',1);
        }

        if ($request->resourceId == -2) {
            DB::table('resources')->update(['announcement',$request->announcement]);
        }

        if ($request->confirm === 'true') {
            DB::table('resources')->where('id','=',$request->resourceId)->update(['price'=> $request->price]);
            //更新卖家买家的资产状态
        }

        return redirect('admin/35/resources');
    }

    public function maps() {
        $userId = Auth::id();
        if ($userId != 666) {
            return redirect('/home');
        }

        $maps = DB::table('maps')->get();
        return view('admin.maps')->with('maps',$maps);
    }

    public function changeMapStatus(Request $request) {

        $userId = Auth::id();
        if ($userId != 666) {
            return redirect('/home');
        }


        $currentMap = DB::table('maps')->where('id','=',$request->mapId)->first();



        if ($request->confirm === 'true') {
            DB::table('maps')->where('id','=',$request->mapId)->update(['owner_name'=> $request->owner_name]);
            //更新卖家买家的资产状态
        }

        return redirect('admin/35/maps');
    }

}