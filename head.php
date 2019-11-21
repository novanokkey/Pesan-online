<?php
    $keranjang = new Keranjang();
    $idpelanggan = $currentUser['idpelanggan'];
    $keranjangku = $keranjang->selectCountall($idpelanggan);
?>
<nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
            aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <a class="navbar-brand text-brand" href="home">E<span class="color-b">SHOP</span></a>
        <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none"
            data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
            <span class="fa fa-search" aria-hidden="true"></span>
        </button>
        <div class="navbar-collapse collapse justify-content-left" id="navbarDefault">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="produk">Produk </a>
                </li>
                <?php
                    $pelanggan = new Pelanggan();
                    if (!$pelanggan->isLoggedIn()) {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="pelanggan">Registrasi / Login </a>
                </li>
                    <?php } ?>
                
                <?php
                   
                    if ($pelanggan->isLoggedIn()) {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="pesananku">Pesananku </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="konfirmasi">Konfirmasi Pembayaran </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout">Logout </a>
                </li>
                    <?php }?>
                        

            </ul>
        </div>
        
        <a href="keranjang" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block" 
             aria-expanded="false">
            Keranjang Ku (<?php echo $keranjangku['idpelanggan'];?>)
        </a>
        
    </div>
</nav>