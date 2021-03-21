<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = [
        'color',
        'status',
        'text'
    ];
    protected $table = 'status';
    protected $primaryKey = 'status';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    public function slip(){
        return $this->belongsTo(Slips::class,'status','status');
    }
}
