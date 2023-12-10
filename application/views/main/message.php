<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">
                <h1><?php echo htmlspecialchars($data['title'], ENT_QUOTES); ?></h1>
                <span class="subheading"><?php echo htmlspecialchars($data['Summary'], ENT_QUOTES); ?></span>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <p><?php echo htmlspecialchars($data['Full_contents'], ENT_QUOTES); ?></p>
        </div>
    </div>
    <hr class="border border-primary border-3 opacity-75">
    <div class="row">
        <?php foreach ($comments as $val) : ?>
            <div class="col-lg-5 col-md-5 mx-auto">
                <h3 class="post-subtitle">пользователь <?= htmlspecialchars($val['login'], ENT_QUOTES); ?></h3>
                <h5 class="post-title"><?= htmlspecialchars($val['text_comment'], ENT_QUOTES); ?></h5>

            </div>
            <?php if (isset($_SESSION['login'])) :            ?>
                <div class="col-lg-5 col-md-5 mx-auto">
                    <a href="/message/delete/comment/<?php echo $val['id']; ?>" class="btn btn-danger">Удалить</a>
                    <a href="/message/edit/comment/<?php echo $val['id']; ?>" class="btn btn-primary">Редактировать</a>
                </div>

            <?php endif; ?>
            <hr>

        <?php endforeach; ?>
        <?php if (isset($_SESSION['login'])) :            ?>
            <div class="row">
                <div class="col-sm-4">
                    <form action="/message/<?=$data['id']?>" method="post">
                        <div class="form-group">
                            <label>Комментарий</label>
                            <textarea class="form-control" rows="3" name="Comment"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Добавить</button>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>