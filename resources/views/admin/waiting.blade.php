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
                    <h4 class="card-title">Waiting Time</h4>
                </div>




                <div class="card-content">
                    <div class="card-body card-dashboard">
                       @php 
                        $for=App\Models\User::whereNull('role')->get();
                    @endphp
                    
                    <div class="col-md-5 mb-2 col-12">
                        <label style="font-size:17px;"><b>Select User</b></label>
                        <select class="form-control vo1" name="user_id" style="width: 100%;">
                        @foreach($for as $row_for)
                            <option value="{{$row_for->id}}">{{$row_for->name}}</option>
                        @endforeach    

                        </select>

                        
                    </div>
                    
                   

                        <div class="table-responsive" style="overflow-x: hidden;">


                       
                            <table class="table zero-configuration dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">



                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Fortune</th>
                                        <th>Worker</th>
                                        <th>Waiting Time</th>


                                    </tr>
                                </thead>

                                <tbody class="tb">
                                  
                                    @foreach($msg as $row)
                                      @foreach($row->msg_his as $row_his)
                                        <tr>
                                          <td>{{$row->getuser->name}}</td>
                                          <td>{{$row->getuser2->name}}</td>
                                          <td>{{$row_his->getuser->name}}</td>
                                          @php
                                             $get_msg=App\Models\msg_dt::where('msg_id',$row->id)->where('msg_type','User')->where('sendby',$row_his->manager_id)->get();
                                             $sum=0;
                                             $co=0;
                                          
                                          foreach($get_msg as $row_get_msg)
                                          {
                                            $co++;
                                            $sum=$sum + $row_get_msg->waiting_time;
                                          }

                                          $avg=$sum/$co;


                                           if($avg > 60)
                                           {
                                              $av=intval($avg) % 60;
                                              
                                              $miny=intval($avg)-$av;
                                              

                                              $min=$miny/60;

                                           }

                                           




                                          @endphp
                                          <td>
                                          @if($avg < 60)
                                          {{$avg}} S
                                          @else
                                          {{$min}}M {{$av}}S
                                          @endif
                                          </td>
                                        </tr>
                                      @endforeach  
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<script type="text/javascript">
   $(document).on("change",'.vo1' , function(){
           var start =  $(".vo1").val();
           alert(start);
            
                


           $.ajax({
            type: 'get',
            url:"{{ url('/admins/waiting_msg') }}",
          
           data: {'start':start},

            success: function (data) {
               
                  $('.tb').empty();
                   $('.tb').append(data);
              
            },
          });

        
                    
        });
</script>
   
</body>

@endsection
