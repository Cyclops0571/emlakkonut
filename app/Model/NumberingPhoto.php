<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\NumberingPhoto
 *
 * @property int $id
 * @property string $numbering_id
 * @property string $name
 * @property string $size
 * @property string $original_name
 * @property int $width
 * @property int $height
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Model\Numbering $numbering
 * @property-read \App\Model\Numbering $numberingPhoto
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\NumberingPhoto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\NumberingPhoto whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\NumberingPhoto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\NumberingPhoto whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\NumberingPhoto whereNumberingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\NumberingPhoto whereOriginalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\NumberingPhoto whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\NumberingPhoto whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\NumberingPhoto whereWidth($value)
 * @mixin \Eloquent
 * @property string|null $thumbnail
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\NumberingPhoto whereThumbnail($value)
 * @property int|null $status
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\NumberingPhoto whereStatus($value)
 */
class NumberingPhoto extends Model
{
    protected $table = 'numbering_photo';

    public function directory()
    {
        return public_path('uploads/numbering/');
    }

    public function getImagePath()
    {
        return '/uploads/numbering/' . $this->name;
    }

    public function getImageUrl()
    {
        $path = $this->getImagePath();

        return $path ? \URL::to($path) : '';
    }

    public function getThumbnailUrl()
    {
        $path = $this->getThumbnailPath();

        return $path ? \URL::to($path) : '';
    }

    public function numbering()
    {
        return $this->belongsTo(Numbering::class, 'numbering_id', 'id');
    }

    public function numberingPhoto()
    {
        return $this->hasOne(Numbering::class, 'numbering_id', 'numbering_id');
    }

    private function getThumbnailPath()
    {
        return '/uploads/numbering/' . $this->thumbnail;
    }
}

