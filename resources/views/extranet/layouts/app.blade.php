<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Location | Véhicule</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('site/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Sweet Alert -->

    <link data-require="sweet-alert@*" data-semver="0.4.2" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />


    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    {{--    <link href="{{ asset('site/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/bower_components/font-awesome/css/font-awesome.min.css') }}">--}}
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="{{ asset('site/css/agency.min.css') }}" rel="stylesheet">

    <link href="/css/animate.css" rel="stylesheet" />
    <link href="/css/smart_wizard_theme_circles.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bluebird/3.3.4/bluebird.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- DatePicker CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/css/bootstrap-material-datetimepicker.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/css/bootstrap-material-datetimepicker.min.css.map" rel="stylesheet" />

    <style>
        .car-description{
            padding: 10px;
            font-family: Montserrat;
            font-size: 13px;
            display: inline-block;
        }
        .car-description td{
            padding: 5px 10px;
            text-align: left;
        }
        .modal-btn{
            color: #fff;
            margin: 10px;
            width: 249px
        }
        .modal-btn:hover{
            opacity: 0.8;
            color: #fff
        }
        .user-ul li{
            font-family: Montserrat;
            list-style-type: none;
            margin-top: 16px;
        }
        .user-ul li a:hover{
            text-decoration: none;
        }
        .user-ul li i{
            margin-top: -10px;
            vertical-align: middle;
        }
        #contact form{

        }
        #contact form label{
            color: #fff;
            font-family: Montserrat;
        }
        #user-options{
            margin-bottom: -81px;
            margin-left: -44px;
            display: none;
        }
        #user-options li a{
            color: #fff
        }
        #user-options li a:hover{
            color: #2caadd
        }
        #show-register{
            margin-left: 18px
        }
        #show-register:hover{
            text-decoration: none;
        }
        #datatable{
            font-family: Montserrat;
        }
        .box-primary{
            font-family: Montserrat;
        }
        table td .fa-cc-paypal{
            color: blue;
            font-size: 30px
        }
        table td .fa-arrow-circle-down{
            color: green;
            font-size: 30px
        }
        table td .fa-cc-visa{
            color:  black;
            font-size: 30px
        }
        table td .fa-file-invoice{
            color:  #bbb;
            font-size: 30px
        }



    </style>

</head>

<body id="page-top">
    @php
        $cars = \App\Models\Car::all();
        $minAmount = 0;
        $i = 0;
        foreach ($cars as $car){
            if($i == 0){
                $minAmount = $car->amount;
            }
            if($car->amount < $minAmount){
                $minAmount = $car->amount;
            }
            $i++;
        }
    @endphp

    @include('extranet.layouts.navigation')

    @include('extranet.layouts.header')

    @include('modals')

    @yield('content')

    @include('extranet.layouts.footer')

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('site/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('site/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- DatePicker JS -->
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/js/bootstrap-material-datetimepicker.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/js/bootstrap-material-datetimepicker.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/js/bootstrap-material-datetimepicker.min.js.map"></script>--}}

<script src="{{ asset('js/bootstrap-material-datetimepicker.js') }}"></script>

<!-- Plugin JavaScript -->
<script src="{{ asset('site/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Contact form JavaScript -->
<script src="{{ asset('site/js/jqBootstrapValidation.js') }}"></script>
<script src="{{ asset('site/js/contact_me.js') }}"></script>

<!-- Custom scripts for this template -->
<script src="{{ asset('site/js/agency.min.js') }}"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>

    $('.datepicker').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD HH:mm',
        language: 'fr',
        time: true,
        minDate : new Date(),
        days: ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"],
        daysShort: ["dim.", "lun.", "mar.", "mer.", "jeu.", "ven.", "sam."],
        daysMin: ["d", "l", "ma", "me", "j", "v", "s"],
        months: ["janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"],
        monthsShort: ["janv.", "févr.", "mars", "avril", "mai", "juin", "juil.", "août", "sept.", "oct.", "nov.", "déc."],
        today: "Aujourd'hui",
        monthsTitle: "Mois",
        clear: "Effacer",
        weekStart: 1
    });

    $('.picker').bootstrapMaterialDatePicker({
        format: 'DD-MM-YYYY à HH:mm',
        time: true,
        minDate : new Date(),
        lang: "fr",
        days: ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"],
        daysShort: ["dim.", "lun.", "mar.", "mer.", "jeu.", "ven.", "sam."],
        daysMin: ["d", "l", "ma", "me", "j", "v", "s"],
        months: ["janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"],
        monthsShort: ["janv.", "févr.", "mars", "avril", "mai", "juin", "juil.", "août", "sept.", "oct.", "nov.", "déc."],
        today: "Aujourd'hui",
        monthsTitle: "Mois",
        clear: "Effacer",
        weekStart: 1
    });


    $('#confirm2').keyup(function () {
        var password = $('#password2')
        var confirm = $(this)
        var message = $('#message2')
        var submit = $('.btn-primary')
        if(confirm.val() !== password.val()){
            message.html('La confirmation ne correspond pas au mot de passe').css("color", "pink")
            submit.attr('disabled', 'disabled')
        }else{
            message.html('Confirmation correcte').css("color", "#6bf442")
            submit.removeAttr('disabled')
        }
    })
</script>

@include('extranet.modals')

@stack('scripts')
</body>

</html>
