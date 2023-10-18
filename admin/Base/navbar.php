<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="dashboardadmin.php" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="user.php" class="nav-link">User</a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
              Gudang
            </a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">
                  Data Master
                </a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li><a href="stok_barang.php" class="dropdown-item">Stok Barang</a></li>
                  <li><a href="type_barang.php" class="dropdown-item">Type</a></li>
                  <li><a href="lokasi_barang.php" class="dropdown-item">Lokasi</a></li>
                  <li><a href="satuan_barang.php" class="dropdown-item">Satuan</a></li>
                </ul>
              </li>
              <li><a href="material_in.php" class="dropdown-item">Material Masuk</a></li>
              <li><a href="material_out.php" class="dropdown-item">Material Keluar</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
              Tools
            </a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">
                  Data Master
                </a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li><a href="#" class="dropdown-item">Stok Tools</a></li>
                  <li><a href="#" class="dropdown-item">Type</a></li>
                  <li><a href="#" class="dropdown-item">Lokasi</a></li>
                  <li><a href="#" class="dropdown-item">Satuan</a></li>
                </ul>
              </li>
              <li><a href="#" class="dropdown-item">Tools Masuk</a></li>
              <li><a href="#" class="dropdown-item">Tools Keluar</a></li>
            </ul>
          </li>
        </ul>
      </div>

      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link" href="../logout.php">
			Logout &nbsp;
            <i class="far fa-share-square"></i>
            <span class="badge badge-warning navbar-badge"></span>
          </a>
        </li>
      </ul>
    </div>
  </nav>