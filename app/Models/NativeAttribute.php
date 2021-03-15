<?php

namespace App\Models;

trait NativeAttribute
{
    public function getNativeAttributeValue(string $attr)
    {
        return $this->{$attr . '_' . app()->getLocale()};
    }
}
