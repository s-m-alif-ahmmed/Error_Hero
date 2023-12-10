<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Subscribe extends Model
{
    use HasFactory;

    private static $subscribe, $subscribes;

    public static function createSubscribe($request)
    {
        try {
            self::$subscribe            = new Subscribe();
            self::saveBasicInfo(new Subscribe(), $request);
            self::$subscribe->save();
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }

    public static function deleteSubscribe($id)
    {
        try {
            self::$subscribe = Subscribe::find($id);
            self::$subscribe->delete();
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }

    private static function saveBasicInfo($subscribe, $request)
    {
        self::$subscribe->user_id                 = $request->user_id;
        self::$subscribe->email                   = $request->email;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}
