<?php


namespace App\Designer;


class HtmlLayout {

    public function __construct($class = 'sq-col-lg-3')
    {
        $this->column_span = new \stdClass();
        $this->column_span->lg = new \stdClass();
        $this->column_span->lg->class = $class;
    }
}