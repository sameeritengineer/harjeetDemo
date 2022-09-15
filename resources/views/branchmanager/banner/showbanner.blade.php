@include('branchmanager.layouts.header')
@include('branchmanager.layouts.sidebar')
    <!-- Layout container -->
        <div class="layout-page">
        @include('branchmanager.layouts.navbar')

 <!-- Content wrapper -->
 <div class="content-wrapper">
            <!-- Content -->
            
            <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card ">
            <div class="card-header ">
                <div class ="row">
                    <div class="col col-md-12 text-right">
                        <a href="{{route('addbanner')}}" class="btn btn-primary">Add New Banner</a>
                    </div>
                </div>
            </div>
        </div>
<div class="main-wrapper ">
   <div class="main-container">
        <div class=" pdc  bx-bg-shadow">
            <div class="table-title-main-top"><h3 class="table-title-main">Banner</h3></div>
                <div class="main-container-inner">
                    @if(count($banner) > 0)
                        <div class="table-wrapper ">
                            <table class="table table-striped table-bordered datatable" id="user_data_table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>Banner</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($banner as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->title}}</td>
                                            <td><img style="width:100px;height:100px;" src="{{ asset($item->banner_image) }}" /></td>
                                            <td>
                                            <div class="custom-control custom-switch custom-switch-md">
                                                @if($item->status == "on") 
                                                <input id="banner[0608d4f1-d440-11ec-860a-a4f1cb275e65]" class="custom-control-input checkbox_child set_banner_status" value="0608d4f1-d440-11ec-860a-a4f1cb275e65" checked="checked" type="checkbox" name="banner[0608d4f1-d440-11ec-860a-a4f1cb275e65]">
                                                @else
                                                <input id="banner[0608d4f1-d440-11ec-860a-a4f1cb275e65]" class="custom-control-input checkbox_child set_banner_status" value="0608d4f1-d440-11ec-860a-a4f1cb275e65"  type="checkbox" name="banner[0608d4f1-d440-11ec-860a-a4f1cb275e65]">
                                                @endif
                                                <label class="custom-control-label" for="banner[0608d4f1-d440-11ec-860a-a4f1cb275e65]">
                                                </label>
                                            </div>
                                            </td>
                                            <td class="btn-td">
                                            <a href="{{route('edit_banner',$item->id)}}" class=""><i class="fa fa-pencil"></i></a>
                                            <a onclick ="deletedata('{{route('bannerdelete',$item->id)}}');" ><i class="fa fa-trash" style="color:red;" ></i></a>
                                            </td>
                                        </tr>
                                    @endforeach 
                                </tbody>
                            </table>
                        </div>
                    @else
                        <h1>No data found</h1>
                    @endif
                </div>
        </div>
    </div>
</div>
</div>
</div>
@include('branchmanager.layouts.footer')