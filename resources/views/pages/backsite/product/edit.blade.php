@extends('layouts.app')

{{-- set title --}}
@section('title', 'Edit - Product')

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
                    <h3 class="content-header-title mb-0 d-inline-block">Edit Product</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item">Product</li>
                                <li class="breadcrumb-item active">Edit</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            {{-- forms --}}
            <div class="content-body"><!-- Basic form layout section start -->
                <section id="horizontal-form-layouts">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="horz-layout-basic">Form Input</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collpase show">
                                    <div class="card-body">
                                        <div class="card-text">
                                            <p>Please complete the input <code>required</code>, before you click the submit button.</p>
                                        </div>
                                        <form class="form form-horizontal" action="{{ route("backsite.product.update", [$product->id]) }}" method="POST" enctype="multipart/form-data">

                                            @method('PUT')
                                            @csrf

                                            <div class="form-body">
                                                <h4 class="form-section"><i class="fa fa-edit"></i> Form Product</h4>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="name">Name <code style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="name" name="name" class="form-control" placeholder="example Hidrococo or Pocary Sweat" value="{{ old('name', isset($product->name) ? $product->name : '') }}" autocomplete="off" required>

                                                        @if($errors->has('name'))
                                                            <p style="font-style: bold; color: red;">{{ $errors->first('name') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="type">Jenis <code style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="type" name="type" class="form-control" placeholder="example Makanan or Minuman" value="{{ old('type', isset($product->type) ? $product->type : '') }}" autocomplete="off" required>

                                                        @if($errors->has('type'))
                                                            <p style="font-style: bold; color: red;">{{ $errors->first('type') }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="photo">Photo <code style="color:green;">optional</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <div class="custom-file">
                                                            <input type="file" accept="image/png, image/svg, image/jpeg" class="custom-file-input" id="photo" name="photo">
                                                            <label class="custom-file-label" for="photo" aria-describedby="photo">Choose File</label>
                                                        </div>

                                                        <p class="text-muted"><small class="text-danger">Hanya dapat mengunggah 1 file</small><small> dan yang dapat digunakan JPEG, SVG, PNG & Maksimal ukuran file hanya 10 MegaBytes</small></p>

                                                        @if($errors->has('photo'))
                                                            <p style="font-style: bold; color: red;">{{ $errors->first('photo') }}</p>
                                                        @endif

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="qty">Jumlah <code style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="qty" name="qty" class="form-control" placeholder="example Makanan or Minuman" value="{{ old('qty', isset($product->qty) ? $product->qty : '') }}" autocomplete="off" required>

                                                        @if($errors->has('qty'))
                                                            <p style="font-style: bold; color: red;">{{ $errors->first('qty') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="price">Harga <code style="color:red;">required</code></label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" id="price" name="price" class="form-control" placeholder="example price 10000" value="{{ old('price', isset($product->price) ? $product->price : '') }}" autocomplete="off" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': 0, 'prefix': 'Rp ', 'placeholder': '0'" required>

                                                        @if($errors->has('price'))
                                                            <p style="font-style: bold; color: red;">{{ $errors->first('price') }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-actions text-right">
                                                <a href="{{ route('backsite.product.index') }}" style="width:120px;" class="btn bg-blue-grey text-white mr-1" onclick="return confirm('Are you sure want to close this page? , Any changes you make will not be saved.')">
                                                    <i class="ft-x"></i> Cancel
                                                </a>
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

        </div>
    </div>
<!-- END: Content-->

@endsection


@push('after-script')

    {{-- inputmask --}}
    <script src="{{ asset('/assets/backsite/third-party/inputmask/dist/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('/assets/backsite/third-party/inputmask/dist/inputmask.js') }}"></script>
    <script src="{{ asset('/assets/backsite/third-party/inputmask/dist/bindings/inputmask.binding.js') }}"></script>

    <script>
        $(function() {
            $(":input").inputmask();
        });
    </script>

@endpush