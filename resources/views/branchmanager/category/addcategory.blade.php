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
                    <li class="nav-item">
                      <a class="nav-link active" href="javascript:void(0);">
                        <!-- <i class="bx bx-user me-1"></i> -->
                         Add Category</a>
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
                      <form id="formAccountSettings" method="POST" action="{{route('storebranchcategory')}}"  enctype="multipart/form-data" >
                      @csrf
                        <div class="row">

                        <div class="mb-3 col-md-6">
                            <label for="category" class="form-label">Category</label>
                            <select id="category" class="select2 form-select" name="category_type">
                            <option value="">Select category</option>
                              @foreach($category as $list)
                              <option value="{{$list->id}}">{{$list->category_name}}</option>
                              @endforeach
                            </select>
                          </div>

                          <div class="mb-3 col-md-6">
                            <label for="categoryName" class="form-label">Category Name</label>
                            <input
                              class="form-control"
                              type="text"
                              id="categoryName"
                              name="categoryName"
                              placeholder="Enter Category Name"
                              autofocus
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="form-control own-form-control" rows="5" cols="50" placeholder="Description" ></textarea>
                          </div>

                          <div class="mb-3 col-md-6">
                            <label for="status" class="form-label">Status</label><br>
                            <input type="radio" name="a" value="active" >Active
                            <input type="radio" name="a" value="inactive">Inactive
                          </div>

                        </div>

                        <div class="card-body">
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
                    </div>
                        <div class="mt-2">
                          <button type="submit" class="btn btn-primary me-2">Save</button>
                          <button type="reset" class="btn btn-outline-secondary">Cancel</button>
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