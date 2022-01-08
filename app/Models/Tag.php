<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    
    public function timeEntries()
    {
        return $this->belongsToMany(TimeEntry::class, 'time_entry_tags');
    }
}
