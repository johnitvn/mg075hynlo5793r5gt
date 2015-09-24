<?php

namespace backend\components;

/**
 * Description of GoogleClient
 *
 * @author john
 */
class AppDocumentFile {

    public $name;
    public $description;
    public $path;
    public $order;

    public function __construct($path) {
        $this->path = $path;
        $this->init();
    }

    public function init() {
        $basename = basename($this->path);
        $parts = explode("$", str_replace('.md', '', $basename));
        $this->order = intval($parts[0]);
        $this->name = $parts[1];
        $this->description = isset($parts[2]) ? $parts[2] : "";
    }

}
