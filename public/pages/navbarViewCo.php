<nav class="row align-items-center" id="navMenu">
    <div class="col-md-6">
        <button class="btn" id="homePage"><h1 class="text-white">Le Quai Antique</h1></button>
    </div>
    <div class="col-md-4">
        <button class="btn" id="menusPage"><h2 class="text-white">Nos menus</h2></button>
    </div>
    <div class="col-md-2">
        <div class="row">
            <p class="text-center"><?= $user->firstName.' '.$user->lastName ?></p>
        </div>
        <div class="row">
            <button class="btn" id="Log-out"><h5 class="text-white">Log out</h5></button>
        </div>
    </div>
</nav>