<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'price','discount', 'category_id', 'company_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];


    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function company()
    {
        return $this->belongsTo('App\Company', 'company_id', 'id');
    }

    public function images()
    {
        return $this->hasMany('App\ImagesDeal', 'deal_id', 'id');
    }

    public function customer()
    {
        return $this->hasMany('App\Costumer', 'deal_id', 'id');
    }

}
