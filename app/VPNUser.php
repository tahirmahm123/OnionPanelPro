<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VPNUser extends Model
{
    // Custom Table Name
    protected $table = 'vpn_users';
    protected $primaryKey = 'username';
    public $incrementing = false;
    protected $keyType = 'string';
    /**
     * @var array
     * Allow Fillable in direct array data input
     */
    protected $fillable = [
        'username',
        'phone',
        'password',
        'days',
        'platform',
        'createdBy',
        'isActive',
        'updatedBy'
    ];
    public function slips(){
        return $this->hasMany(Slips::class,'username','username');
    }
}
