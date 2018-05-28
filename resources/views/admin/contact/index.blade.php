@extends('admin.layouts.layout-master')
@section('panel-title')
    Contact Management
@stop
@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{route('contact')}}">Contact Book</a></li>
</ol>
@stop
@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">
                            <a href="{{route('contact.create')}}"> <i class="fa fa-plus"></i> Add New</a>
                        </h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>

{{--                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                    </div>--}}
                </div>
                <!-- /.card-header -->

                    <div class="row">

                            <div class="col-12">
                                <!-- /.card-header -->
                                <!-- form start -->
                                @if ($errors->any())

                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h5><i class="icon fa fa-ban"></i> Alert!</h5>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @if (\Session::get('success'))
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h5><i class="icon fa fa-check"></i> Alert!</h5>
                                        <p>{{ \Session::get('success') }}</p>
                                    </div>
                                @endif
                                <div class="card">
                                    {{--<div class="card-header">
                                        <h3 class="card-title">Responsive Hover Table</h3>

                                        <div class="card-tools">
                                            <div class="input-group input-group-sm" style="width: 150px;">
                                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>--}}
                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-striped">
                                            <tr>
                                                <th>ID</th>
                                                <th>Full Name</th>
                                                <th>Address</th>
                                                <th>Mobile</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th></th>
                                                <th>Action</th>
                                            </tr>

                                            @foreach($contacts as $data)
                                                <tr>
                                                    <td>{{$data->id}}</td>
                                                    <td>{{$data->fullname}}</td>
                                                    <td>{{$data->address}}</td>
                                                    <td>{{$data->mobile}}</td>
                                                    <td>{{$data->email}}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-block btn-outline-{{$data->status == '1' ? 'success' : 'secondary'}} btn-sm">{{$data->status == '1' ? ' Active ' : ' Inactive '}}</button>
                                                       </td>

                                                    <td>

                                                        <a href="{{action('Admin\ContactController@edit', $data->id)}}" type="button"  class="btn btn-block btn-info btn-sm "><i class="fa fa-edit"></i> Edit</a></td>
                                                    <td>
                                                        <a href="{{action('Admin\ContactController@destroy', $data->id)}}" type="button"  class="btn btn-block btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>

                                                    </td>


                                                </tr>
                                            @endforeach


                                        </table>
                                    </div>
                                        <div class="card-footer clearfix">
                                            <ul class="pagination pagination-md m-0 float-right">
                                                {{ $contacts->render() }}
{{--                                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>--}}
                                            </ul>
                                        </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                            <!-- /.form-group -->


                    </div>
                    <!-- /.row -->

                <!-- /.card-body -->
    {{--            <div class="card-footer">
                    Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
                    the plugin.
                </div>--}}
            </div>
            <!-- /.card -->


            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@stop