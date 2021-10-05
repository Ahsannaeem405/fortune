@extends('super.layouts.main')


@section('content')

<style type="text/css">
    
    #DataTables_Table_4_wrapper{
        visibility: collapse;
    }
</style>
<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
           

                <div class="card-header">
                    <h4 class="card-title">User</h4>
                </div>
           
           
                <button type="button" class="btn btn-primary mr-1 waves-effect waves-light" data-toggle="modal" data-target="#pri" style="width:20%;margin-left:auto;float: right;">
                    Poke Message
                </button>
               

                <div class="card-content">
                    <div class="card-body card-dashboard">
                        
                        <div class="table-responsive" style="overflow-x: hidden;">
                            <div class="dt-buttons btn-group">     
                                <button class="btn btn-secondary buttons-copy ma buttons-html5 csv" tabindex="0" aria-controls="DataTables_Table_4"><span>CSV</span></button> 
                                <button class="btn btn-secondary make_pdf buttons-html5" tabindex="0" aria-controls="DataTables_Table_4"><span>PDF</span></button> 
                                <button class="btn btn-secondary make_print" tabindex="0" aria-controls="DataTables_Table_4"><span>Print</span></button> 
                            </div>
                            
                        <form class="form form-horizontal" method="POST" action="{{ url('super/send_poke') }}">
                        @csrf    
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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                                <div class="modal fade text-left show" id="pri" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" style="padding-right: 17px;" aria-modal="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-primary white">
                                                                <h5 class="modal-title" id="myModalLabel160">Message</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                          
                                                            <div class="modal-body">
                                                                <div class="col-md-12 col-12">
                                                                    <div class="form-label-group"> 
                                                                       

                                                                        <textarea class="form-control" id="basicTextarea" rows="3" placeholder="Textarea" name="msg"></textarea>
                                                                    
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary waves-effect waves-light">send</button>
                                                            </div>
                                                        
                                                        </div>
                                                    </div>
                                                </div>


                                    @php $m=0; @endphp
                                    @foreach($user as $row)
                                    @php ++$m; @endphp
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
                       
                                        <td>
                                            <div class="dropdown ">
                                                <button class="btn btn-primary dropdown-toggle mr-1 waves-effect waves-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    Action
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                                                    <a class="dropdown-item" href="{{url('super/user_edit/' .$row->id)}}">Edit</a>
                                                    <a class="dropdown-item" href="{{url('super/user_del/' .$row->id)}}">Delete</a>
                                                    <a class="dropdown-item point"  data-toggle="modal" data-target="#primary" abc="{{$row->point}}">Add point</a>
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
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $m=0; @endphp
                                    @foreach($user as $row)
                                    @php ++$m; @endphp
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

<div class="modal fade text-left show" id="primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" style="padding-right: 17px;" aria-modal="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-primary white">
                                                                    <h5 class="modal-title" id="myModalLabel160">Update Points</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                            <form class="form form-horizontal" method="POST" action="{{ url('super/add_points') }}">
                                                            @csrf   
                                                                <div class="modal-body">
                                                                    <div class="col-md-12 col-12">
                                                                        <div class="form-label-group"> 
                                                                            <input type="hidden" id="first-name-column" class="form-control" placeholder="First Name" name="user_id" value="{{$row->id}}">

                                                                            <input type="text" id="first-name-column" class="form-control mt-2 uppo" placeholder="Enter Points" name="point" value="">
                                                                           
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                                                                </div>
                                                            </form>    
                                                            </div>
                                                        </div>
                                                    </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<script type="text/javascript">
    $('#checkall').change(function () {
    $('.cb-element').prop('checked',this.checked);
});

$('.cb-element').change(function () {
 if ($('.cb-element:checked').length == $('.cb-element').length){
  $('#checkall').prop('checked',true);
 }
 else {
  $('#checkall').prop('checked',false);
 }
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


$('.point').click(function(){
    var points=$(this).attr('abc');
    $('.uppo').val(points);


});

</script>

<script>
  
  $('.csv').on('click',function(){
  
    $("#DataTables_Table_4").tableHTMLExport({type:'csv',filename:'sample.csv'});
  })
 
  </script>
  <script>
try {
  fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function(response) {
    return true;
  }).catch(function(e) {
    var carbonScript = document.createElement("script");
    carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
    carbonScript.id = "_carbonads_js";
    document.getElementById("carbon-block").appendChild(carbonScript);
  });
} catch (error) {
  console.log(error);
}
</script>
</body>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

@endsection
