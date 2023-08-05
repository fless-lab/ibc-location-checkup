@extends('extranet.layouts.app')

@section('content')

    <section class="bg-light" id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase">Véhicules</h2>
                    <h3 class="section-subheading text-muted">Vous avez la possibilité de reserver ou louer un véhicule de votre choix</h3>
                </div>
            </div>

            <div class="row">
                @forelse($cars as $car)
                    @php
                        if($car->carfiles){
                            foreach ($car->carfiles as $carfile){
                                $imageName = $carfile->name;
                                break;
                            }
                        }

                    @endphp
                    <div class="col-md-3 col-sm-6 portfolio-item">
                        <p style="text-align: right; font-family: Montserrat; font-size: 12px">
                            A partir de <b style="font-size: 20px">{{ $car->amount }} FCFA</b><b> / Jour</b>
                        </p>
                        <a class="portfolio-link" data-toggle="modal" href="#car{{ $car->id }}">
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
                @empty
                    <div>
                        L'agence <b>Nukafu, Lomé</b> ne dispose pas de véhicules sur le filtre indiqué
                    </div>
                @endforelse
            </div>
        </div>
    </section>

@endsection