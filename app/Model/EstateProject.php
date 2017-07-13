<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\Paginator;

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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\ProjectPhoto $projectPhoto
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

    public function projectPhoto()
    {
        return $this->hasOne(ProjectPhoto::class, 'project_id');
    }

    public function createPhoto(UploadedFile $file)
    {
        if(!$this->projectPhoto) {
            $this->projectPhoto = new ProjectPhoto();
        }
        $this->projectPhoto->project_id = $this->id;
        $this->projectPhoto->name = $file->getFilename() . '.jpg';
        $this->projectPhoto->size = $file->getSize();
        $this->projectPhoto->original_name = $file->getClientOriginalName();
        $file->move($this->getPhotoRealPath(), $file->getFilename() . '.jpg');
        $this->projectPhoto->save();
    }

    private function getPhotoRealPath($filename = '') {
        return public_path('uploads/project/' . $filename);
    }

    public function getPhotoPath() {
        return $this->projectPhoto ? '/uploads/project/' . $this->projectPhoto->name : '';
    }
}
