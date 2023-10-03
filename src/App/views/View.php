<?php 


class View{
    public $folder;
    public $filename;
    public $data;

    public function __construct($folder, $filename, $data) {
        $this->folder = $folder;
        $this->filename = $filename;
        $this->data = $data;
    }

    public function render() {
        require_once __DIR__ . './../components/'.$this->folder.'/'.$this->filename.'.php';
    }
}