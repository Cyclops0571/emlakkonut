<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\ParcelPhoto
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $project_id
 * @property string $name
 * @property string $size
 * @property string $original_name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Model\ParcelPhoto whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\ParcelPhoto whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\ParcelPhoto whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\ParcelPhoto whereOriginalName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\ParcelPhoto whereParcel($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\ParcelPhoto whereProjectId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\ParcelPhoto whereSize($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\ParcelPhoto whereUpdatedAt($value)
 * @property string $parcel_id
 * @method static \Illuminate\Database\Query\Builder|\App\Model\ParcelPhoto whereParcelId($value)
 * @property-read \App\Model\Parcel $parcel
 * @property-read \App\Model\ParcelPhoto $parcelPhoto
 * @property int $width
 * @property int $height
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ParcelPhoto whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ParcelPhoto whereWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ParcelPhoto whereWidth($value)
 * @property string|null $thumbnail
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ParcelPhoto whereThumbnail($value)
 */
class ParcelPhoto extends Model
{
    protected $table = 'parcel_photo';

    public function directory()
    {
        return public_path('uploads/parcel/');
    }

    public function getImagePath() {
        return '/uploads/parcel/' . $this->name;
    }

    public function getImageUrl() {
        $path = $this->getImagePath();
        return $path ? \URL::to($path) : '';
    }

    public function getThumbnailUrl()
    {
        $path = $this->getThumbnailPath();
        return $path ? \URL::to($path) : '';
    }

    public function parcel() {
        return $this->belongsTo(Parcel::class, 'parcel_id', 'id');
    }

    public function parcelPhoto()
    {
        return $this->hasOne(ParcelPhoto::class, 'parcel_id', 'parcel_id');
    }

    private function getThumbnailPath()
    {
        return '/uploads/parcel/' . $this->thumbnail;
    }
}
