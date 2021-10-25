@extends('layouts.header')
<style>
.header{
    background-color: black;
}

h3{
    color: white;
}
.profile_div{
    background-color: white;
    text-align: center;
    border-radius: 15px;
    padding: 20px;
}
.profile_div img{
    border-radius: 65px !important;
    height: 122px !important;
    margin-bottom: 10px !important;
    max-width: 150px;
}
.button_profile{
    background-color: #9D26AA;
    color: white;
    border-radius: 30px;
    padding: 7px;
    border: 1px solid #9D26AA;
    padding-right: 0px;
    margin-bottom: -35px;

}
.button_text{
    background-color: white !important;
    color: black;
    padding: 10px;
    border-radius: 30px;
    padding-left: 41px;
    padding-right: 30px;
}
.r-1{
    padding: 20px;
}
.con1{
    padding: 40px !important;
    background-image: url("{{asset('images/homebackground.png')}}");

    background-position: center;
background-repeat: no-repeat;
background-size: cover;

}
.bio{
    min-height: 48px;
}
.fa-paper-plane{
    font-size: 19px;
}
@media only screen and (max-width: 1024px){
	.button_text{
        padding-left: 4px;
    padding-right: 8px;
    }
}
@media only screen and (min-width: 769px){
    .fortune{
        margin-top: 40px;
    }
}
@media only screen and (max-width: 768px){
.profile_div{
    margin-top: 35px !important;
}
}
@media only screen and (max-width: 320px){
.button_text{
font-size: 13px;
}
}
.a:hover{
  text-decoration: none;
  color: black;

}
.a{
  color: black;

}
</style>


@section('body')
@if (session()->has('error'))
<div class="alert alert-danger">
{{session()->get('error')}}
</div>
@endif
<div class="container-fluid header">
<img src="{{asset('images/header.png')}}" alt="" style="width: 100%">
</div>



<div class="container-fluid con1">
 <div class="container">
    {{-- <div class="row" style="text-align: center">
        <div class="col-lg-2  col-6" data-toggle="modal" data-target="#exampleModal">
            <img src="{{asset('images/l1.png')}}" style="max-width: 100%" alt="">
            <p style="color: white;margin-top: 28px;">Sprawy finasowe</p>
        </div>
        <div class="col-lg-2 col-6" data-toggle="modal" data-target="#exampleModal2">
            <img src="{{asset('images/l2.png')}}" style="max-width: 100%" alt="">
            <p style="color: white;margin-top: 28px;">Miłość i związki</p>

        </div>
        <div class="col-lg-2 col-6" data-toggle="modal" data-target="#exampleModal3">
            <img src="{{asset('images/l3.png')}}" style="max-width: 100%" alt="">
            <p style="color: white;margin-top: 28px;">Sprawy biznesowe</p>



        </div>
        <div class="col-lg-2 col-6" data-toggle="modal" data-target="#exampleModal4">
            <img src="{{asset('images/l4.png')}}" style="max-width: 100%" alt="">
            <p style="color: white;margin-top:19px;">Astrologia</p>

        </div>
        <div class="col-lg-2 col-6" data-toggle="modal" data-target="#exampleModal5">
            <img src="{{asset('images/l5.png')}}" style="max-width: 100%" alt="">
            <p style="color: white;margin-top:19px;">Tarot</p>

        </div>
        <div class="col-lg-2 col-6" data-toggle="modal" data-target="#exampleModal6">
            <img src="{{asset('images/l11.png')}}" style="max-width: 100%" alt="">
            <p style="color: white;margin-top:19px;">Przyszłość</p>

        </div>
    </div><br><br> --}}
    <h3>Wróżbici</h3>
    @if (session()->has('success'))
    <div class="alert alert-success">
        {{session()->get('success')}}
    </div>
    @endif
    @if (session()->has('error'))
    <div class="alert alert-danger">
        {{session()->get('error')}}
    </div>
    @endif
    <div class="row r-1">

        {{-- @dd($fortune); --}}
        @foreach ($fortune as $fortunes)

        <div class="col-lg-3 col-12 fortune">
            <div class="col-12 profile_div">
                <a class="a" href="{{url('user/chat_start/' .$fortunes->id)}}">
                <img src="{{asset('upload/images/'.$fortunes->file)}}" alt="">
                <h5>{{$fortunes->name}}</h5>

                <p>{{$fortunes->bio }}</p>

                <button class="button_profile" ><i class="far fa-paper-plane"></i> <span class="button_text">Napisz do mnie</span></button>
                </a>
            </div>


        </div>


        @endforeach



    </div>




 </div>
</div>
@include('loggedin_model')


@endsection
