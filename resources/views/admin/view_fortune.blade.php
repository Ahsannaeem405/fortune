@extends('admin.layouts.main')


@section('content')

<section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                    <div class="card-header">
                                    <h4 class="card-title">Fortune</h4>
                                </div>
                                <div class="card-content">
                                    @if (session()->has('success'))
                                    <div class="alert alert-success">
                                        {{session()->get('success')}}
                                    </div>
                                    @endif
                                    <div class="card-body card-dashboard">

                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                    <tr>

                                                        <th>Name</th>
                                                        <th>Image</th>
                                                        <th>Bio</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($fortunes as $row)
                                                    <tr>
                                                        <td>{{$row->name}}</td>
                                                        <td><img src="{{asset('upload/images/'.$row->file)}}" alt="" style="width: 15%"></td>
                                                        <td>{{$row->bio}}</td>

                                                        <td>
                                                            <a href="{{url('admins/fortune_edit/' .$row->id)}}">
                                                            <button class="btn btn-info"  style="min-width: 103px !important;">Edit</button></a>
                                                            <a  href="{{url('admins/fortune_del/' .$row->id)}}">
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
