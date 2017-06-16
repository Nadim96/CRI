<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\Category;
use Session;

class PostController extends Controller
{
    //12-06-2017 Lars: Alleen de coördinator kan gebruik maken van deze pagina.
    //De auth word gechecked
    public function __construct()
    {
        $this->middleware('auth:coordinator');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
            // Lars: alleen ingelogd user kunnen deze pagina zien
            $this->middleware('auth');
        }

    public function index()
    {
        // Lars haal alle categories table en stuur het door naar de view
        $posts = Posts::all();
        $categories = Category::all();

        return view('posts.index')
        ->withPosts($posts)
        ->withCategories($categories)
        ;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Lars valideerd de data en maakt het required
        $this->validate($request, array(
            'title' => 'required|max:255',
            'body' => 'required',
            'category_id' => 'required'

            ));

        // Lars sla de informatie op in de database en stuur de gebruiker terug naar de posts  index pagina
        $posts = new Posts;
        $posts->title       = $request->title;
        $posts->body        = $request->body;
        $posts->category_id  = $request->category_id;
        $posts->save();

        Session::flash('Succes' , 'New Category has succes');

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Posts::find($id);
        return view('posts.show')->withPosts($posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
