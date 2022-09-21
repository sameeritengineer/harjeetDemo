@include('branchmanager.layouts.header')
@include('branchmanager.layouts.sidebar')
<!-- Layout container -->
<div class="layout-page">
@include('branchmanager.layouts.navbar')
  <!-- Content wrapper -->
  <div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
      <!-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4> -->
      <div class="row">
        <div class="col-md-12">
          <ul class="nav nav-pills flex-column flex-md-row mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true"><i class="bx bx-user me-1"></i>Basic Information</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="bx bx-bell me-1"></i> Login Information</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false"><i class="bx bx-link-alt me-1"></i> Address</button>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              <div class="card">
                <h5 class="card-header">Branch Details</h5>
                <div class="card-body">
                  <!-- Content wrapper -->
                  <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                      <div class="main-wrapper ">
                        <div class="main-container">
                          @if(!is_null($branch))
                          <div class=" pdc  bx-bg-shadow">
                            <!-- <div class="table-title-main-top"><h3 class="table-title-main">Category Details</h3></div> -->
                            <div class="main-container-inner">
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
                                        <a class="btn btn-primary" href="{{route('editinformation',$item->id)}}"><i class="fa fa-edit"></i></a>
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
                </div>
              </div>
            </dv>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
          </div>
        </div>
      </div>
    </div>
    <!-- / Content -->
  </div>
@include('branchmanager.layouts.footer')