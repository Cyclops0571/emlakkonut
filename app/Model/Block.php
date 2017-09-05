<?php

namespace App\Model;

use Hamcrest\Core\Is;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Block
 *
 * @property int $id
 * @property int $project_id
 * @property int $parcel_id
 * @property string $block_no
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Block whereBlockNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Block whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Block whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Block whereParcelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Block whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Block whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $island_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Block whereIslandId($value)
 */
class Block extends Model
{
    protected $table = 'block';

    /**
     * @param EstateProjectApartment $apartment
     * @param Island $island
     * @param Parcel $parcel
     * @return static|null
     */
    public static function getFromApartment(EstateProjectApartment $apartment, Island $island, Parcel $parcel)
    {
        return static::where('project_id', $apartment->project_id)
            ->where('island_id', $island->id)
            ->where('parcel_id', $parcel->id)
            ->where('block_no', $apartment->BlokNo)
            ->first();
    }

    /**
     * @param $islandId
     * @param $parcelId
     * @param $blockNo
     * @return null|static
     * @throws \Exception
     */
    public static function getBlock($islandId, $parcelId, $blockNo) {
        $projectId = EstateProject::getCurrentProjectIdFromSession();
        $result = static::where('project_id', $projectId)
            ->where('island_id', $islandId)
            ->where('parcel_id', $parcelId)
            ->where('block_no', $blockNo)
            ->first();

        if (!$result) {
            throw new \Exception('Aranılan isimde bir blok bulunamadı');
        }

        return $result;
    }
}
