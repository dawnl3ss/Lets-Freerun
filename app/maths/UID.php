<?php

class UID {

    /** @var int $content */
    public $content;

    public function __construct(int $content = null){
        if (is_null($content)) $this->content = $this->generate_uid();
        else $this->content = $content;
    }

    /**
     * @return int
     */
    private function generate_uid() : int { return  mt_rand(123456, 99999999); }

    /**
     * @return int
     */
    public function get_content() : int { return $this->content; }
}