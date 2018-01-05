<?php

namespace App;

class Region extends Model
{
    protected $table = 'region';

    public function country($pid)
    {
        $region = Region::where('parent_id','=',$pid)->get();
        return $region;
    }

    public function city($id)
    {
        $city = Region::where('region_id','=',$id)->get();
        return $city;
    }
}
