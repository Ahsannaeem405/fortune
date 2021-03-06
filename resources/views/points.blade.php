@extends('layouts.header')
<link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
<style>
    .input {
        border-radius: 5px !important;
        padding: 25px !important;
        color: white !important;
        border: 1px solid white !important;
        font-size: 18px !important;
        text-align: center !important;
        background-color: #333333 !important;
    }

    .span1 {
        color: white;
        font-weight: bold;

    }

    .pur {

        background-color: #BA2DCE !important;
        color: white !important;
        border-radius: 50px !important;
        height: 40px !important;
        font-weight: bold;
        border: 1px solid #BA2DCE !important;
    }

    .centerspan {
        color: grey;
        font-weight: normal !important;
    }

    .active {
        background-color: #c42fd5 !important;
        border: 1px solid #c42fd5 !important;
    }

    .btn-link {
        width: 100%;
        text-align: left !important;
        color: #ffffff !important;

    }

    .btn-link i {
        float: right;
    }

    .card {
        background-color: #1d1d1d !important;
        border: 1px solid #1d1d1d !important;
        color: #ffffff !important;
    }

    .card-body {
        background-color: #1d1d1d;
        border: 1px solid #1d1d1d;
        color: #ffffff !important;
    }
    .buttonimage{
        width: 100%;
        min-height: 114px;
         }
    .button_method{
        border: 1px solid white !important;
        border-radius: 10px !important;
        /* height: 90px; */
        margin-top: 5px;

    }
    @media only screen and (max-width: 768px) {

    }
    @media only screen and (max-width: 425px) {

        /*Small smartphones [325px -> 425px]*/
        .google {
            margin-top: 15px;
        }
    }

    @media only screen and (max-width: 1024px) {

        /*Small smartphones [325px -> 425px]*/
        .facebook {
            font-size: 13px !important;
        }
    }

</style>


@section('body')

    <section class="ftco-section" style="background-image:url( {{ asset('images/back3.png') }})">
        <div class="container mb-5">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <h1 style="color: white;text-align: center;">Wybierz ile chcesz punkt??w</h1>
                    <p style="color: white;text-align: center;font-size:18px;">A nast??pnie porozmawiaj z naszymi ekspertami
                    </p>
                </div>
                <div class="col-md-7 col-lg-5">
                    <div class=" p-4 p-md-5 mt-5">


                        <form method="POST" action="{{ url('cashbill') }}" name="myForm" class="login-form">
                            @csrf

                            <div class="form-group">

                                <input id="name" type="text" class="input  form-control " value="3 punkty za 799 z??"
                                    readonly="" price="799">

                            </div>
                            <div class="form-group ">
                                <input id="name" type="text" class="input active form-control " value="5 punkty za 1299 z??"
                                    readonly="" price="1299">

                            </div>
                            <div class="form-group ">
                                <input id="name" type="text" class="input form-control " value="10 punkty za 2499 z??"
                                    readonly="" price="2499">

                            </div>
                            <div class="form-group ">
                                <input id="name" type="text" class="input form-control " value="15 punkty za 3899 z??"
                                    readonly="" price="3899">

                            </div>
                            <div class="form-group ">
                                <input id="name" type="text" class="input form-control " value="25 punkty za 6199 z??"
                                    readonly="" price="6199">

                            </div>
                            <div class="form-group ">
                                <input id="name" type="text" class="input form-control " value="50 punkty za 12799 z??"
                                    readonly="" price="12799">

                            </div>
                            <div class="form-group ">
                                <input id="name" type="text" class="input form-control " value="100 punkty za 22999 z??"
                                    readonly="" price="22999">

                            </div>
                            <input type="hidden" name="points" id="points1" value="5">

                            <input id="amount1" type="hidden" class="input form-control" name="amount" value="1299">


                    </div>
                    <div class="row">
                        <div class="col-md-12">

                            <button type="submit" class="submit btn  form-control pur" name="submit"> Do??aduj
                                punkty</button>
                        </div>
                    </div>
                {{-- </form> --}}
                    <div class="row mt-5">
                        <div class="col-md-6">
                            <img src="{{ asset('images/p1.png') }}" width="100%">
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset('images/p2.png') }}" width="100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container pt-5">
            <div class="row justify-content-center">

            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12 pb-5">
                    <h1 style="color: white;text-align: center;">Najcz??stsze pytania</h1>

                </div>
                <div class="col-lg-10 pb-5">
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                        aria-expanded="true" aria-controls="collapseOne">
                                        Jak mog?? zap??aci???
                                        <i class="fas fa-angle-down"></i>

                                    </button>
                                </h5>
                            </div>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                data-parent="#accordion">
                                <div class="card-body">
                                    Umo??liwiamy proste I bezpieczne p??atno??ci. Wybierz interesuj??cy Ci?? pakiet, a nast??pnie kliknij ???Do??aduj Punkty???. Strona przeniesie Ci?? do naszego operatora p??atno??ci, gdzie b??dziesz mie?? mo??liwo???? dokonania transakcji.

                                    Akceptujemy wszystkie popularne banki, BLIK oraz p??atno???? na poczcie. Je??eli potrzebujesz pomocy w dokonaniu zakupu skontaktuj si?? z nami pod adresem info@powrozmi.pl.

                                    Niestety, ale obecnie p??atno??ci kartami oraz SMS nie s?? mo??liwe ??? pracujemy nad tym ???

                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                        aria-expanded="false" aria-controls="collapseTwo">
                                        Akceptowane sposoby p??atno??ci?
                                        <i class="fas fa-angle-down"></i>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                                data-parent="#accordion">
                                <div class="card-body">
                                    Akceptujemy p??atno??ci za pomoc?? szybkich przelew??w internetowych, kodami BLIK oraz za
                                    pomoc?? p??atno????i na poczcie.Je??eli masz jakiekolwiek pytania, skontaktuj si?? z nami
                                    mailowo, a na pewno Ci pomo??emy.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <button type="submit" class="btn btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Czy to bezpieczne?
                                        <i class="fas fa-angle-down"></i>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordion">
                                <div class="card-body">
                                    Tak, wszystkie transakcje s?? bezpieczne, zar??wno nasza strona jak i operator p??atno??ci posiadaj?? niezb??dne certyfikaty i zabezpieczenia ???.
                                </div>
                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </div>
    </section>
    <!-- Modal -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".input").click(function() {
                $(".input").removeClass("active");
                $(this).addClass("active");
                var new_pri = $(this).attr('price');
                $("#amount").val(new_pri);
                $("#amount1").val(new_pri);

                if (new_pri==799) {

                $("#points").val(3);
                $("#points1").val(3);


                }
                else if(new_pri==1299){
                $("#points").val(5);
                $("#points1").val(5);


                }
                else if(new_pri==2499){
                $("#points").val(10);
                $("#points1").val(10);


                }
                else if(new_pri==3899){
                $("#points").val(15);
                $("#points1").val(15);


                }
                else if(new_pri==6199){
                $("#points").val(25);
                $("#points1").val(25);


                }
                else if(new_pri==12799){
                $("#points").val(50);
                $("#points1").val(50);


                }
                else if(new_pri==22999){
                $("#points").val(100);
                $("#points1").val(100);


                }



            });

        });
    </script>

@endsection
