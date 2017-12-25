<?php

namespace App\Model;

use App\Designer\Designer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

/**
 * App\Model\Parcel
 *
 * @property int $id
 * @property string $parcel
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Parcel whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Parcel whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Parcel whereParcel($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Parcel whereProjeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Parcel whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Model\EstateProject $EstateProject
 * @property int $project_id
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Parcel whereProjectId($value)
 * @property-read \App\Model\EstateProject $estateProject
 * @property-read \App\Model\ParcelPhoto $parcelPhoto
 * @property-read \App\Model\ParcelInteractivity $parcelInteractivity
 * @property int $island_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Parcel whereIslandId($value)
 * @property-read \App\Model\Island $island
 * @property int|null $status
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Parcel whereStatus($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Block[] $blocks
 * @property int $manual_add
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Parcel whereManualAdd($value)
 */
class Parcel extends Model
{
    protected $table = 'parcel';

    /**
     * @param EstateProjectApartment $apartment
     * @param Island $island
     * @return null|static
     */
    public static function getFromApartment(EstateProjectApartment $apartment, Island $island)
    {
        return static::where('project_id', $apartment->project_id)
            ->where('island_id', $island->id)
            ->where('parcel', $apartment->Parsel)
            ->first();
    }

    /**
     * @param $islandId
     * @param $parcelKkysId
     * @return null|static
     * @throws \Exception
     */
    public static function getParcel($islandId, $parcelKkysId)
    {
        $projectId = EstateProject::getCurrentProjectIdFromSession();
        $result = static::where('project_id', $projectId)
            ->where('island_id', $islandId)
            ->where('parcel', $parcelKkysId)
            ->first();

        if (!$result) {
            throw new \Exception('Aranılan isimde bir parsel bulunamadı');
        }

        return $result;
    }

    public function estateProject()
    {
        return $this->belongsTo(EstateProject::class, 'project_id');
    }

    public function island()
    {
        return $this->belongsTo(Island::class, 'island_id');
    }

    public function parcelPhoto()
    {
        return $this->hasOne(ParcelPhoto::class, 'parcel_id');
    }

    public function parcelInteractivity()
    {
        return $this->hasOne(ParcelInteractivity::class, 'parcel_id');
    }

    public function setParcelPhoto(UploadedFile $file)
    {
        if (!$this->parcelPhoto) {
            $this->parcelPhoto = new ParcelPhoto();
        }
        $this->parcelPhoto->parcel_id = $this->id;
        $this->parcelPhoto->name = $file->getFilename() . '.jpg';
        $this->parcelPhoto->thumbnail = $file->getFilename() . '_thumb.jpg';
        $this->parcelPhoto->size = $file->getSize();
        $this->parcelPhoto->original_name = $file->getClientOriginalName();

        $image = \Image::make($file->getRealPath());
        $image->widen(50);
        $image->save($this->parcelPhoto->directory() . $file->getFilename() . '_thumb.jpg');

        $image = \Image::make($file->getRealPath());
        $image->widen(1280);
        $image->save($this->parcelPhoto->directory() . $file->getFilename() . '.jpg');

        $this->parcelPhoto->width = $image->width();
        $this->parcelPhoto->height = $image->height();
        $this->parcelPhoto->save();

        if ($this->parcelInteractivity) {
            //change the image url in the json data.
            $this->parcelInteractivity->updateImage();
            $this->parcelInteractivity->save();
        }
    }

    public function initInteractivity()
    {
        if (!$this->parcelInteractivity) {
            $this->parcelInteractivity = new ParcelInteractivity();
        }

        $designer = new Designer($this);
        $this->parcelInteractivity->parcel_id = $this->id;
        $this->parcelInteractivity->interactiveJson = $designer->getJson();
        $this->parcelInteractivity->save();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|EstateProjectApartment[]
     */
    public function getApartments()
    {
        $island = Island::find($this->island_id);

        return EstateProjectApartment::where('project_id', $this->project_id)
            ->where('Ada', $island->island_kkys)
            ->where('Parsel', $this->parcel)
            ->orderBy('BlokNo', 'DESC')
            ->orderBy("Yon", 'ASC')
            ->orderBy('KapiNo', 'ASC')
            ->get();
    }

    public function setInteractivity($interactiveJson)
    {
        if (!$this->parcelInteractivity) {
            $this->parcelInteractivity = new ParcelInteractivity();
        }
        $this->parcelInteractivity->parcel_id = $this->id;
        $this->parcelInteractivity->interactiveJson = $interactiveJson;
        $this->parcelInteractivity->save();
    }

    public function blocks()
    {
        return $this->hasMany(Block::class, 'parcel_id');
    }
}
