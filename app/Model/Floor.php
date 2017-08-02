<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

/**
 * App\Model\Floor
 *
 * @property int $id
 * @property int $project_id
 * @property int $parcel_id
 * @property string $floor_numbering
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Floor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Floor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Floor whereParcelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Floor whereProjeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Floor whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Floor whereFloorNumbering($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Floor whereProjectId($value)
 * @property int $block_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Floor whereBlockId($value)
 * @property-read \App\Model\FloorPhoto $floorPhoto
 * @property-read \App\Model\Block $block
 * @property-read \App\Model\FloorInteractivity $floorInteractivity
 */
class Floor extends Model
{
    protected $table = 'floor';

    public static function setFloorPhoto(UploadedFile $photo)
    {
        // 1- parse the name
        // 2- find the floor
        // 3- check if floorPhoto is exits
        // 4- save the new photo
        // 5- move it to the place
        // 6- change the photoUrl to new url
        $filename = $photo->getClientOriginalName();
        $fileFormat = explode("_");

        dd($filename);

//        if (!$this->parcelPhoto)
//        {
//            $this->parcelPhoto = new ParcelPhoto();
//        }
//        $this->parcelPhoto->parcel_id = $this->id;
//        $this->parcelPhoto->name = $file->getFilename() . '.jpg';
//        $this->parcelPhoto->size = $file->getSize();
//        $this->parcelPhoto->original_name = $file->getClientOriginalName();
//        $image = \Image::make($file->getRealPath());
//        $image->widen(1280);
//        $image->save($this->parcelPhoto->directory() . $file->getFilename() . '.jpg');
//        $this->parcelPhoto->width = $image->width();
//        $this->parcelPhoto->height = $image->height();
//        $this->parcelPhoto->save();
//
//        if ($this->parcelInteractivity)
//        {
//            //change the image url in the json data.
//            $this->parcelInteractivity->updateImage();
//            $this->parcelInteractivity->save();
//        }
    }


    public function floorPhoto()
    {
        return $this->hasOne(FloorPhoto::class, 'floor_id');
    }

    public function block()
    {
        return $this->belongsTo(Block::class, 'block_id');
    }

    public function floorInteractivity() {
        return $this->hasOne(FloorInteractivity::class, 'floor_id');
    }

    public function initInteractivity()
    {
        ///571571
    }
}
