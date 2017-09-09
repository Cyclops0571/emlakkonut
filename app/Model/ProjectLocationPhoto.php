<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\ProjectLocationPhoto
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $project_id
 * @property string $name
 * @property string $thumbnail
 * @property string $size
 * @property string $original_name
 * @property int $width
 * @property int $height
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProjectLocationPhoto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProjectLocationPhoto whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProjectLocationPhoto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProjectLocationPhoto whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProjectLocationPhoto whereOriginalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProjectLocationPhoto whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProjectLocationPhoto whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProjectLocationPhoto whereThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProjectLocationPhoto whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProjectLocationPhoto whereWidth($value)
 */
class ProjectLocationPhoto extends Model
{
    protected $table = 'project_location_photo';
    protected static $directory = 'uploads/location/';

    public static function directory() {
        return public_path(static::$directory);
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
