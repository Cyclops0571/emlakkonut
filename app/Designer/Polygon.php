<?php


namespace App\Designer;


class Polygon {


    public $id;
    public $title;
    public $x, $y;
    public $tooltip_content;
    public $height;
    public $width;

    /**
     * Polygon constructor.
     * @param static $title
     * @param ElementButtonFactory[] $buttonFactories
     */
    public function __construct($title, $buttonFactories)
    {
        $this->id = uniqid("rect-");
        $this->title = $title;
        $this->type = 'poly';
        $this->x = 0;
        $this->y = 0;
        $this->width = 20;
        $this->height = 20;
        $this->points = $this->getDefaultPoints();

        $this->tooltip_content = $this->tooltipContent($buttonFactories);
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