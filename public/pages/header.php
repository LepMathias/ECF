<header>
    <div class="container-fluid">
        <nav class="row align-items-center" id="navMenu">
            <div class="col-md-3">
                <button class="btn" id="homePage"><h1 class="text-white">Le Quai Antique</h1></button>
            </div>
            <div class="col-md-6 justify-content-md-start">
                <div class="row">
                    <button class="btn" id="menusPage"><h2 class="text-white">Nos menus</h2></button>
                </div>

            </div>

            <div class="col-md-3">
                <?php if(isset($_SESSION['id'])): ?>
                <div class="row">
                    <p class="text-center"><?= $user->firstName.' '.$user->lastName ?></p>
                </div>
                    <?php if($_SESSION['admin'] === 1): ?>
                        <div class="row">
                            <a href="../../admin/pages/parameters.php" class="btn" id="param"><h5 class="text-white">Paramètres</h5></a>
                        </div>
                    <?php endif; ?>
                <div class="row">
                    <a href="logout.php" class="btn" id="log-ou"><h5 class="text-white">Log out</h5></a>
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
