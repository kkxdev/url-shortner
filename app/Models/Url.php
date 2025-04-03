<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Hashids\Hashids;

class Url extends Model
{
    use HasFactory;

    protected $fillable = ['original_url', 'short_url'];

    public static function generateShortUrl($id)
    {
        $hashids = new Hashids('your-salt', 6);
        return $hashids->encode($id);
    }
}
