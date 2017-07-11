<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\EstateProject
 *
 * @property int $id
 * @property string $ProjeID
 * @property string $ProjeAdi
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProject whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProject whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProject whereProjeAdi($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProject whereProjeID($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProject whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EstateProject extends Model {

    protected $table = 'estate_project';

    /**
     * @param $serviceAttributesRaw
     * @return \Illuminate\Support\Collection
     */
    public static function setAttributesFromService($serviceAttributesRaw)
    {
        $projectList = [];
        $serviceAttributes = json_decode($serviceAttributesRaw);
        foreach ($serviceAttributes as $serviceAttribute)
        {
            $estateProject = EstateProject::query()
                ->where('ProjeID', $serviceAttribute->ProjeID)
                ->first();
            if (!$estateProject)
            {
                $estateProject = new self();
            }
            if (!empty($serviceAttribute->ProjeID))
            {
                $estateProject->ProjeID = $serviceAttribute->ProjeID;
                $estateProject->ProjeAdi = $serviceAttribute->ProjeAdi;
                $estateProject->save();

                array_push($projectList, $estateProject);

            }
        }

        return collect($projectList);
    }
}
