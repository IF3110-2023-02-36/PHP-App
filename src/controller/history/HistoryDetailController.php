<?php

require_once __DIR__ . '/../../rest/Rest.php';
class HistoryDetailController extends Controller{
    public function index($id = 0) {
        Rest::setEndpoint('history/detail/'.$id);
        Rest::setOption('GET', null);

        $detail = Rest::call();


        Rest::setEndpoint('history/history/'.$id);
        Rest::setOption('GET', null);

        $history = Rest::call();
        

        $detail = json_decode($detail, true);
        $history = json_decode($history, true);
        
        Rest::setEndpoint('user/user-details/id/'.$history['user_id']);
        Rest::setOption('GET', null);

        $kurir = Rest::call();
        // var_dump($kurir);

        $kurir = json_decode($kurir, true);
        $data =[
            'history' => $history,
            'details' => $detail,
            'kurir'=> $kurir
        ];

        $this->render($data);
    }

    public function post(){
        $id = $_POST['idPesanan'];
        $rating = $_POST['rating'];

        Rest::setEndpoint('history/rating/'.$id);

        $data = [
            'rating' => intval($rating)   
        ];

        Rest::setOption('PUT', $data);

        $result = json_decode(Rest::call(), true);

        if($result == "success"){
            header("Location: /History");
        }else{
            echo $result;
        }

    }
}