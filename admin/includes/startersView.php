<div class="card">
    <div class="row">
        <h5 class="col"><?=$starter->title?></h5>
        <h6 class="col price"><?=$starter->price?>€</h6>
    </div>
    <div class="row">
        <p class="col"><?=$starter->description?></p>
        <a href="?id=<?=$starter->id?>" class="btn btn-danger">Supprimer</a>
    </div>
</div>