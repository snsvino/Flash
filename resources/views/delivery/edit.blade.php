@extends('layouts')

@section('content')
    <!-- Scroll - horizontal and vertical table -->
    <h5><b>Delivery Person Edit</b></h5> <br />

    <!-- // Basic Floating Label Form section start -->
    <section id="floating-label-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">General Info</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form method="post" name="deliveryperson_form" id="deliveryperson_form" action="{{ route('deliverypersonedit_submit',$deliveryperson->logistics_id) }}" enctype= multipart/form-data>
                                {{ csrf_field() }}
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                              <label for="first-name-floating">Delivery Person Name</label>
                                                <input type="text" id="deliveryperson_name" class="form-control" placeholder="Delivery Person Name" value="{{$deliveryperson->logistics_name}}"
                                                       name="deliveryperson_name" >
                                                
                                            </div>
                                        </div>
                                        <div class="col-6">
                                          <div class="form-group">
                                              <div class="controls">
                                                <label for="first-name-floating">Mobile</label>
                                                <input type="text" name="dperson_mobile_number" value="{{$deliveryperson->logistics_user_mobile}}"id="dpersonMobileNumber" class="form-control"
                                                  data-validation-containsnumber-regex="^([0-9]+)$"
                                                  data-validation-containsnumber-message="The regex field format is invalid."
                                                  placeholder="Enter Your Mobile Number" required>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                          <div class="form-group">
                                            <div class="controls">
                                              <label for="first-name-floating">Email</label>
                                              <input type="email"value="{{$deliveryperson->logistics_user_email}}" name="dperson_email" id="dperson_email" class="form-control"
                                                data-validation-required-message="Must be a valid email" autocomplete="new_password" placeholder="Email">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                              <label for="first-name-floating">Delivery Person Address</label>
                                            <textarea type="text" id="dperson_address" class="form-control" placeholder="Delivery Person Address"
                                                      name="dperson_address" cols="30" rows="4">{{$deliveryperson->logistics_user_address}}</textarea>
                                                
                                            </div>
                                        </div>

                                        <div class="col-6">
                                          <div class="form-group">
                                           <label for="storePassword">Password</label>
                                           <div class="controls">
                                             <input type="password" name="dperson_password" id="dpersonPassword" class="form-control"
                                               placeholder="Password">
                                           </div>
                                         </div>
                                        </div>
                                        <div class="col-6">
                                          <?php $img = !empty($deliveryperson->logistics_user_image) ? asset(config('constants.product_img_path').$deliveryperson->logistics_user_image) : "http://placehold.it/50x50"; ?>
                                          <div class="d-flex justify-content-around">
                                            <img src="{{ $img }}" class="img-fluid img-thumbnail" alt="#" height="50" width="50">
                                        @if (isset($deliveryperson->logistics_user_image))
                                        <fieldset>
                                            <div class="custom-control custom-checkbox text-center">
                                              <input type="checkbox" class="custom-control-input"  name="remove_2" id="customCheck5">
                                              <br><label class="custom-control-label" for="customCheck5">Remove Image</label> 
                                            </div>
                                          </fieldset>
                                        @endif
                                        </div>
                                        <fieldset>
                                            <label for="storePANImage">Upload Profile Image </label>
                                          <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="dpersonImage">Profile Image</span>
                                            </div>
                                            <div class="custom-file">
                                            <input type="file"  class="custom-file-input" name="dpersonImage" id="dpersonImage" aria-describedby="dpersonImage">
                                              <label class="custom-file-label" for="dpersonImage">{{isset($deliveryperson->logistics_user_image) ? $deliveryperson->logistics_user_image : null}}</label>
                                            </div>
                                          </div>
                                        </fieldset>
                                      </div>
                                    </div>
                                    <h4 class="card-title">Vehicle Info</h4>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                              <label for="first-name-floating">Vehicle Name</label>
                                                <input type="text" id="vehicle_name" class="form-control" placeholder="Vehicle Name"
                                                       name="vehicle_name" value="{{$deliveryperson->logistics_user_vehicle_name}}">
                                                
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                              <label for="first-name-floating">Vechile Number</label>
                                                <input type="text" id="vehicle_number" class="form-control" placeholder="Vechile Number"
                                                       name="vehicle_number" value="{{$deliveryperson->logistics_user_vehicle_number}}">
                                               
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                              <label for="first-name-floating">Licence Number</label>
                                                <input type="text" id="licence_number" class="form-control" placeholder="Licence Number"
                                                       name="licence_number" value="{{$deliveryperson->logistics_driving_licence_number}}">
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="col-6">
                                          <?php $img = !empty($deliveryperson->logistics_driving_licence_number_image) ? asset(config('constants.product_img_path').$deliveryperson->logistics_driving_licence_number_image) : "http://placehold.it/50x50"; ?>
                                          <div class="d-flex justify-content-around">
                                            <img src="{{ $img }}" class="img-fluid img-thumbnail" alt="#" height="50" width="50">
                                        @if (isset($deliveryperson->logistics_driving_licence_number_image))
                                        <fieldset>
                                            <div class="custom-control custom-checkbox text-center">
                                              <input type="checkbox" class="custom-control-input"  name="remove_1" id="customCheck1">
                                              <br><label class="custom-control-label" for="customCheck1">Remove Image</label> 
                                            </div>
                                          </fieldset>
                                        @endif
                                        </div>
                                        <fieldset>
                                            <label for="storePANImage">Upload Licence Image </label>
                                          <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="dlicenceImage">Licence Image</span>
                                            </div>
                                            <div class="custom-file">
                                            <input type="file"  class="custom-file-input" name="dlicenceImage" id="dlicenceImage" aria-describedby="dlicenceImage">
                                              <label class="custom-file-label" for="dlicenceImage">{{isset($deliveryperson->logistics_driving_licence_number_image) ? $deliveryperson->logistics_driving_licence_number_image : null}}</label>
                                            </div>
                                          </div>
                                        </fieldset>
                                      </div>
                                    </div>

                                    <h4 class="card-title">Other Settings</h4>
                                    <div class="row">
                                      <div class="col-6">
                                          <div class="form-group" style="display: flex">
                                              <label for="eventStatus" class="mr-2">Active</label>
                                              <?php $check = $deliveryperson->isactive == 1 ? 'checked' : ''; ?>
                                              <div class="custom-control custom-switch custom-switch-glow custom-control-inline">
                                                  <input type="checkbox" class="custom-control-input" name="is_active" {{$check}} id="is_active">
                                                  <label class="custom-control-label" for="is_active">
                                                  </label>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-6">
                                          <div class="form-group" style="display: flex">
                                              <label for="eventStatus" class="mr-2">Is Approve</label>
                                              <?php $check = $deliveryperson->isapprove == 1 ? 'checked' : ''; ?>
                                              <div class="custom-control custom-switch custom-switch-glow custom-control-inline">
                                                  <input type="checkbox" class="custom-control-input" name="is_approve" {{$check}} id="is_approve">
                                                  <label class="custom-control-label" for="is_approve">
                                                  </label>
                                              </div>
                                          </div>
                                      </div>
                                    </div>

                                    <div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1">Update</button>
                                            <button type="reset" class="btn btn-light-secondary mr-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic Floating Label Form section end -->
@endsection
