@extends('layouts.app')

{{-- set title --}}
@section('title', 'Transaction')

@section('content')

<!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">

            {{-- error --}}
            @if ($errors->any())
                <div class="alert bg-danger alert-dismissible mb-2" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- breadcumb --}}
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Sales Order</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('backsite.dashboard.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Sales Order</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            {{-- add card --}}
            <div class="content-body">
                <section id="add-home">
                    <div class="row">
                        <div class="col-12">

                            <div class="card">
                                <div class="card-header bg-success text-white">
                                    <a data-action="collapse">
                                        <h4 class="card-title text-white">Add Data</h4>
                                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                        <div class="heading-elements">
                                            <ul class="list-inline mb-0">
                                                <li><a data-action="collapse"><i class="ft-plus"></i></a></li>
                                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>

                                <div class="card-content collapse hide">
                                    <div class="card-body card-dashboard">

                                        <form class="form form-horizontal" action="{{ route('backsite.sales-order.store') }}" method="POST" enctype="multipart/form-data">

                                            @csrf

                                            <div class="form-body">
                                                <div class="form-section">
                                                    <p>Please complete the input <code>required</code>, before you click the submit button.</p>
                                                </div>

                                                <div class="form-group row {{ $errors->has('user_id') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 label-control">Nama <code style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="user_id"
                                                                id="user_id"
                                                                class="form-control select2" required>
                                                                <option value="{{ '' }}" disabled selected>Choose</option>
                                                            @foreach($user as $key => $user_item)
                                                                <option value="{{ $user_item->id }}">{{ $user_item->name }}</option>
                                                            @endforeach
                                                        </select>

                                                        @if($errors->has('user_id'))
                                                            <p style="font-style: bold; color: red;">{{ $errors->first('user_id') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row {{ $errors->has('product_id') ? 'has-error' : '' }}">
                                                    <label class="col-md-3 label-control">Product <code style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="product_id"
                                                                id="product_id"
                                                                class="form-control select2" required>
                                                                <option value="{{ '' }}" disabled selected>Choose</option>
                                                            @foreach($product as $key => $product_item)
                                                                <option value="{{ $product_item->id }}">{{ $product_item->name }}</option>
                                                            @endforeach
                                                        </select>

                                                        @if($errors->has('product_id'))
                                                            <p style="font-style: bold; color: red;">{{ $errors->first('product_id') }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="jumlah_barang">Jumlah <code style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="jumlah_barang" name="jumlah_barang" class="form-control" placeholder="example 10" value="{{old('jumlah_barang')}}" autocomplete="off" required>

                                                        @if($errors->has('jumlah_barang'))
                                                            <p style="font-style: bold; color: red;">{{ $errors->first('jumlah_barang') }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <div class="form-actions text-right">
                                                <button type="submit" style="width:120px;" class="btn btn-cyan" onclick="return confirm('Are you sure want to save this data ?')">
                                                    <i class="la la-check-square-o"></i> Submit
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
            </div>

            {{-- table card --}}
            <div class="content-body">
                <section id="table-home">
                    <!-- Zero configuration table -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Transaction List</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <!-- <li><a data-action="close"><i class="ft-x"></i></a></li> -->
                                        </ul>
                                    </div>
                                </div>

                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">

                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered text-inputs-searching default-table">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Customer</th>
                                                        <th>Product</th>
                                                        <th>Harga Satuan</th>
                                                        <th>Jumlah</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($sales_order as $key => $sales_order_item)
                                                        <tr data-entry-id="{{ $sales_order_item->id }}">
                                                            <td>{{ isset($sales_order_item->created_at) ? date("d/m/Y H:i:s",strtotime($sales_order_item->created_at)) : '' }}</td>
                                                            <td>{{ $sales_order_item->user->name ?? '' }}</td>
                                                            <td>{{ $sales_order_item->product->name ?? '' }}</td>
                                                            <td>{{ 'Rp '.number_format($sales_order_item->product->price) ?? '' }}</td>
                                                            <td>{{ $sales_order_item->jumlah_barang ?? '' }}</td>
                                                            <td>{{ 'Rp '.number_format($sales_order_item->total) ?? '' }}</td>
                                                        </tr>
                                                    @empty
                                                        {{-- not found --}}
                                                    @endforelse
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Customer</th>
                                                        <th>Product</th>
                                                        <th>Harga Satuan</th>
                                                        <th>Jumlah</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    </div>
<!-- END: Content-->

@endsection

@push('after-script')
    <script>
        $('.default-table').DataTable( {
            "order": [],
            "paging": true,
            "lengthMenu": [ [5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"] ],
            "pageLength": 10
        });
    </script>
@endpush