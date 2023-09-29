<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sscform extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'name' ,'father_name','mother_name','gender','date','image','group'    
     ];

     public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
}
