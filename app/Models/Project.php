<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    public function technology()
    {
        return $this->belongsTo(Technology::class);
    }

    protected $fillable = [
        'name',
        'slug',
        'start_date',
        'end_date',
        'link',
        'description',
        'image',
        'image_original_name'
    ];
}
