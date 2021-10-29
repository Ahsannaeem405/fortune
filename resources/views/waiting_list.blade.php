                            @foreach($msg_na as $msg)
                            <div class="pr-1">
                                <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
                                        src="{{ asset('images/avatar.jpg') }}"
                                        height="42" width="42" alt="Generic placeholder image">
                                    <i></i>
                                </span>
                                <input type="hidden" name="msg_id" value="{{ $msg->id }}">
                                <button type="submit" class="btn btn-primary" style="margin-left: 157px;">Join</button>
                            </div><br>
                            <div class="user-chat-info">
                                <div class="contact-info">

                                    <h5 class="font-weight-bold mb-0">{{ $msg->getuser->name }}</h5>

                                </div>

                            </div>
                            @endforeach