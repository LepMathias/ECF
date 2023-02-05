<header>
    <div class="container-fluid">
        <nav class="row align-items-center" id="navMenu">
            <div class="col-md-3">
                <button class="btn" id="homePage"><h1 class="text-white">Le Quai Antique</h1></button>
            </div>
            <div class="col-md-6 justify-content-md-start">
                <div class="row">
                    <a href="../../public/pages/menus.php" class="btn" id="menusPage"><h2 class="text-white">Nos menus</h2></a>
                </div>
            </div>
            <div class="col-md-3">
                <?php if(isset($_SESSION) && $_SESSION['admin'] === 1): ?>
                    <div class="row">
                        <p class="text-center"><?= $_SESSION['firstname'].' '.$_SESSION['lastname'] ?></p>
                    </div>
                    <div class="row">
                        <a href="../../admin/pages/Parameters.php" class="btn" id="param"><h5 class="text-white">Paramètres</h5></a>
                    </div>
                    <div class="row">
                        <a href="../../public/pages/logout.php" class="btn" id="log-ou"><h5 class="text-white">Log out</h5></a>
                    </div>
                <?php elseif(isset($_SESSION) && $_SESSION['admin'] === 0): ?>
                    <div class="row">
                        <p class="text-center"><?= $_SESSION['firstname'].' '.$_SESSION['lastname'] ?></p>
                    </div>
                    <div class="row">
                        <a href="../../public/pages/logout.php" class="btn" id="log-out"><h5 class="text-white">Log out</h5></a>
                    </div>
                <?php else: ?>
                    <div class="row">
                        <button class="btn" id="log-in"><h5 class="text-white">Log in</h5></button>
                    </div>
                    <div class="row">
                        <button class="btn" id="sign-up"><h5 class="text-white">Sign up</h5></button>
                    </div>
                <?php endif; ?>
            </div>
        </nav>
    </div>
</header>