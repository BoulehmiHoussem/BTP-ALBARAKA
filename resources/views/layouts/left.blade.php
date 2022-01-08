<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          
          <li class="nav-item">
            <a class="nav-link" href="index.html">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('planning.chantiers') }}">
              <i class="mdi mdi-blur-linear menu-icon"></i>
              <span class="menu-title">Planning</span>
            </a>
          </li>
          @if(Auth::user()->type != 2)
          <li class="nav-item">
            <a class="nav-link" href="{{ route('chantiers.list') }}">
              <i class="mdi mdi-hospital-building menu-icon"></i>
              <span class="menu-title">Gestion des chantiers</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('tasks.list') }}">
              <i class="mdi mdi mdi-book-multiple menu-icon"></i>
              <span class="menu-title">Gestion des tâches</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#gs" aria-expanded="false" aria-controls="gs">
              <i class="mdi mdi-cart-outline menu-icon"></i>
              <span class="menu-title">Gestion de stock</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="gs">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('products.list') }}">Produits</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('locations.list') }}">Locations</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('demands.list') }}">Demandes d'achat</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#rp" aria-expanded="false" aria-controls="rp">
              <i class="mdi mdi-account-multiple menu-icon"></i>
              <span class="menu-title">Resources et pointages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="rp">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('rh.list') }}">Utlisateurs</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('employee.list') }}">Employées</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Pointage</a></li>
              </ul>
            </div>
          </li>
          @endif
        </ul>
      </nav>
