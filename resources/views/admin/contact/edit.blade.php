@extends('admin.layouts.layout-master')
@section('panel-title')
    Contact Management
@stop
@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('contact')}}">Contact Book</a></li>
    <li class="breadcrumb-item active">Edit</li>
</ol>
@stop
@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Edit Contact</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                    </div>
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
                                <form role="form" action="{{route('contact.update',$contact->id)}}" method="post">
                                    {{csrf_field()}}
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="fullname">Full Name</label>
                                            <input type="text" name="fullname" class="form-control" value="{{$contact->fullname}}" id="fullname" placeholder="Enter Full Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" name="address" class="form-control" value="{{$contact->address}}" id="address" placeholder="Enter Address">
                                        </div>
                                        <div class="form-group">
                                            <label for="mobile">Mobile</label>
                                            <input type="text" name="mobile" class="form-control" value="{{$contact->mobile}}" address id="mobile" placeholder="Enter Your Mobile no">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control" value="{{$contact->email}}" id="email" placeholder="Enter email">
                                        </div>

                                        <div class="form-group">
                                            <label for="status">Status</label>
                                        <div class="form-check">
                                            <input type="checkbox"  name="status" class="form-check-input" id="status" {{($contact->status) == '1' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="status">Active</label>
                                        </div>
                                        </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
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