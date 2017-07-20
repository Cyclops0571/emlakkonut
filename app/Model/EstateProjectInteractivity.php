<?php

namespace App\Model;

use App\Designer\Designer;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\EstateProjectInteractivity
 *
 * @property int $id
 * @property string $project_id
 * @property string $interactiveJson
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProjectInteractivity whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProjectInteractivity whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProjectInteractivity whereInteractiveJson($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProjectInteractivity whereProjectId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProjectInteractivity whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EstateProjectInteractivity extends Model
{
    protected $table = 'estate_project_interactivity';

    public function updateImage($url)
    {
        $jsonData = Designer::updateImage(json_decode($this->interactiveJson), $url);
        $this->interactiveJson = json_encode($jsonData);
        $this->save();
    }
}
