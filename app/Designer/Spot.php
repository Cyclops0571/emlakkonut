<?php


namespace App\Designer;


class Spot {
    public $id;
    public $title;
    public $x, $y;
    public $tooltip_content;


    public function __construct($title, $text = '')
    {
        $this->id = isset($data['id']) ? $data['id'] : "spot-" . rand();
        $this->title = $title;
        $this->x = 5;
        $this->y = 5;
        $this->tooltip_content = $this->tooltipContent($text);
    }

    private function tooltipContent($text = '')
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