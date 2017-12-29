<?php

namespace App\Designer;

use App\Model\EstateProject;
use App\Model\EstateProjectApartment;
use App\Model\Floor;
use App\Model\Numbering;
use App\Model\Parcel;

/**
 * @property object image
 */
class Designer
{
    public $id;
    public $editor;
    public $general;
    public $spots;
    public $image;

    public function __construct($object)
    {
        switch (true) {
            case $object instanceof EstateProject:
                $this->initProject($object);
                break;
            case $object instanceof Parcel:
                $this->initParcel($object);
                break;
            case $object instanceof Floor:
                $this->initFloor($object);
                break;
            case $object instanceof Numbering:
                $this->initNumbering($object);
                break;
            default:
                throw new \RuntimeException(sprintf(
                    "Unknown object type in file  %s at line %s given object type: %ss",
                    __FILE__,
                    __LINE__,
                    gettype($object)
                ));
        }
    }

    private function initNumbering(Numbering $numbering)
    {

        $id = 'numbering_' . $numbering->id;
        $this->id = $id;
        $this->editor = $this->setEditor();
        $this->setGeneral($id);
        $this->setImage($numbering->numberingPhoto->getImageUrl());
        $this->setEditor();
        $currentBlock = null;
        $currentDirection = null;
        $elementFactories = [];
        $this->spots = [];
        /** @var EstateProjectApartment|null $previousApartment */
        $previousApartment = null;
        foreach ($numbering->apartments as $apartment) {
            //create a spot for every block
            if (($currentBlock && $previousApartment)
                && ($currentBlock !== $apartment->BlokNo || $currentDirection !== $apartment->Yon)
            ) {
                //create the block
                $this->spots[] = Polygon::createWithButtons(
                    'Blok:' . $previousApartment->BlokNo . " Yön:" . $previousApartment->Yon,
                    $elementFactories
                );
                //empty the spots
                $elementFactories = [];
            }
            //create a button for each apartment
            $elementFactories[] = new ElementButtonFactory($apartment);
            $currentBlock = $apartment->BlokNo;
            $currentDirection = $apartment->Yon;
            $previousApartment = $apartment;
        }
        if ($previousApartment) {
            $this->spots[] = Polygon::createWithButtons(
                'Blok:' . $previousApartment->BlokNo . " Yön:" . $previousApartment->Yon,
                $elementFactories
            );
        }
    }

    private function initFloor(Floor $floor)
    {
        $this->id = 'floor_' . $floor->id;
        $this->editor = $this->setEditor();
        $this->setGeneral($floor->floor_numbering);
        $this->setImage($floor->floorPhoto->getImageUrl());
    }

    private function initParcel(Parcel $parcel)
    {
        $id = 'parcel_' . $parcel->parcel;
        $this->id = $id;
        $this->editor = $this->setEditor();
        $this->setGeneral($id);
        $this->setImage($parcel->parcelPhoto->getImageUrl());
        $this->setEditor();
        $currentBlock = null;
        $currentDirection = null;
        $elementFactories = [];
        $this->spots = [];
        $previousApartment = null;
        foreach ($parcel->getApartments() as $apartment) {
            //create a spot for every block
            if (($currentBlock && $previousApartment)
                && ($currentBlock != $apartment->BlokNo || $currentDirection != $apartment->Yon)
            ) {
                //create the block
                $this->spots[] = Polygon::createWithButtons(
                    'Blok:' . $previousApartment->BlokNo . " Yön:" . $previousApartment->Yon,
                    $elementFactories
                );
                //empty the spots
                $elementFactories = [];
            }
            //create a button for each apartment
            $elementFactories[] = new ElementButtonFactory($apartment);
            $currentBlock = $apartment->BlokNo;
            $currentDirection = $apartment->Yon;
            $previousApartment = $apartment;
        }
        if ($previousApartment) {
            $this->spots[] = Polygon::createWithButtons(
                'Blok:' . $previousApartment->BlokNo . " Yön:" . $previousApartment->Yon,
                $elementFactories
            );
        }
    }

    public function initProject(EstateProject $project)
    {
        $id = 'project_' . $project->id;
        $this->id = $id;
        $this->editor = $this->setEditor();
        $this->setGeneral($project->ProjeAdi);
        $this->setImage($project->getImageUrl());
        $this->setEditor();
        $this->spots = [];
        foreach ($project->blocks as $block) {
            $this->spots[] = new Circle($block);
        }
    }

    public static function updateImage($object, $url)
    {
        $object->image = (object)['url' => $url];

        return $object;
    }

    public function getJson()
    {
        return json_encode($this);
    }

    private function setEditor()
    {
        return [
            "previewMode" => 0,
            "tool" => "select"
        ];
    }

    private function setGeneral($name, $naturalWidth = 768, $naturalHeight = 1024)
    {
        $this->general = [
            'name' => $name,
            'naturalWidth' => $naturalWidth,
            'naturalHeight' => $naturalHeight,
        ];
    }

    private function setImage($url)
    {
        $this->image = (object)['url' => $url];
    }
}
