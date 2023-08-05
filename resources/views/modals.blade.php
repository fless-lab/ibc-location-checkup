
<div class="modal fade" id="preview-modal" style="">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                {{--<h5 class="modal-title">Prévisualisation de la Facture</h5>--}}
            </div>
            <div class="modal-body">
                <iframe src="" frameborder="0" id="preview-invoice" width="100%" height="700px"></iframe>
            </div>
            <input type="hidden" id="phone-number">
            <input type="hidden" id="amount">
            <input type="hidden" id="id">
            <input type="hidden" id="mode">
            <input type="hidden" id="id-type">
            <input type="hidden" id="type">
            <div class="modal-footer">
                    <button type="reset" class="btn btn-default pull-left" data-dismiss="modal">Annuler</button>
                    <a href="#" class="form-paid" data-mode="" data-toggle="" data-target="" data-dismiss="" ><button type="submit" class="btn btn-primary" id="paid">Payer</button></a>
                    <form id="paypal-form" action="" method="post">

                    </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="stripe-modal" style="height: 510px !important;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                {{--<h5 class="modal-title">Prévisualisation de la Facture</h5>--}}
            </div>
            <div class="modal-body">
                <iframe src="" frameborder="0" id="stripe-frame" width="100%" height="700px">
                </iframe>
            </div>
            <input type="hidden" id="phone-number">
            <input type="hidden" id="amount">
            <input type="hidden" id="id">
            <input type="hidden" id="mode">
            <input type="hidden" id="id-type">
            <input type="hidden" id="type">
            <div class="modal-footer">
                <button type="reset" class="btn btn-default pull-left" data-dismiss="modal">Annuler</button>
                {{--<div id="paypal-button-container"></div>--}}
                <a href="#" class="form-paid" data-mode=""><button type="submit" class="btn btn-primary" id="paid">Payer</button></a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->