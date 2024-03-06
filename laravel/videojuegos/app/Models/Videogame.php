<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Videogame extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'year',
        'photo',
        'developer_id'
    ];

    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }

    public function platforms()
    {
        return $this->belongsToMany(Platform::class);
    }
}
