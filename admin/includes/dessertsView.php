<div class="card">
    <div class="row">
        <h5 class="col"><?=$dessert->getTitle()?></h5>
        <h6 class="col"><?=$dessert->getPrice()?></h6>
    </div>
    <div class="row">
        <p class="col"><?=$dessert->getDescription()?></p>
        <a href="?id=<?=$dessert->getId()?>" class="btn btn-danger">Supprimer</a>
    </div>
</div>