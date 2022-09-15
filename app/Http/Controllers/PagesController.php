<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index()
    {

        $pages = \App\Pages::get();
        return view('branchmanager/pages/showpages',compact('pages'));
    }


    public function pages(){

        $type = 1;
        return view('branchmanager/pages/addpages',compact('type'));


    }


    public function storepages(Request $req)
    {
        
        $pages = new \App\Pages;
        $pages->title = $req->title;
        $pages->slug = $req->slug;
        
        $pages->description = $req->description;
        $pages->content = $req->content;
        $pages->publish = $req->publish;
        if ( $pages->save()) {

            return redirect()->route('showpages')->with(['alert' => 'success', 'message' => 'Pages Added successfully!.']);
        } else {
            return redirect()->route('showpages')->with(['alert' => 'danger', 'message' => 'Something Went Wrong!.']);
        }
    }


    public function edit($id)
    {
        //
        $pages = \App\Pages::find($id);
        $type = 2;
        return view('branchmanager/pages/addpages',compact('pages','type'));
    }


    public function updatepages(Request $req,$id)
    {
        
        $pages = \App\Pages::find($id);
        $pages->title = $req->title;
        $pages->slug = $req->slug;
        
        $pages->description = $req->description;
        $pages->content = $req->content;
        $pages->publish = $req->publish;
        if ( $pages->save()) {

            return redirect()->route('showpages')->with(['alert' => 'success', 'message' => 'Pages Added successfully!.']);
        } else {
            return redirect()->route('showpages')->with(['alert' => 'danger', 'message' => 'Something Went Wrong!.']);
        }
    }

    public function delete($id)
    {
        $pages = \App\Pages::find($id);
        $pages->delete();
        return redirect()->route('showpages')->with('status', 'record has been deleted');
    }







}
