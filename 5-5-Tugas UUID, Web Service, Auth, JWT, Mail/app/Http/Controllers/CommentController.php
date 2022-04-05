<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class CommentController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth:api')->except(['index','show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::latest()->get();

        return response()->json([
            'success'=> true,
            'message'=> 'Data daftar comment berhasil ditampilkan',
            'data'=> $comments
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
            'content' => 'required',
            'post_id' => 'required'
        ]);


        if($validator->fails()) {
            return response()->json( $validator->errors() ,400);
        }


        $comment = Comment::create($requestAll);

        return response()->json([
            'success'=> true,
            'message'=> 'Data comment berhasil ditambahkan',
            'data'=> $comment
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
        //find comment by ID
        $comment = Comment::findOrfail($id);

        //make response JSON
        return response()->json([
            'success' => true,
             'message' => 'Detail Data Comment',
            'data'    => $comment
        ], 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Comment $comment)
    {
        //set validation
        $validator = FacadesValidator::make($request->all(), [
            'content'   => 'required',
            'post_id' => 'required',
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //find comment by ID
        $comment = Comment::findOrFail($comment->id);

        if($comment) {

            //update comment
            $comment->update([
                'content'     => $request->content,
                'post_id'   => $request->post_id
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Comment Updated',
                'data'    => $comment
            ], 200);

        }

        //data comment not found
        return response()->json([
            'success' => false,
            'message' => 'Comment Not Found',
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
    //find comment by ID

    $comment = Comment::where('id', $id)->first();

    if(!$comment) {
    //data comment not found
    return response()->json([
        'success' => false,
        'message' => 'Comment Not Found',
    ], 404);

    }

    //delete comment
    $comment->delete();
    return response()->json([
            'success' => true,
            'message' => 'Comment Deleted',
    ], 200);
    }

}
