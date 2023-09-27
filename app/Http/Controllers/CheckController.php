<?php

namespace App\Http\Controllers;

use App\Models\Check;
use App\Models\User;
use App\Models\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CheckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$content = $request->validate([
        //]);
        // $article = Article::find($request->article);
        foreach($request -> user_id as $key => $value)
        {
            $User = User::findOrFail($value);
            $User->attendTable()->syncWithoutDetaching($request-> article);
        }

        return redirect() -> route('dashboard') -> with('notice',$request-> article);
    }

    /**
     * Display the specified resource.
     */
    public function show($article)
    {
        $article = Article::find($article);
        $blackfalse = $article -> joiners() -> wherePivot('blacklist', 'false') -> get();
        //return view('checks.show', ['article' => $article, 'blackfalse' => $blackfalse]);

        //取得活動的所有日期
        $daysToAdd = 1;
        $Datelist = array();
        do {
            $date = Carbon::createFromFormat('Y-m-d', $article -> start_time);
            array_push($Datelist, $date);
            $date = $date->addDay();
            $date_end = Carbon::createFromFormat('Y-m-d', $article -> end_time);
            $isless = 0;
         } while ($isless);

        return view('checks.decided', ['Datelist' => $Datelist]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Check $check)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Check $check)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Check $check)
    {
        //
    }
}
