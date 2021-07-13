<?php

namespace phuongna\onesk\Facades;

use Illuminate\Support\Facades\Facade;

class onesk extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'onesk';
    }
}
