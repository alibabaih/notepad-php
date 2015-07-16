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
            format: 'dd.mm.yy',
            orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto'
        }
        $('#bs-datepicker-example').datepicker(options);

        $('#bs-datepicker-example2').datepicker(options);
        var options2 = {
            format: 'dd.mm.yy',
            orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto'
        }
        $('#bs-datepicker-range').datepicker(options2);
    });

    function proverka(input) {
        var value = input.value;
        var rep = /[-/\\,;":'a-zA-Zа-яА-Я]/;
        if (rep.test(value)) {
            value = value.replace(rep, '');
            input.value = value;
        }
    }

    <!--Check if user wanna delete element-->
    function confirm_delete() {
        return confirm('Вы уверены?');
    }

    $(document).ready(function(){
        $("#top-office-hide").click(function() {
            $(".top-office").hide("slow");
        });
        $("#top-office-show").click(function() {
            $(".top-office").show("slow");
        });
        $("#bottom-office-hide").click(function() {
            $(".bottom-office").hide("slow");
        });
        $("#bottom-office-show").click(function() {
            $(".bottom-office").show("slow");
        });
    });

</script>


<div id="content-wrapper">

    <div class="page-header">
        <div class="row">
            <h1 class="col-xs-12 col-sm-6 text-center text-left-sm"><i class="fa fa-share page-header-icon"></i>&nbsp;&nbsp;Транзакции между офисами</h1>
            <!--<div class="col-xs-12 col-sm-6">
                <div class="input-daterange input-group" id="bs-datepicker-range" style="float: right">
                    <form class="form-inline" method="post" action="<?/* echo URL; */?>sold/period" class="form">
                        <div class="form-group">
                            <label class="sr-only">Магазин</label>
                            <input type="text" class="form-control bs-datepicker-example" name="start" placeholder="Начальная дата">
                        </div>
                        <div class="form-group">
                            <label class="sr-only">Магазин</label>
                            <input type="text" class="form-control bs-datepicker-example" name="end" placeholder="Конечная дата">
                        </div>
                        <button type="submit" class="btn btn-primary">Сформировать</button>
                    </form>
                </div>
            </div>-->
        </div>
    </div>

    <!-- Создать отчёт с проданными товарами -->
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">Создать транзакционный товар Ли Вест</span>
        </div>
        <div class="panel-body">
            <form method="post" action="<? echo URL; ?>transaction/create" class="form">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <!--@TODO:  -->
                            <label class="control-label">Дата</label>
                            <input type="text" name="date" class="form-control" value="<?php echo date("d.m.y"); ?>"  id="bs-datepicker-example">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <!--@TODO:  -->
                                    <label class="control-label">Из магазина</label>
                                    <select class="form-control" name="items_were_send_from">
                                        <option value="Павла Мочалова">Павла Мочалова</option>
                                        <option value="Октябрьская">Октябрьская</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <!--@TODO:  -->
                                    <label class="control-label">В магазин</label>
                                    <select class="form-control" name="items_were_send_to">
                                        <option value="Павла Мочалова">Павла Мочалова</option>
                                        <option value="Октябрьская">Октябрьская</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="sold">
                    <div class="row" id="sold_item">
                    <div class="col-md-8">
                        <div class="form-group">
                            <select name="good_id" id="jquery-select2-example" class="form-control">
                                <option></option>
                                <?php
                                    foreach ($this->getGood as $key => $value) {
                                        echo "<option value=" . $value['id'] . ">" . $value['name'] . '</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" name="quantity" class="form-control" placeholder="Количество" onkeyup="return proverka(this);">
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

    <!-- Создать отчёт с сопутствующим товаром -->
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">Создать транзакционный сопутствующий товар</span>
        </div>
        <div class="panel-body">
            <form method="post" action="<? echo URL; ?>transaction/createRelated" class="form">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <!--@TODO:  -->
                            <label class="control-label">Дата</label>
                            <input type="text" name="date" class="form-control" value="<?php echo date("d.m.y"); ?>" id="bs-datepicker-example2">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <!--@TODO:  -->
                                    <label class="control-label">Из магазина</label>
                                    <select class="form-control" name="items_were_send_from">
                                        <option value="Павла Мочалова">Павла Мочалова</option>
                                        <option value="Октябрьская">Октябрьская</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <!--@TODO:  -->
                                    <label class="control-label">В магазин</label>
                                    <select class="form-control" name="items_were_send_to">
                                        <option value="Октябрьская">Октябрьская</option>
                                        <option value="Павла Мочалова">Павла Мочалова</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="sold">
                    <div class="row" id="sold_item">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Сопутствующий товар в сумме</label>
                                <input type="text" name="sum" class="form-control" placeholder="Сумма" onkeyup="return proverka(this);">
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

    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">Транзакционный товар Ли Вест</span>
        </div>
        <div class="panel-body">
            <table class="table table-hover" style="font-size: 13px;">
                <thead>
                <tr>

                    <th class="text-center">Дата</th>
                    <th class="text-center">Название</th>
                    <th class="text-center">Количество</th>
                    <th class="text-center">Отправлен из</th>
                    <th class="text-center">Приняли в</th>
                    <th class="text-center">Действия</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($this->transactionList as $key => $value) : ?>
                    <?php
                    $time = strtotime($value['date']);
                    $myFormatForView = date("d.m.y", $time);
                    ?>
                    <tr>
                    <td class="text-center"><?php echo $myFormatForView; ?></td>
                    <td class="text-center"><?php echo $value['name']; ?></td>
                    <td class="text-center"><?php echo $value['quantity']; ?></td>
                    <td class="text-center"><?php echo $value['items_were_send_from']; ?></td>
                    <td class="text-center"><?php echo $value['items_were_send_to']; ?></td>
                    <td class="text-center">
                        <div class="btn-group btn-group-xs">
                            <button type="button" class="btn"><a style="color:#555" href="<?php echo URL; ?>transaction/edit/<?php echo $value['id']; ?>">Изменить</a></button>
                            <button type="button" class="btn btn-danger"><a style="color:white" href="<?php echo URL; ?>transaction/delete/<?php echo $value['id']; ?>" onclick="return confirm_delete()">Удалить</a></button>
                        </div>
                    </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>

    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">Транзакционный товар сопутствующий товар</span>
        </div>
        <div class="panel-body">
            <table class="table table-hover" style="font-size: 13px;">
                <thead>
                <tr>

                    <th class="text-center">Дата</th>
                    <th class="text-center">Название</th>
                    <th class="text-center">Сумма</th>
                    <th class="text-center">Отправлен из</th>
                    <th class="text-center">Приняли в</th>
                    <th class="text-center">Действия</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($this->transactionRelatedList as $key => $value) : ?>
                    <?php
                    $time = strtotime($value['date']);
                    $myFormatForView = date("d.m.y", $time);
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $myFormatForView; ?></td>
                        <td class="text-center">Сопутствующий товар</td>
                        <td class="text-center"><?php echo $value['sum']; ?></td>
                        <td class="text-center"><?php echo $value['items_were_send_from']; ?></td>
                        <td class="text-center"><?php echo $value['items_were_send_to']; ?></td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <button type="button" class="btn"><a style="color:#555" href="<?php echo URL; ?>transaction/editRelated/<?php echo $value['id']; ?>">Изменить</a></button>
                                <button type="button" class="btn btn-danger"><a style="color:white" href="<?php echo URL; ?>transaction/deleteRelated/<?php echo $value['id']; ?>" onclick="return confirm_delete()">Удалить</a></button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>

</div>
