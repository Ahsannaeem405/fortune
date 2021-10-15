@extends('admin.layouts.main')


@section('content')

<div class="table-responsive">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Topic</th>
            <th scope="col">Message</th>

          </tr>
        </thead>
        <tbody>
            @php
                $x=0;
            @endphp
            @foreach ($messages as $message )
            @php
                $x++;
            @endphp
            <tr>
                <th scope="row">{{$x}}</th>
                <td>{{$message->name}}</td>
                <td>{{$message->email}}</td>
                <td>{{$message->topic}}</td>
                <td><button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$message->id}}">Show Message</button></td>

              </tr>

              <!-- Modal -->
<div class="modal fade" id="exampleModal{{$message->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">From: {{$message->email}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <textarea class="form-control" id="" rows="4" style="font-size: 14px" readonly> {{$message->message}}</textarea>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
            @endforeach



        </tbody>
      </table>
</div>

@endsection
