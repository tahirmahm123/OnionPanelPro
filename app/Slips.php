<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slips extends Model
{
    protected  $fillable = [
        'username',
        'slipPath',
        'dateOnSlip',
        'uploadedBy',
        'status'
    ];
    protected $table = 'slips';
    public function vpnuser(){
        return $this->belongsTo(VPNUser::class,'username','username');
    }
    public function currentStatus(){
        return $this->hasOne(Status::class,'status','status');
    }
}
