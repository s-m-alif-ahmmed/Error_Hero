<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Contact extends Model
{
    use HasFactory;

    private static $contact, $contacts;

    public static function createContact($request)
    {
        try {
            self::$contact            = new Contact();
            self::saveBasicInfo(new Contact(), $request);
            self::$contact->save();
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }

    public static function updateContact($request, $id)
    {
        try {
            self::$contact = Contact::find($id);
            self::saveBasicInfo(self::$contact, $request);
            self::$contact->update();
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }

    public static function deleteContact($id)
    {
        try {
            self::$contact = Contact::find($id);
            self::$contact->delete();
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }

    private static function saveBasicInfo($contact, $request)
    {
        self::$contact->user_id                 = $request->user_id;
        self::$contact->name                    = $request->name;
        self::$contact->email                   = $request->email;
        self::$contact->message                 = $request->message;
        self::$contact->note                    = $request->note;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}
