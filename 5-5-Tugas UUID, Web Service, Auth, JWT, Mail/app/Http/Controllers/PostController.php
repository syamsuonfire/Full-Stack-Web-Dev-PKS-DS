<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Post;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        return $this->middleware('auth:api')->only(['store','update','destroy']);
    }

    public function index()
    {
        $posts = Post::latest()->get();

        return response()->json([
            'success'=> true,
            'message'=> 'Data daftar post berhasil ditampilkan',
            'data'=> $posts
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestAll = $request->all();

        $validator = FacadesValidator::make( $requestAll , [
            'title' => 'required',
            'description' => 'required'
        ]);


        if($validator->fails()) {
            return response()->json( $validator->errors() ,400);
        }


        $post = Post::create([
            'title'=> $request->title,
            'description'=> $request->description,
            'user_id' => auth()->user()->id
        ]);

        event(new PostCreated($post));

        return response()->json([
            'success'=> true,
            'message'=> 'Data post berhasil ditambahkan',
            'data'=> $post
        ]);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //find post by ID
        $post = Post::findOrfail($id);

        //make response JSON
        return response()->json([
            'success' => true,
             'message' => 'Detail Data Post',
            'data'    => $post
        ], 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Post $post)
    {
        //set validation
        $validator = FacadesValidator::make($request->all(), [
            'title'   => 'required',
            'description' => 'required',
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //find post by ID
        $post = Post::findOrFail($post->id);

        if($post) {

            //update post
            $post->update([
                'title'     => $request->title,
                'description'   => $request->description
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Post Updated',
                'data'    => $post
            ], 200);

        }

        //data post not found
        return response()->json([
            'success' => false,
            'message' => 'Post Not Found',
        ], 404);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    //find post by ID
    $post = Post::findOrfail($id);

    if($post) {

        //delete post
        $post->delete();

        return response()->json([
            'success' => true,
            'message' => 'Post Deleted',
        ], 200);

    }

    //data post not found
    return response()->json([
        'success' => false,
        'message' => 'Post Not Found',
    ], 404);
    }
}
