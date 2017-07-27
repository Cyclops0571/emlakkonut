<?php

namespace App\Model;

use App\Designer\Designer;
use App\ParcelInteractivity;
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
 * @property-read \App\Model\EstateProjectInteractivity $EstateProjectInteractivity
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\EstateProjectApartment[] $EstateProjectApartment
 * @property-read \App\ParcelInteractivity $ParcelInteractivity
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Parcel[] $Parcels
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

    private function photoDirectory() {
        return public_path('uploads/project/');
    }

    public function getPhotoPath() {
        return $this->projectPhoto ? '/uploads/project/' . $this->projectPhoto->name : '';
    }

    public function getImageUrl() {
        $path = $this->getPhotoPath();
        return $path ? \URL::to($path) : '';
    }

    public function EstateProjectInteractivity()
    {
        return $this->hasOne(EstateProjectInteractivity::class, 'project_id');
    }

    public function ParcelInteractivity()
    {
        return $this->hasOne(ParcelInteractivity::class, 'project_id');
    }

    public function setEstateProjectInteractivity($interactiveJson) {
        if(!$this->EstateProjectInteractivity) {
            $this->EstateProjectInteractivity = new EstateProjectInteractivity();
        }

        $this->EstateProjectInteractivity->project_id = $this->id;
        $this->EstateProjectInteractivity->interactiveJson = $interactiveJson;
        $this->EstateProjectInteractivity->save();
    }

    public function initEstateProjectInteractivity()
    {
        if(!$this->EstateProjectInteractivity) {
            $this->EstateProjectInteractivity = new EstateProjectInteractivity();
        }

        $designer = new Designer($this);
        $this->EstateProjectInteractivity->project_id = $this->id;
        $this->EstateProjectInteractivity->interactiveJson = $designer->getJson();
        $this->EstateProjectInteractivity->save();

    }


    public function EstateProjectApartment()
    {
        return $this->hasMany(EstateProjectApartment::class, "proje_id");
    }

    public function getBlocks() {
        return $this->EstateProjectApartment()->getQuery()->select('BlokNo')->distinct()->get();
    }

    public function Parcels() {
        return $this->hasMany(Parcel::class, 'project_id');
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
        $file->move($this->photoDirectory(), $file->getFilename() . '.jpg');
        $this->projectPhoto->save();

        if($this->EstateProjectInteractivity) {
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
}
