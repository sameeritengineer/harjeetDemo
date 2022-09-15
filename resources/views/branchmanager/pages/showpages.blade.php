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
                        <a href="{{route('addpages')}}" class="btn btn-primary">Add New</a>
                        
                    </div>
                </div>
            </div>
        </div>
<div class="main-wrapper ">
   <div class="main-container">
        <div class=" pdc  bx-bg-shadow">
            <div class="table-title-main-top"><h3 class="table-title-main">Pages List</h3></div>
                <div class="main-container-inner">
                    @if(count($pages) > 0)
                        <div class="table-wrapper ">
                            <table class="table table-striped table-bordered datatable" id="user_data_table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pages as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td><span class="titledesign">{{ ucfirst($item->title)}}</span>&nbsp;<span class="publishdesign">{{ucfirst($item->publish)}}</span><br><span class="pagescontentdesign">{!! ucfirst($item->content) !!}</span></td>
                                            <td class="btn-td">
                                            <a href="{{route('edit_pages',$item->id)}}" class="edit"><i class="fa fa-pencil"></i></a>
                                            <a href="" class="delete" onclick ="deletedata('{{route('pagedelete',$item->id)}}');" ><i class="fa fa-trash" ></i></a>
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