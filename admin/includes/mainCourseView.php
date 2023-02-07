<div class="card">
    <div class="row">
        <h5 class="col"><?=$main->getTitle()?></h5>
        <h6 class="col"><?=$main->getPrice()?>€</h6>
    </div>
    <div class="row">
        <p class="col"><?=$main->getDescription()?></p>
        <a href="?id=<?=$main->getId()?>" class="btn btn-danger">Supprimer</a>
    </div>
</div>