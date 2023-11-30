<?php

namespace App\Http\Controllers;

use App\Models\Article;
use \Conner\Tagging\Model\Tag;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * 設定哪項功能不需登錄即可查看
     */
    public function __construct(){
        $this->middleware('auth')->except(methods:['index', 'show', 'tagspage', 'showalltags']);
    }

    /**
     * show article with that tag
     */
    public function tagspage(Tag $tag)
    {
        $alltags = \Conner\Tagging\Model\Tag::orderBy('count', 'desc') -> get();
        $passtaged = $tag -> slug ;
        $articles = Article::withAnyTag([$passtaged]) ->get();
        $ifall = 0;   
        return view('articles.tags', ['alltags' => $alltags, 'articles' => $articles, 'passtaged' => $passtaged, 'ifall' => $ifall]);
    }

    /**
     * show all tags
     */
    public function showalltags()
    {
        $alltags = \Conner\Tagging\Model\Tag::orderBy('count', 'desc') -> get();
        $passtaged = "1";
        $articles = Article::with('user')->orderBy('start_time', 'desc')->paginate(10);
        $ifall = 1;  
        return view('articles.tags', ['alltags' => $alltags, 'articles' => $articles, 'passtaged' => $passtaged, 'ifall' => $ifall]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with('user')->orderBy('start_time', 'desc')->paginate(10);
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
            'maximum' => '',
            'title' => 'required',
            'content' => 'required|min:50',
			'summary' => 'required|min:10',
            'image' => '',
            'start_time' => 'required',
            'end_time' => 'required',
            'start_time_event' => 'required',
            'end_time_event' => 'required',
            'tags' => ''
        ]);
        
        $article = auth() -> user() -> articles() -> create($content);

        if($request -> tags != NULL)
        {
            $input = $request;
            $tags = explode("#", $input['tags']); // break the string into a tags array
            $article->tag($tags); // tags array data to db
        }


		if ($request->hasFile('image')) {
           // 圖片存入
          $path = $request->file('image')->storeAs('images/article_'.$article->id, $request->file('image')->getClientOriginalName(), 'public');
          $article->image = $path;  
       }
       $article -> update();
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
        $articletag = $article->tagNames();
        $articletag = implode('#', $articletag);
        $articletag = '#'.$articletag;
        $article = auth() -> user() -> articles -> find($article);
        return view('articles.edit', ['article' => $article, 'articletag' => $articletag]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $article = auth() -> user() -> articles -> find($article); 
        $content = $request->validate([
            'maximum' => '',
            'title' => 'required',
            'content' => 'required|min:50',
			'summary' => 'required|min:10',
			'image' => '',
            'start_time' => 'required',
            'end_time' => 'required',
            'start_time_event' => 'required',
            'end_time_event' => 'required'
        ]);

		if ($request->hasFile('image')) {
			 // 如果要更新的文章本身原本有圖片，要先刪掉
			 if ($article->image) {
				 Storage::disk('public')->delete($article->image);
			 }
			// 圖片存入
		   $path = $request->file('image')->storeAs('images/article_'.$article->id, $request->file('image')->getClientOriginalName(), 'public');
		   $article->image = $path;  
		}
        $article -> update($content);

        if($request -> tags != NULL)
        {
            $input = $request;
            $tags = explode(",", $input['tags']); // break the string into a tags array
            $article->retag($tags); // tags array data to db
        }

        return redirect() -> intended(RouteServiceProvider::HOME) -> with('notice', "文章修改成功！");
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
