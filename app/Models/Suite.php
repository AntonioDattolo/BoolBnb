<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Message;
use App\Models\Visual;
use App\Models\Sponsor;
use App\Models\Service;

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
        'sponsor',
        'tot_visuals',
        'user_id'
    ];
    // uno a molti
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }

    public function visuals(){
        return $this->hasMany(Visual::class);
    }
    // molti a molti
    public function sponsors()
    {
        return $this->belongsToMany(Sponsor::class, 'suite_sponsor');
        // return $this->belongsToMany('App\Models\Technology');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'suite_service');
        // return $this->belongsToMany('App\Models\Technology');
    }

}
