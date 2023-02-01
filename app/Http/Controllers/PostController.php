<?php

namespace App\Http\Controllers;

use App\Services\ImagesService;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $postService;
    private $imageService;

    public function __construct(PostService $postService, ImagesService $imagesService)
    {
        $this->imageService = $imagesService;
        $this->postService = $postService;
    }

    public function getPost($slug)
    {
        return view('post');
    }

    public function createView()
    {
        return view('create');
    }

    public function store(Request $request)
    {

        $post_id = $this->postService->add($request->all(['title', 'content', 'category_id']));
        $this->imageService->add($request->image->store('uploads'), $post_id);
        return redirect('/');
    }

}
