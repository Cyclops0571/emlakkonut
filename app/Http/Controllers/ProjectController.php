<?php

namespace App\Http\Controllers;

use App\Model\EstateProject;
use App\Model\ProjectVideosUrl;
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
        if(\Session::get('projectID')) {
            $project = EstateProject::getCurrentProjectFromSession();
        } else {
            $project = EstateProject::first();
        }


//        $projects = \Auth::user()->estateProject;
        $projects = EstateProject::orderBy('ProjeAdi')->get();
        return view('projects', compact('projects', 'project'));
    }

    public function toggleStatus(EstateProject $project) {
        $project->status = ($project->status + 1) % 2;
        $project->save();
        return \Redirect::back();
    }

    public function uploadFiles(Request $request, EstateProject $project){
        $folder = $request->folder;
        if (Input::hasFile($folder))
        {
            $files = Input::file($folder);

            $path = $project->photoDirectory() . $folder . "/";
            $path = $path . $project->id;
            \File::makeDirectory($path, $mode = 0777, true, true);

            foreach($files as $file) {
                
                $name = str_replace(".tmp","", $file->getFilename());
                $name = str_replace("php","", $name);
                $name = $name . '.' . $file->getClientOriginalExtension();
                $file->move($path, $name);

            }
        }

        return redirect()->route('postures', $project->id)->with('success', 'Docs Kaydedildi');
    }

    public function addVideosUrl(Request $request, EstateProject $project){
        $url1 = $request->url1;
        $url2 = $request->url2;
        $url3 = $request->url3;
        $url4 = $request->url4;

        $allUrls = ProjectVideosUrl::where('project_id', $project->id)->get();

        foreach($allUrls as $url){
            $url->delete();
        }

        ProjectVideosUrl::create([
            'project_id' => $project->id,
            'url' => $url1,
        ]);

        ProjectVideosUrl::create([
            'project_id' => $project->id,
            'url' => $url2,
        ]);

        ProjectVideosUrl::create([
            'project_id' => $project->id,
            'url' => $url3,
        ]);

        ProjectVideosUrl::create([
            'project_id' => $project->id,
            'url' => $url4,
        ]);

        return redirect()->route('postures', $project->id)->with('success', 'Video Ekle Kaydedildi');
    }
}
