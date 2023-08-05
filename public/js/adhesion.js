/* JS for Wizard Steps */
$(document).ready(function () {

    var next = function(idBox, desc){
        var $activeli = $('.wizard .nav-tabs li.active');
        var $activetab = $('.formadhe .tab-content .tab-pane.active');
        var requiredOk = true;
        desc = desc || {};
        if(desc.customControl)
            requiredOk = desc.customControl();

        $('#'+idBox+' input[required],#'+idBox+' select[required]').each(function (e){
            if(!$(this).val()){
                $(this).parents('.form-line').first().addClass('focused error');
                requiredOk = false;
            }
        });


        if (requiredOk){
            $activeli.removeClass('active').next().removeClass('disabled').addClass('active');
            $activetab.removeClass('active').next().addClass('active');
        }else{
            swal({
                title: "Erreur",
                text: desc.txt,
                type: "error",
                html : true
            }, function() {
                (desc.error)?
                    desc.error() : null;
            });
        }
    };
    /*Js for Validate Form*/

    $('#btn-infostep').click(function () {
        if($('#generalInformationBox').css('display') === 'none'){
            var stop = false, msg = [];


            $('input[name="firstname"],input[name="lastname"]').each(function(){ // ,input[name="birth_date"]
                if(!$(this).val().trim()){
                    stop = true;
                }
            });

            if(stop){
                swal({
                    title: "Erreur",
                    text: "Vous devez saisir le nom, le prénom et la date de naissance pour continuer.",
                    type: "error",
                    html : true
                }, function() { });
                return;
            }

            $('#btn-infostep').hide();
            $.ajax({
                url: $(this).attr('data-href'),
                data: {
                    _token: $(this).attr('data-token'),
                    qualification: $('#qualification').val().trim(),
                    lastname: $('[name="lastname"]').val().trim(),
                    firstname: $('[name="firstname"]').val(),
                    birthday: $('#birthday').val().trim()
                },
                type: 'POST',
                dataType: "JSON",
                success: function (rsp) {
                    $('#fulleIdentityAuth').hide();
                    if (rsp.id) {
                        _data_identity = rsp;
                        $('#fulleIdentityBox').show();
                        if(!rsp.paiements || rsp.paiements.length === 0){
                            $('#fulleIdentity').html('<div class="row" >' +
                                    '<div class = "col-md-12" ><h3>Il semblerait que vous soyez déjà connu(e) de notre système</h3></div>' +
                                    '<div class = "col-md-12" ><h5>Confirmez vous que vous êtes bien '+rsp.fullnamex+(rsp.email?' et que votre adresse email est '+rsp.email:'')+'</h5></div>' +
                                    '<div class = "col-md-4" >' +
                                        '<div class = "form-line" >' +
                                            '<input type="radio" name = "est_ce_que_moi" value = "oui" id = "est_ce_que_moi_oui" />' +
                                            '<label for="est_ce_que_moi_oui">Oui c\'est bien moi</label>' +
                                        '</div>' +
                                    '</div>' +
                                    /*'<div class = "col-md-3" >' +
                                        '<div class = "form-line" >' +
                                            '<input type="radio" name = "est_ce_que_moi" value = "oui"  id = "est_ce_que_moi_ouinon" />' +
                                            '<label for="est_ce_que_moi_ouinon">Oui mais mes info ont changée </label>' +
                                        '</div>' +
                                    '</div>' +*/
                                    '<div class = "col-md-4" >' +
                                        '<div class = "form-line" >' +
                                            '<input type="radio" name = "est_ce_que_moi" value = "non" id = "est_ce_que_moi_non" />' +
                                            '<label for="est_ce_que_moi_non">Non</label>' +
                                        '</div>' +
                                    '</div>' +
                                    '<div class = "col-md-4" >' +
                                        '<div class = "form-line" >' +
                                            '<button type="button" class = "btn btn-primary validate-meys" >Valider</button>'+
                                        '</div>' +
                                    '</div>' +
                                '</div>');

                        }else{
                            $('#fulleIdentityAuth').show();
                            $('#fulleIdentity').html('<h3>' + (rsp.paiements.length >= 2 ? 'Vous avez déja renouvelé votre adhésion.' : 'Vous êtes déjà membre.') + '</h3>');
                        }
                    } else {
                        $('#btn-infostep').show();
                        $('#fulleIdentityBox').hide();
                        $('#generalInformationBox').show();
                    }
                }
            });
        }else{
            next('info-step', {
                customControl: function(){
                    if($('#PaswordBox').length === 1) {
                        if ($('#info-step [name="password"]').val() != $('#info-step [name="password_confirmation"]').val()) {
                            this.txt = 'Les deux mots de passe ne correspondent pas.<br/>Veuillez saisir les informations requises avant de continuer';
                            return false;
                        } else if ($('#info-step [name="password"]').val().trim().length < 6) {
                            this.txt = 'Le texte mot de passe doit contenir au moins  6 caractères.<br/>Veuillez saisir les informations requises avant de continuer';
                            return false;
                        }
                    }
                    return true;
                },
                txt : "Veuillez saisir les informations requises avant de continuer"
            });
        }

    });

    $('#btn-adress').click(function (e){
        next('adress-step', {
            txt : "Veuillez renseigné vos adresses avant de continuer"
        });
    });

    $(".prev-step").click(function (e){
        var $activeli = $('.wizard .nav-tabs li.active');
        var $activetab = $('.formadhe .tab-content .tab-pane.active');

        $activeli.removeClass('active').prev().removeClass('disabled').addClass('active');
        $activetab.removeClass('active').prev().addClass('active');
    });

    $("input[required], textarea[required]").each(function (e){
        $(this).change(function(){
            if(!$(this).val()){
                $(this).parents('.form-line').first().addClass('focused error');
            }else{
                $(this).parents('.form-line').first().removeClass('focused error');
            }
        });
    });

    $("select[required]").each(function (e){
        $(this).blur(function(){
            if(!$(this).val()){
                $(this).parents('.form-line').first().addClass('focused error');
            }else{
                $(this).parents('.form-line').first().removeClass('focused error');
            }
        });
    });
    /* paiement with stripe */

    var style = {
        base: {
            color: '#32325D',
            fontWeight: 500,
            fontFamily: 'Source Code Pro, Consolas, Menlo, monospace',
            fontSize: '16px',
            fontSmoothing: 'antialiased',
            border : "1px solid #696969",
            padding : "8px 25px 8px 25px",

            '::placeholder': {
                color: '#bbb9b9',
            },
            ':-webkit-autofill': {
                color: '#bbb9b9',
            },
        },
        invalid: {
            color: '#E25950',

            '::placeholder': {
                color: '#FFCCA5',
            },
        },
    };

    var stripe = Stripe(STRIPE_KEY);
    var elements = stripe.elements({
        fonts: [
            {
                cssSrc: "https://rsms.me/inter/inter-ui.css"
            }
        ],
        hidePostalCode : true
    });
    // var card = elements.create('card', {style: style, hidePostalCode : true});

    var cardNumber = elements.create('cardNumber', {
        style: style,
    });
    cardNumber.mount('#credit-card-number');

    var cardExpiry = elements.create('cardExpiry', {
        style: style,
    });
    cardExpiry.mount('#credit-card-expiry');

    var cardCvc = elements.create('cardCvc', {
        style: style,
    });
    cardCvc.mount('#credit-card-cvc');

    registerElements([cardNumber, cardExpiry, cardCvc], 'credit-card', stripe);

});

function registerElements(elements, exampleName, stripe) {
    var formClass = '.' + exampleName;
    var example = document.querySelector(formClass);

    var form = document.querySelector('form');
    var resetButton = document.querySelector('a.reset');
    var error = form.querySelector('.error');
    // var errorMessage = error.querySelector('.message');

    function enableInputs() {
        Array.prototype.forEach.call(
            form.querySelectorAll(
                "input[type='text'], input[type='email'], input[type='tel']"
            ),
            function(input) {
                input.removeAttribute('disabled');
            }
        );
    }

    function disableInputs() {
        Array.prototype.forEach.call(
            form.querySelectorAll(
                "input[type='text'], input[type='email'], input[type='tel']"
            ),
            function(input) {
                input.setAttribute('disabled', 'true');
            }
        );
    }

    // Listen for errors from each Element, and show error messages in the UI.
    var savedErrors = {};
    elements.forEach(function(element, idx) {
        element.on('change', function(event) {
            if (event.error) {
                swal({
                    title: "Erreur",
                    text: event.error.message,
                    type: "error",
                    html : true
                }, function() { });
            }
        });
    });


    $('#payment-form-btn').click(function(){
        // disableInputs();

        // Gather additional customer data we may have collected in our form.
        var name = form.querySelector('#' + exampleName + '-name');
        var address1 = form.querySelector('#' + exampleName + '-address');
        var city = form.querySelector('#' + exampleName + '-city');
        var state = form.querySelector('#' + exampleName + '-state');
        var zip = form.querySelector('#' + exampleName + '-zip');
        var additionalData = {
            name: name ? name.value : undefined,
            address_line1: address1 ? address1.value : undefined,
            address_city: city ? city.value : undefined,
            address_state: state ? state.value : undefined,
            address_zip: zip ? zip.value : undefined,
        };

        var btn = $(this);
        btn.attr('disabled', true).attr('data-text', btn.html()).html('<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>');
        stripe.createToken(elements[0], additionalData).then(function(result) {
            if (result.error) {
                btn.removeAttr('disabled').html(btn.data('text'));
                swal({
                    title: "Erreur",
                    text: result.error.message,
                    type: "error",
                    html : true
                }, function() { });
            } else {
                // Send the token to your server
                $('#paiementtoken').val(JSON.stringify(result.token));
                adhesionTrigger(function(){
                    btn.removeAttr('disabled').html(btn.data('text'));
                });
            }
        }).catch(function(){
            btn.removeAttr('disabled').html(btn.data('text'));
        });

    });

}