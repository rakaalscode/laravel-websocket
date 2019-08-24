<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('post.index');
    } 

    public function getPosts()
    {
        $posts = Post::all();
        return $posts;
    }

    public function store(Request $request)
    {
        $post = new Post;
        $post->title    = $request->title;
        $post->body     = $request->body;   
        $post->save();

        \Ratchet\Client\connect('ws://localhost:8080')->then(function($conn) {
            $conn->send('Send');
            $conn->close();

        }, function ($e) {
            // echo "Could not connect: {$e->getMessage()}\n";
        });

        return $conn. ' Data berhasil disimpan';
    }
}
