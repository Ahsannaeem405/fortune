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
                                        <form class="form form-horizontal" method="POST" action="{{ url('admins/update_ws/'  .$user->id) }}">
                                        @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>First Name</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" id="first-name" class="form-control" name="f_name" placeholder="First Name" value="{{$user->f_name}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Last Name</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" id="first-name" class="form-control" name="l_name" placeholder="Last Name" value="{{$user->l_name}}">
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
                                                                <span>Mobile</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="number" id="contact-info" class="form-control" name="phone" placeholder="Mobile" value="{{$user->phone}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Role</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <select class="custom-select form-control" id="location" name="role">
                                                                    <option value="">Select Role</option>
                                                                    <option @if($user->role=='2') selected @endif value="2">Supervisor</option>
                                                                    <option @if($user->role=='3') selected @endif  value="3">worker</option>
                                                                </select>
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
             
