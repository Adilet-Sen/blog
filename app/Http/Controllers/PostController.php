<?php

namespace App\Http\Controllers;

use App\Services\ImagesService;
use App\Services\PostService;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class PostController extends Controller
{
    private $postService;
    private $imageService;
    private $categoryService;

    public function __construct(PostService $postService, ImagesService $imagesService, CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
        $this->imageService = $imagesService;
        $this->postService = $postService;
    }

    public function getPost($slug)
    {
        return view('post', ['post' => $this->postService->getPost($slug), 'topposts'=> $this->postService->getTopPost(), 'counts' => $this->postService->getCount()]);
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

    public function category($category=null, $sub_category=null)
    {
     return view('category', [
         'posts' => $this->categoryService->getCategoryPost($category, $sub_category),
         'topposts'=> $this->postService->getTopPost(), 'counts' => $this->postService->getCount(),
         'categorys' => $this->postService->getCategory(),
         'cat' => $category
     ]);
    }

}
