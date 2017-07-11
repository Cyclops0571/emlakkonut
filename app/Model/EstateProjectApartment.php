<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\EstateProjectApartment
 *
 * @property int $id
 * @property string $ProjeID
 * @property string $ProjeAdi
 * @property string $Il
 * @property string $Ilce
 * @property string $Ada
 * @property string $Parsel
 * @property string $BlokNo
 * @property string $KapiNo
 * @property string $KullanilisSekli
 * @property string $BulunduguKat
 * @property string $OdaSayisi
 * @property string $Yon
 * @property string $NetM2
 * @property string $AcikNetM2
 * @property string $BrutM2
 * @property string $Eklenti1Nitelik
 * @property string $Eklenti1NetM2
 * @property string $Eklenti1BrutM2
 * @property string $Eklenti2Nitelik
 * @property string $Eklenti2NetM2
 * @property string $Eklenti2BrutM2
 * @property string $Eklenti3Nitelik
 * @property string $Eklenti3NetM2
 * @property string $Eklenti3BrutM2
 * @property string $Eklenti4Nitelik
 * @property string $Eklenti4NetM2
 * @property string $Eklenti4BrutM2
 * @property string $Eklenti5Nitelik
 * @property string $Eklenti5NetM2
 * @property string $Eklenti5BrutM2
 * @property string $GayrimenkulDurumu
 * @property string $SatisDegeri
 * @property string $SozlesmeNo
 * @property string $MusteriAdi
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProjectApartment whereAcikNetM2($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProjectApartment whereAda($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProjectApartment whereBlokNo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProjectApartment whereBrutM2($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProjectApartment whereBulunduguKat($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProjectApartment whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProjectApartment whereEklenti1BrutM2($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProjectApartment whereEklenti1NetM2($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProjectApartment whereEklenti1Nitelik($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProjectApartment whereEklenti2BrutM2($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProjectApartment whereEklenti2NetM2($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProjectApartment whereEklenti2Nitelik($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProjectApartment whereEklenti3BrutM2($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProjectApartment whereEklenti3NetM2($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProjectApartment whereEklenti3Nitelik($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProjectApartment whereEklenti4BrutM2($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProjectApartment whereEklenti4NetM2($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProjectApartment whereEklenti4Nitelik($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProjectApartment whereEklenti5BrutM2($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProjectApartment whereEklenti5NetM2($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProjectApartment whereEklenti5Nitelik($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProjectApartment whereGayrimenkulDurumu($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProjectApartment whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProjectApartment whereIl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProjectApartment whereIlce($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProjectApartment whereKapiNo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProjectApartment whereKullanilisSekli($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProjectApartment whereMusteriAdi($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProjectApartment whereNetM2($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProjectApartment whereOdaSayisi($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProjectApartment whereParsel($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProjectApartment whereProjeAdi($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProjectApartment whereProjeID($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProjectApartment whereSatisDegeri($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProjectApartment whereSozlesmeNo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProjectApartment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\EstateProjectApartment whereYon($value)
 * @mixin \Eloquent
 */
class EstateProjectApartment extends Model {

    protected $table = 'estate_project_apartment';


    public static function setAttributesFromService($projectPartsRaw)
    {
        $projectParts = json_decode($projectPartsRaw);

        foreach ($projectParts as $projectPart)
        {

            $estateProjectPart = self::query()->where('ProjeID', $projectPart->ProjeID)
                ->where('Parsel', $projectPart->Parsel)
                ->where('BlokNo', $projectPart->BlokNo)
                ->where('KapiNo', $projectPart->KapiNo)
                ->first();
            if (!$estateProjectPart)
            {
                $estateProjectPart = new self();

            }

            $estateProjectPart->ProjeID = $projectPart->ProjeID;
            $estateProjectPart->ProjeAdi = $projectPart->ProjeAdi;
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
}
