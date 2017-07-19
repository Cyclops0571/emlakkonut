<?php

namespace App\Model;

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
}
