<?php

namespace App;

use App\Model\EstateProject;
use App\Model\EstateProjectApartment;
use App\Model\ServiceResponse;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Query\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $KullaniciID
 * @property string $Ad
 * @property string $Soyad
 * @property string $AdSoyad
 * @property string $Unvan
 * @property string $KullaniciTur
 * @method static \Illuminate\Database\Query\Builder|\App\User whereAd($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereAdSoyad($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereKullaniciID($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereKullaniciTur($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereSoyad($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereUnvan($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\EstateProject[] $estateProject
 */
class User extends Authenticatable
{

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'KullaniciID',
        'Ad',
        'Soyad',
        'AdSoyad',
        'Unvan',
        'KullaniciTur',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];


    public static function setAttributesFromService($serviceAttributesRaw, $username = "")
    {
        $serviceAttributes = json_decode($serviceAttributesRaw);
        $user = User::where('KullaniciID', $serviceAttributes->KullaniciID)->first();

        if (!$user) {
            $user = new self();
        }

        $user->KullaniciID = $serviceAttributes->KullaniciID;
        $user->Ad = $serviceAttributes->Ad;
        $user->Soyad = $serviceAttributes->Soyad;
        $user->AdSoyad = $serviceAttributes->AdSoyad;
        $user->Unvan = $serviceAttributes->Unvan;
        $user->KullaniciTur = $serviceAttributes->KullaniciTur;

        if (!empty($username)) {
            $user->name = $username;
            $user->save();
        }

        return $user;
    }


    public function setProjectListFromService()
    {
        $projectUrl = "http://192.168.0.186:94/SunumService.svc/KullaniciProjeGetir/{$this->KullaniciID}";
        $service = ServiceResponse::setAttributesFromService($projectUrl);

        return EstateProject::setAttributesFromService($service->Sonuc);
    }

    public function setProjectPartsFromService($projectID)
    {
        $url = sprintf("http://192.168.0.186:94/SunumService.svc/ProjeBagimsizBolumleriGetir/{$this->KullaniciID}/{$projectID}");
        $service = ServiceResponse::setAttributesFromService($url);
        EstateProjectApartment::setAttributesFromService($service->Sonuc);
    }

    public function estateProject()
    {
        return $this->belongsToMany(EstateProject::class, 'user_estate_project', 'user_id', 'project_id');
    }
}
