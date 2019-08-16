<?php 

namespace Traits;

trait Scopes
{
    public function scopeTitle($query, $value)
    {
        if(trim($value) != "")
        return $query->where('title', 'like', "%" . $value . "%");
        else
        return $query;
    }

    public function scopeExcerpt($query, $value)
    {
        if(trim($value) != "")
        return $query->where('excerpt', 'like', "%" . $value . "%");
        else
        return $query;
    }

    public function scopeActive($query)
    {
        return $query->where('status','=','active');
    }

    public function scopeActiveDateNull($query)
    {
        return $query->where('status','=','active')->whereNull('expiration_date');
    }

    public function scopeActiveDate($query)
    {
        return $query->orWhere('expiration_date','>', date('Y-m-d H:i:s'))->where('status','=','active');
    }

    public function scopeDetail($query, $slug)
    {
        return $query->select(array(
            '*'
        ))->where('status','=','active')
        ->where('slug','=', $slug)->get();
    }
}