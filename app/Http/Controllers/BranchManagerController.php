<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class BranchManagerController extends Controller
{
    public function index()
    {
        return view('branchManager/dashboard');
    }


    public function information()
    {
        $id = Auth::user()->id;

         $branch =  \App\Branch::where('user_id', $id)->get(); 
        return view('branchManager/information/information',compact('branch'));

    }


    
    public function editinformation($id)
    {
         $branch = \App\Branch::find($id);
        return view('branchManager/information/editinformation',compact('branch'));
    }
    

    public function updateinformation(Request $request,$id)
    {

        $user =  \App\User::find($id);
        $user->name = $request->branchName;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->password = \Hash::make($request->password);
        $user->save();

        $branch =  \App\Branch::where('user_id',$user->id)->first();
        if ($request->has('image'))
        {
            $image = $request->file('image');
            $img_ext = $image->getClientOriginalName();
            $filename = 'branch-image-' . time() . '.' . $img_ext;
            $path = $request->file('image')->move(public_path(),$filename);
            $branch->image = $filename;
        }
        $branch->telephone = $request->phoneNumber;
        $branch->address = $request->address;
        $branch->state = $request->state;
        $branch->postcode = $request->zipCode;
        $branch->country = $request->country;
        if ( $branch->save()) {
            return redirect()->route('information')->with(['alert' => 'success', 'message' => 'Data Updated successfully!.']);
        } else {
            return redirect()->route('information')->with(['alert' => 'danger', 'message' => 'Something Went Wrong!.']);
        }
    }








}


