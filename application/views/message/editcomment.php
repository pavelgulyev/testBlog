<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <form action="/message/edit/comment/<?php echo $data['id']; ?>" method="post">
                            <div class="form-group">
                                <label>Текст</label>
                                <textarea class="form-control" rows="3" name="text_comment"><?php echo htmlspecialchars($data['text_comment'], ENT_QUOTES); ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Сохранить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>