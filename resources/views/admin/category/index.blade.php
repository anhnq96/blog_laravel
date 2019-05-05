@extends('admin.layouts.master')

@push('head')
    <link href="{{ asset('admin/assets/vendor_components/sweetalert/sweetalert.css') }}" rel="stylesheet"
          type="text/css">
@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                List Category
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Category</a></li>
                <li class="breadcrumb-item active">List</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">List Category</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="category-table" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr class="category-row" data-id="{{ $category->id }}">
                                            <td>{{ $category->title }}</td>
                                            <td>{{ $category->description }}</td>
                                            <td>
                                                @if($category->status  === 0)
                                                    <span class="label label-success">Active</span>
                                                @else
                                                    <span class="label label-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td class="text-right">
                                                <a href="{{ route('admin.category.edit', $category->id) }}"
                                                   class="btn btn-default">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <button type="button" class="btn btn-default"
                                                        onclick="showConfirm('{{ $category->id }}');">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <div class="myadmin-alert myadmin-alert-icon myadmin-alert-click myadmin-alert-top alerttop">
        <i class="ti-user"></i>
        <span class="message"></span>

        <a href="#" class="closed">&times;</a>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('admin/assets/vendor_components/sweetalert/sweetalert.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#category-table').DataTable();
        });

        function showNotification() {
            $(".alerttop").fadeIn(350);
            setTimeout(function () {
                $(".alerttop").fadeOut();
            }, 2000);
        }

        function showConfirm(id) {
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false,

            }, function () {
                swal({
                    title: "Deleting...",
                    text: "Please wait for delete this record",
                    showConfirmButton: false,
                    showLoaderOnConfirm: true,
                });
                var token = $("meta[name='csrf-token']").attr("content");
                var base = '{!! route('admin.category.destroy', ':id') !!}';
                url = base.replace(':id', id);
                console.log(url);
                $.ajax({
                    url: url,
                    method: 'DELETE',
                    data: {
                        "_token": token,
                        "id": id
                    },
                    success: function (response) {
                        console.log(response);
                        var notify = $('.myadmin-alert');
                        if (response.status === true) {
                            notify.removeClass('alert-danger');
                            notify.addClass(response.messageClass);
                            notify.find('.message').text(response.message);
                            $('.category-row[data-id="' + id + '"]').remove();
                        } else {
                            notify.removeClass('alert-success');
                            notify.addClass(response.messageClass);
                            notify.find('.message').text(response.message);
                        }
                        showNotification();
                    },
                    complete: function () {
                        swal.close();
                    }
                })
            });
        }
    </script>
@endpush
