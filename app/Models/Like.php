<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'commentaire_id',
    ];

    public function commentaire()
    {
        return $this->belongsTo(Commentaire::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
