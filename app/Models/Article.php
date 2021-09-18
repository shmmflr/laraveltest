<?php

namespace App\Models;

use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'content', 'status', 'userId', 'img', 'cat'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function getRouteKeyName()
    {
        return 'title';
    }

    public function getCreatedAtAttribute($value)
    {
        $v = new Verta($value);
        $v->timezone = 'Asia/Tehran';
        return $v;
    }

    public function getUpdatedAtAttribute($value)
    {
        $v = new Verta($value);
        $v->timezone = 'Asia/Tehran';
        return $v;
    }

    public static function search($txt)
    {
        $articles = Article::orderBy('id', 'DESC');
        if (sizeof($txt) > 0) {
            $articles = $articles->where($txt['list_search'], "LIKE", "%" . $txt['text_search'] . "%");
        }
        $articles = $articles->paginate(10);
        return $articles;
    }
}
