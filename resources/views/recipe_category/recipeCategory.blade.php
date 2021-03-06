@extends('layouts')

@section('content')
    

    <!-- Scroll - horizontal and vertical table -->
{{-- <h5><b>Event Master</b></h5> <br /> --}}
<section id="horizontal-vertical">
    <div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-header">
                <p class="card-text">  
                        <div class="row">
                        <div class="col-sm-6">  <h4 class="card-title">List</h4>
                            </div> 
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#eventMasterCreate" class="btn btn-primary">Create Recipe Category</button>
                            </div>
                            
                        </div></p>   
                </div><hr>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        
                        <div class="table-responsive">
                            <table class="table zero-configuration " style="width:100%;">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="master"></th>
                                        <th>S.No</th>
                                        <th>Category name</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @if(isset($recipe_category) && !empty($recipe_category))
                                            @foreach ($recipe_category as $k => $item)
                                            <tr>
                                                <td><input type="checkbox" id="master"></td>
                                                <td>{{ $k + 1 }}</td>
                                                <td>{{ $item->category_name }}</td>
                                                <td>
                                                    <div class="custom-control custom-switch custom-switch-glow custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input" {{$item->isactive == 1 ? 'checked' : ''}} value="{{$item->recipe_category_id}}"  onchange="change_status(this.value, 'recipe_category_master', '#recipeCategoryStatusChange{{$item->recipe_category_id}}', 'recipe_category_id', 'isactive');" id="recipeCategoryStatusChange{{$item->recipe_category_id}}">
                                                        <label class="custom-control-label" for="recipeCategoryStatusChange{{$item->recipe_category_id}}">
                                                        </label>
                                                      </div>    
                                                </td>
                                                <td>
                                                    <div  style="display:inline-flex">
                                                    <button class="btn-outline-info mr-1 eventMasterEdit" data-value="{{ $item->recipe_category_id }}, {{ $item->category_name }}, {{ $item->isactive }}"  data-toggle="modal" data-target="#eventMasterEdit"><i class="bx bxs-edit-alt" data-icon="warning-alt"></i></button>
                                                        {{-- <button class="btn-outline-danger"><i class="bx bx-trash-alt"></i></button> --}}
                                                        <form action="{{ route('recipe-category.destroy', $item->recipe_category_id) }}" method="post" 
                                                            onsubmit = "return confirm('Are you sure wanted to delete this {{$item->category_name}} ?')" style="display: inline">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit" class="btn-outline-danger">
                                                            <i class="bx bx-trash-alt"></i>
                                                        </button>
                                                        
                                                        </form>
                                                    </div>
                                                    
                                                </td>
                                             </tr>
                                            @endforeach                                      

                                        @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ Scroll - horizontal and vertical table -->

<!-- // Basic Floating Label Form section start -->
<!-- Button trigger modal -->

  
<!-- Modal -->
  <div class="modal fade" id="eventMasterCreate" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="eventMasterCreate" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="eventMasterCreate">Add Recipe Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('recipe-category.store') }}">
                @csrf
                <div class="form-group">
                  <label for="categoryName">Category Name</label>
                  <input type="text" class="form-control" id="categoryName" name="category_name" aria-describedby="categoryName">
    
                </div>
                <div class="form-group" style="display: flex">
                    <label for="recipeCategoryStatus" class="mr-2">Category Status</label>
                    <div class="custom-control custom-switch custom-switch-glow custom-control-inline">
                        <input type="checkbox" class="custom-control-input" name="isactive" checked id="recipeCategoryStatus">
                        <label class="custom-control-label" for="recipeCategoryStatus"> 
                        </label>
                      </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Create</button>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          
        </div>
      </div>
    </div>
  </div>
<!-- // Basic Floating Label Form section end -->


{{-- Edit Event Name --}}
<div class="modal fade" id="eventMasterEdit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="eventMasterEdit" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="eventMasterEdit">Edit Recipe Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" id="eventEditForm">
                {{ method_field('PUT') }}
                @csrf
                <div class="form-group">
                  <label for="eventNameEdit">Category Name</label>
                  <input type="text" class="form-control" id="eventNameEdit" name="category_name" aria-describedby="eventName">
    
                </div>
                <div class="form-group" style="display: flex">
                    <label for="eventStatus" class="mr-2">Category Status</label>
                    <div class="custom-control custom-switch custom-switch-glow custom-control-inline">
                        <input type="checkbox" class="custom-control-input" id="eventStatusEdit" name="isactive" id="eventStatusEdit">
                        <label class="custom-control-label" for="eventStatusEdit"> 
                        </label>
                      </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Update</button>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          
        </div>
      </div>
    </div>
  </div>


  @push('scripts')

  <script>
      $(document).on('click', '.eventMasterEdit', function(){
            var event = $(this).data('value');
            var event_array = event.split(',');
            
            $('#eventNameEdit').val(event_array[1]);
            if(event_array[2] == 1){
             
                $('#eventStatusEdit').attr('checked', true);
            }
            $('#eventEditForm').attr('action', "{{ url('/recipe-category') }}" + "/" + event_array[0])
            
      });
  </script>

  

      
  @endpush

@endsection