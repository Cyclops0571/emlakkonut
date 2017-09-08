<?php

namespace App\Designer;

use App\Model\EstateProject;
use App\Model\Floor;
use App\Model\Parcel;

/**
 * @property object image
 */
class Designer {

    public $id;
    public $editor;
    public $general;
    public $spots;

    function __construct($object)
    {
        if ($object instanceof EstateProject)
        {
            $this->id = $object->id;
            $this->editor = $this->setEditor();
            $this->setGeneral($object->ProjeAdi);
            $this->setImage($object->getImageUrl());
            $this->setEditor();
            foreach ($object->getBlocks() as $block)
            {
                $this->spots[] = new Circle($block->BlokNo, "Blok - " . $block->BlokNo);
            }
        } elseif ($object instanceof Parcel) {
            $this->id = $object->id;
            $this->editor = $this->setEditor();
            $this->setGeneral($object->parcel);
            $this->setImage($object->parcelPhoto->getImageUrl());
            $this->setEditor();
            $currentBlock = null;
            $currentDirection = null;
            $elementFactories = [];
            foreach ($object->getApartments() as $apartment)
            {
                $elementFactories[] = new ElementButtonFactory($apartment->KapiNo, $apartment->url(), $apartment->statusColor());

                //create a spot for every block
                if($currentBlock != $apartment->BlokNo || $currentDirection != $apartment->Yon){
                    $currentBlock = $apartment->BlokNo;
                    $currentDirection = $apartment->Yon;
                    //create a button for each apertment
                    $this->spots[] =  Polygon::createWithButtons('Blok:' . $apartment->BlokNo . " Yön:" . $apartment->Yon, $elementFactories);
                    //empty the spots
                    $elementFactories = [];
                }
            }
        } elseif($object instanceof Floor) {
            $this->id = $object->id;
            $this->editor = $this->setEditor();
            $this->setGeneral($object->floor_numbering);
            $this->setImage($object->floorPhoto->getImageUrl());
        } else {
            throw new \Exception(sprintf("Unknown object type in file  %s at line %s given object type: %ss", __FILE__, __LINE__, gettype($object)));
        }


    }

    public static function updateImage($object, $url) {
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
            "selected_shape" => "spot-1202",
        ];
    }

    private function setGeneral($name, $naturalWidth = 768, $naturalHeight = 1024)
    {
        //        general":{"name":"Demo - Drawing Shapes","width":5245,"height":4428,"image_url":"img/demo_2.jpg"}/
        $this->general = [
            'name'          => $name,
            'naturalWidth'  => $naturalWidth,
            'naturalHeight' => $naturalHeight,
        ];
    }

    private function setImage($url) {
        $this->image = (object)['url' => $url];
    }


}