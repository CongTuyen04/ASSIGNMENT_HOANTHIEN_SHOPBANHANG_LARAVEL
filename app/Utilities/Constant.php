<?php
namespace App\Utilities;

namespace App\Utilities;

class Constant
{
    const user_level_admin = 1;
    const user_level_client = 2;
    const user_level_host = 3;

    public static function getUserLevels()
    {
        return [
            self::user_level_admin => 'Admin',
            self::user_level_client => 'Client',
            self::user_level_host => 'Host',
        ];
    }
}
