<?php $content = $this->one; ?>
<div class="w3-card-4 w3-margin w3-white">
    <div class="w3-container">
        <h2><b><?= $content[0]['name'] ?></b></h2>
    </div>
    <div class="w3-container">
        <p><?= $content[0]['text'] ?></b</p>
        <div class="w3-row">
            <div class="w3-col m8 s12">
                <p>
                <form method="post" action="/">
                    <b><input class="w3-button w3-padding-large w3-white w3-border" style="width: 150%" type="submit"  value='BACK'/></b>
                </form>
                </p>
            </div>
        </div>
    </div>
</div>
<div class=" w3-container w3-col l8 s12">
    <button class="accordion w3-margin w3-card-4 w3-button w3-padding-large w3-white w3-border">add news</button>
    <div class="panel">
        <form method="post" action="/single/add" id="add">
            <input type="hidden" value="<?php echo $content[0]['id']; ?>" name="id"/>
            <label class="w3-opacity w3-margin"><b>Имя автора</b></label>
            <input class="w3-input w3-border w3-white w3-card-4 w3-margin" type="text" name="user" required/>
            <label class="w3-opacity w3-margin"><b>Текст</b></label>
            <input class="w3-input w3-border w3-white w3-card-4 w3-margin" type="text" name="comment" required/>
            <input class="w3-margin w3-card-4 w3-button w3-padding-large w3-white w3-border" type="submit" value="add comment"/>
        </form>
    </div>
    <?php foreach ($this->comment as $comments): ?>
        <div class="w3-card-4 w3-margin w3-white">
            <div class="w3-container">
                <h3><b><?= $comments['name']; ?></b></h3>
                <h5>Title description, <span class="w3-opacity"><?= $comments['dateOfCreate']; ?></span></h5>
            </div>

            <div class="w3-container">
                <p class="main"><?= $comments['text']; ?></b</p>
            </div>
        </div>
    <?php endforeach; ?>
    <hr>
</div>