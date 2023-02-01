<?php

namespace App\Http\Controllers;


use App\Services\PostService;
use App\Services\ImagesService;

class HomeController extends Controller
{
    private $postService;
    private $imageService;

    public function __construct(PostService $postService, ImagesService $imagesService)
    {
        $this->imageService = $imagesService;
        $this->postService = $postService;
    }

    public function index()
    {
        dd($this->postService->getAll());
        return view('index', ['posts' => $this->postService->getAll()]);
    }

    public function about(){
        return view('about');
    }

    public function contact(){
        return view('contact');
    }
}
