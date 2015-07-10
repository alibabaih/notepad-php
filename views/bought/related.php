<div id="content-wrapper">
    <div class="page-header">
        <h1><i class="fa fa-gift page-header-icon"></i>&nbsp;&nbsp;Дополнительно</h1>
    </div>

    <script>
        init.push(function () {
            // Single select good
            $("#jquery-select2-example").select2({
                allowClear: true,
                placeholder: "Выберите товар"
            });
            //date picker
            $("#masked-inputs-examples-date").mask("99.99.99");

            var options = {
                todayBtn: "linked",
                format: 'dd.mm.yy',
                orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto'
            }
            $('#bs-datepicker-example').datepicker(options);
        });
    </script>

    <script>
        function proverka(input) {
            var value = input.value;
            var rep = /[-/\\,;":'a-zA-Zа-яА-Я]/;
            if (rep.test(value)) {
                value = value.replace(rep, '');
                input.value = value;
            }
        }
    </script>

    <!-- Создать отчёт с купленными товарами товарами -->
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">Создать новый купленный сопутствующий товар или товар или приход бонусов</span>
        </div>
        <div class="panel-body">
            <form method="post" action="<? echo URL; ?>bought/createRelated" class="form">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <!--@TODO:  -->
                            <label class="control-label">Дата</label>
                            <input type="text" name="date" class="form-control" value="<?php echo date("d.m.y"); ?>" id="bs-datepicker-example">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <!--@TODO:  -->
                            <label class="control-label">Магазин</label>
                            <select class="form-control" name="shop">
                                <?php if (Session::get('role') == 'default'): ?>
                                    <option value="<?php echo Session::get('office'); ?>"><?php echo Session::get('office'); ?></option>
                                <?php endif; ?>

                                <?php if (Session::get('role') == 'owner'): ?>
                                    <option value="Павла Мочалова">Павла Мочалова</option>
                                    <option value="Октябрьская">Октябрьская</option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div id="sold">
                    <div class="row" id="sold_item">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Приход сопутствующего товара на сумму</label>
                                <input type="text" name="related" class="form-control" placeholder="Приход сопутствующего товара на сумму"   onkeyup="return proverka(this);">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Приход бонусов, баллы</label>
                                <input type="text" name="points" class="form-control" placeholder="Приход бонусов, баллы"   onkeyup="return proverka(this);">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label></label><input type="submit" class="btn btn-success" value="Создать"/>
                    </div>
                    <div class="col-md-6">
                        <p class="help-block text-right"><i class="fa fa-asterisk form-control-feedback"></i> Дробные числа записываются через точку. Например: 246.54</p>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php if (Session::get('office') == TOP_OFFICE || (Session::get('role') == ADMIN)): ?>
    <!-- Список проданных товаров на Октябрьской -->
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">Список купленных сопутствующий товар или товар или приход бонусов  для офиса на ул. Октябрьской, 9а</span>
            <span style="float: right;" class="label label-info">ул. Октябрьская, 9а</span>
        </div>
        <div class="panel-body">
            <table class="table table-hover" style="font-size: 13px;">
                <thead>
                <tr>
                    <th class="text-center">Дата</th>
                    <th class="text-center">Сопутствующие товары</th>
                    <th class="text-center">Баллы</th>
                    <th class="text-center">Действия</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($this->relatedShopOktabrskaya as $key => $value) {
                    $time = strtotime($value['date']);
                    $myFormatForView = date("d.m.y", $time);
                    echo '<tr>
                        <td class="text-center">' . $myFormatForView . '</td>
                        <td class="text-center">' . number_format($value['related'], 2, ',', ' ') . ' руб.</td>
                        <td class="text-center">' . number_format($value['points'], 2, ',', ' ') . '</td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <button type="button" class="btn"><a style="color:#555" href="'.URL.'bought/editRelated/'.$value['id'].'">Изменить</a></button>
                                <button type="button" class="btn btn-danger"><a style="color:white" href="'.URL.'bought/deleteRelated/'.$value['id'].'">Удалить</a></button>
                            </div>
                        </td>
                        </tr>';
                }
                //print_r();
                ?>

                </tbody>
            </table>
        </div>
    </div>
    <?php endif; ?>
    <?php if (Session::get('office') == BOTTOM_OFFICE || (Session::get('role') == ADMIN)): ?>
    <!-- Список проданных товаров на Павла Мочалова -->
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">Список купленных сопутствующий товар или товар или приход бонусов на ул. Павла Мочалова, 11</span>
            <span style="float: right;" class="label label-info">ул. Павла Мочалова, 11</span>
        </div>
        <div class="panel-body">
            <table class="table table-hover" style="font-size: 13px;">
                <thead>
                <tr>
                    <th class="text-center">Дата</th>
                    <th class="text-center">Сопутствующие товары</th>
                    <th class="text-center">Баллы</th>
                    <th class="text-center">Действия</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($this->relatedShopPavlaMochalova as $key => $value) {
                    $time = strtotime($value['date']);
                    $myFormatForView = date("d.m.y", $time);
                    echo '<tr>
                            <td class="text-center">' . $myFormatForView . ' </td>
                            <td class="text-center">' . number_format($value['related'], 2, ',', ' ') . ' руб.</td>
                            <td class="text-center">' . number_format($value['points'], 2, ',', ' ') . '</td>
                            <td class="text-center">
                                <div class="btn-group btn-group-xs">
                                    <button type="button" class="btn"><a style="color:#555" href="'.URL.'bought/editRelated/'.$value['id'].'">Изменить</a></button>
                                    <button type="button" class="btn btn-danger"><a style="color:white" href="'.URL.'bought/deleteRelated/'.$value['id'].'">Удалить</a></button>
                                </div>
                            </td>
                            </tr>';
                }
                //print_r();
                ?>

                </tbody>
            </table>
        </div>
    </div>
    <?php endif; ?>

</div>
