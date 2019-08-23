<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Deal;

class ImagesDeal extends Model
{
    //
    protected $table = 'images_deals';

    protected $fillable = [
        'imagePath', 'deal_id'
    ];

    public function deal(){
        return $this->hasOne('App\Deal', 'deal_id', 'id');
    }
}
