<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function profile()
    {
        $user = auth()->user();
        // return $user;
        return view('auth.profile');
    }
    public function email(Request $request)
    {
        if (password_verify($request->password, auth()->user()->password))  
         {
            $user=User::find(auth()->user()->id);
            $user->email=$request->email;
            if($user->save())
            {
                return redirect()->route('profile')->with('sucess', 'Email sucessfully changed');
            }
            else
            {
                return back()->with('error', 'Email could not be changed please try again');
            }
         }
         else
         {
            // return back()->with('error', 'PAssword Does not match');

           return back()->with('error', 'Email does not matched please try again');
         }
    }
    public function contact(Request $request)
    {
            $user=User::find(auth()->user()->id);
            $user->ph_no=$request->ph_no;
            if($user->save())
            {
                return redirect()->route('profile')->with('sucess', 'Contact sucessfully changed');
            }
            else
            {
                 return back()->with('error', 'Contact Could not changed');
            }
    }
    public function password(Request $request)
    {
        // return $request;
         if (password_verify($request->old_password, auth()->user()->password))  
         {
            $user=User::find(auth()->user()->id);
            if($request->password == $request->confirm_password)
            {
                $user->password=Hash::make($request->password);
                if($user->save())
                {
                    return redirect()->route('profile')->with('sucess', 'sucessfully password changed');
                }
                else
                {
                    return back()->with('error', 'Could not be changed now please try again');
                }
            }
            else
            {
                return back()->with('error', 'New and confirm Password does not match');
            }
         }
         else
         {
            return back()->with('error', 'Old Password Does not matched');
         }
    }
    public function imageUpload(Request $request)
    {
       // $this->validate($request, [
       //        'profile' => 'mimes:jpeg,jpg,png,gif|required|max:15000'
       // ]);
        // return $request;
       $file = $request->file('profile');
            $destinationPath = 'image/';
            $originalFile = $file->getClientOriginalName();
            $filename=strtotime(date('Y-m-d-H:isa')).$originalFile;
            if($file->move($destinationPath, $filename))
              {
                $user=User::find(auth()->user()->id);
                $user->profile=$filename;
                $user->save();
                return redirect()->route('profile')->with('sucess', 'Sucessfully Uploaded');
              }
              else
              {
                return back()->with('error', 'Could not be uploaded please try again');
              }
    }
}
