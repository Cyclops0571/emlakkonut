<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\FloorInteractivity
 *
 * @property int $id
 * @property int $floor_id
 * @property string $interactiveJson
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Model\Floor $floor
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\FloorInteractivity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\FloorInteractivity whereFloorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\FloorInteractivity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\FloorInteractivity whereInteractiveJson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\FloorInteractivity whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FloorInteractivity extends Model
{
    protected $table = 'floor_interactivity';

    public function floor()
    {
        return $this->belongsTo(Floor::class, 'floor_id');
    }
}
