<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Extra extends Model
{
    use HasFactory;


    private static $extra, $extras, $image, $directory, $imageName, $imageUrl;

    public static function uploadImage($request)
    {
        try {
            if($request->hasFile('image'))
            {
                self::$image = $request->file('image');
                self::$imageName = self::$image->getClientOriginalName();
                self::$directory = "admin/images/blog/extra/";
                self::$image->move(self::$directory, self::$imageName);
                self::$imageUrl = self::$directory.self::$imageName;
                return self::$directory.self::$imageName;
            }
            return null;

        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }

    public static function createExtra($request)
    {
        try {
            self::$imageUrl = self::uploadImage($request);
            self::$extra = new Extra();
            self::saveBasicInfo(self::$extra, $request, self::$imageUrl);
            self::$extra->save();
            return self::$extra;
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }

    public static function updateExtra($request, $id)
    {
        try {
            self::$extra = Extra::find($id);
            if($request->file('image'))
            {
                if(file_exists(self::$extra->image)){
                    unlink(self::$extra->image);
                }
                self::$imageUrl = self::uploadImage($request);
            }
            else{
                self::$imageUrl = self::$extra->image;
            }
            self::saveBasicInfo(self::$extra, $request, self::$imageUrl ?? null);
            self::$extra->update();
            return self::$extra;
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }

    public static function deleteExtra($id)
    {
        try {
            self::$extra = Extra::find($id);
            if (file_exists(self::$extra->image))
            {
                unlink(self::$extra->image);
            }
            self::$extra->delete();
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }

    private static function saveBasicInfo($extra, $request, $imageUrl)
    {
        self::$extra->blog_id                = $request->blog_id;
        self::$extra->title                  = $request->title;
        self::$extra->image                  = $imageUrl;
        self::$extra->alt                    = $request->alt;
        self::$extra->code                   = $request->code;
        self::$extra->description            = $request->description;
    }

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

}
