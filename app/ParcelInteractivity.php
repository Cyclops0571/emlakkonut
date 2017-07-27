<?php

namespace App;

use App\Designer\Designer;
use App\Model\Parcel;
use App\Model\ParcelPhoto;
use Illuminate\Database\Eloquent\Model;

/**
 * App\ParcelInteractivity
 *
 * @property int $id
 * @property int $parcel_id
 * @property string $interactiveJson
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\ParcelInteractivity whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ParcelInteractivity whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ParcelInteractivity whereInteractiveJson($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ParcelInteractivity whereParcel($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ParcelInteractivity whereProjectId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ParcelInteractivity whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Model\Parcel $parcel
 * @method static \Illuminate\Database\Query\Builder|\App\ParcelInteractivity whereParcelId($value)
 * @property-read \App\Model\ParcelPhoto $parcelPhoto
 */
class ParcelInteractivity extends Model {

    protected $table = 'parcel_interactivity';

    public function updateImage()
    {
        if ($this->parcelPhoto)
        {
            $url = $this->parcelPhoto->getImageUrl();
            $jsonData = Designer::updateImage(json_decode($this->interactiveJson), $url);
            $this->interactiveJson = json_encode($jsonData);
            $this->save();
        }
    }


    public function parcel()
    {
        return $this->belongsTo(Parcel::class, 'parcel_id');
    }


}
