<!-- Connexion -->
<div id="contact-form">
    <section style="background: #2e3192 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase">Connexion</h2>
                    <h3 class="section-subheading text-muted">Connectez-vous si vous êtes déja client pour accéder aux reservations et aux locations, à défaut créez votre compte</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('loginExtranet') }}" id="loginForm" method="post" >
                        {{ csrf_field() }}
                        <div class="row">
                           <div class="col-md-12 alert alert-danger" style="display: none" id="msg">
                               L'email ou le mot de passe est incorrect. Veuillez réessayer ou créer un compte si vous n'en disposiez pas
                           </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" name="email" type="email" placeholder="Votre Email *" required="required" id="email" data-validation-required-message="Entrez votre adresse mail SVP enter your email address.">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group password-bloc">
                                    <input class="form-control password" name="password" type="password" id="pass" placeholder="Votre Mot de Passe *" required="required" data-validation-required-message="Entrez votre mot de passe SVP.">
                                    <i class="fas fa-eye" style="cursor: pointer"></i>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div>
                                <a class="btn btn-link" href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                            </div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button class="btn btn-primary btn-xl text-uppercase" type="submit" id="btnLogin" onclick="return false;">Se Connecter</button>
                            </div>
                            <a href="#register-form" id="show-register" style="margin-left: 18px">Créer un compte</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<div id="register-form" style="display: none;">
    @include('extranet.register')
</div>

@push('scripts')
    <script>

        $('#show-register').click(function(){
            $('#register-form').show()
            $('#contact-form').hide()
        })

        $('#login').click(function(){
            $('#register-form').hide()
            $('#contact-form').show()
        })
        
        $('#btnLogin').click(function(){
            var email = $('#email').val()
            var password = $('#pass').val()
            
            $.post("{{ route('checkLogin') }}", {_token : "{{ csrf_token() }}", email : email, password : password}, function(rsp){
                if(rsp === 'false'){
                    $('#msg').show()
                }else if(rsp === 'true'){
                    location.reload(true)
                }else{
                    window.location = rsp
                }
            })
        })
    </script>
@endpush
