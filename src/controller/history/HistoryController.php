<?php

require_once __DIR__ . '/../../rest/Rest.php';
class HistoryController extends Controller{
    public function index() {
        $userId = $_SESSION['user_id'];
        Rest::setEndpoint('history/penerima/'.$userId);
        Rest::setOption('GET', null);

        $History = Rest::call();


        $data = json_decode($History, true);
        // var_dump($data);
        $this->render($data);
    }
}