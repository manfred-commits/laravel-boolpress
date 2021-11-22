<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post as Post;
class PostController extends Controller
{
    public function index()
    {   
        $postList=Post::all();
        return response()->json([
            "succes"=>true,
            "data"=>$postList,
        ]);
    }
}
