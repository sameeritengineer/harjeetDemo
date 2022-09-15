<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {

        
      $category_type =  \App\Category::where('parent_id','0')->where('type','0')->get();
      return view('superadmin/category/addcategory',compact('category_type'));
    }



    public function store(Request $req)
    {
        
      
        $category = new \App\Category;
        if ($req->has('image'))
        {

            $image = $req->file('image');
            $img_ext = $image->getClientOriginalName();
            $filename = 'category-image-' . time() . '.' . $img_ext;
            $path = $req->file('image')->move(public_path(),$filename);
            $category->image = $filename;
             }
           if(!is_null($req->category_type))
           {
            $category->parent_id = $req->category_type;
           }
          else
          {
            $category->parent_id;
          }
         $category->category_name = $req->categoryName;
         $category->description = $req->description;
         $category->status = $req->a;
         $category->type = 0;


         $category->save();
        


        if ( $category->save()) {
            return redirect()->route('admin.view_category')->with(['alert' => 'success', 'message' => 'category Added successfully!.']);
        } else {
            return redirect()->route('admin.view_category')->with(['alert' => 'danger', 'message' => 'Something Went Wrong!.']);
        }
    }

    public function show(Request $request)
    {

        $category = \App\Category::where('type','0')->get();
        foreach($category as $item)
        {
            if($item->parent_id == 0)
            {
                $item->category_type = "-";
            }

            else
            {
                $data = \App\Category::find($item->parent_id);
                $item->category_type = $data->category_name;
            }
        }
        return view('superadmin/category/viewcategory',compact('category'));
    }

    
    public function deldata($id)
    {
        $category = \App\Category::find($id);
        
        if($category->parent_id == "0")
        {
            $data = \App\Category::where('parent_id',$id)->get();   
            foreach ($data as $item) {
                $item->delete();
            }
        }
        $category->delete();
        return redirect()->route('admin.view_category')->with('status', 'Record has been deleted');
    }


    public function addbranchcategory()
    {
        $category= \App\Category::where('parent_id','0')->where('type','1')->get();
        return view('branchmanager/category/addcategory',compact('category'));
    }


    public function storebranchcategory(Request $req)
    {
        $category = new \App\Category;
        if ($req->has('image'))
        {

            $image = $req->file('image');
            $img_ext = $image->getClientOriginalName();
            $filename = 'category-image-' . time() . '.' . $img_ext;
            $path = $req->file('image')->move(public_path(),$filename);
            $category->image = $filename;
             }
           if(!is_null($req->category_type))
           {
            $category->parent_id = $req->category_type;
           }
          else
          {
            $category->parent_id;
          }
         $category->category_name = $req->categoryName;
         $category->description = $req->description;
         $category->status = $req->a;
         $category->type = 1;

        
        if ( $category->save()) {
            return redirect()->route('showbranchcategory')->with(['alert' => 'success', 'message' => 'category Added successfully!.']);
        } else {
            return redirect()->route('showbranchcategory')->with(['alert' => 'danger', 'message' => 'Something Went Wrong!.']);
        }
    }

    public function showbranchcategory(Request $request)
    {

        $category = \App\Category::where('type','1')->orWhere('type','2')->get();
        foreach($category as $item)
        {
            if($item->parent_id == 0)
            {
                $item->category_type = "-";
            }

            else
            {
                $data = \App\Category::find($item->parent_id);
                $item->category_type = $data->category_name;
            }
        }
        return view('branchmanager/category/viewcategory',compact('category'));
    }


    public function showsuperadmincategories(Request $request)
    {

        $category = \App\Category::where('type','0')->orWhere('type','2')->get();
        foreach($category as $item)
        {
            if($item->parent_id == 0)
            {
                $item->category_type = "-";
            }

            else
            {
                $data = \App\Category::find($item->parent_id);
                $item->category_type = $data->category_name;
            }
        }
        return view('branchmanager/category/superadmincategory',compact('category'));
    }

    public function addtomycategories($id)
    {

        $category = \App\Category::find($id);

        if($category->type == "0")
        {
            $category->type =2;
            $category->save();
        }
        return redirect()->route('showsuperadmincategories');

    
        


    

       


    }




}
