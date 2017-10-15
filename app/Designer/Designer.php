<?php

namespace App\Designer;

use App\Model\EstateProject;
use App\Model\Floor;
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
        if ($object instanceof EstateProject) {
            $id = 'project_' . $object->id;
            $this->id = $id;
            $this->editor = $this->setEditor();
            $this->setGeneral($object->ProjeAdi);
            $this->setImage($object->getImageUrl());
            $this->setEditor();
            $this->spots = [];
            foreach ($object->blocks as $block) {
                $this->spots[] = new Circle($block);
            }
        } elseif ($object instanceof Parcel) {
            $id = 'parcel_' . $object->parcel;
            $this->id = $id;
            $this->editor = $this->setEditor();
            $this->setGeneral($id);
            $this->setImage($object->parcelPhoto->getImageUrl());
            $this->setEditor();
            $currentBlock = null;
            $currentDirection = null;
            $elementFactories = [];
            $this->spots = [];
            foreach ($object->getApartments() as $apartment) {
                //create a spot for every block
                if (($currentBlock != null && isset($previousApartment))
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
            if (isset($previousApartment)) {
                $this->spots[] = Polygon::createWithButtons(
                    'Blok:' . $previousApartment->BlokNo . " Yön:" . $previousApartment->Yon,
                    $elementFactories
                );
            }
        } elseif ($object instanceof Floor) {
            $this->id = 'floor_' . $object->id;
            $this->editor = $this->setEditor();
            $this->setGeneral($object->floor_numbering);
            $this->setImage($object->floorPhoto->getImageUrl());
        } else {
            throw new \Exception(sprintf(
                "Unknown object type in file  %s at line %s given object type: %ss",
                __FILE__,
                __LINE__,
                gettype($object)
            ));
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
