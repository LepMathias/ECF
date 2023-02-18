<form name="form-schedules" action="#" method="post">
    <tr>
        <th scope="row" id="day"><?=$schedule->day?></th>
        <td>
            <input class="form-control" type="text" name="startDej" id="startDej" value="<?=$schedule->startDej?>">
            <input class="form-control" type="text" name="endDej" id="endDej" value="<?=$schedule->endDej?>">
        </td>
        <td>
            <input class="form-control" type="text" name="startDin" id="startDin" value="<?=$schedule->startDin?>">
            <input class="form-control" type="text" name="endDin" id="endDin" value="<?=$schedule->endDin?>">
        </td>
        <td>
            <input type="hidden" name="id" id="id" value="<?=$schedule->id?>">
            <button class="btn btn-success" type="submit" id="schedules-btn" onclick="reloadDIV()">Mettre à jour</button>
        </td>
    </tr>
</form>