<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\FloorMapping
 *
 * @property int $id
 * @property int $floor_no
 * @property int $floor_name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\FloorMapping whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\FloorMapping whereFloorName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\FloorMapping whereFloorNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\FloorMapping whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\FloorMapping whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FloorMapping extends Model
{
    protected $table = 'floor_mapping';
    private static $records = null;

    public static function getFloorNo($floorName)
    {
        $floorMapping = static::where('floor_name', $floorName)->first();
        if($floorMapping) {
            return $floorMapping->floor_no;
        }
        return -1000;

    }

    public static  function getFloorName($floorNo) {
        $floorMapping = static::where('floor_no', $floorNo)->first();
        if($floorMapping) {
            return $floorMapping->floor_name;
        }
        return '';
    }

    public static function getEagerFloorNo($floorName) {
        if(!self::$records) {
            self::$records = static::all();
        }

        $floorMapping = self::$records->where('floor_name', $floorName)->first();
        if($floorMapping === null) {
            $floorMapping = self::$records->where('floor_no', $floorName)->first();
        }

        if(!$floorMapping) {
            throw new \Exception('Aranılan kat bulunamadı kat:' . $floorName);
        }

        if($floorMapping) {
            return $floorMapping->floor_no;
        }

        return -1000;
    }

}
