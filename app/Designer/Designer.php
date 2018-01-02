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
            case $object instanceof Floor:
                $this->initFloor($object);
                break;
            case $object instanceof Numbering:
                $this->initNumbering($object);
                break;
            default:
                throw new \RuntimeException(sprintf(
                    'Unknown object type in file  %s at line %s given object type: %ss',
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
        $this->setGeneral($id, $numbering->numberingPhoto->width, $numbering->numberingPhoto->height);
        $this->setImage($numbering->numberingPhoto->getImageUrl());
        $this->setEditor();
        $currentBlock = null;
        $currentDirection = null;
        $this->spots = [];
//        /** @var EstateProjectApartment|null $previousApartment */
//        foreach ($numbering->apartments as $apartment) {
//            $this->spots[] = new Circle($apartment);
//        }
    }

    private function initFloor(Floor $floor)
    {
        $this->id = 'floor_' . $floor->id;
        $this->editor = $this->setEditor();
        $this->setGeneral($floor->floor_numbering);
        $this->setImage($floor->floorPhoto->getImageUrl());
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
            "shortcode" => "",
            "width" => $naturalWidth,
            "height" => $naturalHeight,
            'naturalWidth' => $naturalWidth,
            'naturalHeight' => $naturalHeight,
            "responsive" => 1,
            "preserve_quality" => 1,
            "pageload_animation" => "none",
            "late_initialization" => 0,
            "center_image_map" => 0
        ];
    }

    private function setImage($url)
    {
        $this->image = (object)['url' => $url];
    }
}
