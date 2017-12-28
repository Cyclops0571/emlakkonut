<?php

namespace App\Model;

use App\Scope\ApartmentScope;
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
 * @property int $numbering_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\EstateProjectApartment whereNumberingId($value)
 */
class EstateProjectApartment extends Model
{
    protected $table = 'estate_project_apartment';

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ApartmentScope());
    }

    public static function setAttributesFromService($projectPartsRaw)
    {
        $projectAll = EstateProject::all();
        $projectParts = json_decode($projectPartsRaw);

        foreach ($projectParts as $projectPart) {
            $project = $projectAll->where('ProjeID', $projectPart->ProjeID)->first();
            $estateProjectApartment = static::where('project_id', $project->id)
                ->where('Ada', $projectPart->Ada)
                ->where('Parsel', $projectPart->Parsel)
                ->where('BlokNo', $projectPart->BlokNo)
                ->where('KapiNo', $projectPart->KapiNo)
                ->first();

            if (!$estateProjectApartment) {
                $estateProjectApartment = new static();
            }

            $project = $projectAll->where('ProjeID', $projectPart->ProjeID)->first();
            $estateProjectApartment->project_id = $project->id;
            $estateProjectApartment->Il = $projectPart->Il;
            $estateProjectApartment->Ilce = $projectPart->Ilce;
            $estateProjectApartment->Ada = $projectPart->Ada;
            $estateProjectApartment->Parsel = $projectPart->Parsel;
            $estateProjectApartment->BlokNo = $projectPart->BlokNo;
            $estateProjectApartment->KapiNo = $projectPart->KapiNo;
            $estateProjectApartment->KullanilisSekli = $projectPart->KullanilisSekli;
            $estateProjectApartment->BulunduguKat = $projectPart->BulunduguKat;
            $estateProjectApartment->OdaSayisi = $projectPart->OdaSayisi;
            $estateProjectApartment->Yon = $projectPart->Yon;
            $estateProjectApartment->NetM2 = $projectPart->NetM2;
            $estateProjectApartment->AcikNetM2 = $projectPart->AcikNetM2;
            $estateProjectApartment->BrutM2 = $projectPart->BrutM2;
            $estateProjectApartment->Eklenti1Nitelik = $projectPart->Eklenti1Nitelik;
            $estateProjectApartment->Eklenti1NetM2 = $projectPart->Eklenti1NetM2;
            $estateProjectApartment->Eklenti1BrutM2 = $projectPart->Eklenti1BrutM2;
            $estateProjectApartment->Eklenti2Nitelik = $projectPart->Eklenti2Nitelik;
            $estateProjectApartment->Eklenti2NetM2 = $projectPart->Eklenti2NetM2;
            $estateProjectApartment->Eklenti2BrutM2 = $projectPart->Eklenti2BrutM2;
            $estateProjectApartment->Eklenti3Nitelik = $projectPart->Eklenti3Nitelik;
            $estateProjectApartment->Eklenti3NetM2 = $projectPart->Eklenti3NetM2;
            $estateProjectApartment->Eklenti3BrutM2 = $projectPart->Eklenti3BrutM2;
            $estateProjectApartment->Eklenti4Nitelik = $projectPart->Eklenti4Nitelik;
            $estateProjectApartment->Eklenti4NetM2 = $projectPart->Eklenti4NetM2;
            $estateProjectApartment->Eklenti4BrutM2 = $projectPart->Eklenti4BrutM2;
            $estateProjectApartment->Eklenti5Nitelik = $projectPart->Eklenti5Nitelik;
            $estateProjectApartment->Eklenti5NetM2 = $projectPart->Eklenti5NetM2;
            $estateProjectApartment->Eklenti5BrutM2 = $projectPart->Eklenti5BrutM2;
            $estateProjectApartment->GayrimenkulDurumu = $projectPart->GayrimenkulDurumu;
            $estateProjectApartment->SatisDegeri = $projectPart->SatisDegeri;
            $estateProjectApartment->SozlesmeNo = $projectPart->SozlesmeNo;
            $estateProjectApartment->MusteriAdi = $projectPart->MusteriAdi;
            $estateProjectApartment->save();
        }
    }

    public static function setFloorPhoto($project, $file)
    {
    }

    public function url()
    {
        return Setting::clientUrl('apartment/' . $this->id);
    }

    public function statusColor()
    {
        switch ($this->GayrimenkulDurumu) {
            case 'Satıldı':
                return '#ff0000';
            case 'Uygun':
                return '#018701';
            case 'Ön Satış':
                return '#6d6d6d';
            default:
                return '#ff0000';
        }
    }
}
