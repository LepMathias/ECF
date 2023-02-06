<div class="card">
    <div class="row">
        <h5 class="col"><?=$starter->getTitle()?></h5>
        <h6 class="col"><?=$starter->getPrice()?></h6>
    </div>
    <div class="row">
        <p class="col"><?=$starter->getDescription()?></p>
        <a href="?id=<?=$starter->getId()?>" class="btn btn-danger">Supprimer</a>
    </div>
</div>