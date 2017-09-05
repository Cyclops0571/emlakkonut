<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\FloorPhoto
 *
 * @property-read \App\Model\Floor $floor
 * @mixin \Eloquent
 * @property int $id
 * @property string $floor_id
 * @property string $name
 * @property string $size
 * @property string $original_name
 * @property int $width
 * @property int $height
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\FloorPhoto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\FloorPhoto whereFloorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\FloorPhoto whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\FloorPhoto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\FloorPhoto whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\FloorPhoto whereOriginalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\FloorPhoto whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\FloorPhoto whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\FloorPhoto whereWidth($value)
 * @property string|null $thumbnail
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\FloorPhoto whereThumbnail($value)
 */
class FloorPhoto extends Model
{
    protected $table = 'floor_photo';
    protected static $directory = 'uploads/floor/';

    public static function directory() {
        return public_path(static::$directory);
    }

    public function floor()
    {
        return $this->belongsTo(Floor::class, 'floor_id');
    }

    public function getImagePath() {
        return static::$directory . $this->name;
    }

    public function getImageUrl() {
        $path = $this->getImagePath();
        return $path ? \URL::to($path) : '';
    }

    public function getThumbnailUrl() {
        return \URL::to(static::$directory . $this->thumbnail);
    }
}
