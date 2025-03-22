<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function League\Flysystem\move;

class Courier extends Model
{
    use HasFactory;

    private static $courier,$image,$imageName,$directory,$imgUrl,$extension;

    public static function saveCourier($request)
    {
        self::$courier = new courier();
        self::$courier->name =$request->name;
        self::$courier->image=self::getImageUrl($request);
        self::$courier->save();
    }
    public static function getImageUrl($request)
    {
        self::$image =$request->file('image');
        self::$extension = self::$image->extension();
        self::$imageName = rand().'.'.self::$extension;
        self::$directory = 'admin/image/courier/';
        self::$imgUrl    = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imgUrl;
    }
    public static function updateCourierInfo($request ,$id)
    {
        self::$courier = Courier::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$courier->image))
            {
                unlink(self::$courier->image);
            }
            self::$imgUrl=self::getImageUrl($request);
        }
        else
        {
            self::$imgUrl = self::$courier->iamge;
        }

        self::$courier->name =$request->name;
        self::$courier->image=self::$imgUrl;
        self::$courier->save();
    }
    public static function deleteCourier($id)
    {
        self::$courier = Courier::find($id);
        if (file_exists(self::$courier->image))
        {
            unlink(self::$courier->image);
        }
        self::$courier->delete();
    }

}
