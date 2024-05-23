<?php

namespace App\Facades;

use App\Services\NewtralTestService;
use Illuminate\Support\Facades\Facade;

class NewtralTest extends Facade
{
    protected static function getFacadeAccessor()
    {
        return NewtralTestService::class;
    }
}
