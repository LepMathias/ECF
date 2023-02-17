<div class="row menus">
    <div class="card text-center">
        <div class="card-header">
            <h5><?=$menu->getTitle()?></h5>
        </div>
        <div class="card-body">
            <p class="content"><i><?=$menu->getDescription()?></i></p>
            <p class="content"><?=$menu->getPrice()?> €</p>
        </div>
        <div class="card-footer">
            <p class="content"><i>(<?=$menu->getAvailability()?>)</i></p>
        </div>
    </div>
</div>
