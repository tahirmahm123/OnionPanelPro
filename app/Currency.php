<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $primaryKey = "symbol";
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = ['symbol','rateOfExchange','displayText','append'];

    public function slip()
    {
        return $this->belongsTo(Slips::class,'currencyType','symbol');
    }
}
