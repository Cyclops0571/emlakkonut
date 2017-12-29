<?php

namespace App\Model;

use App\Designer\Designer;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\NumberingInteractivity
 *
 * @property int $id
 * @property int $numbering_id
 * @property string $interactiveJson
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Model\NumberingPhoto $numbering
 * @property-read \App\Model\NumberingPhoto $numberingPhoto
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\NumberingInteractivity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\NumberingInteractivity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\NumberingInteractivity whereInteractiveJson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\NumberingInteractivity whereParcelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\NumberingInteractivity whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\NumberingInteractivity whereNumberingId($value)
 */
class NumberingInteractivity extends Model
{

    protected $table = 'numbering_interactivity';

    public function updateImage()
    {
        if ($this->numberingPhoto) {
            $url = $this->numberingPhoto->getImageUrl();
            $jsonData = Designer::updateImage(json_decode($this->interactiveJson), $url);
            $this->interactiveJson = json_encode($jsonData);
            $this->save();
        }
    }

    public function numberingPhoto()
    {
        return $this->hasOne(NumberingPhoto::class, 'numbering_id', 'numbering_id');
    }

    public function numbering()
    {
        return $this->belongsTo(NumberingPhoto::class, 'numbering_id');
    }
}
