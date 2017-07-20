<?php

namespace App\Designer;

use App\Model\EstateProject;

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
            $spotNames = [];
            foreach ($object->getBlocks() as $block)
            {
                $spotNames[] = $block->BlokNo;
            }
            $this->setSpots($spotNames);
        } else
        {
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

    private function setSpots($spotNames = [])
    {
        if (!$this->spots)
        {
            $this->spots = [];
        }

        foreach ($spotNames as $spotName)
        {
            array_push($this->spots, new Spot($spotName));
        }
    }


}