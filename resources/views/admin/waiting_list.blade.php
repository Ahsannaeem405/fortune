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




                              


