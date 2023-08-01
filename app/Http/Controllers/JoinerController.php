<?php

namespace App\Http\Controllers;

use App\Models\Joiner;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Providers\RouteServiceProvider;

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
            'phone' => 'required',
            'birthday' => 'required',
            'ID_number' => 'required',
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
        return view('joiners.show', ['article' => $article]);
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
    public function destroy(Joiner $joiner)
    {
        //
    }
    
}
