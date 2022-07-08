<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Teams;
use App\Repositories\ResponseRepository;
use Illuminate\Support\Facades\Log;

class CompanyController extends Controller
{
    public function __construct(ResponseRepository $response)
    {
        $this->response = $response;
        $this->storeRules = [
          'header'=> 'required',
          'content' => 'required',
          'video_header' => 'required',
          'video_url'=> 'required'
      ];
      $this->storeRulesTeams = [
        'company_id'=> 'required',
        'name' => 'required',
        'designation' => 'required'
        ];

    }
    public function getCompany(){
        $data = Company::with('teams')->get();
        return $this->response->jsonResponse(false,"Company Fetched Successfully", $data, 200);
 
     }
     
    public function updateCompany(Request $request)
    {
        $validate = $this->response->validate($request->all(), $this->storeRules);
        if($validate === true) {
          $home = Company::first()->update($request->all());
            return $this->response->jsonResponse(false, $this->response->message('Company', 'update'),'' , 200);
        } else {
            return $this->response->jsonResponse(true, 'Company Update Failed', $validate , 201);
        }
    }

    public function storeTeams(Request $request)
    {
        $validate = $this->response->validate($request->all(), $this->storeRulesTeams);
        if($validate === true) {
            return $this->response->jsonResponse(false, $this->response->message('Teams', 'store'), Teams::create($request->all()), 200);
        } else {
            return $this->response->jsonResponse(true, 'Teams store failed', $validate, 201);
        }
    }

    public function updateTeams(Request $request)
    {
        $validate = $this->response->validate($request->all(), $this->storeRulesTeams);
          if($validate === true) {
            $teams = Teams::where('id',$request->id);
            $teams->update($request->all());
               return $this->response->jsonResponse(false, $this->response->message('Teams', 'update'), '', 200);
          } else {
              return $this->response->jsonResponse(true, 'Teams Update Failed', $validate, 202);
          }
    }

    
    public function getTeamsById($id){
        $data = Teams::where('id', $id)->get();
        return $this->response->jsonResponse(false,"Team Fetched Successfully", $data, 200);
    }
    
    
  public function deleteTeamsById($id)
  {
      $teams = Teams::where('id', $id);
      if($teams->exists()) {

          return $this->response->jsonResponse(false, $this->response->message('Teams', 'destroy'), $teams->delete(), 200);
      }
      return $this->response->jsonResponse(true, 'Teams Not Exists',[], 201);
  }

  
}
