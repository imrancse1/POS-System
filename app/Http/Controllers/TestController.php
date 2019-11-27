<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Models\HR\PersonalInfo;
use DataTables;
class TestController extends Controller
{
	public $view_page_url;
	public function __construct()
	{
		$this->view_page_url = '';
	}
    public function test()
    {
    	//$users = User::whereIn('status',[0,1])->get();
        
    	return view('test');
    }

    public function anyData()
    {
        return DataTables::of(User::query())
        ->addColumn('intro', 'Hi {{$gender}}!',2)
        ->addColumn('firstname', function($saleReport) {
                    return 'Hi ' . $saleReport->name . '!';
                })
        ->editColumn('created_at', function(User $user) {
                    return $user->created_at->diffForHumans();
                })
           ->editColumn('status', function ($user) {
                $html = '';
                $html .= "<label class='label label-warning'";
                if($user->status == 1){
                    $html .= "style='display:none'";
                }
                $html .= ">Inactive</label>";

                $html .= "<label class='label label-success'";
                if($user->status==0){
                    $html .= "style='display:none'";
                }
                $html .= ">Active<label>";
                return $html;
            })
           ->addColumn('action', function ($saleReport) {
                $html = '<a href="#" class="btn btn-xs btn-primary"> Edit </a>';
                return $html;
            })
           ->rawColumns(['intro','firstname','created_at','status','action'])
            ->make();
    }

    public function employeeSearch()
    {
        return view('hr.employee.search');
    }

   function action(Request $request)
    {
     if($request->ajax())
     {
      $data = PersonalInfo::search($request->get('full_text_search_query'))->get();

      return response()->json($data);
     }
    }


} 
