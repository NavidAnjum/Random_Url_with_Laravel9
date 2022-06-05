<?php

namespace App\Http\Controllers;

use App\Models\RandonUrl;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;

class RandonUrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($randonUrl)
    {
        RandonUrl::where('random_url', $randonUrl)
            ->update(['updated_at' => Carbon::now()]);
         $rdms= RandonUrl::all()->where('random_url',$randonUrl);
        foreach ($rdms as $rdm){
            return Redirect::away('//'.$rdm->main_url);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $url=new RandonUrl();
        $url->main_url=$request->main_url;
        $random=Str::random(5);
        $url->random_url=$random;
        $url->save();
        return view('welcome')->with(['random'=>$random,
            'url'=>$request->main_url
            ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RandonUrl  $randonUrl
     * @return \Illuminate\Http\Response
     */
    public function show(RandonUrl $randonUrl)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RandonUrl  $randonUrl
     * @return \Illuminate\Http\Response
     */
    public function edit(RandonUrl $randonUrl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RandonUrl  $randonUrl
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RandonUrl $randonUrl)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RandonUrl  $randonUrl
     * @return \Illuminate\Http\Response
     */
    public function destroy(RandonUrl $randonUrl)
    {
        //
    }
}
