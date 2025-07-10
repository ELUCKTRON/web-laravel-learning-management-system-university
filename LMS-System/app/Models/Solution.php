<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    /** @use HasFactory<\Database\Factories\SolutionFactory> */
    use HasFactory;

    protected $fillable = [
        'task_id',
        'user_id',
        'title',
        'content',
        'file_path',
        'grade',
    ];

    public function task() {
        return $this->belongsTo(Task::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}
