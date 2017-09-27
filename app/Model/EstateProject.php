<?php

namespace App\Model;

use App\Designer\Designer;
use App\Model\ParcelInteractivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

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
 * @property-read \App\Model\EstateProjectInteractivity $EstateProjectInteractivity
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\EstateProjectApartment[] $EstateProjectApartment
 * @property-read \App\Model\ParcelInteractivity $ParcelInteractivity
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Parcel[] $Parcels
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Floor[] $floor
 * @property int|null $status
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EstateProject whereStatus($value)
 */
class EstateProject extends Model
{

    protected $table = 'estate_project';

    /**
     * @param $serviceAttributesRaw
     * @return \Illuminate\Support\Collection
     */
    public static function setAttributesFromService($serviceAttributesRaw)
    {
        $projectList = [];
        $serviceAttributes = json_decode($serviceAttributesRaw);
        foreach ($serviceAttributes as $serviceAttribute) {
            $estateProject = EstateProject::query()
                ->where('ProjeID', $serviceAttribute->ProjeID)
                ->first();
            if (!$estateProject) {
                $estateProject = new self();
            }
            if (!empty($serviceAttribute->ProjeID)) {
                $estateProject->ProjeID = $serviceAttribute->ProjeID;
                $estateProject->ProjeAdi = $serviceAttribute->ProjeAdi;
                $estateProject->save();

                array_push($projectList, $estateProject);

            }
        }

        return collect($projectList);
    }

    public static function setSession($id)
    {
        \Session::put('projectID', $id);
    }

    public static function getCurrentProjectIdFromSession()
    {
        $projectId = \Session::get('projectID');
        if (!$projectId) {
            return \Redirect::route('home')->withErrors('Yapmak istediğiniz işlem için önce bir proje seçmelisiniz');
        }

        return $projectId;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|Model|null|static|static[]
     */
    public static function getCurrentProjectFromSession()
    {
        $projectID = self::getCurrentProjectIdFromSession();

        return self::find($projectID);
    }

    public function projectPhoto()
    {
        return $this->hasOne(ProjectPhoto::class, 'project_id');
    }

    private function photoDirectory()
    {
        return Setting::PublicPath('uploads/project/');
    }

    public function getPhotoPath()
    {
        return $this->projectPhoto ? '/uploads/project/' . $this->projectPhoto->name : '';
    }

    public function getThumbnailPath()
    {
        return $this->projectPhoto ? '/uploads/project/' . $this->projectPhoto->thumbnail : '';
    }

    public function getImageUrl()
    {
        $path = $this->getPhotoPath();

        return $path ? Setting::AdminUrl($path) : '';
    }

    public function getThumbnailUrl()
    {
        $path = $this->getThumbnailPath();

        return $path ? Setting::AdminUrl($path) : Setting::AdminUrl('/img/upload.png');
    }

    public function get352x386Url()
    {
        return str_replace('_thumb.jpg', '_461x505.jpg', $this->getThumbnailUrl());
    }

    public function EstateProjectInteractivity()
    {
        return $this->hasOne(EstateProjectInteractivity::class, 'project_id');
    }

    public function ParcelInteractivity()
    {
        return $this->hasOne(ParcelInteractivity::class, 'project_id');
    }

    public function setEstateProjectInteractivity($interactiveJson)
    {
        if (!$this->EstateProjectInteractivity) {
            $this->EstateProjectInteractivity = new EstateProjectInteractivity();
        }

        $this->EstateProjectInteractivity->project_id = $this->id;
        $this->EstateProjectInteractivity->interactiveJson = $interactiveJson;
        $this->EstateProjectInteractivity->save();
    }

    public function initEstateProjectInteractivity()
    {
        if (!$this->EstateProjectInteractivity) {
            $this->EstateProjectInteractivity = new EstateProjectInteractivity();
        }

        $designer = new Designer($this);
        $this->EstateProjectInteractivity->project_id = $this->id;
        $this->EstateProjectInteractivity->interactiveJson = $designer->getJson();
        $this->EstateProjectInteractivity->save();

    }


    public function EstateProjectApartment()
    {
        return $this->hasMany(EstateProjectApartment::class, "project_id");
    }

    public function getBlocks()
    {
        return $this->EstateProjectApartment()->getQuery()->select('BlokNo')->distinct()->get();
    }

    public function Parcels()
    {
        return $this->hasMany(Parcel::class, 'project_id');
    }

    public function createPhoto(UploadedFile $file)
    {
        if (!$this->projectPhoto) {
            $this->projectPhoto = new ProjectPhoto();
        }
        $this->projectPhoto->project_id = $this->id;
        $this->projectPhoto->name = $file->getFilename() . '.jpg';
        $this->projectPhoto->thumbnail = $file->getFilename() . '_thumb.jpg';
        $this->projectPhoto->size = $file->getSize();
        $this->projectPhoto->original_name = $file->getClientOriginalName();

        $image = \Image::make($file->getRealPath());
        $image->widen(50);
        $image->save($this->photoDirectory() . $file->getFilename() . '_thumb.jpg');

        $image = \Image::make($file->getRealPath());
        $image->resize(352, 386);
        $image->save($this->photoDirectory() . $file->getFilename() . '_461x505.jpg');

        $image = \Image::make($file->getRealPath());
        $image->widen(1280);
        $image->save($this->photoDirectory() . $file->getFilename() . '.jpg');

        $this->projectPhoto->width = $image->width();
        $this->projectPhoto->height = $image->height();
        $this->projectPhoto->save();

        if ($this->EstateProjectInteractivity) {
            //change the image url in the json data.
            $this->EstateProjectInteractivity->updateImage($this->getImageUrl());
            $this->EstateProjectInteractivity->save();
        }
    }

    /**
     * @param $parcelName
     * @return \Illuminate\Database\Eloquent\Collection|\App\Model\ParcelPhoto
     */
    public function getParcelPhoto($parcelName)
    {
        return ParcelPhoto::where('project_id', $this->id)
            ->where('parcel', $parcelName)
            ->first();
    }


    public function floor()
    {
        return $this->hasMany(Floor::class, 'project_id');
    }
}
