@extends('admin.layouts.main')


@section('content')

@php
    $count_user=App\Models\User::whereNull('role')->count();
    $count_sup=App\Models\User::where('role','2')->count();
    $count_wok=App\Models\User::where('role','3')->count();
    $user=App\Models\User::whereNull('role')->get();
    

    

@endphp

<section id="basic-datatable">
    <div class="row">
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-header d-flex flex-column align-items-start pb-0">
                    <div class="avatar bg-rgba-primary p-50 m-0">
                        <div class="avatar-content">
                            <i class="feather icon-users text-primary font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1">{{$count_user}}</h2>
                    <p class="mb-2">User</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-header d-flex flex-column align-items-start pb-0">
                    <div class="avatar bg-rgba-success p-50 m-0">
                        <div class="avatar-content">
                            <i class="fa fa-user text-success font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1">{{$count_sup}}</h2>
                    <p class="mb-2">Supervisor</p>
                </div>
                
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-header d-flex flex-column align-items-start pb-0">
                    <div class="avatar bg-rgba-danger p-50 m-0">
                        <div class="avatar-content">
                            <i class="fa fa-user-secret text-danger font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1">{{$count_wok}}</h2>
                    <p class="mb-2">Worker</p>
                </div>
                
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-header d-flex flex-column align-items-start pb-0">
                    <div class="avatar bg-rgba-warning p-50 m-0">
                        <div class="avatar-content">
                            <i class="feather icon-package text-warning font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1">	&infin;</h2>
                    <p class="mb-2">Points</p>
                </div>
                
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Recent User</h4>
        </div>
        <div class="card-content">
            <div class="card-body card-dashboard">
                
                <div class="table-responsive">
                    <table class="table zero-configuration">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                               
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $row)
                            <tr>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
                               
                                <td>
                                    <a href="{{url('admins/user_edit/' .$row->id)}}">
                                    <button class="btn btn-info">Edit</button></a>
                                    <a  href="{{url('admins/user_del/' .$row->id)}}">
                                    <button class="btn btn-danger">Delete</button>
                                    </a>

                                </td>
                                
                            </tr>
                            @endforeach
                                                   
                                                                            </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</section>






@endsection