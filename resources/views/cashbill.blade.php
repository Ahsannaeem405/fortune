@extends('layouts.header')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
    .con{
        background-color: #1D1D1D;
        padding: 40px !important;
    }
    .input{
        background-color: #1D1D1D;
        color: white;
        border: 1px solid purple;
        /* padding: 5px; */

    }
    body{
        display: none;
    }
</style>
@section('body')
@php
    $service = "powrozmi.pl"; // Payment Point ID
$key = "2bcc32d612c36d40a0a0ea255fe69011"; // Secret Key
$amount = $amount;
$desc = 'Payment for order 123';
$userdata = Auth::user()->name;
$sign = md5 ($service.$amount.$desc.$userdata.$key);
@endphp
<div class="container-fluid con">
    <div class="container">
        <form action="https://pay.cashbill.pl/form/pay.php" method="POST">
            @csrf
            <input type="hidden" name="service" value="{{$service}}"/>
        <input class="hidden" type="text" name="amount" value="{{$amount}}"/>
        <input type="hidden" name="desc" value="{{$desc}}"/>
        <input type="hidden" name="userdata" value="{{$userdata}}"/>
        <input type="hidden" name="sign" value="{{$sign}}"/>
        <input type="submit" id="pay" value="PAY" />

        </form>


    </div>
</div>
<script>
    $(document).ready(function(){
  $('#pay').trigger('click');
});
</script>
@endsection
