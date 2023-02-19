<div class="card">
    <div class="row">
        <h5 class="col"><?=$menu->title?></h5>
        <h6 class="col price"><?=$menu->price?>€</h6>
    </div>
    <div class="row">
        <p class="col"><?=$menu->description?></p>
        <p class="col"><?=$menu->availability?></p>
        <a href="?id=<?=$menu->id?>" class="btn btn-danger">Supprimer</a>
    </div>
</div>