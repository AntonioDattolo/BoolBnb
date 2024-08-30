<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Suite extends Model
{
    use HasFactory;

    protected $fillable =[
        'title',
        'room',
        'bed',
        'bathroom',
        'squareM',
        'address',
        'longitude',
        'latitude',
        'img',
        'visible',
        'sponsor_id',
        'tot_visuals',
        'user_id'
    ];
    
    public function users(){
        return $this->belongsTo(User::class);
    }
}
