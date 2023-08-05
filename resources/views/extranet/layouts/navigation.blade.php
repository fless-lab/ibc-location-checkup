@php
    use Illuminate\Support\Facades\Auth;
@endphp

<!-- Navigation -->
<style>
    .band{
        background: rgb(0,0,0,1);
        width: 100%;
        height: 40px;
        margin: auto;
        padding: 10px;
        font-family: Montserrat;
        font-size: 12px;
        z-index: 2000;
        top: 0;
        position: absolute;
    }
    .band div{
        display: inline-block;
        color: #fff;
        width: 22%;
        float: right
    }
    .band div i{
        color: #2caadd;
        font-size: 14px
    }
    #mainNav li{
        font-size: 13px !important;
    }
    @media (max-width: 500px) {
        .band{
            height: 95px;
            position: inherit;
        }
        .band div{
            display:block;
            float: none;
            width: 100% !important;
            margin: auto;
            text-align: center;
        }
        .fixed-top{
            top: 95px !important;
        }
        .nav-link{
            color: #fff !important;
        }
        #mainNav{
            background: #fff
        }
        .container{
            margin-top: 0 !important;
        }
        .fixed-top{
            position: inherit !important;
        }
    }


</style>
<div class="band">
    <div>
        <i class="fas fa-envelope"></i>
        &nbsp;
        <a href="mailto:info@easycarrental.fr">info@easycarrental.fr</a>
    </div>
    <div>
        <i class="fas fa-phone"></i>
        &nbsp;
        <a href="tel:+22891455151">+22891455151</a>
    </div>
    <div>
        <i class="fas fa-map-marker-alt"></i>
        &nbsp;
        367 Rue Agodja Kodjoviakopé
    </div>
    <div>
        <i class="fas fa-clock"></i>
        &nbsp;
        Ouvert de 8H à 22H
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" style="background: #2e3192">
    <div class="container" style="margin-top: 30px">
        <br><br><br>
        <a class="navbar-brand js-scroll-trigger" href="{{ route('index') }}#page-top">
            <img src="{{ url(env('STORAGE_PATH').'logo_easy.png') }}" style="width: 250px"/>
            {{--<h1 style="color: #fff !important; font-weight: 100">IBC LOCATION</h1>--}}
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="{{ route('index') }}#portfolio">Véhicules</a>
                </li>

                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link js-scroll-trigger" href="#contact">Contact</a>--}}
                {{--</li>--}}
                @if(Auth::user())
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{ route('index') }}#reservation">Reservations</a>
                    </li>
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link js-scroll-trigger" href="{{ route('createSubscription') }}#subscription">Abonnement</a>--}}
                    {{--</li>--}}
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{ route('index') }}#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{ route('index') }}#services">Offres</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{ route('index') }}#services">Offres</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index') }}#register-form" id="create">Créer un compte</a>
                    </li>
                @endif
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link js-scroll-trigger" href="#team">L'équipe</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link js-scroll-trigger" href="#about">A Propos</a>--}}
                {{--</li>--}}

            </ul>
            <ul class="user-ul">
                @if(Auth::user())
                    @php
                        $user = Auth::user();
                        $photo = $user->photo;
                    @endphp
                    <li>
                        <a class="" href="#" id="sort-down">
                            <img src="{{ url(env('STORAGE_PATH').'uploads/avatars/'.$photo) }}" style="width: 40px; height: 40px; border-radius: 50px; object-fit: cover;" alt="">
                            &nbsp;
                            {{ Auth::user()->name }}
                            &nbsp;
                            <i class="fa fa-sort-down"></i>
                        </a>
                    </li>
                    <ul id="user-options" visible="false">
                        <li><a href="{{ route('extranet.editCustomer', [$user->id, $user->type]) }}#contact"><i class="fa fa-user" style="margin-top: -2px !important;"></i> Mon profil </a></li>
                        <li><a href="{{ route('logoutExtranet') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-power-off" style="margin-top: -2px !important;"></i> Déconnexion </a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                @else
                    <li>
                        <a class="" href="{{ route('index') }}#contact-form" id="login">Connexion</a>
                    </li>
                @endif
            </ul>

        </div>
    </div>
</nav>

@push('scripts')
    <script>
        $('#sort-down').click(function(){
            var option = $('#user-options')
            if(option.attr('visible') === 'false'){
                option.show()
                option.attr('visible', 'true')
            }else{
                option.hide()
                option.attr('visible', 'false')
            }
        })
    </script>
@endpush