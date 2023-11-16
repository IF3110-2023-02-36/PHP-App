<?php

require_once  __DIR__ . '/BaseSoap.php';
class PesananSoap extends BaseSoap{
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

    public static function sendPesanan(int $idPemesan, String $alamat, String $nama_penerima, String $keterangan, String $harga, int $biaya_pengiriman, String $nama_product, String $quantity){
        $result = static::$client->__soapCall('addPesanan', array(
            'addPesanan' => array(
                'arg0' => $idPemesan,
                'arg1' => $alamat,
                'arg2' => $nama_penerima,
                'arg3' => $keterangan,
                'arg4' => $harga,
                'arg5' => $biaya_pengiriman,
                'arg6' => $nama_product,
                'arg7' => $quantity
            )
        ));

        if(empty((array) $result)){
            return null;
        }

        return $result;
    }

    public static function getPesanan($userId){
        $result = static::$client->__soapCall('getPesananByIdUser', array(
            'getPesananByIdUser' => array(
                'arg0' => $userId,
            )
        ));
        
        if(empty((array) $result)){
            return null;
        }

        return $result;
    }

    public static function getPesananByIdPesanan($pesananId){
        $result = static::$client->__soapCall('getPesananByIdPesanan', array(
            'getPesananByIdPesanan' => array(
                'arg0' => $pesananId,
            )
        ));
        
        if(empty((array) $result)){
            return null;
        }

        return $result;
    }
}