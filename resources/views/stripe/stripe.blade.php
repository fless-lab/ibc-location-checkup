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

            .StripeElement {
                box-sizing: border-box;
                height: 40px;
                padding: 10px 12px;
                border: 1px solid transparent;
                border-radius: 4px;
                background-color: white;
                box-shadow: 0 1px 3px 0 #e6ebf1;
                -webkit-transition: box-shadow 150ms ease;
                transition: box-shadow 150ms ease;
            }

            .StripeElement--focus {
                box-shadow: 0 1px 3px 0 #cfd7df;
            }

            .StripeElement--invalid {
                border-color: #fa755a;
            }

            .StripeElement--webkit-autofill {
                background-color: #fefde5 !important;
            }

            .submit-payment{
                padding: 12px;
                color: #fff;
                border-radius: 5px;
                background: #a442f4;
                border: none;
                font-family: Montserrat;
                font-weight: bold;
                cursor: pointer;
                width: 100%
            }

            .currency-bloc{
                display: flex;
                justify-content: space-around;
                align-items: center;
                width: 35%;
                margin: auto
            }

            .form-row select, option{
                font-family: 'Montserrat';
            }

        </style>

    </head>
    <body>
        <form action="{{ route('stripe') }}" method="post" id="payment-form">
            @csrf
            <div class="form-row" >
                <i class="fab fa-visa" style="font-size: 3em; color: #ccc"></i>
                <br>
                <label for="card-element" id="label-card">
                    <h3>Carte de crédit ou de débit</h3>
                </label>
                <br><br>
                <div class="currency-bloc">
                    <div>
                        <select name="currency" id="currency" class="StripeElement">
                            <option value="xof" selected="selected">CFA</option>
                            <option value="eur">EUR</option>
                            <option value="usd">USD</option>
                        </select>
                    </div>
                    <div>
                        <h4 id="amount-display">CFA {{ $amount }}</h4>
                    </div>
                </div>
                <br>
                <div id="card-element" class="StripeElement">
                    <!-- A Stripe Element will be inserted here. -->
                </div>

                <input type="hidden" name="amount" value="{{ $amount }}">
                <input type="hidden" name="cfaamount" value="{{ $amount }}">
                <input type="hidden" name="id" value="{{ $id }}">
                <input type="hidden" name="type" value="{{ $type }}">
                <input type="hidden" name="mode" value="stripe">
                <br><br>
                <!-- Used to display form errors. -->
                <div id="card-errors" role="alert"></div>
            </div>
            <br><br>
            <button class="submit-payment" data-dismiss="modal">Soumettre le paiement</button>
            <i class="fas fa-spinner fa-spin" style="display: none; font-size: 30px; color: #a442f4;"></i>
        </form>

        <script>

            $('#currency').change(function(){
                var currency = $(this)
                var amountDisplay = $('#amount-display')
                var amount = $('[name="amount"]')
                var cfaAmount = $('[name="cfaamount"]').val()
                var eurAmount = (cfaAmount / 655).toFixed(2)
                var usdAmount = (cfaAmount / 550).toFixed(2)

                var cfa = 'CFA' + ' ' + cfaAmount
                var dollar = '<i class="fa fa-dollar-sign"></i>' + ' ' + usdAmount
                var euro = '<i class="fa fa-euro-sign"></i>' + ' ' + eurAmount

                if(currency.val() === 'xof'){
                    amountDisplay.html('').html(cfa)
                    amount.val(cfaAmount)
                }else if(currency.val() === 'eur'){
                    amountDisplay.html('').html(euro)
                    amount.val(eurAmount)
                }else{
                    amountDisplay.html('').html(dollar)
                    amount.val(usdAmount)
                }

            })

            $('.submit-payment').click(function () {
                $(this).hide()
                $('.fa-spinner').show()
            })
        </script>

        <script>

            // Create a Stripe client.
            var stripe = Stripe('{{ env('STRIPE_KEY') }}');

            // Create an instance of Elements.
            var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
                base: {
                    color: '#32325d',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };

            // Create an instance of the card Element.
            var card = elements.create('card', {style: style});

            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');

            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

            // Handle form submission.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {

                event.preventDefault();

                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        // Send the token to your server.
                        stripeTokenHandler(result.token);
                    }
                });
            });

            // Submit the form with the token ID.
            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);


//                var hiddenInputAmount = document.createElement('input');
//                hiddenInputAmount.setAttribute('type', 'hidden');
//                hiddenInputAmount.setAttribute('name', 'amount');
//                hiddenInputAmount.setAttribute('value', amount);
//                form.appendChild(hiddenInputAmount);

                // Submit the form
                form.submit();
            }
        </script>

    </body>
</html>





