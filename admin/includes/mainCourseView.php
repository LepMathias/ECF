<div class="card">
    <div class="row">
        <h5 class="col"><?=$main->title?></h5>
        <h6 class="col price"><?=$main->price?>€</h6>
    </div>
    <div class="row">
        <p class="col"><?=$main->description?></p>
        <a href="?id=<?=$main->id?>" class="btn btn-danger">Supprimer</a>
    </div>
</div>