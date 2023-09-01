<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * 設定哪項功能不需登錄即可查看
     */
    public function __construct(){
        $this->middleware('auth')->except(methods:['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with('user')->orderBy('start_time', 'desc')->paginate(1);
        return view('articles.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $content = $request->validate([
            'title' => 'required',
            'content' => 'required|min:50',
			'summary' => 'required|min:10',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        auth() -> user() -> articles() -> create($content);
        return redirect() -> intended(RouteServiceProvider::HOME) -> with('notice', "文章新增成功！");
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
		$shareButtons = \Share::page(
            'https://laravel.com/',
            "come to visist this activity tgt!"
        )
        ->facebook()
        ->twitter()
        ->linkedin()
        ->telegram()
        ->pinterest()
        ->reddit();

        $startDate = $article -> start_time;
        $endDate = $article -> end_time;
        $isdate = Carbon::now()->between($startDate,$endDate);
        return view('articles.show', ['article' => $article, 'isdate' => $isdate, 'shareButtons' => $shareButtons] );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $article = auth() -> user() -> articles -> find($article);
        return view('articles.edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $article = auth() -> user() -> articles -> find($article); 
        $content = $request->validate([
            'title' => 'required',
            'content' => 'required|min:50',
			'summary' => 'required|min:10',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);
        $article -> update($content);
        return redirect() -> intended(RouteServiceProvider::HOME) -> with('notice', "文章更新成功！");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article = auth() -> user() -> articles -> find($article);
        $article -> delete();
        return redirect() -> intended(RouteServiceProvider::HOME) -> with('notice', "文章已刪除！");
    }
}
