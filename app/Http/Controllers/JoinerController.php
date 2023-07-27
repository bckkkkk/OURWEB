<?php

namespace App\Http\Controllers;

use App\Models\Joiner;
use App\Models\Article;
use App\Http\Controllers\ArticleController;
use Illuminate\Http\Request;

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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $content = $request->validate([
            'note' => 'required',
            'phone' => 'required',
			'birthday' => 'required',
            'ID_number' => 'required',
        ]);
		
		auth()->user()->joinArticles()->syncWithoutDetaching([$request->article_id => $content]);
		
		return redirect() -> route('articles.index') -> with('notice',"");
    }

    /**
     * Display the specified resource.
     */
    public function show(Joiner $joiner)
    {
        //
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
