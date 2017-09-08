<?php

namespace App\Designer;

class Circle
{


    public $id;
    public $title;
    public $x, $y;
    public $tooltip_content;
    public $width;
    public $height;
    public $type;


    public function __construct($title, $content = '')
    {
        $this->id = uniqid("oval-");
        $this->type = 'oval';
        $this->title = $title;
        $this->x = 5;
        $this->y = 5;
        $this->width = 10;
        $this->height = 10;
        $this->default_style = $this->getColor("#00ffff");

        $this->tooltip_content = $this->tooltipContent($content);
    }

    public function getColor($color) {
        $obj = new \stdClass();
        $obj->background_color = $color;
        return $obj;
    }

    private function tooltipContent($content = '')
    {
        if (is_string($content))
        {
            return $this->plainTextContent($content);
        } else {
            return new ContentBuilder($content);
        }
    }

    private function plainTextContent($text)
    {
        $tooltipContent = '{
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