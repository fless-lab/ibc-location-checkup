<!-- Header -->
<style>
    .search-intro{
        font-family: Montserrat;
    }
    .search-intro input, select{
        height: 70px;
        width: 280px;
        border: none;
        border-radius: 5px;
        padding: 10px;
        text-align: center;
        margin: 10px;
    }
    .search-intro .input-bloc{
        position: relative;
        display: inline-block;
        /*width: 300px*/
    }
    .search-intro .input-bloc i{
        color: #999;
        position: absolute;
        left: 20px;
        top: 20px
    }
</style>
<header class="masthead"
        style="
        background-image: url('{{ url(env('STORAGE_PATH').'3.jpg') }}')!important;
        background-repeat: no-repeat;
        background-attachment: scroll;
        background-position: center center;
        background-size: cover;
        "
>
    {{--<div class="container">--}}
        {{--<div class="intro-text">--}}
            {{--<div class="intro-lead-in">A partir de <b>{{ $minAmount }} FCFA</b> seulement</div>--}}
            {{--<div class="intro-heading text-uppercase" style="color: #2caadd;">LE PARTENAIRE DE VOTRE MOBILITÉ</div>--}}
            {{--<a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">En savoir plus</a>--}}
        {{--</div>--}}
        {{--<div>--}}

        {{--</div>--}}
    {{--</div>--}}

    @php
        $cartypes = \App\Models\Cartype::all();
    @endphp
    <div style="background: rgb(0, 0, 0, 0.4)">

            <div class="intro-text">
                <div class="intro-lead-in" style="color: #fff"><b>Location à partir de {{ $minAmount }} FCFA seulement</b></div>
                <i class="fas fa-search" style="font-size: 4em"></i>
                <br><br><br><br><br>
                <form action="searchcar#portfolio" method="post" class="search-intro">
                    @csrf
                    <div class="input-bloc">
                        <i class="fas fa-map-marker-alt"></i>
                        <input type="text" placeholder="Agence" name="amount_start" value="Kodjoviakopé, Lomé" onkeypress="return false;">
                    </div>

                    <div class="input-bloc">
                        <i class="fas fa-car"></i>
                        <select name="cartype_id" id="">
                            <option value="">Type (facultatif)</option>
                            @foreach($cartypes as $cartype)
                                <option value="{{ $cartype->id }}">{{ $cartype->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-bloc">
                        <i class="fas fa-calendar-alt"></i>
                        <input type="text" placeholder="Date / Heure - Départ" name="date_start" class="picker">
                    </div>

                    <div class="input-bloc">
                        <i class="fas fa-calendar-alt"></i>
                        <input type="text" placeholder="Date / Heure - Retour" name="date_end" class="picker">
                    </div>

                    <br><br>
                    <button class="btn btn-primary btn-xl text-uppercase " type="submit">Rechercher</button>
                </form>
            </div>
            <div>

            </div>
        </div>


</header>