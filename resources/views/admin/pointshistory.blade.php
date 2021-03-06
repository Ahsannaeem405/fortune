@extends('admin.layouts.main')


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
                    <div class="c-datepicker-date-editor J-datepicker-range-day mt10">
                      <i class="c-datepicker-range__icon kxiconfont icon-clock"></i>
                      <input placeholder="Start" autocomplete="off" name="start" class="c-datepicker-data-input only-date" value="">
                      <span class="c-datepicker-range-separator">-</span>
                      <input placeholder="End" autocomplete="off" name="end" class="c-datepicker-data-input only-date" value="">

                      
                    </div>
                    <button class="btn btn-info vo1" style="margin-top: -8px;
    border-radius: 0px 15px 15px 0px;
    margin-left: -4px;padding:10px;" type="button">Search</button>

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

                                <tbody class="tb">




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
                                        <td>z?? {{$row->amount}}</td>
                                        <td>{{date('h:i a d/M/Y', strtotime($row->created_at))}}</td>


                                        

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
<script type="text/javascript">

      $(function(){
        $('.J-datepicker-time').datePicker({
          format: 'HH:mm:ss',
          min: '04:23:11',
          language: 'en'
        });
        $('.J-datepicker-time-range').datePicker({
          format: 'HH:mm:ss',
          isRange: true,
          min: '04:23:11',
          max: '20:59:59',
          language: 'en'
        });

        var DATAPICKERAPI = {
          activeMonthRange: function () {
            return {
              begin: moment().set({ 'date': 1, 'hour': 0, 'minute': 0, 'second': 0 }).format('YYYY-MM-DD HH:mm:ss'),
              end: moment().set({ 'hour': 23, 'minute': 59, 'second': 59 }).format('YYYY-MM-DD HH:mm:ss')
            }
          },
          shortcutMonth: function () {
            var nowDay = moment().get('date');
            var prevMonthFirstDay = moment().subtract(1, 'months').set({ 'date': 1 });
            var prevMonthDay = moment().diff(prevMonthFirstDay, 'days');
            return {
              now: '-' + nowDay + ',0',
              prev: '-' + prevMonthDay + ',-' + nowDay
            }
          },
          shortcutPrevHours: function (hour) {
            var nowDay = moment().get('date');
            var prevHours = moment().subtract(hour, 'hours');
            var prevDate=prevHours.get('date')- nowDay;
            var nowTime=moment().format('HH:mm:ss');
            var prevTime = prevHours.format('HH:mm:ss');
            return {
              day: prevDate + ',0',
              time: prevTime+',' + nowTime,
              name: 'Nearly '+ hour+' Hours'
            }
          },
          rangeMonthShortcutOption1: function () {
            var result = DATAPICKERAPI.shortcutMonth();
            var resultTime= DATAPICKERAPI.shortcutPrevHours(18);
            return [{
              name: 'Yesterday',
              day: '-1,-1',
              time: '00:00:00,23:59:59'
            }, {
              name: 'This Month',
              day: result.now,
              time: '00:00:00,'
            }, {
              name: 'Lasy Month',
              day: result.prev,
              time: '00:00:00,23:59:59'
            }, {
              name: resultTime.name,
              day: resultTime.day,
              time: resultTime.time
            }];
          },
          rangeShortcutOption1: [{
            name: 'Last week',
            day: '-7,0'
          }, {
            name: 'Last Month',
            day: '-30,0'
          }, {
            name: 'Last Three Months',
            day: '-90, 0'
          }],
          singleShortcutOptions1: [{
            name: 'Today',
            day: '0',
            time: '00:00:00'
          }, {
            name: 'Yesterday',
            day: '-1',
            time: '00:00:00'
          }, {
            name: 'One Week Ago',
            day: '-7'
          }]
        };
          $('.J-datepicker').datePicker({
            hasShortcut:true,
            language: 'en',
            min:'2018-01-01 04:00:00',
            max:'2029-10-29 20:59:59',
            shortcutOptions:[{
              name: 'Today',
              day: '0'
            }, {
              name: 'Yesterday',
              day: '-1',
              time: '00:00:00'
            }, {
              name: 'One Week Ago',
              day: '-7'
            }],
            hide:function(){
              console.info(this)
            }
          });


          $('.J-datepicker-day').datePicker({
            hasShortcut: true,
            language: 'en',
            shortcutOptions: [{
              name: 'Today',
              day: '0'
            }, {
              name: 'Yesterday',
              day: '-1'
            }, {
              name: 'One week ago',
              day: '-7'
            }]
          });


          $('.J-datepicker-range-day').datePicker({
            hasShortcut: true,
            language: 'en',
            format: 'YYYY-MM-DD',
            isRange: true,
            shortcutOptions: DATAPICKERAPI.rangeShortcutOption1
          });


          $('.J-datepickerTime-single').datePicker({
            format: 'YYYY-MM-DD HH:mm',
            language: 'en',
          });


          $('.J-datepickerTime-range').datePicker({
            format: 'YYYY-MM-DD HH:mm',
            isRange: true,
            language: 'en'
          });


          $('.J-datepicker-range').datePicker({
            hasShortcut: true,
            language: 'en',
            min: '2018-01-01 06:00:00',
            max: '2029-04-29 20:59:59',
            isRange: true,
            shortcutOptions: [{
              name: 'Yesterday',
              day: '-1,-1',
              time: '00:00:00,23:59:59'
            },{
              name: 'Last Week',
              day: '-7,0',
              time:'00:00:00,'
            }, {
              name: 'Last Month',
              day: '-30,0',
              time: '00:00:00,'
            }, {
              name: 'Last Three Months',
              day: '-90, 0',
              time: '00:00:00,'
            }],
            hide: function (type) {
              console.info(this.$input.eq(0).val(), this.$input.eq(1).val());
              console.info('Type:',type)
            }
          });
          $('.J-datepicker-range-betweenMonth').datePicker({
            isRange: true,
            between:'month',
            language: 'en',
            hasShortcut: true,
            shortcutOptions: DATAPICKERAPI.rangeMonthShortcutOption1()
          });


          $('.J-datepicker-range-between30').datePicker({
            isRange: true,
            language: 'en',
            between: 30
          });

          $('.J-yearMonthPicker-single').datePicker({
            format: 'YYYY-MM',
            language: 'en',
            min: '2018-01',
            max: '2029-04',
            hide: function (type) {
              console.info(this.$input.eq(0).val());
            }
          });

          $('.J-yearPicker-single').datePicker({
            format: 'YYYY',
            language: 'en',
            min: '2018',
            max: '2029'
          });


      });
       $(document).on("click",'.vo1' , function(){
            var start =  $("input[name=start]").val();
            var end =  $("input[name=end]").val();
            
                


           $.ajax({
            type: 'get',
            url:"{{ url('/admins/point_date') }}",
          
           data: {'start':start ,'end':end},

            success: function (data) {
               
                  $('.tb').empty();
                   $('.tb').append(data);
              
            },
          });

        
                    
        });

    
    function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}
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
