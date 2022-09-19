@include('branchmanager.layouts.header')
@include('branchmanager.layouts.sidebar')
<!-- Layout container -->
<div class="layout-page">
@include('branchmanager.layouts.navbar')
@include('branchmanager.banner.banner_modal')


 <!-- Content wrapper -->
 <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4> -->

              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <i class="nav-item">
                    @if($type == 1)
                      <a class="nav-link active" href="javascript:void(0);">
                        <!-- <i class="bx bx-user me-1"></i> -->
                         Add Banner</a>
                         @else
                         <a class="nav-link active" href="javascript:void(0);">
                        <!-- <i class="bx bx-user me-1"></i> -->
                         Update Banner</a>
                         @endif
                    </li>
                    <li class="nav-item">
                      <!-- <a class="nav-link" href="pages-account-settings-notifications.html"><i class="bx bx-bell me-1"></i> Notifications</a > -->
                    </li>
                    <li class="nav-item">
                      <!-- <a class="nav-link" href="pages-account-settings-connections.html"><i class="bx bx-link-alt me-1"></i> Connections</a> -->
                    </li>
                  </ul>
                  <div class="card mb-4">
                    <!-- <h5 class="card-header">Category Details</h5> -->
                    <!-- Account -->
                    
                    <hr class="my-0" />
                    <div class="card-body">

                    @if($type == 1)
                      <form id="formAccountSettings" method="POST" action="{{route('store_banner')}}"  enctype="multipart/form-data" >
                    @else
                    <form id="formAccountSettings" method="POST" action="{{route('update_banner',$banner->id)}}"  enctype="multipart/form-data" >
                    @endif
                      @csrf
                        <div class="row">

                        <div class="mb-3 col-md-12">
                            <label for="title" class="form-label">Title</label>
                            <input class="form-control" type="text" value="<?php echo $type == 2 ? $banner->title : ''; ?>"  id="title"  name="title" placeholder="Title" autofocus required/>
                        </div><br><br>

                        <div class="mb-3 col-md-12">
                            <label for="upload_image" class="custom-file-label image_label" onclick ="bannermodal();" >Featured Images</label>
                            @if($type == 1)
                            <label for="featured image" class="form-label">Banner Image</label>
                            <input type="file" id="upload" name="image" class="form-control" />
                            @else
                            <label for="featured image" class="form-label">Banner Image</label><br>
                            <img style="width:100px;height:100px;" src="{{ asset($banner->banner_image) }}" alt="">
                            @endif


                        </div>

                        <div class="mb-3 col-md-12">
                            <label for="banner_type" class="form-label">Banner Type</label>
                            <select id="banner_type" class="select2 form-select" name="banner_type">
                            <option value="food" @if($type == 1)selected @endif > Food</option>

                            </select>
                          </div>

                          <div class="mb-3 col-md-12">
                            <label for="item_type" class="form-label">Select Item</label>
                            <select id="item_type" class="select2 form-select" name="item_type">
                            <option value="cheesy eggless meal" @if($type == 1)selected @endif > cheesy eggless meal</option>
                            <option value="Breakfast Rice Bowl Duo" @if($type == 1)selected @endif >Breakfast Rice Bowl Duo</option>
                            <option value="Breakfast Sanswich Bowl Duo" @if($type == 1)selected @endif >Breakfast Sanswich Bowl Duo</option>
                            <option value="cheesy chicken meal" @if($type == 1)selected @endif > cheesy chicken meal</option>
                            </select>
                          </div>

                          <div class="mb-3 col-md-12">
                            <label for="title" class="form-label">Sequence</label>
                            <input class="form-control" type="number" value="<?php echo $type == 2 ? $banner->sequence : ''; ?>"  id="title"  name="sequence" placeholder="sequence" autofocus required/>
                        </div>

                          
                      
                          <!-- <div class="mb-3 col-md-6">
                            <label for="status" class="form-label">Status</label><br>
                            <input type="radio" name="a" value="active" >Active
                            <input type="radio" name="a" value="inactive">Inactive
                          </div> -->

                        </div>

                        <div class="mb-3 col-md-12">
                            <label for="status" class="form-label">status</label>
                                <label class="switch">
                                    <input type="checkbox" name="status" value="on" checked>
                                    <span class="slider round"></span>
                            </label>

                        </div>



                        <!-- <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img
                          src="{{asset('img/elements/12.jpg')}}"
                          alt="branch-avatar"
                          class="d-block rounded"
                          height="100"
                          width="100"
                          id="uploadedAvatar"
                        />
                        <div class="button-wrapper">
                          <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input
                              type="file"
                              id="upload"
                              name="image"
                              class="account-file-input"
                              hidden
                              accept="image/png, image/jpeg"
                            />
                          </label>
                          
                          <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        </div>
                      </div>
                    </div> -->
                        <div class="mt-2">
                          @if($type == 1)
                                <button type="submit" class="btn btn-primary me-2 ">Save</button>
                                @else
                                <button type="submit" class="btn btn-primary me-2">Update</button>
                                @endif
                          <!-- <button type="reset" class="btn btn-outline-secondary">Cancel</button> -->
                        </div>
                      </form>
                    </div>
                    <!-- /Account -->
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->
        </div>
@include('branchmanager.layouts.footer')