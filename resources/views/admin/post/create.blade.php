@extends('admin.layouts.master')
@include ('ckfinder::setup')

@push('head')
    <!-- toast CSS -->
    <link href="{{ asset('admin/assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor_components/select2/dist/css/select2.min.css') }}" rel="stylesheet">
@endpush



@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Create Post
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Post</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xl-9 col-lg-9">
                    <!-- general form elements disabled -->
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form novalidate method="post" action="{{ route('admin.post.store')  }}">
                                @csrf
                                <div class="form-group">
                                    <h5>Title <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" value="{{ old('title') }}" name="title" class="form-control" required data-validation-required-message="This field is required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Content</h5>
                                    <div class="controls">
                                        <textarea id="content-txt" class="textarea w-p100 b-1 p-10" name="content" placeholder="Place some text here" ></textarea>
                                    </div>
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
                <div class="col-xl-3 col-lg-3">
                    <!-- general form elements disabled -->
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control select2 w-p100" multiple="multiple" data-placeholder="Select category">
                                    <option>Alabama</option>
                                    <option>Alaska</option>
                                    <option>California</option>
                                    <option>Delaware</option>
                                    <option>Tennessee</option>
                                    <option>Texas</option>
                                    <option>Washington</option>
                                </select>
                            </div>
                            <hr />
                            <div class="form-group">
                                <label>Tag</label>
                                <select class="form-control select2 w-p100" multiple="multiple" data-placeholder="Select tag">
                                    <option>Alabama</option>
                                    <option>Alaska</option>
                                    <option>California</option>
                                    <option>Delaware</option>
                                    <option>Tennessee</option>
                                    <option>Texas</option>
                                    <option>Washington</option>
                                </select>
                            </div>
                            <hr />
                            <div class="form-group">
                                <label>Thumbnail</label>
                                <div id="ckfinder-widget"></div>
                            </div>
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
    <script src="{{ asset('admin/assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor_plugins/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('ckfinder/ckfinder.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor_components/select2/dist/js/select2.full.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.js') }}"></script>
    <script>

        // CKFinder.config( { connectorPath: '/ckfinder/connector' } );
        var editor = CKEDITOR.replace('content-txt', {
            // Use named CKFinder browser route
            filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',
            // Use named CKFinder connector route
            filebrowserUploadUrl: '{{ route('ckfinder_connector') }}?command=QuickUpload&type=Files'
        });
        CKFinder.setupCKEditor(editor);
        !function(window, document, $) {
            "use strict";
            $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
            // $('.textarea').wysihtml5();
            $('.select2').select2();

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
