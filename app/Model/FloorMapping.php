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
}
