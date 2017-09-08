<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\ProjectLocation
 *
 * @property int $id
 * @property string $project_id
 * @property string $map_data
 * @property int $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProjectLocation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProjectLocation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProjectLocation whereMapData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProjectLocation whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProjectLocation whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProjectLocation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProjectLocation extends Model
{
    protected $table = 'project_location';

    public static function getByProjectID($projectId) {
        $self = self::where('project_id', $projectId)->first();
        if(!$self) {
            $self = new self();
            $self->project_id = $projectId;
        }
        return $self;
    }
}
