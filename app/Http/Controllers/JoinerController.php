<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Joiner;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\DB;

class JoinerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * 點名表獲取
     */
    public function gainCheck(Request $request)
    {
        $article = Article::find($request -> article_id);
        $article -> send_already = 1;
        $article -> save();
        return redirect() -> route('dashboard') -> with('notice','');
    }

    /**
     * blacklist check
     */
    public function blackcheck(Request $request)
    {
        
        $article = Article::find($request -> article_id);
        foreach($request -> user_id as $key => $value)
        {
            //$User = $article -> joiners -> find($value);
            $article -> joiners() -> syncWithoutDetaching([$value => ['blacklist' => $request -> blacklist[$key]]]);
        }

        $already = $article -> joiners() -> wherePivot('blacklist', 'false') -> get() -> count();
        if(($article -> maximum) < $already && ($article -> maximum) != NULL)
        {
            return redirect() -> route('joiners.show', $article -> id) -> with('alert', '人數已超過上限！');
        }
        else
            return redirect() -> route('joiners.show', $article -> id) -> with('notice', '修改成功！');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $article = Article::find($request -> article_id);
        $already = auth() -> user() -> joinArticles -> find($article);
        if($already)
            //return redirect() -> route('dashboard') -> with('notice',"已經！");
            return view('joiners.edit', ['article' => $already]);
        else    
            return view('joiners.create', ['article' => $article]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $content = $request->validate([
            'note' => 'max:255',
            'phone' => 'required|numeric:10',
            'birthday' => 'required',
            'ID_number' => 'required|min:10|max:10',
        ]);

        auth()->user()->joinArticles()->syncWithoutDetaching([$request->article_id => $content]);

        return redirect() -> route('dashboard') -> with('notice',"報名完成！");
    }

    /**
     * Display the specified resource.
     */
    public function show($article)
    {
        $article = Article::find($article);
        $blackfalse = $article -> joiners() -> wherePivot('blacklist', 'false') -> get();
        $notsure = $article -> joiners() -> wherePivot('blacklist', 'notsure') -> get();
        $blacktrue = $article -> joiners() -> wherePivot('blacklist', 'true') -> get();
        return view('joiners.show', ['article' => $article, 'notsure' => $notsure, 'blackfalse' => $blackfalse, 'blacktrue' => $blacktrue]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($article)
    {
        $article = auth() -> user() -> joinArticles -> find($article);
        return view('joiners.edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $article)
    {
        $article = auth() -> user() -> joinArticles -> find($article); 
        $content = $request->validate([
            'note' => 'max:255',
            'phone' => ' ',
            'birthday' => ' ',
            'ID_number' => ' ',
        ]);
        $article -> update($content);
        auth()->user()->joinArticles()->syncWithoutDetaching([$article -> id => $content]);
        return redirect() -> intended(RouteServiceProvider::HOME) -> with('notice', "資料新增成功");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($article)
    {
        //$article = auth() -> user() -> joinArticles -> find($article);
        auth()->user()->joinArticles()->detach($article);
        return redirect() -> intended(RouteServiceProvider::HOME) -> with('notice', "已取消報名！");
    }
    
}
