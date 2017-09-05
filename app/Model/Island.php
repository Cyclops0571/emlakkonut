<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Mockery\Exception;

/**
 * App\Model\Island
 *
 * @property int $id
 * @property int $project_id
 * @property string $island_kkys
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Island whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Island whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Island whereIslandKkys($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Island whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Island whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Island extends Model
{
    protected $table = 'island';

    /**
     * @param EstateProjectApartment $estateApartment
     * @return static|null
     */
    public static function getFromApartment(EstateProjectApartment $estateApartment)
    {
        return static::where('project_id', $estateApartment->project_id)
            ->where('island_kkys', $estateApartment->Ada)
            ->first();
    }

    /**
     * @param $islandKkys
     * @return null|static
     * @throws \Exception
     */
    public static function getIslandFromIslandKkys($islandKkys) {
        $projectId = EstateProject::getCurrentProjectIdFromSession();
        $result = static::where('project_id', $projectId)
            ->where('island_kkys', $islandKkys)
            ->first();
        if (!$result) {
            throw new \Exception('Aranılan isimde bir ada bulunamadı');
        }

        return $result;
    }
}
