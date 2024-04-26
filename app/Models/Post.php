<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $table = "posts";
    protected $fillable = ["user_id", "personal_access_token_id", "failed_job_id"];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
