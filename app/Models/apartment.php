<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apartment extends Model
{
    use HasFactory;

    protected $fillable =[
        
        'title',
        'room',
       'bed',
        'bathroom',
        'squareM',
        'address',
        'img',
        'visible',
        'sponsor_id',
        'visuals',
    ];

     public function user(){
        return $this->belongsTo(User::class);
     }
}
