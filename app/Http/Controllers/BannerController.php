<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BannerController extends Controller
{
    //
      public function index(){

        $banner = \App\Banner::get();
        return view('branchmanager/banner/showbanner',compact('banner'));
      }

      public function addbanner(){

        $type = 1;
        return view('branchmanager/banner/addbanner',compact('type'));
      }



      public function storebanner(Request $req)
      {
          //return $req->all();
          $banner = new \App\Banner;

          if ($req->has('image'))
        {

            $image = $req->file('image');
            $img_ext = $image->getClientOriginalName();
            $filename = 'banner-image-' . time() . '.' . $img_ext;
            $path = $req->file('image')->move(public_path(),$filename);
            $banner->banner_image = $filename;
             }
          $banner->title = $req->title;
          $banner->banner_type = $req->banner_type;
          $banner->item_type = $req->item_type;
          $banner->sequence = $req->sequence;
          if(!is_null($req->status)){
            $banner->status = $req->status;
          }else{
            $banner->status = "off";
          }
          if ( $banner->save()) {
  
              return redirect()->route('showbanner')->with(['alert' => 'success', 'message' => 'Banner Added successfully!.']);
          } else {
              return redirect()->route('showbanner')->with(['alert' => 'danger', 'message' => 'Something Went Wrong!.']);
          }
      }
  

      public function edit($id)
      {
          //
          $banner = \App\Banner::find($id);
          $type = 2;
          return view('branchmanager/banner/addbanner',compact('banner','type'));
      }


      public function updatebanner(Request $req,$id)
    {
        
        $banner = \App\Banner::find($id);

        if ($req->has('image'))
        {

            $image = $req->file('image');
            $img_ext = $image->getClientOriginalName();
            $filename = 'banner-image-' . time() . '.' . $img_ext;
            $path = $req->file('image')->move(public_path(),$filename);
            $banner->banner_image = $filename;
             }
          $banner->title = $req->title;
          $banner->banner_type = $req->banner_type;
          $banner->item_type = $req->item_type;
          $banner->sequence = $req->sequence;
          if(!is_null($req->status)){
            $banner->status = $req->status;
          }else{
            $banner->status = "off";
          }


        if ( $banner->save()) {

            return redirect()->route('showbanner')->with(['alert' => 'success', 'message' => 'Banner Updated successfully!.']);
        } else {
            return redirect()->route('showbanner')->with(['alert' => 'danger', 'message' => 'Something Went Wrong!.']);
        }
    }

    public function delete($id)
    {
        $banner = \App\Banner::find($id);
        $banner->delete();
        return redirect()->route('showbanner')->with('status', 'record has been deleted');
    }




}
