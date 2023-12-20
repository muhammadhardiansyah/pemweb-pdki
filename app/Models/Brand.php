<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Brand extends Model
{
    use HasFactory, HasUuids;

    protected $with = ['applicant', 'brandClass'];

    protected $fillable = [
        'name',
        'user_id',
        'brandClass_id',
        'address',
        'owner',
        'logos',
        'certificate',
        'signature',
    ];

    public function scopeFilter($query, array $filters)
    {
        // if (isset($filters['search_post']) ? $filters['search_post'] : false) {
        //     $query->where('title', 'like', '%' . $filters['search_post'] . '%')
        //         ->orWhere('body', 'like', '%' . $filters['search_post'] . '%');
        // }
        $query->when($filters['search_post'] ?? false, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('owner', 'like', '%' . $search . '%');
        });

        // $query->when($filters['category'] ?? false, function ($query, $category) {
        //     return $query->whereHas('category', function ($query) use ($category) {
        //         $query->where('slug', $category);
        //     });
        // });
        // $query->when($filters['author'] ?? false, function($query, $category){
        //     return $query->whereHas('category', function($query) use ($category){
        //         $query->where('slug', $category);
        //     });
        // });

        // $query->when($filters['author'] ?? false, function ($query, $author) {
        //     return $query->whereHas('author', function ($query) use ($author) {
        //         $query->where('username', $author);
        //     });
        // });
    }

    public function applicant()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function brandClass()
    {
        return $this->belongsTo(BrandClass::class, 'brandClass_id');
    }

}
