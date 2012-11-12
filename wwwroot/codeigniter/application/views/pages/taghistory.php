<tr><td>

    <div class=portlet>
<table>
<tr><th>Object</th><th>Tag</th><th>Operation type</th><th>Date</th></tr>

<?php foreach ($taghistory as $taghistory_item): ?>

<tr class='row_odd tdleft' valign=top>
    <td><a href='index.php?page=object&object_id=<?php echo $taghistory_item['object_id']?>'><strong><?php echo $taghistory_item['object_id']?></strong></a></td>
    <td><?php echo $taghistory_item['tag_id']?></td>
    <td><?php echo $taghistory_item['operation']?></td>
    <td><?php echo $taghistory_item['date']?></td>
</tr>

<?php endforeach ?>
</table>
        </div>
</td></tr>