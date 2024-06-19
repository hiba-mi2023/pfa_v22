<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'ID_utilisateur',
        'ID_note',
        'Contenu',
        'Date',
        'rating'
    ];

    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'ID_utilisateur');
    }

    public function note()
    {
        return $this->belongsTo(Note::class, 'ID_note');
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function likedByUser($userId)
    {
        return $this->likes()->where('user_id', $userId)->exists();
    }

    public function like($userId)
    {
        if (!$this->likedByUser($userId)) {
            $this->likes()->create(['user_id' => $userId]);
        }
    }

    public function unlike($userId)
    {
        $this->likes()->where('user_id', $userId)->delete();
    }

    public function likeCount()
    {
        return $this->likes()->count();
    }
}