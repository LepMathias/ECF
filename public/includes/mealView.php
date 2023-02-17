<div class="row menus">
    <div class="card text-center">
        <div class="card-header">
            <h5><?=$meal->getTitle()?></h5>
        </div>
        <div class="card-body">
            <p class="content"><i><?=$meal->getDescription()?></i></p>
            <p class="content"><?=$meal->getPrice()?> €</p>
        </div>
    </div>
</div>