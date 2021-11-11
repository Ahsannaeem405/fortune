@foreach($msg as $row_msg)
@if($row_msg->msg_type=='Admin')
    @if($row_msg->sendby==$manager_id)

        <div class="chat chat-right"><div class="chat-avatar">
            <a class="avatar m-0" data-toggle="tooltip" href="#" data-placement="right" title="" data-original-title="">'+
            <img src="{{ asset('images/avatar.jpg') }}"alt="avatar" height="40" width="40" />
            </a>
        </div>
        <div class="chat-body">
            <div class="chat-content">
                <p>{{$row_msg->msg}}</p>
                <span style="font-size:12px;">{{$row_msg->created_at->format('d-M-y h:i A')}}</span>
            </div>

        </div>
    @endif    
@else

<div class="chat chat-left"><div class="chat-avatar">
    <a class="avatar m-0" data-toggle="tooltip" href="#"data-placement="left" title="" data-original-title="">
        <img src="{{ asset('images/avatar.jpg') }}"alt="avatar" height="40" width="40" />
    </a>
</div>
<div class="chat-body">
    <div class="chat-content"><p>{{$row_msg->msg}}</p>
        <span style="font-size:12px;">{{$row_msg->created_at->format('d-M-y h:i A')}}</span>
    </div>
</div></div>
@endif
@endforeach
