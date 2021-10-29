@extends('admin.layouts.main')


@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card" >

                                <div class="card-header">
                                    <h4 class="card-title">Update</h4>
                                </div>
                                <hr>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-horizontal" method="POST" action="{{ url('admins/update_user/'  .$user->id) }}">
                                        @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Name</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" id="first-name" class="form-control" name="f_name" placeholder=" Name" value="{{$user->name}}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Email</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="email" id="email-id" class="form-control" name="email" placeholder="Email" value="{{$user->email}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Password</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="password"  class="form-control" name="password"  value="">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-8 offset-md-4">
                                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Save</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




@endsection

