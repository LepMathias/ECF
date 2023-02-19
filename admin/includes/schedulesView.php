<form name="form-schedules" action="#" method="post">
    <tr class="text-center">
        <th scope="row" id="day"><?=$schedule->day?></th>
        <td class="w-25">
            <input class="form-control text-center" type="text" name="startDej" id="startDej" value="<?=$schedule->startDej?>">
            <input class="form-control text-center" type="text" name="endDej" id="endDej" value="<?=$schedule->endDej?>">
        </td>
        <td class="w-25">
            <input class="form-control text-center" type="text" name="startDin" id="startDin" value="<?=$schedule->startDin?>">
            <input class="form-control text-center" type="text" name="endDin" id="endDin" value="<?=$schedule->endDin?>">
        </td>
        <td>
            <input type="hidden" name="id" id="id" value="<?=$schedule->id?>">
            <button class="btn btn-success" type="submit" id="schedules-btn" onclick="reloadDIV()">Mettre à jour</button>
        </td>
    </tr>
</form>