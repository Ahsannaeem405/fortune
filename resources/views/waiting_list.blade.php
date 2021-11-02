                            @foreach($msg_na as $msg)
                            <div class="pr-1 p-1" style="display: flex;">
                                <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                        src="{{ asset('images/avatar.jpg') }}"
                                        height="42" width="42" alt="Generic placeholder image">
                                    <i></i>
                                </span>
                                <input type="hidden" name="msg_id" value="{{ $msg->id }}">
                                <h5 class="font-weight-bold mt-1 ml-1 mb-0">{{ $msg->getuser->name }}</h5>

                                <button type="submit" class="btn btn-primary" style="margin-left: auto;">Join</button>
                            </div>
                            @endforeach
                            <div class="p-1"></div>
                            @foreach($arr as $arr_msg)
                            @php

                               $msgy=App\Models\msg::find($arr_msg['id']);

                            @endphp   

                            <div class="pr-1 p-1" style="display: flex;">
                                <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                        src="{{ asset('images/avatar.jpg') }}"
                                        height="42" width="42" alt="Generic placeholder image">
                                    <i></i>
                                </span>
                                <input type="hidden" name="msg_id" value="{{ $arr_msg['id']}}">
                                <h5 class="font-weight-bold mt-1 ml-1 mb-0">{{ $msgy->getuser->name }}</h5>

                                <button type="submit" class="btn btn-primary" style="margin-left: auto;">Join</button>
                            </div>
                            @endforeach

                            