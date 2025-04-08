<?php

namespace App\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class StaffAuth
{
    public static function attempt(string $username, string $password, string $role): bool
    {
        $configKey = "database.connections.staff_{$role}";

        Config::set($configKey, [
            'driver'   => 'mysql',
            'host'     => env("DB_STAFF_{$role}_HOST", '127.0.0.1'),
            'port'     => env("DB_STAFF_{$role}_PORT", '3306'),
            'database' => env("DB_STAFF_{$role}_DATABASE", 'mysql'),
            'username' => $username,
            'password' => $password,
            'charset'  => 'utf8mb4',
            'collation'=> 'utf8mb4_unicode_ci',
        ]);

        try {
            DB::connection("staff_{$role}")->getPdo(); // Test de connexion
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}