<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <form action="/message/add" method="post">
                            <div class="form-group">
                                <label>Заголовок</label>
                                <input class="form-control" type="text" name="title">
                            </div>
                            <div class="form-group">
                                <label>Краткое содержание</label>
                                <input class="form-control" type="text" name="Summary">
                            </div>
                            <div class="form-group">
                                <label>Полное содержание</label>
                                <textarea class="form-control" rows="3" name="Full_contents"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Добавить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>