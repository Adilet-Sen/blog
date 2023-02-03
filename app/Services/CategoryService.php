<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class CategoryService
{
    public function getCategoryPost($category=null, $sub_category=null)
    {
       $id = $this->getCatId(DB::table('category')->select('*')->get(), $category);
       return DB::table('posts')->join('images', 'posts.id', '=','images.posts_id')->join('category', 'posts.category_id', '=', 'category.id')->select('posts.*', 'images.image', 'category.title as cat_title')->where('category_id', '=', $id)->simplePaginate(8);
    }

    public function getCatId($categorys, $category)
    {
        foreach ($categorys as $cat){
            if($cat->category_slug == $category){
                return $cat->id;
            }
        }
    }
}
