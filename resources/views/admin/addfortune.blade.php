@extends('admin.layouts.main')


@section('content')

<div class="content-wrapper" style="margin-top:0rem;">


            <div class="content-header row">

                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Add Fortune</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>

                                    <li class="breadcrumb-item active"> Fortune Information
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">

                </div>
            </div>
            <div class="content-body">
                <!-- account setting page start -->
                <section id="page-account-settings">
                    <div class="row">
                        <!-- left menu section -->
                        <div class="col-md-3 mb-2 mb-md-0">
                            <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75 active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                                        <i class="feather icon-globe mr-50 font-medium-3"></i>
                                        Fortune Information
                                    </a>
                                </li>



                            </ul>
                        </div>
                        <!-- right content section -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            @if (session()->has('message'))
                                            <div class="alert alert-success">
                                                {{session()->get('message')}}
                                            </div>

                                            @endif
                                            <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                                <div class="media">
                                                   Fortune
                                                </div>
                                                <hr>
                                                <form class="form form-horizontal" method="POST" enctype="multipart/form-data" action="{{url('/admins/addfortune')}}">
                                                @csrf
                                                    <div class="form-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group row">
                                                                    <div class="col-md-4">
                                                                        <span>Image</span>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="file" id="img" name="file" class="form-control" accept=".jpg, .jpeg, .png" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group row">
                                                                    <div class="col-md-4">
                                                                        <span>Name</span>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" id="name" class="form-control" name="name" placeholder="Enter Name" >
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <div class="form-group row">
                                                                    <div class="col-md-4">
                                                                        <span>Bio</span>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <textarea name="bio" id="" class="form-control" rows="2"></textarea>
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
                        </div>
                    </div>
                </section>
                <!-- account setting page end -->

            </div>
        </div>




@endsection

