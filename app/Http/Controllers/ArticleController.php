<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Article;
use App\Category;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    // function untuk menampilkan seluruh artikel pada web
    // flag menandakan apakah akan dishow berdasarkan category atau tidak
    public function index_home()
    {
        //
        $articles = Article::all();
        $flag = false;

        return view('home', ['articles' => $articles, 'flag' => $flag]);
    }

    // function untuk menampilkan seluruh artikel pada web (admin)
    public function index_admin()
    {
        //
        $articles = Article::all();

        return view('all_post', ['articles' => $articles]);
    }

    // function menampilkan artikel berdasarkan category
    public function show_by_category($category_type)
    {
        //
        $category = Category::where('name', $category_type)->first();
        $category_id = $category->id;
        $category_name =  $category->name;
        $articles = Article::where('category_id', $category_id)->get();
        return view('home', ['articles' => $articles, 'flag' => true,'category' => $category_name]);
    }

    // function menampilkan detail artikel
    public function getArticleDetail(Article $article)
    {   
        return view('article_detail', ['article' => $article]);
    }

    // function untuk mendapatkan user dari sebuah artikel
    public function getArticleByUser()
    {
        $user = Auth::user();
        $articles = Article::where('user_id', $user['id'])->get();
        return view('blog', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // function menampilkan view form create article
    public function create()
    {
        //
        return view('add_article');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     // function untuk menambahkan data yang telah diisi di form ke table articles
    public function store(Request $request)
    {
        //
        // validasi field-field sepatu
        $request->validate([
            'title' => 'required',
            'file' => 'required|mimes:jpg,jpeg,png', // file harus berupa image sehingga extension nya harus berupa jpg, jpeg atau png
            'description' => 'required',
        ]);

        $article = new Article;
        $user_id = Auth::user()->id;

        // kalau file ada dan sudah lolos validasi
        if ($request->file()) {
            $image = $request->file->getClientOriginalName(); // untuk mendapat nama file
            $request->file('file')->move('images', $image, 'public'); // simpan nama file di public/images
            // add sepatu ke database
            Article::create([
                'title' => $request->title,
                'category_id'=> $request->category,
                'image' => $image,
                'description' => $request->description,
                'user_id' => $user_id
            ]);
        }

        return redirect('/blog')->with('status', 'Article successfully posted');
    }

    // function delete article
    public function destroy(Article $article)
    {
        $article = $article;
        Article::where([
            ['id', $article->id]
        ])->delete();
        
        return redirect('/blog')->with('status', 'Post deleted !');
    }

    // function delete article admin
    public function destroyed_by_admin(Article $article)
    {
        $article = $article;
        Article::where([
            ['id', $article->id]
        ])->delete();
        
        return redirect('/home')->with('status', 'Post deleted !');
    }

}
