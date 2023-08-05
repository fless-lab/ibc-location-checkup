
<style>
.content{
display: flex;
justify-content: space-around;
height: 464px;
font-family: Montserrat
}
.content .img{
width: 50%; padding: 10px
}
.content .para{
width: 50%;
text-align: left;
padding-left: 10px
}
.content .para .description{
color: #555;
text-align: justify;
font-size: 12px;
height: 171px
}
@media screen and (max-width: 500px) {
.modal-content{
height: 1500px
}
.content{
display: block
}
.content .img{
width: 100%;
}
.content .para{
width: 100%;
padding: 10px
}
.content .para .description{
height: auto
}
}
</style>

@php
$cars = \App\Models\Car::all();
$user = \Illuminate\Support\Facades\Auth::user();
@endphp

<!-- Modals -->

@foreach($cars as $car)
    @php
        foreach ($car->carfiles as $carfile){
            $imageName = $carfile->name;
            break;
        }
    @endphp
    <div class="portfolio-modal modal fade" id="car{{ $car->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-14 mx-auto">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2 class="text-uppercase" style="color: #2caadd">{{ $car->mark->name }} <b style="color: gray">{{ $car->carmodel->name }}</b></h2>
                                <h4 class="text-uppercase"><b>{{ $car->cartype->name }}</b></h4>
{{--                                <p class="item-intro text-muted" style="line-height: 1">{{ $car->cartype->name }}</p>--}}
                                <div class="content">
                                    <div class="img">
                                        <img class="img-fluid d-block mx-auto" src="{{ url(env('STORAGE_PATH').'uploads/cars/'.$imageName) }}" alt="" style="height: 100%; width: 100%; object-fit: cover">
                                    </div>
                                    <div  class="para">
                                        <p style="font-size: 20px">
                                            A partir de <b style="font-size: 28px">{{ $car->amount }} F CFA</b> <b>/ Jour</b>
                                        </p>
                                        <p class="description">
                                            {{ $car->description }}
                                        </p>
                                        <table class="car-description">
                                            <tr>
                                                <td>Tarif horaire</td>
                                                <td><b>{{ $car->amount_hour }} FCFA</b></td>
                                            </tr>
                                            <tr>
                                                <td>Couleur</td>
                                                <td><b>{{ $car->color }}</b></td>
                                            </tr>
                                            <tr>
                                                <td>Etat</td>
                                                <td><b>{{ $car->carstate->name }}</b></td>
                                            </tr>
                                        </table>
                                        <table class="car-description">
                                            <tr>
                                                <td>Nombre de places</td>
                                                <td><b>{{ $car->place }}</b></td>
                                            </tr>
                                            <tr>
                                                <td>Nombre de bagages</td>
                                                <td><b>{{ $car->baggage }}</b></td>
                                            </tr>
                                            <tr>
                                                <td>Nombre de portes</td>
                                                <td><b>{{ $car->door }}</b></td>
                                            </tr>
                                        </table>
                                        <div style="width: 100%">
                                            {{--<a @if($user AND $car) href="{{ route('extranet.createLeasing', [$user->id, $car->id]) }}#leasing" @else href="{{ route('extranet.createLeasing', [0, 0]) }}" @endif>--}}
                                                {{--<button class="btn modal-btn"  type="button" style="margin-top: 20px; background: #2caadd">--}}
                                                    {{--<i class="fa fa-retweet"></i> &nbsp; Louer--}}
                                                {{--</button>--}}
                                            {{--</a>--}}
                                            <a @if($user AND $car) href="{{ route('extranet.createReservation', [$user->id, $car->id]) }}#reservation" @else href="{{ route('redirect', $car->id) }}" @endif>
                                                <button class="btn modal-btn reserv"  type="button" style="margin-top: 20px; background: #2caadd;">
                                                    <i class="fa fa-bookmark"></i> &nbsp; Reserver
                                                </button>
                                            </a>
                                            <input type="hidden" class="session" value="">
                                        </div>

                                    </div>
                                </div>

                                {{--<p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>--}}


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach