<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostsResource;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class PostController
 *
 * @package App\Http\Controllers
 */
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  null  $slug
     * @return PostsResource
     */
    public function index($slug=null)
    {
        $posts = Post::with('category')->get();
        if($slug){
            $posts = Post::whereHas('category',function($q) use ($slug){
                $q->where('slug',$slug);
            })->get();
        }

        return new PostsResource($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return PostResource
     */
    public function store(PostRequest $request)
    {
        $data = [
            'category_id' => $request->category,
            'user_id' => $request->user,
            'en' => [
                'title' => $request->title_en,
                'description' => $request->description_en
            ],
            'ru' => [
                'title' => $request->title_ru,
                'description' => $request->description_ru
            ],

        ];
        $post = Post::create($data);


        return new PostResource($post);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        return response(['status' => 'success'], 201);
    }
}
