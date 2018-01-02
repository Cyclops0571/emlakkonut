<?php

namespace App\Model;

use App\Designer\Designer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

/**
 * App\Model\Numbering
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $project_id
 * @property string $name
 * @property string $value
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\EstateProjectApartment[] $apartments
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Numbering whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Numbering whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Numbering whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Numbering whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Numbering whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Numbering whereValue($value)
 * @property-read \App\Model\NumberingPhoto $numberingPhoto
 * @property-read \App\Model\NumberingInteractivity $numberingInteractivity
 * @property int|null $status
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Numbering whereStatus($value)
 */
class Numbering extends Model
{
    protected $table = 'numbering';

    public function apartments()
    {
        return $this->hasMany(EstateProjectApartment::class, 'numbering_id');
    }

    public function numberingPhoto()
    {
        return $this->hasOne(NumberingPhoto::class, 'numbering_id');
    }

    public function setNumberingPhoto(UploadedFile $file)
    {
        if (!$this->numberingPhoto) {
            $this->numberingPhoto = new NumberingPhoto();
        }
        $this->numberingPhoto->numbering_id = $this->id;
        $this->numberingPhoto->name = $file->getFilename() . '.jpg';
        $this->numberingPhoto->thumbnail = $file->getFilename() . '_thumb.jpg';
        $this->numberingPhoto->size = $file->getSize();
        $this->numberingPhoto->original_name = $file->getClientOriginalName();

        $image = \Image::make($file->getRealPath());
        $image->widen(50);
        $image->save($this->numberingPhoto->directory() . $file->getFilename() . '_thumb.jpg');

        $image = \Image::make($file->getRealPath());
        $image->widen(1280);
        $image->save($this->numberingPhoto->directory() . $file->getFilename() . '.jpg');

        $this->numberingPhoto->width = $image->width();
        $this->numberingPhoto->height = $image->height();
        $this->numberingPhoto->save();

        if ($this->numberingInteractivity) {
            //change the image url in the json data.
            $this->numberingInteractivity->updateImage();
            $this->numberingInteractivity->save();
        }
    }

    public function numberingInteractivity()
    {
        return $this->hasOne(NumberingInteractivity::class, 'numbering_id');
    }

    public function initInteractivity()
    {
        if (!$this->numberingInteractivity) {
            $this->numberingInteractivity = new NumberingInteractivity();
        }

        $designer = new Designer($this);
        $this->numberingInteractivity->numbering_id = $this->id;
        $this->numberingInteractivity->interactiveJson = $designer->getJson();
        $this->numberingInteractivity->save();
    }

    public function setInteractivity($interactiveJson)
    {
        if (!$this->numberingInteractivity) {
            $this->numberingInteractivity = new NumberingInteractivity();
        }
        $this->numberingInteractivity->numbering_id = $this->id;
        $this->numberingInteractivity->interactiveJson = $interactiveJson;
        $this->numberingInteractivity->save();
    }

    public function getBlocks()
    {
        return array_unique($this->apartments->pluck('BlokNo')->toArray());
    }

    public function getDirections($blokNo)
    {
        return array_unique($this->apartments->where('BlokNo', $blokNo)->pluck('Yon')->toArray());
    }

    public function getFloors($blokNo, $direction)
    {
        return array_unique($this->apartments->where('BlokNo', $blokNo)
            ->where('Yon', $direction)->pluck('BulunduguKat')
            ->toArray());
    }
}
