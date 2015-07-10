<div id="content-wrapper">
    <div class="page-header">
        <h1><i class="fa fa-folder page-header-icon"></i>&nbsp;&nbsp;Категории</h1>
    </div>
    <!--Create item-->
    <div class="panel-group" id="accordion-example">
        <div class="panel">
            <div class="panel-heading">
                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example" href="#collapseOne" style="color: #555;    font-size: 14px;    line-height: 20px;">
                    Создать новую категорию
                </a>
            </div>
            <div id="collapseOne" class="panel-collapse collapse">
                <div class="panel-body">
                    <form method="post" action="<? echo URL; ?>categories/create" class="form">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Название категории</label>
                                    <input type="text" name="category" placeholder="Название категории" class="form-control">
                                </div>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-success btn-block" value="Создать"/>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Show items-->
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">Список категорий</span>
        </div>
        <div class="panel-body">
            <table  style="font-size: 13px;" class="table table-hover">
                <thead>
                <tr>
                    <th class="text-center">№</th>
                    <th class="text-center">Категория</th>
                    <th class="text-center">Редактирование</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($this->categoriesList as $key => $value) {
                        echo '<tr>';
                            echo '<td class="text-center">' . $id = $id + 1 . '</td>';
                            echo '<td class="text-center">' . $value['category'] . '</td>';
                            echo '<td class="text-center"><div class="btn-group btn-group-xs"><button class="btn btn-xs"><a style="color:#555" href="'.URL.'categories/edit/'.$value['id_cat'].'">Изменить</a></button><button class="btn btn-danger"><a style="color:white" href="'.URL.'categories/delete/'.$value['id_cat'].'">Удалить</a></button></div></td>';
                        echo '</tr>';
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
