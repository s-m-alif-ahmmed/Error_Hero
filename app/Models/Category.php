<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Category extends Model
{
    use HasFactory;

    private static $category, $categories;

    public static function createCategory($request)
    {
        try {
            self::$category       = new Category();
            self::saveBasicInfo(self::$category, $request);
            self::$category->save();
        } catch (ModelNotFoundException $e) {
            abort(404);
        }

    }

    public static function updateCategory($request, $id)
    {
        try {
            self::$category = Category::find($id);
            self::saveBasicInfo(self::$category, $request);
            self::$category->save();
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }

    public static function deleteCategory($id)
    {
        try {
            self::$category = Category::find($id);
            self::$category->delete();
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }

    private static function saveBasicInfo($category, $request)
    {
        self::$category->meta_description       = $request->meta_description;
        self::$category->meta_keyword           = $request->meta_keyword;
        self::$category->name                   = $request->name;
    }

    public function blogs()
    {
        return $this->belongsToMany(Blog::class);
    }

    public function blogCategories()
    {
        return $this->belongsToMany(Blog::class);
    }


}
