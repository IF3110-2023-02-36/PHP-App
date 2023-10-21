<?php 


class View{
    public $folder;
    public $filename;
    public $data;
    public $userRole;

    public function __construct($folder, $filename, $data) {
        require_once __DIR__ . "../../controller/function/getUserRole.php";

        $this->folder = $folder;
        $this->filename = $filename;
        $this->data = $data;
        $this->userRole = getUserRole();
    }

    public function render() {
        require_once __DIR__ . './../components/'.$this->folder.'/'.$this->filename.'.php';
    }
}