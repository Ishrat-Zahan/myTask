<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Honsform extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'name' ,'father_name','mother_name','date','ssc_result','hsc_result','gender','image','group'    
     ];

     public function category()
     {
         return $this->belongsTo(Category::class);
     }
}
