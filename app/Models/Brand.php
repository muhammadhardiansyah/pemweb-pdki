<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Brand extends Model
{
    use HasFactory, HasUuids;

    protected $with = ['applicant'];

    protected $fillable = [
        'name',
        'user_id',
        'address',
        'owner',
        'logos',
        'certificate',
        'signature',
    ];

    public function applicant()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
