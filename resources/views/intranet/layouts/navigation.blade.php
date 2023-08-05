<ul class="sidebar-menu" data-widget="tree">
    <li class="header">STATISTIQUES</li>
    <li>
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Tableau de Bord</span>
        </a>
    </li>
    <li class="header">MENU</li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-male"></i>
            <span>Clients</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ route('intranet.indexCustomer', 'physical') }}">Client Physique</a></li>
            <li><a href="{{ route('intranet.indexCustomer', 'moral') }}">Client Moral</a></li>
        </ul>
    </li>
    <li>
        <a href="{{ route('intranet.indexCar') }}">
            <i class="fa fa-car"></i> <span>Véhicules</span>
        </a>
    </li>
    <li>
        <a href="{{ route('intranet.indexReservation') }}">
            <i class="fa fa-bookmark"></i> <span>Reservations</span>
        </a>
    </li>
    {{--<li>--}}
        {{--<a href="{{ route('intranet.indexLeasing') }}">--}}
            {{--<i class="fa fa-retweet"></i> <span>Locations</span>--}}
        {{--</a>--}}
    {{--</li>--}}
    <li>
        <a href="{{ route('intranet.indexSubcontracting') }}">
            <i class="fa fa-arrow-down"></i> <span>Sous-traitances</span>
        </a>
    </li>
    {{--<li>--}}
        {{--<a href="#">--}}
            {{--<i class="fa fa-credit-card"></i> <span>Paiements</span>--}}
        {{--</a>--}}
    {{--</li>--}}
    <li>
        <a href="{{ route('intranet.indexInvoice') }}">
            <i class="fa fa-dollar"></i> <span>Factures</span>
        </a>
    </li>
    <li>
        <a href="{{ route('intranet.indexUser') }}">
            <i class="fa fa-user"></i> <span>Utilisateurs</span>
        </a>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-cog "></i>
            <span>Configurations</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ route('intranet.indexMark') }}">Marques Véhicule</a></li>
            <li><a href="{{ route('intranet.indexCartype') }}">Types Véhicule</a></li>
            <li><a href="{{ route('intranet.indexCarmodel') }}">Modèles Véhicule</a></li>
            <li><a href="{{ route('intranet.indexCategory') }}">Catégories Véhicule</a></li>
            <li><a href="{{ route('intranet.indexCarstate') }}">Etats Véhicule</a></li>
            <li><a href="{{ route('intranet.indexDriver') }}">Chauffeurs</a></li>
            <li><a href="{{ route('intranet.editRate') }}">Taux & KIlométrage</a></li>
        </ul>
    </li>


    <li class="header">JOURNAL</li>
    <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Historique</span></a></li>
</ul>