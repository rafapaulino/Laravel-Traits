<?php

namespace Traits;

use Carbon\Carbon;

trait ExpirationDate
{
    public function setExpirationDateAttribute($value)
    {
        if (!is_null($value) && trim($value) !== "" && strpos($value, "/") !== false)
        $this->attributes['expiration_date'] = Carbon::createFromFormat('d/m/Y H:i:s', $value)->toDateTimeString();
        else 
        $this->attributes['expiration_date'] = $value;
    }

    public function getExpirationDateAttribute($value)
    {
        if (!is_null($value) && trim($value) !== "")
        return Carbon::parse(trim($value))->format('d/m/Y H:i:s');
        else
        return null;
    }
}