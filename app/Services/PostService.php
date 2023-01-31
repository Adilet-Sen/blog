<?php

namespace App\Service;

use App\Services\ImagesService;
use Illuminate\Support\Facades\DB;

class PostService
{
    private $imageService;

    public function __construct(ImagesService $imagesService)
    {
        $this->imageService = $imagesService;
    }

    public function all()
    {
       return DB::table('posts')->select("*")->get()->all();
    }

    public function getOne($id)
    {
        return DB::table('posts')->select("*")->where('id', $id)->first();
    }

    public function add($data, $id)
    {
       return DB::table('posts')->where('id', $id)->insertGetId($data);
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
