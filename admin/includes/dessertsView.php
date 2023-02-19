<div class="card">
    <div class="row">
        <h5 class="col"><?=$dessert->title?></h5>
        <h6 class="col price"><?=$dessert->price?>€</h6>
    </div>
    <div class="row">
        <p class="col"><?=$dessert->description?></p>
        <a href="?id=<?=$dessert->id?>" class="btn btn-danger">Supprimer</a>
    </div>
</div>