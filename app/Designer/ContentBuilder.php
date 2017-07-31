<?php


namespace App\Designer;


class ContentBuilder {

    public $content_type = "content-builder";
    public $plain_text = "";

    /**
     * ContentBuilder constructor.
     * @param ElementButtonFactory[] $elementFactories
     */
    public function __construct($elementFactories)
    {
        $elements = [];
        foreach ($elementFactories as $elementFactory)
        {
            if (!$elementFactory instanceof ElementButtonFactory)
            {
                continue;
            }
            $elements[] = $elementFactory->create();
        }
        $elem = ['elements' => $elements];

        $this->squares_settings = new \stdClass();
        $container = ['id' => uniqid("sq-container-"), 'settings' => $elem];
        $containers = [];
        array_push($containers, $container);
        $this->squares_settings->containers = $containers;
        return $this;
    }
}