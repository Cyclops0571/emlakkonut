<?php

namespace App\Designer;

class Polygon
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
     * @param string $title
     * @param string $text
     * @return Polygon
     */
    public static function createWithPlainText($title, $text)
    {
        $self = new self;
        $self->id = uniqid("rect-");
        $self->title = $title;
        $self->type = 'poly';
        $self->x = 0;
        $self->y = 0;
        $self->width = 3;
        $self->height = 3;
        $self->points = $self->getDefaultPoints();

        $self->tooltip_content = $self->plainTextContent($text);

        return $self;
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
        $self->type = 'poly';
        $self->x = 10;
        $self->y = 10;
        $self->width = 10;
        $self->height = 10;
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
     * @param ElementButtonFactory[] $buttonFactories
     * @return ContentBuilder
     */
    private function tooltipContent($buttonFactories)
    {
        return new ContentBuilder($buttonFactories);
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
}