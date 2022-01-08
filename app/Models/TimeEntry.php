<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeEntry extends Model
{
    use HasFactory;

    public $guarded = [];

    public $casts = [
        'date' => 'date',
        'created_at' => 'date',
        'updated_at' => 'date',
    ];
    
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'time_entry_tags');
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
