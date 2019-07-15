<button class="accordion">popular news</button>
<div class="panel">
    <div class="accordion" id="title">
        <table class="allnews">
            <tr>
                <th>Name author</th>
                <th>Text</th>
                <th>Date of create</th>
                <th>Delete</th>
            </tr>
            <?php
            foreach ($this->new as $array):
                ?>
                <tr>
                <a href='<?= $link . $array->newsId; ?>'>
                    <td class="maininf1">
                        <?= $array['name'] ?>
                    </td>
                    <td>
                        <p><?= $array['text']; ?></p>
                    </td>
                    <td class="maininf3">
                        <?= $array['dateOfCreate']; ?>
                    </td>
                </a>
                <td class="maininf5">
                    <form method="POST" class="w3-container" action="main/delete">
                        <input type="hidden" name="deleteNewsId" value="<?= $array['id'] ?>"/>
                        <input class="w3-button w3-teal" type="submit"  value='Delete' id="delete"/>
                    </form>   
                </td>
                </tr>


            <?php endforeach; ?>
        </table>
    </div>
</div>
<div id="cabinet_allNews">
    <a href="/add">
        <input class="accordion" type="button" name="cabinet_newNews" value="Create new" id="addNews" />
    </a>
    <div class="accordion" id="title">
        <table class="allnews">
            <tr>
                <th>Name author</th>
                <th>Text</th>
                <th>Date of create</th>
                <th>Count of comments</th>
                <th>Delete</th>
            </tr>
            <?php
            foreach ($this->main as $news):
                ?>
                <tr>
                    <td class="maininf1">
                        <p><?= $news['name'] ?></p>
                    </td>
                    <td>
                        <p><?= $news['text']; ?></p>
                    </td>
                    <td class="maininf3">
                        <p><?= $news['dateOfCreate']; ?></p>
                    </td>
                    <td class="maininf3">
                        <p><?= $news['COUNT(comments.news_id)']; ?></p>
                    </td>
                    <td class="maininf5">
                        <form method="POST" class="w3-container" action="main/delete">
                            <input type="hidden" name="deleteNewsId" value="<?= $news['id'] ?>"/>
                            <input class="w3-button w3-teal" type="submit"  value='Delete' id="delete"/>
                        </form>
                        <form method="POST" class="w3-container" action="/single">
                            <input type="hidden" name="newsId" value="<?= $news['id']; ?>"/>
                            <input class="w3-button w3-teal" type="submit"  value='show more' id="delete"/>
                        </form>
                    </td>
                </tr>


            <?php endforeach; ?>
        </table>
    </div>
</div>
<a href="/add">
    <input class="accordion" type="button" name="cabinet_newNews" value="Create new" id="addNews" />
</a>
