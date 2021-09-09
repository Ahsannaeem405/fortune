@extends('admin.layouts.main')


@section('content')

<section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                
                                <div class="card-header">
                                    <h4 class="card-title">User</h4>
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
                        </div>
                    </div>
                </section>

@endsection
