<?php


namespace App\Designer;


/**
 * @property \stdClass squares_settings
 */
class Spot {

    public $id;
    public $title;
    public $x, $y;
    public $tooltip_content;


    public function __construct($title, $content = '')
    {
        $this->id = uniqid("spot-");
        $this->title = $title;
        $this->x = 5;
        $this->y = 5;
        $this->tooltip_content = $this->tooltipContent($content);
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