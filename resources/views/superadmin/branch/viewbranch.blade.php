@include('superadmin.layouts.header')
@include('superadmin.layouts.sidemenu')
        <!-- Layout container -->
        <div class="layout-page">
        @include('superadmin.layouts.navbar')

         


 <!-- Content wrapper -->
 <div class="content-wrapper">
            <!-- Content -->
            
            <div class="container-xxl flex-grow-1 container-p-y">
<div class="main-wrapper ">
   <div class="main-container">
        <div class=" pdc  bx-bg-shadow">
            <div class="table-title-main-top"><h3 class="table-title-main">Branch Details</h3></div>
                <div class="main-container-inner">
                    @if(count($branch) > 0)
                        <div class="table-wrapper ">
                            <table class="table table-striped table-bordered datatable" id="user_data_table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Branch Name</th>
                                        <th>Role</th>
                                        <th>Email</th>
                                        <th>Telephone</th>
                                        <th>Address</th>
                                        <th>State</th>
                                        <th>Postcode</th>
                                        <th>Country</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($branch as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->users->name}}</td>
                                            <td>{{$item->users->role}}</td>
                                            <td>{{$item->users->email}}</td>
                                            <td>{{$item->telephone}}</td>
                                            <td>{{$item->address}}</td>
                                            <td>{{$item->state}}</td>
                                            <td>{{$item->postcode}}</td>
                                            <td>{{$item->country}}</td>
                                            <td><img style="width:100px;height:100px;" src="{{ asset($item->image) }}" /></td>
                                            <td class="btn-td">
                                            <a class="btn btn-primary"  href="{{route('admin.edit_branch',$item->id)}}"><i class="fa fa-edit"></i></a>
                                            <a class="btn btn-danger"  onclick ="deletedata('{{route('admin.branchdelete',$item->id)}}');" ><i class="fa fa-trash"></i></a> 

                                            

                                            <!-- <a class="btn btn-success" style=" background-color:#6dafdf" href="">View</a> -->
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

@include('superadmin.layouts.footer')
