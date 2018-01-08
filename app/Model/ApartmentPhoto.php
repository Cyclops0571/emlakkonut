<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\ApartmentPhoto
 *
 * @property int $id
 * @property string $apartment_id
 * @property string $name
 * @property string $thumbnail
 * @property string $size
 * @property string $original_name
 * @property int $width
 * @property int $height
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Model\EstateProjectApartment $apartment
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ApartmentPhoto whereApartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ApartmentPhoto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ApartmentPhoto whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ApartmentPhoto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ApartmentPhoto whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ApartmentPhoto whereOriginalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ApartmentPhoto whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ApartmentPhoto whereThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ApartmentPhoto whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ApartmentPhoto whereWidth($value)
 * @mixin \Eloquent
 */
class ApartmentPhoto extends Model
{
    protected $table = 'apartment_photo';
    protected static $directory = 'uploads/apartment/';

    public static function directory()
    {
        return public_path(static::$directory);
    }

    public function apartment()
    {
        return $this->belongsTo(EstateProjectApartment::class, 'apartment_id');
    }

    public function getImagePath()
    {
        return static::$directory . $this->name;
    }

    public function getImageUrl()
    {
        $path = $this->getImagePath();

        return $path ? \URL::to($path) : '';
    }

    public function getThumbnailUrl()
    {
        return \URL::to(static::$directory . $this->thumbnail);
    }
}
