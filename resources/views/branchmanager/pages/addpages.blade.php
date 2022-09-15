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
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <i class="nav-item">
                    @if($type == 1)
                      <a class="nav-link active" href="javascript:void(0);">
                        <!-- <i class="bx bx-user me-1"></i> -->
                         Add pages</a>
                         @else
                         <a class="nav-link active" href="javascript:void(0);">
                        <!-- <i class="bx bx-user me-1"></i> -->
                         Update pages</a>
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
                      <form id="formAccountSettings" method="POST" action="{{route('store_pages')}}"  enctype="multipart/form-data" >
                    @else
                    <form id="formAccountSettings" method="POST" action="{{route('update_pages',$pages->id)}}"  enctype="multipart/form-data" >
                    @endif
                      @csrf
                        <div class="row">

                        <div class="mb-3 col-md-12">
                            <label for="title" class="form-label">Title</label>
                            <input class="form-control" type="text" value="<?php echo $type == 2 ? $pages->title : ''; ?>" id="title"  name="title" placeholder="Title" autofocus required/>
                        </div>

                          <div class="mb-3 col-md-12">
                            <label for="Slug" class="form-label">Slug</label>
                            <span class="input-group-text" id="basic-addon3">https://demo.restaurant.com/ 
                            <input  class="form-control slug" value="<?php echo $type == 2 ? $pages->slug : ''; ?>" type="text" id="slug" name="slug" placeholder="Slug" autofocus/>

                            </span>

                          </div>
                          <div class="mb-3 col-md-12">
                            <label for="description" class="form-label">Content</label>
                            @if($type == 1)
                            <textarea class="ckeditor form-control custom-control-lg custom-text  " name="content" required></textarea>
                            @else
                            <textarea class="ckeditor form-control custom-control-lg custom-text  " name="content" required>{{$pages->content}}</textarea>
                            @endif

                          </div>
                          <div class="mb-3 col-md-12">
                            <label for="description" class="form-label">Short Description</label>
                            @if($type == 1)
                            <textarea name="description" class="form-control own-form-control" rows="5" cols="50" placeholder="Description" ></textarea>
                            @else
                            <textarea name="description" class="form-control own-form-control" rows="5" cols="50" placeholder="Description" >{{$pages->description}}</textarea>
                            @endif

                          </div>
                        <div class="mb-3 col-md-12">
                            <label for="publish" class="form-label">Publish</label>
                            <select id="publish" class="select2 form-select" name="publish">
                            @if($type == 1)
                            <option value="Draft">Draft</option>
                            <option value="Pending for review">Pending for review </option>
                            <option value="Publish">Publish </option>
                            @else
                            <option value="Draft" selected>Draft</option>
                            <option value="Pending for review" selected>Pending for review </option>
                            <option value="Publish" selected>Publish </option>
                            @endif
                            </select>
                          </div>
                          <!-- <div class="mb-3 col-md-6">
                            <label for="status" class="form-label">Status</label><br>
                            <input type="radio" name="a" value="active" >Active
                            <input type="radio" name="a" value="inactive">Inactive
                          </div> -->

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