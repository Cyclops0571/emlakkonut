<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

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
 * @property-read \App\Model\ProjectLocationPhoto $photo
 */
class ProjectLocation extends Model
{

    protected $table = 'project_location';

    public static function getByProjectID($projectId)
    {
        $self = self::where('project_id', $projectId)->first();
        if (!$self) {
            $self = new self();
            $self->project_id = $projectId;
        }

        return $self;
    }

    public function photo()
    {
        return $this->hasOne(ProjectLocationPhoto::class, 'project_id', 'project_id');
    }

    public function setPhoto(UploadedFile $file)
    {
        if (!$this->photo) {
            $this->photo = new ProjectLocationPhoto();
        }
        $this->photo->project_id = $this->project_id;
        $this->photo->name = $file->getFilename() . '.jpg';
        $this->photo->thumbnail = $file->getFilename() . '_thumb.jpg';
        $this->photo->size = $file->getSize();
        $this->photo->original_name = $file->getClientOriginalName();

        $image = \Image::make($file->getRealPath());
        $image->widen(50);
        $image->save(ProjectLocationPhoto::directory() . $file->getFilename() . '_thumb.jpg');

        $image = \Image::make($file->getRealPath());
        $image->widen(1280);
        $image->save(ProjectLocationPhoto::directory() . $file->getFilename() . '.jpg');

        $this->photo->width = $image->width();
        $this->photo->height = $image->height();
        $this->photo->save();
    }
}
