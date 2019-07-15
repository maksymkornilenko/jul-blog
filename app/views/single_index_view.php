<?php $content = $this->one; ?>
<?php $refresh_content = $this->refresh; ?>
<form class="w3-panel w3-pale-blue w3-leftbar w3-rightbar w3-border-teal" id="back" action="/" method="post" >
    <h2><?php echo $content[0]['name']; ?><?php echo $refresh_content[0]['name']; ?></h2>
    <p class="w3-text-black"><?php echo $content[0]['text'];
echo $refresh_content[0]['text']; ?></p>
    <input type="submit" value="К списку" class="w3-button w3-teal" onclick="document.getElementById("id01").style.display="block""/>
</form>
<form method="post" action="/single/add" id="add">
    <input type="hidden" value="<?php echo $content[0]['id']; ?>" name="id"/>
    <input class="add" type="text" name="user"/>
    <input class="add" type="text" name="comment"/>
    <input class="add" type="submit" value="add comment" class="w3-button w3-teal"/>
</form>
<table>
    <tr>
        <th class="table">Имя пользователя</th>
        <th class="table">Текст комментария</th>
        <th class="table">Дата создания комментария</th>
    </tr>
    <?php foreach ($this->comment as $comments): ?>
    <tr>
        <td class='table'><?=$comments['name']?></td>
        <td class="table"><?=$comments['text']?></td>
        <td class='table'><?=$comments['dateOfCreate']?></td>
    </tr>
<?php endforeach; ?>
</table>
