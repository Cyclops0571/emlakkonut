<?php

namespace App\Http\Controllers;

use App\Model\EstateProject;
use App\Model\ProjectVideosUrl;
use App\Model\Project360Url;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Input;

class ProjectController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function projects()
    {
        if (\Session::get('projectID')) {
            $project = EstateProject::getCurrentProjectFromSession();
        } else {
            $project = EstateProject::first();
        }

        //        $projects = \Auth::user()->estateProject;
        $projects = EstateProject::orderBy('ProjeAdi')->get();

        return view('projects', compact('projects', 'project'));
    }

    public function toggleStatus(EstateProject $project)
    {
        $project->status = ($project->status + 1) % 2;
        $project->save();

        return \Redirect::back();
    }

    public function logos(EstateProject $project)
    {
        return view('logos', compact('project'));
    }

    public function uploadLogo(Request $request, EstateProject $project)
    {
        $this->validate($request, ['logo' => 'required|mimes:png|image']);

        $file = $request->file('logo');

        $path = $project->photoDirectory() . 'logos' . "/";
        \File::makeDirectory($path, $mode = 0777, true, true);

        $name = str_replace($file->getFilename(), "", $project->getLogoNameFormat());
        $file->move($path, $name);

        return redirect()->route('logos', $project->id)->with('success', 'Logo Kaydedildi');
    }

    public function uploadFiles(Request $request, EstateProject $project)
    {
        $folder = $request->folder;
        if (Input::hasFile($folder)) {
            $files = Input::file($folder);

            $path = $project->photoDirectory() . $folder . "/";
            $path = $path . $project->id;
            \File::makeDirectory($path, $mode = 0777, true, true);

            foreach ($files as $file) {
                $name = str_replace(".tmp", "", $file->getFilename());
                $name = str_replace("php", "", $name);
                $name = $name . '.' . $file->getClientOriginalExtension();
                $file->move($path, $name);
            }
        }

        return redirect()->route('postures', $project->id)->with('success', 'Docs Kaydedildi');
    }

    public function add360Url(Request $request, EstateProject $project)
    {
        $url1 = $request->url1 ? $request->url1 : '';

        $v360Urls = Project360Url::where('project_id', $project->id)->get();

        foreach ($v360Urls as $url) {
            $url->delete();
        }

        Project360Url::create([
            'project_id' => $project->id,
            'url' => $url1,
        ]);

        return redirect()->route('postures', $project->id)->with('success', '360 Url Kaydedildi');
    }

    public function addVideosUrl(Request $request, EstateProject $project)
    {
        $url1 = $request->url1 ? $request->url1 : '';
        $url1Name = $request->url1Name ? $request->url1Name : '';

        $url2 = $request->url2 ? $request->url2 : '';
        $url2Name = $request->url2Name ? $request->url2Name : '';

        $url3 = $request->url3 ? $request->url3 : '';
        $url3Name = $request->url3Name ? $request->url3Name : '';
        
        $url4 = $request->url4 ? $request->url4 : '';
        $url4Name = $request->url4Name ? $request->url4Name : '';

        $allUrls = ProjectVideosUrl::where('project_id', $project->id)->get();

        foreach ($allUrls as $url) {
            $url->delete();
        }

        ProjectVideosUrl::create([
            'project_id' => $project->id,
            'url' => $url1,
            'name' => $url1Name,
        ]);

        ProjectVideosUrl::create([
            'project_id' => $project->id,
            'url' => $url2,
            'name' => $url2Name,
        ]);

        ProjectVideosUrl::create([
            'project_id' => $project->id,
            'url' => $url3,
            'name' => $url3Name,
        ]);

        ProjectVideosUrl::create([
            'project_id' => $project->id,
            'url' => $url4,
            'name' => $url4Name,
        ]);

        return redirect()->route('postures', $project->id)->with('success', 'Video Ekle Kaydedildi');
    }
}
