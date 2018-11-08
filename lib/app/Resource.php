<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable = [
        'resources_title',
        'resources_description',
        'resources_path',
        'resources_thumb',
        'resources_type',
        'resources_lang_code',
        'IsDelete',
    ];
}
