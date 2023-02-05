<?php

namespace App\Services;

use App\Services\ImagesService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostService
{
    private $imageService;

    public function __construct(ImagesService $imagesService)
    {
        $this->imageService = $imagesService;
    }

    public function getAll()
    {
        return DB::table('posts')->join('images', 'posts.id', '=','images.posts_id')->join('category', 'posts.category_id', '=', 'category.id')->select('posts.*', 'images.image', 'category.title as cat_title')->simplePaginate(8);
    }

    public function all($number)
    {
        return DB::table('posts')->join('images', 'posts.id', '=','images.posts_id')->join('category', 'posts.category_id', '=', 'category.id')->select('posts.*', 'images.image', 'category.title as cat_title')->limit($number);
    }

    public function getCount()
    {
        $counts['Food'] = DB::table('posts')->where('category_id','=', 1)->count('category_id');
        $counts['Travel'] = DB::table('posts')->where('category_id','=', 2)->count('category_id');
        $counts['LifeStyle'] = DB::table('posts')->where('category_id','=', 3)->count('category_id');
        $counts['IT'] = DB::table('posts')->where('category_id','=', 4)->count('category_id');
        return $counts;
    }

    public function getCategory()
    {
        return DB::table('category')->select('title', 'category_slug')->get()->all();
    }

    public function getTopPost()
    {
        return DB::table('posts')->join('images', 'posts.id', '=','images.posts_id')->join('category', 'posts.category_id', '=', 'category.id')->select('posts.*', 'images.image', 'category.title as cat_title')->orderByDesc('view_count')->limit(3)->get();
    }

    public function getPost($slug)
    {
        $count = DB::table('posts')->select('view_count')->where('post_slug', $slug)->first()->view_count;
        DB::table('posts')->where('post_slug', $slug)->update(['view_count' => ++$count]);
        return DB::table('posts')->join('images', 'posts.id', '=','images.posts_id')->join('category', 'posts.category_id', '=', 'category.id')->select('posts.*', 'images.image', 'category.title as cat_title')->where('post_slug', $slug)->first();

    }

    public function getOne($id)
    {
        return DB::table('posts')->select("*")->where('id', $id)->first();
    }

    public function add($data)
    {
        $data['post_slug'] = Str::slug($data['title'], '_');
        $data['category_id'] = (int)($data['category_id']);
        return DB::table('posts')->insertGetId($data);
    }

    public function update($slug,$data)
    {   $id = DB::table('posts')->select('id')->where('post_slug', $slug)->first()->id;
        $data['post_slug'] = Str::slug($data['title'], '_');
        $data['category_id'] = (int)($data['category_id']);

        DB::table('posts')->where('id', $id)->update($data);
        return $id;
    }

    public function delete($id)
    {
        DB::table('posts')->where('id', $id)->delete();
        $this->imageService->delete($id);

    }
}
