<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
       'organization_id', 'name' ,'description'    
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function sscforms()
    {
    return $this->hasMany(Hscform::class);
    }
    
    public function hscforms()
    {
    return $this->hasMany(Sscform::class);
    }

    public function honsforms()
    {
    return $this->hasMany(Honsform::class);
    }
}
