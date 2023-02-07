
<div class="card d-flex flex-wrap" style="width: 18rem;">
    <img src="../../public/src/img/uploads/<?=$file?>" class="card-img-top" alt="...">
    <div class="card-body">
        <p class="card-text"><?=$file?></p>
        <form method="post" action="#">
            <input type="hidden" name="file" value="<?=$file?>">
            <button class="btn btn-primary" type="submit" name="deleteFile">Supprimer</button>
        </form>
    </div>
</div>