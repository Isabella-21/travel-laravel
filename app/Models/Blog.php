<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    // A Blog belongs to a category 
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function scopeFilter($query, $filters)
    {

        if (isset($filters['query']) and $filters['query']) {
            $query
            ->where(function($query) use ($filters) {
               $query->where('title', 'LIKE', '%' . $filters['query'] . '%')
                ->orWhere('body', 'LIKE' , '%' .$filters['query'] . '%');
            });
        }
        if (isset($filters['category_id']) and $filters['category_id']) {
            $query->whereHas('category', function ($query) use ($filters) {
                $query->where('id', $filters['category_id']);
            });
        }
    }
   
    public function users(){
        return $this->belongsToMany(User::class);
    }


}