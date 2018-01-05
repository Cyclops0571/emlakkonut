<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Project360Url
 *
 * @property int $id
 * @property int $project_id
 * @property string $url
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Project360Url whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Project360Url whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Project360Url whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Project360Url whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Project360Url whereUrl($value)
 * @mixin \Eloquent
 */
class Project360Url extends Model
{
    protected $fillable = ['project_id', 'url'];
}
