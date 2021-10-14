@extends('../layouts.header')
<style>
    .con {
        background-color: #1D1D1D;
        color: white;
    }

    .con1 {
        padding: 50px;
    }
    .table td {
        color: white;
        text-align: center;
        /* border-left: 1px solid white; */

    }
    .table{
        border-left: 1px solid white;
        border-right: 1px solid white;
        border-bottom: 1px solid white;

    }
    .table th{
        color: white;
        text-align: center;
        /* border-left: 1px solid white; */

    }
</style>

@section('body')
    <div class="container-fluid con">
        <div class="container con1">
            <h5>
                Cennik:
            </h5>
            <p>
               1. Niektóre funkcje naszej strony wymagają posiadania kredytów.
            </p>
            <p>
                2. Wszelkie płatności są jednorazowe I nie odnawiają się automatycznie.
            </p>
            <p>
                3. Wszystkie stawki są cenami brutto, z uwzględnieniem wymaganych podatków.
            </p>
            <p>
                4. Dostępne paklety punktów oraz ich ceny uzależnione są od wybranego sposobu płatności.
            </p>
            <p>
                5. Dostępne pakiety wraz z cenami przy płatności za pomocą Cashbili (BLIK, przelew, karty płatnicze):
            </p><br><br>

                        <div class="row">
                            <div class=" offset-md-2 col-md-8">
                        <table class="table">
                            <thead>
                              <tr>

                                <th scope="col">Paklet punktów</th>
                                <th scope="col">Cena W PLN</th>
                                <th scope="col">Ilość wiadomości</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>3</td>
                                <td>7,99</td>
                                <td>3</td>
                              </tr>
                              <tr>
                                <td>5</td>
                                <td>12,99</td>
                                <td>5</td>
                              </tr>
                              <tr>
                                <td>10</td>
                                <td>24,99</td>
                                <td>10</td>
                              </tr>
                              <tr>
                                <td>15</td>
                                <td>38,99</td>
                                <td>15</td>
                              </tr>
                              <tr>
                                <td>25</td>
                                <td>61,99</td>
                                <td>25</td>
                              </tr>
                              <tr>
                                <td>50</td>
                                <td>127,99</td>
                                <td>50</td>
                              </tr>
                              <tr>
                                <td>100</td>
                                <td>229,99</td>
                                <td>100</td>
                              </tr>




                            </tbody>
                          </table>
                    </div>

                </div>
           



        </div>
    </div>
@endsection
