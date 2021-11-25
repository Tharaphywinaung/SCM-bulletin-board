<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $dates = ['deleted_at','created_at','updated_at'];
    protected $table = 'posts';

    protected $fillable = [
        'title',
        'description',
        'status',
        'create_user_id',
        'updated_user_id',
    ];

    public function user_id()
    {
      return $this->belongsTo(User::class, 'create_user_id');
    }
    
}
