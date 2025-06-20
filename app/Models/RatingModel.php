<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingModel extends Model
{
    protected $table = 'rating'; // optional if table name matches plural of model

    protected $fillable = [
        'idBook',
        'value',
    ];

    // Relationships
    public function book()
    {
        return $this->belongsTo(Book::class, 'idBook');
    }
}
