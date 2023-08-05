<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Location | Véhicule</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/jvectormap/jquery-jvectormap.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/skins/_all-skins.min.css') }}">
    <!-- DataTables style -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

    <link href="{{ url(env('STORAGE_PATH').'favicon.png') }}" rel="shortcut icon" type="image/x-icon" />

    <!-- Sweet Alert -->

    <link data-require="sweet-alert@*" data-semver="0.4.2" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

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

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <script
                src="https://www.paypal.com/sdk/js?client-id=AbG1Fk3w2YJfV3IUSzGMeCV7MAaEgH-GMmlLEgRRUOMYyT44ivQU7Di01W1BPpGuJmcgqSxoMhRavUpm">
        </script>

    <style>
        .fa{
            /*font-size: 20px !important;*/
        }
        table td{
            vertical-align: middle !important;
        }
        table td .fa{
            font-size: 24px;
            vertical-align: middle;
            padding: 5px;
            color: #bbb
        }
        table td .fa-edit:hover{
            color: #0eb2a3;
        }
        table td .fa-trash:hover{
            color: deeppink;
        }
        table td .fa-eye:hover{
            color: deepskyblue;
        }
        table td .fa-cc-paypal:hover{
            color: blue;
        }
        table td .fa-bookmark:hover{
            color: #f7b740;
        }
        table td .fa-retweet:hover{
            color: #9e5eff;
        }
        table td .fa-arrow-circle-down:hover{
            color: green;
        }
        table td .fa-undo:hover{
            color: #000;
        }
        table td .fa-address-card:hover{
            color: blue;
        }
        table td .disabled i{
            color: #ddd !important;
        }
        table td .disabled i:hover{
            color: #ddd !important;
        }

        table th{
            /*text-align: center !important;*/
        }

        input, select, textarea{
            border-radius: 10px !important;
            border: none;
            background: #e5e5e5 !important;
            padding: 10px !important;
        }
        .fa-circle{
            font-size: 16px !important;
            cursor: pointer
        }
        .fa-caret-left{
            font-size: 16px !important;
        }
        .green{
            color: green !important;
        }
        .red{
            color: red !important;
        }
        .description-table tr{
            height: 40px
        }
        .description-table td{
            padding: 10px
        }

    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('intranet.layouts.header')
    <!-- Left side column. contains the logo and sidebar -->
    @include('intranet.layouts.sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('modals')
        @yield('content')
        <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->

   @include('intranet.layouts.footer')

    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    {{--<div class="control-sidebar-bg"></div>--}}

</div>
<!-- ./wrapper -->
{{--<script src="/back/js/vendor/notify.js"></script>--}}
{{--<script src="/front/js/jquery.auto-complete.min.js"></script>--}}
{{--<script src="{{ asset('/js/jquery.smartWizard.min.js') }}"></script>--}}
{{--<script src="{{ asset('/js/Modernizr.js') }}"></script>--}}
{{--<script src="{{ asset('/js/pages.min.js') }}"></script>--}}

<!-- jQuery 3 -->
{{--<script src="{{ asset('assets/bower_components/jquery/dist/jquery.min.js') }}"></script>--}}
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>

<!-- DatePicker JS -->
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/js/bootstrap-material-datetimepicker.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/js/bootstrap-material-datetimepicker.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/js/bootstrap-material-datetimepicker.min.js.map"></script>--}}

<script src="{{ asset('js/bootstrap-material-datetimepicker.js') }}"></script>

<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('assets/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap  -->
<script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('assets/bower_components/chart.js/Chart.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{--<script src="{{ asset('assets/dist/js/pages/dashboard2.js') }}"></script>--}}
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/dist/js/demo.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $(function () {
        $('#datatable').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : false,
            'info'        : true,
            'autoWidth'   : true
        })
    })
</script>

<script>
    $('.datepicker').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD HH:mm:ss',
        lang: 'fr',
        time: true
    });

    $('#confirm').keyup(function () {
        var password = $('[name="password"]')
        var confirm = $(this)
        var message = $('#message')
        var submit = $('.btn-primary')
        console.log(password.val()+' === '+confirm.val())
        if(confirm.val() !== password.val()){
            message.html('La confirmation ne correspond pas au mot de passe').css("color", "red")
            submit.attr('disabled', 'disabled')
        }else{
            message.html('Confirmation correcte').css("color", "green")
            submit.removeAttr('disabled')
        }
    })

</script>

@stack('scripts')
</body>
</html>
