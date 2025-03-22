<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cloud extends Model
{
    use HasFactory;
    private static $cloud,$image,$imageName,$directory,$imgUrl,$extension;

    public static function saveCloud($request)
    {
        self::$cloud = new Cloud();
        self::$cloud->name = $request->name;
        self::$cloud->image = self::getImageUrl($request);
        self::$cloud->save();
    }

    public static function getImageUrl($request)
    {
        self::$image =$request->file('image');
        self::$extension = self::$image->extension();
        self::$imageName = rand().'.'.self::$extension;
        self::$directory = 'admin/image/cloud/';
        self::$imgUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imgUrl;
    }

}
