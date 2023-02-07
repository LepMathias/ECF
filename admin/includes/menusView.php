<div class="card">
    <div class="row">
        <h5 class="col"><?=$menu->getTitle()?></h5>
        <h6 class="col"><?=$menu->getPrice()?>€</h6>
    </div>
    <div class="row">
        <p class="col"><?=$menu->getDescription()?></p>
        <a href="?id=<?=$menu->getId()?>" class="btn btn-danger">Supprimer</a>
    </div>
</div>