<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Auth;
use Session;
class EmployeeController extends Controller
{
    public function insert_emp(Request $req)
    {
    	if($req->isMethod('POST')){
    	$data = new Employee;
    	$data->name = $req->name;
    	$data->mobile = $req->mobile;
    	$data->save();
    	$req->session()->flash('msg',"Data Inserted");
    	return redirect('add-employee'); 
    }
    return view("add-employee");


    }
     public function login(Request $request)
    {
    	if($request->isMethod('post')){
    		$data = $request->all();
    		//echo "<pre>"; print_r($data); die;
    		if(Auth::attempt(['email'=>$data['email'],'password'=>$data['pwd']])){
    		
    			//Check email activated Or not
                // $userStatus = User::where('email',$data['email'])->first();
                // if($userStatus->status == 0){
                //     Auth::logout();
                //     $message = "Your account is not activated yet! Please confirm your email to active!";
                //     Session::flash('error_message',$message);
                //     return redirect()->back();
                // }

    			return redirect('/dashboards');
    		}else{
    			$message = "Invalid Email Or Password";
    			Session::flash('error_message',$message);
    			return redirect()->back();
    		}
    	}
    	return view('login');
    } 

    public function dashboard(){
        $id = Auth::user()->id;
        echo $id;
    	echo "ashfaq bhai ka dashboard";
    }

    // public function login(Request $request){
    //     if($request->isMethod('post')){
    //     $data = $request->all();

    //     // $validateData = $request->validate([
    //     // 'email'=>'required|email',
    //     // 'pwd'=>'required'
    //     // ]);
    //      if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['pwd']])){
    //      return redirect('/admin/dashboard');
    //     }else{
    //         Session::flash('error_message','Invalid email or password');
    //         return redirect()->back();
    //     }
    //     }
    //     return view('login');
    // }

    // public function admin_dashboard(){
    //     echo "ashfaq bhai ka Admin";
    // }


    
   

}
