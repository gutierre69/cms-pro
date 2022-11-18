<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
	use HasFactory, SoftDeletes;
	protected $dates = ['deleted_at'];

	protected $table = 'post';
    protected $fillable = ['title','slug','intro','content','type','category_id','is_featured','featured_image','meta_title','meta_keywords','meta_description','meta_og_image','meta_og_url','hits','order','status','author_id','published_at'];

	const TYPES = [
		'article' 	=> "Article",
		'news' 		=> "News",
        'page' 		=> "Page"
    ];

	const FEATURED = ["NO", "YES"];

	public function Category() {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

	public function Author() {
        return $this->belongsTo('App\Models\User', 'author_id', 'id');
    }

}
