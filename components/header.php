<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= $baseurl ?>index.php">
            <img src="<?= $baseurl ?>img/logo.png" alt="Logo" width="70">
        </a>
        <button class="navbar-toggler" type="button" data-coreui-toggle="collapse" data-coreui-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" href="<?= $baseurl ?>index.php">Home</a>
                <a class="nav-link" href="<?= $baseurl ?>products.php">Products</a>
                <a class="nav-link" href="<?= $baseurl ?>admin/index.php">Admin</a>
                <a class="nav-link position-relative" href="<?= $baseurl ?>cart.php">
                    Cart <span class="badge bg-secondary position-absolute top-0 start-100 rounded-pill" id="cartBadge">0</span>
                </a>
            </div>
        </div>
    </div>
</nav>