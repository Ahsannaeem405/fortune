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
                    <h4 class="card-title">Points</h4>
                </div>




                <div class="card-content">
                    <div class="card-body card-dashboard">

                        <div class="table-responsive" style="overflow-x: hidden;">


                        {{-- <form class="form form-horizontal" method="POST" action="{{ url('admins/send_poke') }}">
                        @csrf --}}
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
                                                    <span class="">User Name</span>
                                                </div>
                                            </fieldset></th>
                                        <th>Points</th>
                                        <th>Amount</th>
                                        <th>Date & Time</th>


                                    </tr>
                                </thead>

                                <tbody>




                                    @php $m=0; @endphp
                                    @foreach($Pointshistory as $row)
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
                                                    <span class="">{{$row->getname->name}}</span>
                                                </div>



                                            </td>

                                        <td>{{$row->points}}</td>
                                        {{-- <td>
                                            @if($row->point==null)
                                            0
                                            @else
                                            {{$row->point}}
                                            @endif
                                        </td> --}}
                                        <td>zł {{$row->amount}}</td>
                                        <td>{{date('h:i a d/M/Y', strtotime($row->created_at))}}</td>


                                        {{-- <td>
                                            <div class="dropdown ">
                                                <button class="btn btn-primary dropdown-toggle mr-1 waves-effect waves-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    Action
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                                                    <a class="dropdown-item" href="{{url('admins/user_edit/' .$row->id)}}">Edit</a>
                                                    <a class="dropdown-item" href="{{url('admins/user_del/' .$row->id)}}">Delete</a>
                                                    <a class="dropdown-item point"  data-toggle="modal" data-target="#primary" abc="{{$row->point}}">Add point</a>
                                                </div>
                                            </div>




                                        </td> --}}

                                    </tr>

                                    @endforeach

                                </tbody>

                            </table>
                    {{-- </form> --}}


                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>

</section>




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
