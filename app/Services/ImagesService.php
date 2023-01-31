<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImagesService
{
    public function all(){

        return DB::table('images')->select('*')->get()->all();
    }

    public function add($filename, $user_id){
        DB::table('images')->insert([
            'image'=>$filename,
            'user_id' => $user_id
            ]
        );
    }

    public function one($id){
        $image = DB::table('images')
            ->select('*')
            ->where('posts_id', $id)
            ->first();
        return $image;
    }

    public function update($id, $image){
        $myImage = $this->one($id);
        Storage::delete($myImage->image);
        $fileName = $image->store('uploads');
        DB::table('images')
            ->where('id', $id)
            ->update(['image' => $fileName]);
    }

    public function delete($id){
        $myImage = $this->one($id);
        Storage::delete($myImage->image);
        DB::table('images')->where('id',$id)->delete();
    }
}
