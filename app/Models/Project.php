<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'project_url', 'preview', 'repo_url', 'start_date', 'end_date', 'description'
    ];
}
