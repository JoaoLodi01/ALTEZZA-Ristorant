<?php

namespace App\Support;

class CompanyContext
{
    protected static $companyId;

    public static function set($companyId)
    {
        self::$companyId = $companyId;
    }

    public static function get()
    {
        return self::$companyId;
    }
}
