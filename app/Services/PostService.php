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
        return DB::table('posts')->join('images', 'posts.id', '=','images.posts_id')->join('category', 'posts.category_id', '=', 'category.id')->select('posts.*', 'images.image', 'category.title as cat_title')->paginate(2)->get();
    }

    public function all()
    {
       return DB::table('posts')->select("*")->get()->all();
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

    public function update($id, $data)
    {
        $this->imageService->update($id, $data->image);
        DB::table('posts')->where('id',$id)->update($data);
    }

    public function delete($id)
    {
        DB::table('posts')->where('id', $id)->delete();
    }
}
