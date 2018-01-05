<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\ProjectVideosUrl
 *
 * @property int $id
 * @property int $project_id
 * @property string $url
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProjectVideosUrl whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProjectVideosUrl whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProjectVideosUrl whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProjectVideosUrl whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ProjectVideosUrl whereUrl($value)
 * @mixin \Eloquent
 */
class ProjectVideosUrl extends Model
{
    protected $fillable = ['project_id', 'url', 'name'];
}
