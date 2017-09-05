<?php

namespace App\Model;

use App\Designer\Designer;
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
 * @property-read \App\Model\FloorPhoto $floorPhoto
 */
class FloorInteractivity extends Model
{
    protected $table = 'floor_interactivity';

    public function floor()
    {
        return $this->belongsTo(Floor::class, 'floor_id');
    }

    public function updateImage()
    {
        if ($this->floorPhoto)
        {
            $url = $this->floorPhoto->getImageUrl();
            $jsonData = Designer::updateImage(json_decode($this->interactiveJson), $url);
            $this->interactiveJson = json_encode($jsonData);
            $this->save();
        }
    }

    public function floorPhoto() {
        return $this->hasOne(FloorPhoto::class, 'floor_id', 'floor_id');
    }
}
