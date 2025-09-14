<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EnumStatusHelper
{
    public static function getEnumValues(string $table, string $column): array
    {
        $type = DB::select("SHOW COLUMNS FROM {$table} WHERE Field = '{$column}'")[0]->Type;

        // Ambil isi dalam kurung enum(...)
        preg_match("/^enum\((.*)\)$/", $type, $matches);

        // Pecah berdasarkan koma, lalu trim tanda petik
        $enum = array_map(function ($value) {
            return trim($value, "'");
        }, explode(',', $matches[1]));

        return array_combine($enum, array_map(fn($v) => Str::ucfirst($v), $enum));
    }
}
