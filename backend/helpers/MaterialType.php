<?php

namespace backend\helpers;

class MaterialType
{
    const TYPE_TOOL = 1;
    const TYPE_SPARE = 2;
    private static $data = [
        1 => 'เครื่องมือ',
        2 => 'อะไหล่'
    ];

    private static $dataobj = [
        ['id'=>1,'name' => 'เครื่องมือ'],
        ['id'=>2,'name' => 'อะไหล่'],
    ];
    public static function asArray()
    {
        return self::$data;
    }
    public static function asArrayObject()
    {
        return self::$dataobj;
    }
    public static function getTypeById($idx)
    {
        if (isset(self::$data[$idx])) {
            return self::$data[$idx];
        }

        return 'Unknown Type';
    }
    public static function getTypeByName($idx)
    {
        if (isset(self::$data[$idx])) {
            return self::$data[$idx];
        }

        return 'Unknown Type';
    }
}
