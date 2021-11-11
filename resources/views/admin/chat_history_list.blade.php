@foreach($msg as $row_msg)
<span class="get_msg" style="display:flex;" abc="{{$row_msg->msg_id}}" bcd="{{$row_msg->manager_id}}">
    
<div class="pr-1" abc="{{$row_msg->id}}" bcd="{{$row_msg->manager_id}}">
    <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle"
            src="{{asset('images/avatar.jpg')}}"
            height="42" width="42" alt="Generic placeholder image">
        <i></i>
    </span>
</div>

<div class="contact-info" style="width:100%;">
    <h4 class="font-weight-bold mb-0" class="name_user">{{$row_msg->msg_list->getuser->name}}</h4>
    <p class="truncate">Conected With {{$row_msg->msg_list->getuser2->name}}<br></p>
</div>
</span>

@endforeach