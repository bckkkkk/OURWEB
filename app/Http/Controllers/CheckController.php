<?php

namespace App\Http\Controllers;

use App\Models\Check;
use App\Models\User;
use App\Models\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

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
     * 判斷日期選擇與是否存在
     */
    public function decidedDate(Request $request)
    {
        $article = Article::find($request -> article_id);
        $blackfalse = $article -> joiners() -> wherePivot('blacklist', 'false') -> get();
        $isDate =  $article -> attend() -> wherePivot('checkdate', $request -> decided) -> exists();
        $date = $request -> decided;
        if($isDate == false)
        {
            return view('checks.show', ['article' => $article, 'blackfalse' => $blackfalse, 'date' => $date ,'isDate' => $isDate]);
        }
        else
        {
            return view('checks.showAlready', ['article' => $article, 'blackfalse' => $blackfalse, 'date' => $date,'isDate' => $isDate]);
            //return redirect() -> route('dashboard') -> with('notice',$isDate);
        }
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
            $User->attendTable()->attach([$request-> article => ['checkdate' => $request -> date, 'state' => $request -> attend[$key]]]);
            $attendance = $User -> attendance;
            $User -> attendance = $attendance + 1;
            $User -> save();
            if ($request -> attend[$key] == 'absent')
            {
                $User -> absence += 1;
                $User -> save();
            }
            
        }

        return redirect() -> route('dashboard') -> with('notice',$User -> attendance);
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
        $now = Carbon::createFromFormat('Y-m-d', $article -> start_time_event);
        $startDate = $now->clone()->startOfDay();
        $date_end = Carbon::createFromFormat('Y-m-d', $article -> end_time_event);
        //$diff = $date_end->diffInDays($now);
        $endDate = $date_end->clone()->endOfDay();
        $datePeriod =  collect(CarbonPeriod::create($startDate, $endDate)->toArray())
              ->map(function($eachCarbonDate){
                return $eachCarbonDate->format('Y-m-d');
              });

        return view('checks.decided', ['datePeriod' => $datePeriod, 'article' => $article]);
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
