<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LicenseCode extends Model
{
    protected $guarded  = [];

    public function licenseType(){

        return $this->belongsTo(LicenseType::class);

    }

    public  function grantingOfficer(){
        return $this->belongsTo(LicenseOfficer::class, 'granting_officer_id');
    }

    public  function interveningOfficer(){
        return $this->belongsTo(LicenseOfficer::class, 'intervening_officer_id');
    }

}
