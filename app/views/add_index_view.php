    <div id="main" class="w3-card-4">
        <div class="w3-container w3-teal">
            <h2>Создать статью</h2>
        </div>
        <form id="text author" action="add/create" method="POST" w3-container>
                <label class="w3-text-teal"><b>Имя автора</b></label>
                <input  class="w3-input w3-border w3-light-grey" type="text" name="title" maxlength="150" placeholder="автор" required/>
                <label class="w3-text-teal"><b>Текст</b></label>
                <textarea name="content" placeholder="text" required class="w3-input w3-border w3-light-grey"></textarea>
                <input class="w3-btn w3-blue-grey" type="submit" value="Загрузить" name="upload"/>
        </form>
    </div>

