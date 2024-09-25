<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;
    protected $fillable = ['book_id', 'user_id','rented_at','due_at', 'amount','is_returned'];

    public function user()
{
    return $this->belongsTo(User::class);
}

public function book()
{
    return $this->belongsTo(Book::class);
}

}
