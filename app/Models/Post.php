<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn ($query, $search) =>
        $query
            ->where('title', 'like', '%' . $search . '%')
            ->orwhere('body', 'like', '%' . $search . '%'));

        $query->when(
            $filters['category'] ?? false,
            fn ($query, $category) =>
            $query->whereHas('category', fn ($query) =>
            $query->where('slug', $category))
            // $query
            //     ->whereExists(fn ($query) =>
            //     $query->from('categories')
            //         ->whereColumn('category_id', 'posts.category_id')
            //         ->where('categories.slug', $category))
        );


        // $query->when($filter['search'] ?? false, function ($query, $search) {
        //     $query->where('title', 'like', '%' . $search . '%')
        //         ->orwhere('body', 'like', '%' . $search . '%');
        // });


        // if ($filters['search'] ?? false) {
        //     $query->where('title', 'like', '%' . request('search') . '%')
        //         ->orwhere('body', 'like', '%' . request('search') . '%');
        // }
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}