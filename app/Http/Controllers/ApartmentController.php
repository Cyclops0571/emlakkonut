<?php

namespace App\Http\Controllers;

use App\Model\EstateProject;
use App\Model\ApartmentVideosUrl;

use App\Model\EstateProjectApartment;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Input;

class ApartmentController extends Controller
{
    public function index(EstateProject $project)
    {
        /** @var EstateProjectApartment[] $apartments */
        $apartments = $project->apartments->sortBy(function ($apartment) {
            return $apartment->BlokNo . '_' . strlen($apartment->KapiNo) . '_' .  $apartment->KapiNo;
        });
        $apartmentsWithImage = [];
        $apartmentsWithoutImage = [];
        foreach ($apartments as $apartment) {
            if ($apartment->photo) {
                $apartmentsWithImage[] = $apartment;
            } else {
                $apartmentsWithoutImage[] = $apartment;
            }
        }

        return view('apartments', compact('project', 'apartmentsWithImage', 'apartmentsWithoutImage'));
    }

    public function show(EstateProjectApartment $apartment)
    {
        $project = $apartment->project;
        $allUrls = ApartmentVideosUrl::where('apartment_id', $apartment->id)->get();
        return view('apartmentDetail', compact('apartment', 'project', 'allUrls'));
    }

    public function uploadFiles(Request $request, EstateProjectApartment $apartment)
    {
        $folder = $request->folder;
        if (Input::hasFile($folder)) {
            $files = Input::file($folder);

            $path = $apartment->photoDirectory() . $folder . "/";
            $path = $path . $apartment->id;
            \File::makeDirectory($path, $mode = 0777, true, true);
            $i=0;
            foreach ($files as $file) {
                $name = $request[$folder][$i++]->getClientOriginalName();
                $file->move($path, $name);
            }
        }

        return redirect()->route('showApartment', $apartment->id)->with('success', 'Docs Kaydedildi');
    }

    public function deleteFile(Request $request, EstateProjectApartment $apartment)
    {
        $folder = $request->folder;
        $deleteFileName = $request->deleteFileName;

        $path = $apartment->photoDirectory() . $folder . "/";
        $path = $path . $apartment->id . '/' . $deleteFileName;


        if(unlink($path))
        {
            return redirect()->route('showApartment', $apartment->id)->with('success', 'File Deleted');
        }

        return redirect()->route('showApartment', $apartment->id)->with('error', 'File Not Deleted');
    }

    // public function add360Url(Request $request, EstateProject $project)
    // {
    //     $url1 = $request->url1 ? $request->url1 : '';

    //     $v360Urls = Project360Url::where('project_id', $project->id)->get();

    //     foreach ($v360Urls as $url) {
    //         $url->delete();
    //     }

    //     Project360Url::create([
    //         'project_id' => $project->id,
    //         'url' => $url1,
    //     ]);

    //     return redirect()->route('postures', $project->id)->with('success', '360 Url Kaydedildi');
    // }

    public function addVideosUrl(Request $request, EstateProjectApartment $apartment)
    {
        $url1 = $request->url1 ? str_replace("watch?v=","embed/", $request->url1) : '';
        if(strpos($url1, "&"))
            $url1 = substr($url1, 0, strpos($url1, "&"));
        $url1Name = $request->url1Name ? $request->url1Name : '';

        $url2 = $request->url2 ? str_replace("watch?v=","embed/", $request->url2) : '';
        if(strpos($url2, "&"))
        $url2 = substr($url2, 0, strpos($url2, "&"));
        $url2Name = $request->url2Name ? $request->url2Name : '';

        $url3 = $request->url3 ? str_replace("watch?v=","embed/", $request->url3) : '';
        if(strpos($url3, "&"))
        $url3 = substr($url3, 0, strpos($url3, "&"));
        $url3Name = $request->url3Name ? $request->url3Name : '';
        
        $url4 = $request->url4 ? str_replace("watch?v=","embed/", $request->url4) : '';
        if(strpos($url4, "&"))
        $url4 = substr($url4, 0, strpos($url4, "&"));
        $url4Name = $request->url4Name ? $request->url4Name : '';

        $allUrls = ApartmentVideosUrl::where('apartment_id', $apartment->id)->get();

        if($allUrls){
            foreach ($allUrls as $url) {
                $url->delete();
            }
        }

        if($url1){
            ApartmentVideosUrl::create([
                'apartment_id' => $apartment->id,
                'url' => $url1,
                'name' => $url1Name,
            ]);
        }

        if($url2){
            ApartmentVideosUrl::create([
                'apartment_id' => $apartment->id,
                'url' => $url2,
                'name' => $url2Name,
            ]);
        }

        if($url3){
            ApartmentVideosUrl::create([
                'apartment_id' => $apartment->id,
                'url' => $url3,
                'name' => $url3Name,
            ]);
        }

        if($url4){
            ApartmentVideosUrl::create([
                'apartment_id' => $apartment->id,
                'url' => $url4,
                'name' => $url4Name,
            ]);
        }
        return redirect()->route('showApartment', $apartment->id)->with('success', 'Video Ekle Kaydedildi');
    }
}
