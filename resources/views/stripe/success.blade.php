<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{ asset('site/vendor/jquery/jquery.min.js') }}"></script>
    <style>
        /**
     * The CSS shown here will not be introduced in the Quickstart guide, but shows
     * how you can use CSS to style your Element's container.
     */

        #payment-form{
            font-family: 'Montserrat';
            text-align: center
        }
        h3, .fa-check-circle{
            color: green;
        }


    </style>

</head>
<body>
<form id="payment-form">
    <div class="form-row" >
        <i class="fab fa-stripe" style="font-size: 3em; color: #ccc"></i>
        <br><br><br>
        <i class="fas fa-check-circle" style="font-size: 2em"></i>
        <br><br>
        <h3>Paiement effectué avec succès </h3>
    </div>
</form>



</body>
</html>





