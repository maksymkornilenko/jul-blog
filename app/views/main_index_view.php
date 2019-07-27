<div class="w3-content" style="max-width:1400px">
    <!-- Header -->
    <header class="w3-container w3-center w3-padding-32"> 
        <h1><b>MY BLOG</b></h1>
    </header>

    <!-- Grid -->
    <div class="w3-row">

        <!-- Blog entries -->
        <div class=" w3-container w3-col l8 s12">
            <button class="accordion w3-margin w3-card-4 w3-button w3-padding-large w3-white w3-border">add news</button>
            <div class="panel">
                <form action="main/create" method="POST">
                    <label class="w3-opacity w3-margin"><b>Имя автора</b></label>
                    <input  class="w3-input w3-border w3-white w3-card-4 w3-margin" type="text" name="title" maxlength="150" placeholder="автор" required/>
                    <label class="w3-opacity w3-margin"><b>Текст</b></label>
                    <textarea name="content" placeholder="text" required class="w3-input w3-border w3-white w3-card-4 w3-margin"></textarea>
                    <input class=" w3-margin w3-card-4 w3-button w3-padding-large w3-white w3-border" type="submit" value="Загрузить" name="upload"/>
                </form>
            </div>
            <?php foreach ($this->main as $news): ?>
                <div class="w3-card-4 w3-margin w3-white">
                    <div class="w3-container">
                        <h3><b><?= $news['name'] ?></b></h3>
                        <h5>Title description, <span class="w3-opacity"><?= $news['dateOfCreate']; ?></span></h5>
                    </div>

                    <div class="w3-container">
                        <p class="main"><?= $news['text'] ?></b</p>
                        <div class="w3-row">
                            <div class="w3-col m8 s12">
                                <table>
                                    <td>
                                        <p>
                                        <form method="get" action="/single">
                                            <input type="hidden" name="newsId" value="<?= $news['id']; ?>"/>
                                            <b><input class="w3-button w3-padding-large w3-white w3-border" type="submit"  value='READ MORE »'/></b>
                                        </form>
                                        </p>
                                    </td>
                                    <td>
                                        <p>
                                        <form method="POST" class="w3-container" action="main/delete">
                                            <input type="hidden" name="deleteNewsId" value="<?= $news['id'] ?>"/>
                                            <b><input class="w3-button w3-padding-large w3-white w3-border" type="submit"  value='Delete' id="delete"/></b>
                                        </form>
                                        </p>
                                    </td>
                                </table>
                            </div>
                            <div class="w3-col m4 w3-hide-small">
                                <p><span class="w3-padding-large w3-right"><b>Comments  </b> <span class="w3-tag"><?= $news['COUNT(comments.news_id)']; ?></span></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <hr>
            <button class="accordion w3-margin w3-card-4 w3-button w3-padding-large w3-white w3-border">add news</button>
            <div class="panel">
                <form action="main/create" method="POST">
                    <label class="w3-opacity w3-margin"><b>Имя автора</b></label>
                    <input  class="w3-input w3-border w3-white w3-card-4 w3-margin" type="text" name="title" maxlength="150" placeholder="автор" required/>
                    <label class="w3-opacity w3-margin"><b>Текст</b></label>
                    <textarea name="content" placeholder="text" class="w3-input w3-border w3-white w3-card-4 w3-margin" required></textarea>
                    <input class=" w3-margin w3-card-4 w3-button w3-padding-large w3-white w3-border" type="submit" value="Загрузить" name="upload"/>
                </form>
            </div>
        </div>
        <!-- Introduction menu -->
        <div class="w3-col l4">
            <!-- About Card -->
            <div class="w3-card w3-margin w3-margin-top">
                <div class="w3-container w3-white">
                    <h4><b>My Name</b></h4>
                    <p>Just me, myself and I, exploring the universe of uknownment. I have a heart of love and a interest of lorem ipsum and mauris neque quam blog. I want to share my world with you.</p>
                </div>
            </div>
            <hr>
            <!-- Posts -->
            <div class="w3-card w3-margin">
                <button class="w3-container w3-padding w3-button w3-padding-large w3-light-grey accordion"><h4>Popular Posts</h4></button>
                <div class="panel">
                    <ul class="w3-ul w3-hoverable w3-white">
                        <?php foreach ($this->new as $array): ?>
                            <li class="w3-padding-16">
                                <a href="/single?newsId=<?php echo($array['id']); ?>">
                                    <div>
                                        <span class="w3-large"><?= $array['name'] ?></span><br>
                                        <span class="main"><?= $array['text']; ?></span>
                                    </div>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <hr>
            <!-- END Introduction Menu -->
        </div>
        <!-- END GRID -->
    </div>
    <br>
</div>