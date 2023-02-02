<header>
    <div class="container-fluid">
        <nav class="row align-items-center" id="navMenu">
            <div class="col-md-6">
                <button class="btn" id="homePage"><h1 class="text-white">Le Quai Antique</h1></button>
            </div>
            <?php if (!isset($_SESSION['id'])) {
                include 'navbarViewNoCo.php';
            } else {
                include 'navbarViewCo.php';
            }?>
        </nav>
    </div>
</header>
