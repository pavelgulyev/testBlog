<div class="container">
    <div class="row">

        <?php if (empty($list)) : ?>
            <div class="col-lg-8 col-md-10 mx-auto">
                <p>Список постов пуст</p>
            <?php else : ?>
                <?php foreach ($list as $val) : ?>

                    <div class="col-lg-5 col-md-5 mx-auto">
                        <a href="/message/<?php echo $val['id']; ?>">
                            <h2 class="post-title"><?php echo htmlspecialchars($val['title'], ENT_QUOTES); ?></h2>
                            <h5 class="post-subtitle"><?php echo htmlspecialchars($val['Summary'], ENT_QUOTES); ?></h5>
                        </a>

                    </div>
                    <?php if (isset($_SESSION['login'])) :            ?>
                        <div class="col-lg-5 col-md-5 mx-auto">
                            <a href="/message/delete/<?php echo $val['id']; ?>" class="btn btn-danger">Удалить</a>
                            <a href="/message/edit/<?php echo $val['id']; ?>" class="btn btn-primary">Редактировать</a>
                        </div>
                    <?php endif; ?>
                    <hr>

                <?php endforeach; ?>
                <div class="clearfix">
                    <?php echo $pagination; ?>
                </div>
            <?php endif; ?>
            <?php if (isset($_SESSION['login'])) :            ?>
                <div class="col-lg-5 col-md-5 mx-auto">
                    <a href="/message/add" class="btn btn-success">Добавить</a>
                </div>
            <?php endif; ?>
            </div>
    </div>
</div>