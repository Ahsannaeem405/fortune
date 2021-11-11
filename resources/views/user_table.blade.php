 <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>    
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/pickers/pickadate/pickadate.css')}}">    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />         
                    <div class="card-body card-dashboard">

                        <div class="table-responsive" style="overflow-x: hidden;">
                            <div class="dt-buttons btn-group">
                                <button class="btn btn-secondary buttons-copy ma buttons-html5 csv" tabindex="0" aria-controls="DataTables_Table_4"><span>CSV</span></button>
                                <button class="btn btn-secondary make_pdf buttons-html5" tabindex="0" aria-controls="DataTables_Table_4"><span>PDF</span></button>
                                <button class="btn btn-secondary make_print" tabindex="0" aria-controls="DataTables_Table_4"><span>Print</span></button>
                            </div>

                       
                            <table class="table zero-configuration dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">



                                <thead>
                                    <tr>
                                        <th><fieldset class="checkbox">
                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                    <input type="checkbox" id="checkall">
                                                    <span class="vs-checkbox">
                                                        <span class="vs-checkbox--check">
                                                            <i class="vs-icon feather icon-check"></i>
                                                        </span>
                                                    </span>
                                                    <span class="">Name</span>
                                                </div>
                                            </fieldset></th>
                                        <th>Email</th>
                                        <th>Points</th>
                                        <th>D.O.B</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                                


                                    @php $m=0;
                                         $k=0;

                                     @endphp
                                    @foreach($arr as $arry)
                                    @php ++$m;
                                          ++$k;
                                          $row=App\Models\User::find($arry['id']);

                                     @endphp
                                    <tr>

                                        <td>





                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                    <input type="checkbox" name="user_idy[]" class="cb-element" value="{{$row->id}}">
                                                    <span class="vs-checkbox">
                                                        <span class="vs-checkbox--check">
                                                            <i class="vs-icon feather icon-check"></i>
                                                        </span>
                                                    </span>
                                                    <span class="">{{$row->name}}</span>
                                                </div>



                                            </td>

                                        <td>{{$row->email}}</td>
                                        <td>
                                            @if($row->point==null)
                                            0
                                            @else
                                            {{$row->point}}
                                            @endif
                                        </td>
                                        <td>@if($row->dob !=null)
                                            {{ date('d-M-Y', strtotime($row->dob))}}

                                           @endif</td>

                                        <td>
                                            <div class="dropdown ">
                                                <button class="btn btn-primary dropdown-toggle mr-1 waves-effect waves-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    Action
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                                                    <a class="dropdown-item" href="{{url('admins/user_edit/' .$row->id)}}">Edit</a>
                                                    <a class="dropdown-item" href="{{url('admins/user_del/' .$row->id)}}">Delete</a>
                                                    <a class="dropdown-item point point_id"  data-toggle="modal" data-target="#primary" abc="{{$row->id}}">Add point</a>
                                                </div>
                                            </div>




                                        </td>

                                    </tr>
                                    


                                    @endforeach

                                </tbody>

                            </table>
                        </form>
                   

                            <table class="table table-striped dataex-html5-selectors dataTable" id="DataTables_Table_4" role="grid" aria-describedby="DataTables_Table_4_info" >

                                <thead>
                                    <tr>
                                        <th><fieldset class="checkbox">
                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                    <input type="checkbox" id="checkall">
                                                    <span class="vs-checkbox">
                                                        <span class="vs-checkbox--check">
                                                            <i class="vs-icon feather icon-check"></i>
                                                        </span>
                                                    </span>
                                                    <span class="">Name</span>
                                                </div>
                                            </fieldset></th>
                                        <th>Email</th>
                                        <th>Points</th>
                                        <th>D.O.B</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($arr as $arry)
                                    @php ++$m;
                                          $row=App\Models\User::find($arry['id']);

                                     @endphp
                                    <tr>

                                        <td>
                                            <fieldset class="checkbox">
                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                    <input type="checkbox" class="cb-element">
                                                    <span class="vs-checkbox">
                                                        <span class="vs-checkbox--check">
                                                            <i class="vs-icon feather icon-check"></i>
                                                        </span>
                                                    </span>
                                                    <span class="">{{$row->name}}</span>
                                                </div>
                                            </fieldset>
                                            </td>
                                        <td>{{$row->email}}</td>
                                        <td>
                                            @if($row->point==null)
                                            0
                                            @else
                                            {{$row->point}}
                                            @endif
                                        </td>
                                        <td> @if($row->dob !=null)
                                                 {{ date('d-M-Y', strtotime($row->dob))}}

                                           @endif</td>


                                    </tr>

                                    @endforeach

                                </tbody>

                            </table>
                        </div>
                    </div>



<script src="{{ asset('admin/js/scripts/forms/select/form-select2.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
<script src="{{asset('admin/app-assets/js/scripts/datatables/datatable.js') }}"></script>


<script src="{{asset('admin/app-assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
<script src="{{asset('admin/app-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
<script src="{{asset('admin/app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
<script src="{{asset('admin/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
<script src="{{asset('admin/app-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
<script src="{{asset('admin/app-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
<script src="{{asset('admin/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>
<script src="{{asset('admin/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>

   
<script src="{{asset('tableHTMLExport.js')}}"></script>




<script type="text/javascript">

$(document).ready(function() {
    $('.js-example-basic-single').select2();
    $('.js-example-basic-multiple').select2();
});

$('.make_pdf').click(function(){
    $('.buttons-pdf').click();
});

$('.make_print').click(function(){
    $('.buttons-print').click();
});
$('.make_pdf').click(function(){
    $('.buttons-pdf').click();
});



</script>

<script>

  $('.csv').on('click',function(){

    $("#DataTables_Table_4").tableHTMLExport({type:'csv',filename:'sample.csv'});
  })

  </script>
  