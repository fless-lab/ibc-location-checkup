@extends('extranet.layouts.app')

@section('content')

<!-- Register -->
<section id="subscription" style="background: #2e3192 ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">Abonnement mensuel</h2>
                <h3 class="section-subheading text-muted">Profitez des frais exceptionnels </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('extranet.storeUser') }}" method="post" id="physical" enctype="multipart/form-data" style="font-family: Montserrat">
                    @csrf
                    <input type="hidden" name="type" value="physical">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><b>Jours réguliers</b></label><br>
                                <input type="checkbox" value="1" name="days[]"> Lundi &nbsp;&nbsp;
                                <input type="checkbox" value="1" name="days[]"> Mardi &nbsp;&nbsp;
                                <input type="checkbox" value="1" name="days[]"> Mercredi &nbsp;&nbsp;
                                <input type="checkbox" value="1" name="days[]"> Jeudi &nbsp;&nbsp;
                                <input type="checkbox" value="1" name="days[]"> Vendredi &nbsp;&nbsp;
                                <input type="checkbox" value="1" name="days[]"> Samedi &nbsp;&nbsp;
                                <input type="checkbox" value="1" name="days[]"> Dimanche &nbsp;&nbsp;
                            </div>
                            <div class="form-group">
                                <label><b>Durée par jour</b></label><br>
                                <input type="radio" name="time" value="4"> 4H &nbsp;&nbsp;
                                <input type="radio" name="time" value="8"> 8H &nbsp;&nbsp;
                                <input type="radio" name="time" value="12"> 12H &nbsp;&nbsp;
                                <input type="radio" name="time" value="16"> 16H &nbsp;&nbsp;
                                <input type="radio" name="time" value="20"> 20H &nbsp;&nbsp;
                                <input type="radio" name="time" value="24"> 24H &nbsp;&nbsp;
                            </div>
                            <div class="form-group">
                                <label><b>Montant total à payer</b></label><br>
                                <h3>120000 FCFA</h3>
                            </div>
                        </div>

                        <div class="clearfix"></div>
                        <div class="col-lg-12 text-center">
                            <div id="success"></div>
                            <button class="btn btn-xl text-uppercase" type="submit">Autre</button>
                            <button class="btn btn-primary btn-xl text-uppercase" type="submit">Je m'abonne !</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

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

        $('#condition').change(function(){
            if(!$(this).prop('checked')){
                $('.btn-xl').attr('disabled', 'disabled')
            }else{
                $('.btn-xl').removeAttr('disabled')
            }
        })

    </script>
@endpush