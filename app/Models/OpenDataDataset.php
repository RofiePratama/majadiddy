<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpenDataDataset extends Model
{
    //
    protected $table = 'open_data_dataset';

    protected $fillable = [
        'title',
        'description',
        'category',
        'source_agency',
        'dataset_url',
        'published_at',
    ];

    protected $hidden = [
        'created_at',
    ];
}
