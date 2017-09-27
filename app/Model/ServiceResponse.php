<?php

namespace App\Model;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\ServiceResponse
 *
 * @mixin \Eloquent
 */
class ServiceResponse extends Model
{
    public $Durum;
    public $DurumAciklama;
    public $Sonuc;


    /**
     * @param $username
     * @param $password
     * @return ServiceResponse
     */
    public static function getServiceUser($username, $password)
    {
        $userUrl = sprintf('http://192.168.0.186:94/SunumServicePost.svc/KullaniciDogrulama');

        $client = new Client();
        $response = $client->post($userUrl, ['json' => ['kullaniciAdi' => $username, 'kullaniciSifre' => $password]]);

        $responseContent = json_decode($response->getBody()->getContents());

        $serviceResponse = new static();
        $serviceResponse->Durum = $responseContent->Durum;
        $serviceResponse->DurumAciklama = $responseContent->DurumAciklama;
        $serviceResponse->Sonuc = $responseContent->Sonuc;
        return $serviceResponse;
    }


    public static function setAttributesFromService($url)
    {
        $client = new Client();
        $response = $client->get($url);
        $response = json_decode($response->getBody()->getContents());
        $serviceResponse = new static();
        $serviceResponse->Durum = $response->Durum;
        $serviceResponse->DurumAciklama = $response->DurumAciklama;
        $serviceResponse->Sonuc = $response->Sonuc;

        return $serviceResponse;
    }


}
