<div id="content-wrapper">
    <div class="page-header">
        <h1><i class="fa fa-tasks page-header-icon"></i>&nbsp;&nbsp;Товары</h1>
    </div>
    <!--Create item-->
    <div class="panel-group" id="accordion-example">
        <div class="panel">
            <div class="panel-heading">
                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-example" href="#collapseOne" style="color: #555;    font-size: 14px;    line-height: 20px;">
                    Создать новый товар
                </a>
            </div>
            <div id="collapseOne" class="panel-collapse collapse">
                <div class="panel-body">
                    <form method="post" action="<? echo URL; ?>goods/create" class="form">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Название товара</label>
                                    <input type="text" name="name" placeholder="Название товара" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6 no-margin-hr">
                                <label class="control-label">Категория</label>
                                <div class="form-group">
                                    <select name="category_id" class="form-control">
                                        <option></option>
                                        <?php
                                        foreach ($this->getCategoryList as $key => $value) {
                                            echo "<option value=" .$value['id_cat'] . ">" . $value['category'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Баллы</label>
                                    <input type="text" name="point" value="0" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">ИСЦ (мы закупаем по этой цене), <i class="fa fa-eur"></i></label>
                                    <input type="text" name="isc_cost" value="0" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Закупочная цена, <i class="fa fa-eur"></i></label>
                                    <input type="text" name="purches_cost" value="0" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Дистрибьютор, <i class="fa fa-rub"></i></label>
                                    <input type="text" name="distributor_rub_cost" value="0" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Клиент, <i class="fa fa-rub"></i></label>
                                    <input type="text" name="customer_rub_cost" value="0" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!--
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Баллы</label>
                                    <input type="text" name="point" value="0" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">ИСЦ, <i class="fa fa-eur"></i></label>
                                    <input type="text" name="isc_cost" value="0" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Дистрибьютор, <i class="fa fa-eur"></i></label>
                                    <input type="text" name="distributor_ye_cost" value="0" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">Клиент, <i class="fa fa-eur"></i></label>
                                    <input type="text" name="customer_ye_cost" value="0" class="form-control">
                                </div>
                            </div>
                        </div>
                        -->
                        <input type="submit" class="btn btn-success btn-block" value="Создать"/>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Hide few fields with costs
    <script>
        $(document).ready(function(){
            $(".additional").hide();
        });
    </script>
    -->

    <!--jQuery Data Tables-->
    <script>
        init.push(function () {
            $('#jq-datatables-example').dataTable();
            $('#jq-datatables-example_wrapper .table-caption').text('Список товаров');
            $('#jq-datatables-example_wrapper .dataTables_filter input').attr('placeholder', 'Поиск...');
        });
    </script>

    <!--Show items-->
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">Список товаров</span>
        </div>
        <div class="panel-body">
            <div class="table-primary">
            <table  style="font-size: 13px;"  cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">
                <thead>
                <tr>
                    <th class="text-center">№</th>
                    <th>Название</th>
                    <th class="text-center">Категория</th>
                    <th class="text-center">Баллы</th>
                    <th class="text-center">Закупка, <i class="fa fa-eur"></i></th>
                    <th class="text-center">ИСЦ, <i class="fa fa-eur"></i></th>
                    <th class="text-center">Дистрибьютор, <i class="fa fa-rub"></i></th>
                    <th class="text-center">Клиент, <i class="fa fa-rub"></i></th>

                    <!--<th class="text-center additional">Баллы</i></th>
                    <th class="text-center additional">ИСЦ, <i class="fa fa-eur"></i></th>
                    <th class="text-center additional">Дистрибьютор, <i class="fa fa-eur"></i></th>
                    <th class="text-center additional">Клиент, <i class="fa fa-eur"></i></th>-->
                </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($this->goodsList as $key => $value) {
                        echo '<tr>';
                            echo '<td class="text-center">' . $id = $id + 1 . '</td>';
                            //mb_substr($value['name'], 0, 20);
                            echo '<td>' . mb_substr($value['name'], 0, 45, 'utf-8') . '<span style="float: right;">
                            <div class="btn-group btn-group-xs">
                            <button class="btn btn-xs"><a style="color:#555" href="'.URL.'goods/edit/'.$value['id'].'">Изменить</a></button>
                            <button class="btn btn-danger"><a style="color:white" href="'.URL.'goods/delete/'.$value['id'].'">Удалить</a></button></div>
                            </td>';
                            echo '<td class="text-center">' . $value['category'] . '</td>';
                            echo '<td class="text-center">' . $value['point'] . '</td>';
                            echo '<td class="text-center">' . $value['purches_cost'] . ' уе.</td>';
                            echo '<td class="text-center">' . $value['isc_cost'] . ' уе.</td>';
                            echo '<td class="text-center">' . $value['distributor_rub_cost'] . ' руб.</td>';
                            echo '<td class="text-center">' . $value['customer_rub_cost'] . ' руб.</td>';

                            //echo '<td class="text-center additional">' . $value['point'] . ' б.</td>';
                            //echo '<td class="text-center additional">' . $value['isc_cost'] . ' уе.</td>';
                            //echo '<td class="text-center additional">' . $value['distributor_ye_cost'] . ' у.</td>';
                            //echo '<td class="text-center additional">' . $value['customer_ye_cost'] . ' уе.</td>';
                        echo '</tr>';
                    }
                ?>
                <?php
                foreach ($this->goodsListWithoutCategory as $key => $value) {
                    echo '<tr>';
                    echo '<td class="text-center">' . $id = $id + 1 . '</td>';
                    //mb_substr($value['name'], 0, 20);
                    echo '<td>' . mb_substr($value['name'], 0, 45, 'utf-8') . '...' . '<span style="float: right;">
                            <div class="btn-group btn-group-xs">
                            <button class="btn btn-xs"><a style="color:#555" href="'.URL.'goods/edit/'.$value['id'].'">Изменить</a></button>
                            <button class="btn btn-danger"><a style="color:white" href="'.URL.'goods/delete/'.$value['id'].'">Удалить</a></button></div>
                            </td>';
                    echo '<td class="text-center">' . $value['category'] . '</td>';
                    echo '<td class="text-center">' . $value['purches_cost'] . ' уе.</td>';
                    echo '<td class="text-center">' . $value['distributor_rub_cost'] . ' руб.</td>';
                    echo '<td class="text-center">' . $value['customer_rub_cost'] . ' руб.</td>';

                    //echo '<td class="text-center additional">' . $value['point'] . ' б.</td>';
                    //echo '<td class="text-center additional">' . $value['isc_cost'] . ' уе.</td>';
                    //echo '<td class="text-center additional">' . $value['distributor_ye_cost'] . ' у.</td>';
                    //echo '<td class="text-center additional">' . $value['customer_ye_cost'] . ' уе.</td>';
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>

</div>
