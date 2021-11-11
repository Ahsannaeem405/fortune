 @foreach($Pointshistory as $row)
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


                                        

                                    </tr>

                                    @endforeach