<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use PragmaRX\Countries\Package\Countries;


class BranchController extends Controller
{
    //


    public function index()
    {

        return view('superadmin/branch/addbranch');
    }


    public function store(Request $req)
    {
        $user = new \App\User;
        $user->name = $req->branchName;
        $user->role = $req->role;
        $user->email = $req->email;
        $user->password = \Hash::make($req->password);
        $user->save();
        $branch = new \App\Branch;
        if ($req->has('image'))
        {

            $image = $req->file('image');
            $img_ext = $image->getClientOriginalName();
            $filename = 'branch-image-' . time() . '.' . $img_ext;
            $path = $req->file('image')->move(public_path(),$filename);
            $branch->image = $filename;
             }
        $branch->user_id = $user->id;
        $branch->telephone = $req->phoneNumber;
        $branch->address = $req->address;
        $branch->state = $req->state;
        $branch->postcode = $req->zipCode;
        $branch->country = $req->country;
        if ( $branch->save()) {

            return redirect()->route('admin.view_branch')->with(['alert' => 'success', 'message' => 'Branch Added successfully!.']);
        } else {
            return redirect()->route('admin.view_branch')->with(['alert' => 'danger', 'message' => 'Something Went Wrong!.']);
        }
    }



    public function show(Request $request)
    {

     $branch = \App\Branch::get();
     return view('superadmin/branch/viewbranch',compact('branch'));


    }


    public function deldata($id)
    {
        $branch = \App\Branch::find($id);
        $branch->delete();
        return redirect()->route('admin.view_branch')->with('status', 'record has been deleted');
    }





    public function edit($id)
    {
        $branch = \App\Branch::find($id);
        return view('superadmin/branch/editbranch', compact('branch'));
    }
    

    public function update(Request $request,$id)
    {

        $branch = \App\Branch::find($id);
        if ($request->has('image'))
        {

            $image = $request->file('image');
            $img_ext = $image->getClientOriginalName();
            $filename = 'branch-image-' . time() . '.' . $img_ext;
            $path = $request->file('image')->move(public_path(),$filename);
            $branch->image = $filename;
             }
         $branch->branch_name = $request->branchName;
         $branch->role = $request->role;
         $branch->email = $request->email;
         $branch->telephone = $request->phoneNumber;
         $branch->address = $request->address;
         $branch->state = $request->state;
         $branch->postcode = $request->zipCode;
         $branch->country = $request->country;

         $branch->save();
        if ( $branch->save()) {

            return redirect()->route('admin.view_branch')->with(['alert' => 'success', 'message' => 'Branch Added successfully!.']);
        } else {
            return redirect()->route('admin.view_branch')->with(['alert' => 'danger', 'message' => 'Something Went Wrong!.']);
        }


    }


}
