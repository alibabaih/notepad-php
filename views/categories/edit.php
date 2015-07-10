<div id="content-wrapper">

    <!--Change item-->
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">Изменить категорию</span>
        </div>
        <div class="panel-body">
            <form method="post" action="<? echo URL; ?>categories/editSave/<?php echo $this->category['id_cat']; ?>" class="form">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Название категории</label>
                            <?php $category_name = $this->category['category']; ?>
                            <input type="text" name="category" placeholder="Название категории" value="<?php echo $category_name; ?>" class="form-control">
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-success btn-block" value="Изменить"/>
            </form>
        </div>
    </div>

</div>
