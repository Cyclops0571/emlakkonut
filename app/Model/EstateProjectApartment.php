<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Model\EstateProjectApartment
 *
 * @property int $id
 * @property int|null $project_id
 * @property string|null $Il
 * @property string|null $Ilce
 * @property string|null $Ada
 * @property string|null $Parsel
 * @property string|null $BlokNo
 * @property string|null $KapiNo
 * @property string|null $KullanilisSekli
 * @property string|null $BulunduguKat
 * @property string|null $OdaSayisi
 * @property string|null $Yon
 * @property string|null $NetM2
 * @property string|null $AcikNetM2
 * @property string|null $BrutM2
 * @property string|null $Eklenti1Nitelik
 * @property string|null $Eklenti1NetM2
 * @property string|null $Eklenti1BrutM2
 * @property string|null $Eklenti2Nitelik
 * @property string|null $Eklenti2NetM2
 * @property string|null $Eklenti2BrutM2
 * @property string|null $Eklenti3Nitelik
 * @property string|null $Eklenti3NetM2
 * @property string|null $Eklenti3BrutM2
 * @property string|null $Eklenti4Nitelik
 * @property string|null $Eklenti4NetM2
 * @property string|null $Eklenti4BrutM2
 * @property string|null $Eklenti5Nitelik
 * @property string|null $Eklenti5NetM2
 * @property string|null $Eklenti5BrutM2
 * @property string|null $GayrimenkulDurumu
 * @property string|null $SatisDegeri
 * @property string|null $SozlesmeNo
 * @property string|null $MusteriAdi
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EstateProjectApartment whereAcikNetM2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EstateProjectApartment whereAda($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EstateProjectApartment whereBlokNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EstateProjectApartment whereBrutM2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EstateProjectApartment whereBulunduguKat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EstateProjectApartment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EstateProjectApartment whereEklenti1BrutM2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EstateProjectApartment whereEklenti1NetM2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EstateProjectApartment whereEklenti1Nitelik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EstateProjectApartment whereEklenti2BrutM2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EstateProjectApartment whereEklenti2NetM2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EstateProjectApartment whereEklenti2Nitelik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EstateProjectApartment whereEklenti3BrutM2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EstateProjectApartment whereEklenti3NetM2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EstateProjectApartment whereEklenti3Nitelik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EstateProjectApartment whereEklenti4BrutM2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EstateProjectApartment whereEklenti4NetM2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EstateProjectApartment whereEklenti4Nitelik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EstateProjectApartment whereEklenti5BrutM2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EstateProjectApartment whereEklenti5NetM2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EstateProjectApartment whereEklenti5Nitelik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EstateProjectApartment whereGayrimenkulDurumu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EstateProjectApartment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EstateProjectApartment whereIl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EstateProjectApartment whereIlce($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EstateProjectApartment whereKapiNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EstateProjectApartment whereKullanilisSekli($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EstateProjectApartment whereMusteriAdi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EstateProjectApartment whereNetM2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EstateProjectApartment whereOdaSayisi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EstateProjectApartment whereParsel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EstateProjectApartment whereProjeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EstateProjectApartment whereSatisDegeri($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EstateProjectApartment whereSozlesmeNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EstateProjectApartment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EstateProjectApartment whereYon($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EstateProjectApartment whereProjectId($value)
 */
class EstateProjectApartment extends Model {

    protected $table = 'estate_project_apartment';


    public static function setAttributesFromService($projectPartsRaw)
    {
        $projectAll = EstateProject::all();
        $projectParts = json_decode($projectPartsRaw);

        foreach ($projectParts as $projectPart)
        {

            $estateProjectPart = static::where('ProjeID', $projectPart->ProjeID)
                ->where('Ada', $projectPart->Ada)
                ->where('Parsel', $projectPart->Parsel)
                ->where('BlokNo', $projectPart->BlokNo)
                ->where('KapiNo', $projectPart->KapiNo)
                ->first();
            if (!$estateProjectPart)
            {
                $estateProjectPart = new static();

            }

            $project = $projectAll->where('ProjeID', $projectPart->ProjeID)->first();
            $estateProjectPart->project_id = $project->id;
            $estateProjectPart->Il = $projectPart->Il;
            $estateProjectPart->Ilce = $projectPart->Ilce;
            $estateProjectPart->Ada = $projectPart->Ada;
            $estateProjectPart->Parsel = $projectPart->Parsel;
            $estateProjectPart->BlokNo = $projectPart->BlokNo;
            $estateProjectPart->KapiNo = $projectPart->KapiNo;
            $estateProjectPart->KullanilisSekli = $projectPart->KullanilisSekli;
            $estateProjectPart->BulunduguKat = $projectPart->BulunduguKat;
            $estateProjectPart->OdaSayisi = $projectPart->OdaSayisi;
            $estateProjectPart->Yon = $projectPart->Yon;
            $estateProjectPart->NetM2 = $projectPart->NetM2;
            $estateProjectPart->AcikNetM2 = $projectPart->AcikNetM2;
            $estateProjectPart->BrutM2 = $projectPart->BrutM2;
            $estateProjectPart->Eklenti1Nitelik = $projectPart->Eklenti1Nitelik;
            $estateProjectPart->Eklenti1NetM2 = $projectPart->Eklenti1NetM2;
            $estateProjectPart->Eklenti1BrutM2 = $projectPart->Eklenti1BrutM2;
            $estateProjectPart->Eklenti2Nitelik = $projectPart->Eklenti2Nitelik;
            $estateProjectPart->Eklenti2NetM2 = $projectPart->Eklenti2NetM2;
            $estateProjectPart->Eklenti2BrutM2 = $projectPart->Eklenti2BrutM2;
            $estateProjectPart->Eklenti3Nitelik = $projectPart->Eklenti3Nitelik;
            $estateProjectPart->Eklenti3NetM2 = $projectPart->Eklenti3NetM2;
            $estateProjectPart->Eklenti3BrutM2 = $projectPart->Eklenti3BrutM2;
            $estateProjectPart->Eklenti4Nitelik = $projectPart->Eklenti4Nitelik;
            $estateProjectPart->Eklenti4NetM2 = $projectPart->Eklenti4NetM2;
            $estateProjectPart->Eklenti4BrutM2 = $projectPart->Eklenti4BrutM2;
            $estateProjectPart->Eklenti5Nitelik = $projectPart->Eklenti5Nitelik;
            $estateProjectPart->Eklenti5NetM2 = $projectPart->Eklenti5NetM2;
            $estateProjectPart->Eklenti5BrutM2 = $projectPart->Eklenti5BrutM2;
            $estateProjectPart->GayrimenkulDurumu = $projectPart->GayrimenkulDurumu;
            $estateProjectPart->SatisDegeri = $projectPart->SatisDegeri;
            $estateProjectPart->SozlesmeNo = $projectPart->SozlesmeNo;
            $estateProjectPart->MusteriAdi = $projectPart->MusteriAdi;
            $estateProjectPart->save();


        }

    }

    public static function setFloorPhoto($project, $file)
    {
    }

    public function url()
    {
        return 'http://emlakkonut.app/apertment/' . $this->id;
    }

    public function statusColor()
    {
        switch ($this->GayrimenkulDurumu) {
            case 'Satıldı':
                return 'red';
            case 'Uygun':
                return 'green';
            case 'Ön Satış':
                return 'dark yellow';
            default:
                return 'red';
        }
    }
}
