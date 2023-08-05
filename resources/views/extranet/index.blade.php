@extends('extranet.layouts.app')

@section('content')

@if(\Illuminate\Support\Facades\Auth::user())

@else
    @include('extranet.login')
@endif

@php
    session_start();
    if(!isset($_SESSION['page_redirect'])) $_SESSION['page_redirect'] = '';

    //\App\Models\Mark::create(['name' => 'Toyota']);
    //\App\Models\Mark::create(['name' => 'KIA']);
    //\App\Models\Mark::create(['name' => 'Nissan']);
    //\App\Models\Mark::create(['name' => 'Renault']);
    //\App\Models\Mark::create(['name' => 'Citroën']);
    //\App\Models\Mark::create(['name' => 'Peugeot']);
    //\App\Models\Mark::create(['name' => 'Hyundai']);
    //\App\Models\Mark::create(['name' => 'BMW']);
    //\App\Models\Mark::create(['name' => 'Range Rover']);

@endphp

<style>
    .password-bloc{
        position: relative;
    }
    .password-bloc i{
        position: absolute;
        right: 10px;
        top: 10px;
        color: #777
    }
    #contact, #contact-form, #register-form{
        /*font-family: Montserrat, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji' !important;*/
    }
</style>


<!-- Cars Grid -->
<section class="bg-light" id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">Véhicules</h2>
                <h3 class="section-subheading text-muted">Vous avez la possibilité de reserver ou louer un véhicule de votre choix</h3>
            </div>
        </div>

        <div class="row">
            @foreach($cars as $car)
                @php
                    if($car->carfiles){
                        foreach ($car->carfiles as $carfile){
                            $imageName = $carfile->name;
                            break;
                        }
                    }

                @endphp
                <div class="col-md-3 col-sm-6 portfolio-item" @if(!$car->available) style="opacity: 0.5; cursor: none" @endif>
                    <p style="text-align: right; font-family: Montserrat; font-size: 12px">
                        A partir de <b style="font-size: 20px">{{ $car->amount }} FCFA</b><b> / Jour</b>
                    </p>
                    <a class="portfolio-link"  @if(!$car->available) href="#car{{ $car->id }}" title="Ce véhicule est temporairement indisponible. Veuillez choisir un autre svp" @else data-toggle="modal" href="#car{{ $car->id }}" @endif onclick="putSession()">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fas fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-fluid" style="object-fit: cover; width: 400px;  height: 180px; border-radius: 10px" src="{{ url(env('STORAGE_PATH').'uploads/cars/'.$imageName) }}" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4 style="color: #2caadd">{{ $car->mark->name }}</h4>
                        <p class="text-muted">{{ $car->carmodel->name }}</p>
                        <p style="font-size: 12px">{{ $car->cartype->name }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{--@php--}}
{{--\Illuminate\Support\Facades\DB::table('cars')->update([--}}
        {{--'lome_accra' => 20000,--}}
        {{--'lome_cotonou' => 15000,--}}
    {{--]);--}}
{{--@endphp--}}

@if($user)
    @include('extranet.reservation.list')
    {{--@include('extranet.leasing.list')--}}
@endif

<!-- Services -->
<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">Nos Offres</h2>
                {{--<h3 class="section-subheading text-muted">Nous offrons : </h3>--}}
            </div>
        </div>
        <div class="row text-center">

                <div class="col-md-3"><a href="#portfolio" class="js-scroll-trigger" style="color: #000 !important;">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-clock fa-stack-1x fa-inverse"></i>
          </span>
                    <h4 class="service-heading">LOCATION HORAIRE</h4> </a>
                    <p class="text-muted">
                        Louer un véhicule pour une très courte durée ? C'est possible avec EASYCARRENTAL !

                        L'offre EASYCARRENTAL ASTUCIEUX permet de réserver votre véhicule à partir d'une heure de location et à un prix très attractif !
                        <br>
                        Pour plus d'informations, appelez-nous au <a href="tel:+22891455151">91 45 51 51</a>
                    </p>

                </div>



            <div class="col-md-3"><a href="#portfolio" class="js-scroll-trigger" style="color: #000 !important;">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-car fa-stack-1x fa-inverse"></i>
          </span>
                <h4 class="service-heading">LOCATION JOURNALIERE</h4></a>
                <p class="text-muted">Louer votre véhicule pour une période de jours ou de mois</p>
            </div>

            <div class="col-md-3"><a href="#portfolio" class="js-scroll-trigger" style="color: #000 !important;">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fab fa-weebly fa-stack-1x fa-inverse"></i>
          </span>
                <h4 class="service-heading">TARIF WEEK-END</h4></a>
                <p class="text-muted">Des réductions en or durant le week-end</p>
        </div>

            {{--<a href="#portfolio" class="js-scroll-trigger" style="color: #000 !important;">--}}
            <div class="col-md-3"><a href="#portfolio" class="js-scroll-trigger" style="color: #000 !important;">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fab fa-etsy fa-stack-1x fa-inverse"></i>
          </span>
                    <h4 class="service-heading">EXPRESS</h4></a>
                <p class="text-muted">Offre spéciale pour un trajet <i>Lomé - Accra - Lomé</i> et <i>Lomé - Cotonou - Lomé</i>.</p>
            </div>

            <div class="col-md-3"><a href="#contact" class="js-scroll-trigger" style="color: #000 !important;">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-calendar fa-stack-1x fa-inverse"></i>
          </span>
                    <h4 class="service-heading">ABONNEMENT MENSUEL</h4></a>
                <p class="text-muted">Contactez l'agence pour discuter de votre formule mensuelle.</p>
            </div>
            {{--</a>--}}
        </div>
    </div>
</section>



{{--<!-- Team -->--}}
{{--<section class="bg-light" id="team">--}}
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-lg-12 text-center">--}}
                {{--<h2 class="section-heading text-uppercase">Notre extraordinaire équipe</h2>--}}
                {{--<h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="row">--}}
            {{--<div class="col-sm-4">--}}
                {{--<div class="team-member">--}}
                    {{--<img class="mx-auto rounded-circle" src="img/team/1.jpg" alt="">--}}
                    {{--<h4>Kay Garland</h4>--}}
                    {{--<p class="text-muted">Lead Designer</p>--}}
                    {{--<ul class="list-inline social-buttons">--}}
                        {{--<li class="list-inline-item">--}}
                            {{--<a href="#">--}}
                                {{--<i class="fab fa-twitter"></i>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="list-inline-item">--}}
                            {{--<a href="#">--}}
                                {{--<i class="fab fa-facebook-f"></i>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="list-inline-item">--}}
                            {{--<a href="#">--}}
                                {{--<i class="fab fa-linkedin-in"></i>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-sm-4">--}}
                {{--<div class="team-member">--}}
                    {{--<img class="mx-auto rounded-circle" src="img/team/2.jpg" alt="">--}}
                    {{--<h4>Larry Parker</h4>--}}
                    {{--<p class="text-muted">Lead Marketer</p>--}}
                    {{--<ul class="list-inline social-buttons">--}}
                        {{--<li class="list-inline-item">--}}
                            {{--<a href="#">--}}
                                {{--<i class="fab fa-twitter"></i>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="list-inline-item">--}}
                            {{--<a href="#">--}}
                                {{--<i class="fab fa-facebook-f"></i>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="list-inline-item">--}}
                            {{--<a href="#">--}}
                                {{--<i class="fab fa-linkedin-in"></i>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-sm-4">--}}
                {{--<div class="team-member">--}}
                    {{--<img class="mx-auto rounded-circle" src="img/team/3.jpg" alt="">--}}
                    {{--<h4>Diana Pertersen</h4>--}}
                    {{--<p class="text-muted">Lead Developer</p>--}}
                    {{--<ul class="list-inline social-buttons">--}}
                        {{--<li class="list-inline-item">--}}
                            {{--<a href="#">--}}
                                {{--<i class="fab fa-twitter"></i>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="list-inline-item">--}}
                            {{--<a href="#">--}}
                                {{--<i class="fab fa-facebook-f"></i>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="list-inline-item">--}}
                            {{--<a href="#">--}}
                                {{--<i class="fab fa-linkedin-in"></i>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="row">--}}
            {{--<div class="col-lg-8 mx-auto text-center">--}}
                {{--<p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</section>--}}

{{--<!-- Clients -->--}}
{{--<section class="py-5">--}}
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-3 col-sm-6">--}}
                {{--<a href="#">--}}
                    {{--<img class="img-fluid d-block mx-auto" src="img/logos/envato.jpg" alt="">--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--<div class="col-md-3 col-sm-6">--}}
                {{--<a href="#">--}}
                    {{--<img class="img-fluid d-block mx-auto" src="img/logos/designmodo.jpg" alt="">--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--<div class="col-md-3 col-sm-6">--}}
                {{--<a href="#">--}}
                    {{--<img class="img-fluid d-block mx-auto" src="img/logos/themeforest.jpg" alt="">--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--<div class="col-md-3 col-sm-6">--}}
                {{--<a href="#">--}}
                    {{--<img class="img-fluid d-block mx-auto" src="img/logos/creative-market.jpg" alt="">--}}
                {{--</a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</section>--}}

<!-- Contact -->
@if($user)
<section id="contact" style="background: #2e3192 ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">Contactez Nous</h2>
                <h3 class="section-subheading text-muted">Nous sommes aptes à répondre à vos bésoins.</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form id="contactForm" name="sentMessage" novalidate="novalidate">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" id="name" type="text" placeholder="Votre nom *" required="required" data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="email" type="email" placeholder="Votre Email *" required="required" data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="phone" type="tel" placeholder="Votre Téléphone *" required="required" data-validation-required-message="Please enter your phone number.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control" id="message" placeholder="Votre Message *" required="required" data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-12 text-center">
                            <div id="success"></div>
                            <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Envoyez votre Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endif
<!-- About -->
{{--<section id="about">--}}
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-lg-12 text-center">--}}
                {{--<h2 class="section-heading text-uppercase">A propos</h2>--}}
                {{--<h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="row">--}}
            {{--<div class="col-lg-12">--}}
                {{--<ul class="timeline">--}}
                    {{--<li>--}}
                        {{--<div class="timeline-image">--}}
                            {{--<img class="rounded-circle img-fluid" src="img/about/1.jpg" alt="">--}}
                        {{--</div>--}}
                        {{--<div class="timeline-panel">--}}
                            {{--<div class="timeline-heading">--}}
                                {{--<h4>2009-2011</h4>--}}
                                {{--<h4 class="subheading">Our Humble Beginnings</h4>--}}
                            {{--</div>--}}
                            {{--<div class="timeline-body">--}}
                                {{--<p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</li>--}}
                    {{--<li class="timeline-inverted">--}}
                        {{--<div class="timeline-image">--}}
                            {{--<img class="rounded-circle img-fluid" src="img/about/2.jpg" alt="">--}}
                        {{--</div>--}}
                        {{--<div class="timeline-panel">--}}
                            {{--<div class="timeline-heading">--}}
                                {{--<h4>March 2011</h4>--}}
                                {{--<h4 class="subheading">An Agency is Born</h4>--}}
                            {{--</div>--}}
                            {{--<div class="timeline-body">--}}
                                {{--<p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<div class="timeline-image">--}}
                            {{--<img class="rounded-circle img-fluid" src="img/about/3.jpg" alt="">--}}
                        {{--</div>--}}
                        {{--<div class="timeline-panel">--}}
                            {{--<div class="timeline-heading">--}}
                                {{--<h4>December 2012</h4>--}}
                                {{--<h4 class="subheading">Transition to Full Service</h4>--}}
                            {{--</div>--}}
                            {{--<div class="timeline-body">--}}
                                {{--<p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</li>--}}
                    {{--<li class="timeline-inverted">--}}
                        {{--<div class="timeline-image">--}}
                            {{--<img class="rounded-circle img-fluid" src="img/about/4.jpg" alt="">--}}
                        {{--</div>--}}
                        {{--<div class="timeline-panel">--}}
                            {{--<div class="timeline-heading">--}}
                                {{--<h4>July 2014</h4>--}}
                                {{--<h4 class="subheading">Phase Two Expansion</h4>--}}
                            {{--</div>--}}
                            {{--<div class="timeline-body">--}}
                                {{--<p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</li>--}}
                    {{--<li class="timeline-inverted">--}}
                        {{--<div class="timeline-image">--}}
                            {{--<h4>Be Part--}}
                                {{--<br>Of Our--}}
                                {{--<br>Story!</h4>--}}
                        {{--</div>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</section>--}}



@endsection

@push('scripts')
    <script>
        var checkPass = false;

        var typePage =  window.location.href.split('#')

        if(typePage[1] === 'register'){
            window.location.href = '#contact-form'
            setTimeout(function () {
                $('#contact-form').hide()
                $('#register-form').hide()
                $('#register-form').show()
            }, 200)

        }

        $('#create').click(function(){
            $('#show-register').trigger('click')
        })

        $('.reserv').click(function() {
            @php
                if(!\Illuminate\Support\Facades\Auth::user() == null){
                    $_SESSION['page_redirect'] = route('extranet.createReservation', [0, 24]).'#reservation';
                }
            @endphp
        })

        $('.fa-eye').click(function(){
            if(checkPass === false){
                $('.password').attr('type', 'text')
                checkPass = true;
            }else{
                $('.password').attr('type', 'password')
                checkPass = false;
            }
        })



    </script>
@endpush


