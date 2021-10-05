@extends('admin.layouts.main')


@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card" >
            
            <div class="card-header">
                <h4 class="card-title">Site Settings</h4>
            </div>
            <hr>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-horizontal" method="POST" action="{{ url('admins/update_site') }}">
                    @csrf

                    @php $site=App\Models\site_setting::all(); @endphp
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <span>Footer Text</span>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" id="first-name" class="form-control" name="footer" placeholder="Footer Text" value="{{$site[0]->footer}}">  
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <span>Logo</span>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputGroupFile01">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <span>Notification</span>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="custom-control custom-switch mr-2 mb-1">
                                               
                                                <input type="checkbox" class="custom-control-input" id="customSwitch10" name="noti" @if($site[0]->noti=='on') checked @endif>
                                                <label class="custom-control-label" for="customSwitch10">
                                                    <span class="switch-icon-left"><i class="feather icon-check"></i></span>
                                                    <span class="switch-icon-right"><i class="feather icon-bell"></i></span>
                                                </label>
                                            </div>
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
             
