<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    use HasFactory;


    protected $fillable = ['Programming', 'Laravel', 'Vuejs', 'Front-end', 'Back-end', 'Full-stack'];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
