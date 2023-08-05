<!-- Register -->
<section id="contact-form" style="background: #2e3192 ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">Inscription</h2>
                <h3 class="section-subheading text-muted">Inscrivez-vous pour accéder aux reservations et aux locations.
                    <br> * Le client physique sous-entend une personne indépendante.
                    <br> Le client moral représente une société, une entreprise, une compagnie, un groupe etc. *</h3>
                <select id="customer-type">
                    <option value="physical" selected="selected">Client Physique</option>
                    <option value="moral">Client Moral</option>
                </select>
                <br><br>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('extranet.storeUser') }}" class="form" method="post" id="physical" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="type" value="physical">
                    <div class="row">
                        
                        <div class="col-md-12" style="display: none">
                            <div class="alert alert-danger">{{ $errors->first() }}
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Photo</label><br>
                                <input class="form-control" name="photo" type="file" placeholder="Importez votre photo" data-validation-required-message="Entrez votre adresse mail SVP enter your email address.">
                            </div>
                            <div class="form-group">
                                <label>Nom & Prénoms</label><br>
                                <input class="form-control" name="name" type="text" placeholder="Votre Nom & Prénoms *" required="required" data-validation-required-message="Entrez votre adresse mail SVP enter your email address.">
                            </div>
                            <div class="form-group">
                                <label>Numero de pièce d'identité</label><br>
                                <input class="form-control" name="cni" type="text" placeholder="Votre CNI" >
                            </div>
                            <div class="form-group">
                                <label>Téléphone</label><br>
                                <input class="form-control" name="telephone" required type="text" placeholder="Votre Téléphone" >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Adresse</label><br>
                                <input class="form-control" name="address" type="text" placeholder="Votre adresse" >
                            </div>
                            <div class="form-group">
                                <label>Email</label><br>
                                <input class="form-control email" name="email" type="email" placeholder="Votre Email *" required="required" data-validation-required-message="Entrez votre adresse mail SVP enter your email address.">
                                <p style="display: none; color: red; font-style: italic" class="email-exist">
                                    Cet email a déjà été utilisé
                                </p>
                            </div>
                            <div class="form-group password-bloc">
                                <label>Mot de passe</label><br>
                                <input class="form-control password" id="password" name="password" type="password" placeholder="Votre Mot de Passe *" required="required" data-validation-required-message="Entrez votre mot de passe SVP.">
                                <i class="fas fa-eye" style="cursor: pointer"></i>
                            </div>
                            <div class="form-group password-bloc">
                                <label>Confirmation de Mot de passe</label>
                                <input type="password" class="form-control password" required="required" id="confirm" placeholder="Confirmez votre mot de passe">
                                <i class="fas fa-eye" style="cursor: pointer"></i>
                                <br>
                                <p id="message" style="font-style: italic; font-size: 12px"></p>
                            </div>
                        </div>

                        <div>
                            <input type="checkbox" id="condition" style="cursor: pointer" required/> <b style="color: #fff">J'accepte les conditions générales d'utilisation</b>
                            <br><br>
                            <iframe src="{{ route('condition') }}" frameborder="0" width="400"></iframe>
                        </div>


                        <div class="clearfix"></div>
                        <div class="col-lg-12 text-center">
                            <div id="success"></div>
                            <button class="btn btn-primary btn-xl text-uppercase" type="submit">S'inscrire</button>
                        </div>
                    </div>

                </form>

                <form action="{{ route('extranet.storeUser') }}" class="form" method="post" id="moral" enctype="multipart/form-data" style="display: none">
                    @csrf
                    <input type="hidden" name="type" value="moral">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Photo</label><br>
                                <input class="form-control" name="photo" type="file" placeholder="Importez votre photo" data-validation-required-message="Entrez votre adresse mail SVP enter your email address.">
                            </div>
                            <div class="form-group">
                                <label>Nom & Prénoms</label><br>
                                <input class="form-control" name="name" type="email" placeholder="Votre Nom & Prénoms *" required="required" data-validation-required-message="Entrez votre adresse mail SVP enter your email address.">
                            </div>
                            <div class="form-group">
                                <label>Nom Ressource</label><br>
                                <input class="form-control" name="resource_name" type="text" placeholder="Nom de la Ressource" >
                            </div>
                            <div class="form-group">
                                <label>Numéro Ressource</label><br>
                                <input class="form-control" name="resource_num" type="text" placeholder="Numéro de la Ressource" >
                            </div>
                            <div class="form-group">
                                <label>Téléphone</label><br>
                                <input class="form-control" name="telephone" type="text" placeholder="Votre Téléphone" >
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Numéro Opérateur Economique</label><br>
                                <input class="form-control" name="operator_num" type="text" placeholder="Numéro Opérateur Economique" >
                            </div>
                            <div class="form-group">
                                <label>Adresse</label><br>
                                <input class="form-control" name="address" type="text" placeholder="Votre adresse" >
                            </div>
                            <div class="form-group">
                                <label>Email</label><br>
                                <input class="form-control email" name="email" type="email" placeholder="Votre Email *" required="required" data-validation-required-message="Entrez votre adresse mail SVP enter your email address.">
                                <p style="display: none; color: red; font-style: italic" class="email-exist">
                                    Cet email a déjà été utilisé
                                </p>
                            </div>
                            <div class="form-group password-bloc">
                                <label>Mot de passe</label><br>
                                <input class="form-control password"  id="password2" name="password" type="password" placeholder="Votre Mot de Passe *" required="required" data-validation-required-message="Entrez votre mot de passe SVP.">
                                <i class="fas fa-eye" style="cursor: pointer"></i>
                            </div>
                            <div class="form-group password-bloc">
                                <label>Confirmation de Mot de passe</label>
                                <input type="password" class="form-control password" id="confirm2" placeholder="Confirmez votre mot de passe">
                                <i class="fas fa-eye" style="cursor: pointer"></i>
                                <br>
                                <p id="message2" style="font-style: italic; font-size: 12px"></p>
                            </div>
                        </div>

                        <div>
                            <input type="checkbox" id="condition" style="cursor: pointer" required/> <b style="color: #fff" width="400">J'accepte les conditions générales d'utilisation</b>
                            <br><br>
                            <iframe src="{{ route('condition') }}" frameborder="0"></iframe>
                        </div>

                        <div class="clearfix"></div>
                        <div class="col-lg-12 text-center">
                            <div id="success"></div>
                            <button class="btn btn-primary btn-xl text-uppercase" type="submit">S'inscrire</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>

@push('scripts')
    <script>
        $('#customer-type').change(function(){
            if($(this).val() === 'physical'){
                $('#physical').show();
                $('#moral').hide();
            }else{
                $('#physical').hide();
                $('#moral').show();
            }
        })

//        $('#condition').change(function(){
//            if(!$(this).prop('checked')){
//                $('.btn-xl').attr('disabled', 'disabled')
//            }else{
//                $('.btn-xl').removeAttr('disabled')
//            }
//        })

        $('.email').keyup(function(){
            console.log($(this).val())
            $.post("{{ route('checkEmail') }}", {_token : "{{ csrf_token() }}", email : $(this).val()}, function (rsp) {
                if(rsp === 'true'){
                    $('.email-exist').show()
                    $('.btn-primary').attr('disabled', 'disabled')
                }else{
                    $('.email-exist').hide()
//                    if($('#condition').prop('checked')){
//                        $('.btn-primary').removeAttr('disabled')
//                    }
                }
            })
        })

        $('#confirm').keyup(function () {
            var password = $('#password')
            var confirm = $(this)
            var message = $('#message')
            var submit = $('.btn-primary')
            if(confirm.val() !== password.val()){
                console.log(confirm.val()+' === '+password.val())
                message.html('La confirmation ne correspond pas au mot de passe').css("color", "red")
                submit.attr('disabled', 'disabled')
            }else{
                message.html('Confirmation correcte').css("color", "green")
                submit.removeAttr('disabled')
            }
        })



    </script>
@endpush