@extends('layouts')

@section('content')

<!-- Scroll - horizontal and vertical table -->
{{-- <h5><b>Store</b></h5> <br /> --}}
<section id="horizontal-vertical">
    <div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-header">
                <div class="card-text">  
                        <div class="row">
                        <div class="col-sm-4">  
                            {{-- <h4 class="card-title">List</h4> --}}
                            <a href="{{ route('excel.index', 'SellingReportExport') }}">
                                <button class="btn btn-success float-left" class="btn btn-primary" >
                                 &nbsp;&nbsp;Excel &nbsp;&nbsp;
                                <i class="bx bxs-download" style="vertical-align: initial;"></i>
                             </button>
                            </a>
                            </div> 
                            <div class="col-sm-8">
                                {{-- <div style="display: flex; justify-content: space-between;flex-wrap: wrap;">
                                    <div class="form-label-group">
                                        <input type="date" id="first-name-floating" class="form-control" placeholder="First Name"
                                          name="fname-floating">
                                        <label for="first-name-floating">From date</label>
                                      </div>
                                      <div class="form-label-group">
                                        <input type="date" id="email-id-floating" class="form-control" name="email-id-floating"
                                          placeholder="Email">
                                        <label for="email-id-floating">To date</label>
                                      </div>
                                      <div class="form-label-group">
                                        <a href="" class="btn btn-primary float-right" class="btn btn-primary">Filter</a>
                                      </div>
                                      <div class="form-label-group">
                                        <a href="" class="btn btn-secondary float-right" class="btn btn-primary">Cancel</a>
                                      </div>
                                    
                                   
                                </div> --}}
                            </div>
                            
                        </div>
                        </div>   
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card border text-center my-1">
                                    <div class="card-body p-1">
                                    <p class="text-muted">Total Orders Delivered <br> <b>{{$total_orders_delivered}}</b></p>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card border text-center my-1">
                                    <div class="card-body p-1">
                                    <p class="text-muted">Total Earnings <br> <b>{{$total_earnings}}</b></p>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card border text-center my-1">
                                    <div class="card-body p-1">
                                    <p class="text-muted">Total Orders Unassigned <br> <b>{{$total_orders_unassigned}}</b></p>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card border text-center my-1">
                                    <div class="card-body p-1">
                                    <p class="text-muted">Total Customers <br> <b>{{$total_customers}}</b></p>
                                    </div>
                                  </div>
                            </div>
                        </div>
                </div><hr>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        
                        <div class="table-responsive">
                            <table class="table zero-configuration " style="width:100%;">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="master"></th>
                                        <th>S.No</th>
                                        <th>Seller name</th>
                                        <th>Product name</th>
                                        <th>Order Status</th>
                                        <th>Unit</th>
                                        <th>Qty (sell)</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @if(isset($orders) && !empty($orders))
                                            @foreach ($orders as $k => $item)
                                            <tr>
                                                <td><input type="checkbox" id="master"></td>
                                                <td>{{ $k + 1 }}</td>
                                                <td>{{ $item->seller_name }}</td>
                                                <td>{{ $item->product_name }}</td>
                                                <td>{{ $item->order_delivery_status_name }}</td>
                                                <td>{{ $item->product_weight_display }}</td>
                                                <td>{{ $item->product_qty }}</td>
                                                <td>{{ $item->product_qty * $item->product_price }}</td>
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


  @push('scripts')

  
  
  @endpush

@endsection