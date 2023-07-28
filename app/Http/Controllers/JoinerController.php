<?php

namespace App\Http\Controllers;

use App\Models\Joiner;
use Illuminate\Http\Request;
use App\Models\Article;

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
        return view('joiners.create', ['article' => $article]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $content = $request->validate([
            'note' => '',
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
    public function edit(Joiner $joiner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Joiner $joiner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Joiner $joiner)
    {
        //
    }
    
}
