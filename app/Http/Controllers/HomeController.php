<?php

namespace App\Http\Controllers;

use App\Model\EstateProject;
use App\Model\ServiceResponse;
use App\Model\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function projects()
    {
        return view('projects');
    }

    public function postures()
    {
        return view('postures');
    }

    public function parcels()
    {
        return view('parcels');
    }

    public function floors()
    {
        return view('floors');
    }

    public function apartments()
    {
        return view('apartments');
    }

    public function location()
    {
        return view('location');
    }

    public function designer()
    {
        return view('designer');
    }

    public function index($view)
    {
        return view($view);
    }




    public function home()
    {
        set_time_limit(0);
        $username = 'm_y';
        $password = '23we';

        $serviceResponse = ServiceResponse::setUserAttributesFromService($username, $password);
        $user = User::setAttributesFromService($serviceResponse->Sonuc);
        $projectList = $user->setProjectListFromService();
        foreach ($projectList as $project) {
            $user->setProjectPartsFromService($project->ProjeID);
        }


    }
}
