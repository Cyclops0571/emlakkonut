<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Model
{
    protected $fillable = ['id', 'KullaniciID', 'Ad', 'Soyad', 'AdSoyad', 'Unvan', 'KullaniciTur'];
    public $KullaniciID;
    public $Ad;
    public $Soyad;
    public $AdSoyad;
    public $Unvan;
    public $KullaniciTur;
    public $projectList;


    public static function setAttributesFromService($serviceAttributesRaw)
    {
        $serviceAttributes = json_decode($serviceAttributesRaw);
        $user = new self();
        $user->KullaniciID = $serviceAttributes->KullaniciID;
        $user->Ad = $serviceAttributes->Ad;
        $user->Soyad = $serviceAttributes->Soyad;
        $user->AdSoyad = $serviceAttributes->AdSoyad;
        $user->Unvan = $serviceAttributes->Unvan;
        $user->KullaniciTur = $serviceAttributes->KullaniciTur;
        return $user;
    }



    public function setProjectListFromService()
    {
        $projectUrl = "http://192.168.0.186:94/SunumService.svc/KullaniciProjeGetir/{$this->KullaniciID}";
        $service = ServiceResponse::setAttributesFromService($projectUrl);
        $this->projectList = EstateProject::setAttributesFromService($service->Sonuc);
        return $this->projectList;
    }

    public function setProjectPartsFromService($projectID) {
        //Proje Bağımsız Bölümleri Getir :
        $url = sprintf("http://192.168.0.186:94/SunumService.svc/ProjeBagimsizBolumleriGetir/{$this->KullaniciID}/{$projectID}");
        $service = ServiceResponse::setAttributesFromService($url);
        EstateProjectApartment::setAttributesFromService($service->Sonuc);
    }



}
