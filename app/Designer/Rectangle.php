<?php

namespace App\Designer;

use App\Model\Block;

class Rectangle
{
    public $id;
    public $title;
    public $x, $y;
    public $tooltip_content;
    public $height;
    public $width;
    public $type;
    public $points;

    /**
     * Polygon constructor.
     */
    private function __construct()
    {
    }

    /**
     * Polygon constructor.
     *
     * @param Block $block
     * @return Rectangle
     */
    public static function initBlockRectangle(Block $block)
    {
        $self = new self;
        $self->id = 'rect-' . $block->id;
        $self->title = $block->block_no;
        $self->type = 'rect';
        $self->x = 5;
        $self->y = 5;
        $self->width = 6;
        $self->height = 4;
        $self->actions = $self->getAction($block->clientUrl());
        $self->mouseover_style = $self->getMouseOverStyle();
        $self->default_style = $self->getColor("#208837", 1);
        $self->points = [];
        $buttonFactories = [];
        foreach ($block->getApartments() as $apartment) {
            $buttonFactories[] = new ElementButtonFactory($apartment);
        }

        $self->tooltip_content = $self->tooltipContent($buttonFactories);


        return $self;
    }

    public function getColor($color, $opacity)
    {
        $obj = new \stdClass();
        $obj->background_color = $color;
        $obj->background_opacity = $opacity;
        $obj->border_radius = 0;

        return $obj;
    }

    public function getAction($link)
    {
        $obj = new \stdClass();
        $obj->click = "follow-link";
        $obj->link = $link;

        return $obj;
    }

    /**
     * Polygon constructor.
     *
     * @param $id
     * @param string $title
     * @param ElementButtonFactory[] $buttonFactories
     * @return Polygon
     */
    public static function createWithButtons($title, $buttonFactories)
    {
        $self = new self;
        $self->id = $title;
        $self->title = $title;
        $self->type = 'rect';
        $self->x = 10;
        $self->y = 10;
        $self->width = 3;
        $self->height = 3;
        $self->points = $self->getDefaultPoints();

        $self->tooltip_content = $self->tooltipContent($buttonFactories);

        //        dd($self->tooltip_content);

        return $self;
    }

    private function getDefaultPoints()
    {
        $ul = new \stdClass();
        $ul->x = 0;
        $ul->y = 0;
        $ur = new \stdClass();
        $ur->x = 100;
        $ur->y = 0;
        $dl = new \stdClass();
        $dl->x = 100;
        $dl->y = 100;
        $dr = new \stdClass();
        $dr->x = 0;
        $dr->y = 100;

        return [$ul, $ur, $dl, $dr];
    }

    /**
     * @param ElementButtonFactory[]|string $buttonFactories
     * @return ContentBuilder
     */
    private function tooltipContent($content = '')
    {
        if (is_string($content)) {
            return $this->plainTextContent($content);
        }

        return new ContentBuilder($content);
    }

    private function plainTextContent($text)
    {
        $tooltipContent
            = '{
        "plain_text": "PLAIN_TEXT",
        "squares_settings": {
          "containers": [
            {
              "id": "sq-container-403761",
              "settings": {
                "elements": [
                  {
                    "settings": {
                      "name": "Paragraph",
                      "iconClass": "fa fa-paragraph"
                    }
                  }
                ]
              }
            }
          ]
        }
      }';

        return json_decode(str_replace('PLAIN_TEXT', $text, $tooltipContent));
    }

    private function getMouseOverStyle()
    {
        $obj = new \stdClass();
        $obj->border_radius = 0;
        return $obj;
    }
}