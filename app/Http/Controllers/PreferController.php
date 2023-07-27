<?php

namespace App\Http\Controllers;

use App\Models\Prefer;
use App\Models\Article;
use App\Http\Controllers\ArticleController;
use Illuminate\Http\Request;

class PreferController extends Controller
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
		//auth()->user()->preferArticles()->create(Article::find($request->article_id));
		auth()->user()->preferArticles()->syncWithoutDetaching($request->article_id);
		
		return redirect() -> route('articles.index') -> with('notice',"");
    }

    /**
     * Display the specified resource.
     */
    public function show(Prefer $prefer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prefer $prefer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prefer $prefer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prefer $prefer)
    {
        //
    }
}
