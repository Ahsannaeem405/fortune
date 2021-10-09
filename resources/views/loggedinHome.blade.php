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
    border-radius: 65px;
    height: 122px;
    margin-bottom: 10px;
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
.fa-paper-plane{
    font-size: 19px;
}
@media only screen and (max-width: 1024px){
	.button_text{
        padding-left: 4px;
    padding-right: 8px;
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
</style>


@section('body')
<div class="container-fluid header">
<img src="{{asset('images/header.png')}}" alt="" style="width: 100%">
</div>



<div class="container-fluid con1">
 <div class="container">
    <div class="row" style="text-align: center">
        <div class="col-lg-2  col-6">
            <img src="{{asset('images/l1.png')}}" alt="">
            <p style="color: white;margin-top: 28px;">Sprawy finasowe</p>
        </div>
        <div class="col-lg-2 col-6">
            <img src="{{asset('images/l2.png')}}" alt="">
            <p style="color: white;margin-top: 28px;">Miłość i związki</p>

        </div>
        <div class="col-lg-2 col-6">
            <img src="{{asset('images/l3.png')}}" alt="">
            <p style="color: white;margin-top: 28px;">Sprawy biznesowe</p>



        </div>
        <div class="col-lg-2 col-6">
            <img src="{{asset('images/l4.png')}}" alt="">
            <p style="color: white">Astrologia</p>

        </div>
        <div class="col-lg-2 col-6">
            <img src="{{asset('images/l5.png')}}" alt="">
            <p style="color: white">Tarot</p>

        </div>
        <div class="col-lg-2 col-6">
            <img src="{{asset('images/l11.png')}}" alt="">
            <p style="color: white">Przyszłość</p>

        </div>
    </div><br><br>s
    <h3>Wróżbici</h3>
    <div class="row r-1">
        <div class="col-lg-3 col-12">
            <div class="col-12 profile_div">
                <img src="{{asset('upload/images/1631279017_.jpg')}}" alt="">
                <h5>Cyganka Sybilla</h5>
                <p>Wróżby cygańskie, Rytuały</p>
                <button class="button_profile"><i class="far fa-paper-plane"></i> <span class="button_text">Napisz do mnie</span></button>
            </div>


        </div>
        <div class="col-lg-3 col-12">
            <div class="col-12 profile_div">
                <img src="{{asset('upload/images/1631279017_.jpg')}}" alt="">
                <h5>Cyganka Sybilla</h5>
                <p>Wróżby cygańskie, Rytuały</p>
                <button class="button_profile"><i class="far fa-paper-plane"></i> <span class="button_text">Napisz do mnie</span></button>
            </div>


        </div>
        <div class="col-lg-3 col-12 ">
            <div class="col-12 profile_div">
                <img src="{{asset('upload/images/1631279017_.jpg')}}" alt="">
                <h5>Cyganka Sybilla</h5>
                <p>Wróżby cygańskie, Rytuały</p>
                <button class="button_profile"><i class="far fa-paper-plane"></i> <span class="button_text">Napisz do mnie</span></button>
            </div>


        </div>
        <div class="col-lg-3 col-12 ">
            <div class="col-12 profile_div">
                <img src="{{asset('upload/images/1631279017_.jpg')}}" alt="">
                <h5>Cyganka Sybilla</h5>
                <p>Wróżby cygańskie, Rytuały</p>
                <button class="button_profile"><i class="far fa-paper-plane"></i> <span class="button_text">Napisz do mnie</span></button>
            </div>


        </div>

    </div>
    <div class="row r-1">
        <div class="col-lg-3 col-12">
            <div class="col-12 profile_div">
                <img src="{{asset('upload/images/1631279017_.jpg')}}" alt="">
                <h5>Cyganka Sybilla</h5>
                <p>Wróżby cygańskie, Rytuały</p>
                <button class="button_profile"><i class="far fa-paper-plane"></i> <span class="button_text">Napisz do mnie</span></button>
            </div>


        </div>
        <div class="col-lg-3 col-12">
            <div class="col-12 profile_div">
                <img src="{{asset('upload/images/1631279017_.jpg')}}" alt="">
                <h5>Cyganka Sybilla</h5>
                <p>Wróżby cygańskie, Rytuały</p>
                <button class="button_profile"><i class="far fa-paper-plane"></i> <span class="button_text">Napisz do mnie</span></button>
            </div>


        </div>
        <div class="col-lg-3 col-12 ">
            <div class="col-12 profile_div">
                <img src="{{asset('upload/images/1631279017_.jpg')}}" alt="">
                <h5>Cyganka Sybilla</h5>
                <p>Wróżby cygańskie, Rytuały</p>
                <button class="button_profile"><i class="far fa-paper-plane"></i> <span class="button_text">Napisz do mnie</span></button>
            </div>


        </div>
        <div class="col-lg-3 col-12 ">
            <div class="col-12 profile_div">
                <img src="{{asset('upload/images/1631279017_.jpg')}}" alt="">
                <h5>Cyganka Sybilla</h5>
                <p>Wróżby cygańskie, Rytuały</p>
                <button class="button_profile"><i class="far fa-paper-plane"></i> <span class="button_text">Napisz do mnie</span></button>
            </div>


        </div>

    </div>
    <div class="row r-1">
        <div class="col-lg-3 col-12">
            <div class="col-12 profile_div">
                <img src="{{asset('upload/images/1631279017_.jpg')}}" alt="">
                <h5>Cyganka Sybilla</h5>
                <p>Wróżby cygańskie, Rytuały</p>
                <button class="button_profile"><i class="far fa-paper-plane"></i> <span class="button_text">Napisz do mnie</span></button>
            </div>


        </div>
        <div class="col-lg-3 col-12">
            <div class="col-12 profile_div">
                <img src="{{asset('upload/images/1631279017_.jpg')}}" alt="">
                <h5>Cyganka Sybilla</h5>
                <p>Wróżby cygańskie, Rytuały</p>
                <button class="button_profile"><i class="far fa-paper-plane"></i> <span class="button_text">Napisz do mnie</span></button>
            </div>


        </div>
        <div class="col-lg-3 col-12 ">
            <div class="col-12 profile_div">
                <img src="{{asset('upload/images/1631279017_.jpg')}}" alt="">
                <h5>Cyganka Sybilla</h5>
                <p>Wróżby cygańskie, Rytuały</p>
                <button class="button_profile"><i class="far fa-paper-plane"></i> <span class="button_text">Napisz do mnie</span></button>
            </div>


        </div>
        <div class="col-lg-3 col-12 ">
            <div class="col-12 profile_div">
                <img src="{{asset('upload/images/1631279017_.jpg')}}" alt="">
                <h5>Cyganka Sybilla</h5>
                <p>Wróżby cygańskie, Rytuały</p>
                <button class="button_profile"><i class="far fa-paper-plane"></i> <span class="button_text">Napisz do mnie</span></button>
            </div>


        </div>

    </div>



 </div>
</div>


@endsection
