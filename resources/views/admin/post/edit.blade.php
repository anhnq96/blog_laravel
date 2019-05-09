@extends('admin.layouts.master')

@push('head')
    <!-- toast CSS -->
    <link href="{{ asset('admin/assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.css') }}" rel="stylesheet">
@endpush
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit Category
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Category</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xl-6 col-lg-12">
                    <!-- general form elements disabled -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Category</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form novalidate method="post" action="{{ route('admin.category.update', $category->id)  }}">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="form-group">
                                    <h5>Title <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" value="{{ $category->title }}" name="title" class="form-control" required data-validation-required-message="This field is required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Description</h5>
                                    <div class="controls">
                                        <input type="text" value="{{ $category->description }}" name="description" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option value="0" {{ $category->status == 0  ? 'selected' : ''}}>Active</option>
                                        <option value="10" {{ $category->status == 10  ? 'selected' : ''}}>Inactive</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.box-body -->

                    </div>
                    <!-- /.box -->
                </div>

            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <div class="myadmin-alert myadmin-alert-icon myadmin-alert-click {{  session('messageClass') }} myadmin-alert-top alerttop">
        <i class="ti-user"></i>
        {{  session('message') }}
        <a href="#" class="closed">&times;</a>
    </div>
@stop

@push('scripts')
    <script src="{{ asset('admin/js/pages/validation.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.js') }}"></script>
    <script>
        ! function(window, document, $) {
            "use strict";
            $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
        }(window, document, jQuery);


        $(document).ready(function () {
            @if (session('status') === true || session('status') === false)
            $(".alerttop").fadeToggle(350);
            @endif
            $(".myadmin-alert .closed").click(function (event) {
                $(this).parents(".myadmin-alert").fadeToggle(350);
                return false;
            });
        });

    </script>
@endpush
