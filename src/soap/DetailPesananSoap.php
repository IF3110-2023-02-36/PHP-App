<?php

require_once  __DIR__ . '/BaseSoap.php';
class DetailPesananSoap extends BaseSoap{
    public static SoapClient $client;
    public static string $service;

    public static function setSoapClient($service){
        static::$service = static::$url . $service;
        static::$client = new SoapClient(static::$service . '?wsdl', array(
            'stream_context' => stream_context_create(array(
                'http' => array(
                    'header' => 'apiKey: ' . static::$apiKey
                )
            ))
        ));
    }

    public static function getDetailPesanan(int $idPesanan){
        $result = static::$client->__soapCall('getDetailPesanan', array(
            'getDetailPesanan' => array(
                'arg0' => $idPesanan
            )
        ));

        if(empty((array) $result)){
            return null;
        }

        return $result;
    }
}