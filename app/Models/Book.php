<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['bookNo','title', 'author', 'category', 'quantity','price','file', 'is_available','is_approved', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
    
}