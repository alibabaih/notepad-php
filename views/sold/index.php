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
            <h1 class="col-xs-12 col-sm-6 text-center text-left-sm"><i class="fa fa-legal page-header-icon"></i>&nbsp;&nbsp;Продажи продукции</h1>
            <div class="col-xs-12 col-sm-6">
                <div class="input-daterange input-group" id="bs-datepicker-range" style="float: right">
                    <form class="form-inline" method="post" action="<? echo URL; ?>sold/period" class="form">
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
            </div>
        </div>
    </div>

        <!-- Создать отчёт с проданными товарами -->
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">Создать новый проданный товар</span>
            </div>
            <div class="panel-body">
                <form method="post" action="<? echo URL; ?>sold/create" class="form">
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

    <?php if(Session::get('role') == ADMIN) : ?>
        <div class="btn-group btn-group-justified">
            <a href="#" class="btn" id="top-office-hide"><?php echo TOP_OFFICE; ?> спрятать</a>
            <a href="#" class="btn" id="top-office-show"><?php echo TOP_OFFICE; ?> показать</a>
            <a href="#" class="btn" id="bottom-office-hide"><?php echo BOTTOM_OFFICE; ?> спрятать</a>
            <a href="#" class="btn" id="bottom-office-show"><?php echo BOTTOM_OFFICE; ?> показать</a>
        </div>
        <hr/>
    <?php endif; ?>

        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">Список проданных товаров</span>
            </div>
            <div class="panel-body">
                <table class="table table-hover" style="font-size: 13px;">
                    <thead>
                    <tr>
                        <?php if(Session::get('role') == ADMIN) : ?><th class="text-center">Магазин</th><?php endif; ?>
                        <th class="text-center">Дата</th>
                        <th class="text-center">Название</th>
                        <th class="text-center">Количество</th>
                        <th class="text-center">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($this->soldList as $key => $value) : ?>
                        <?php
                        $time = strtotime($value['date']);
                        $myFormatForView = date("d.m.y", $time);
                        $shop_name = 0;
                        if($value['shop'] == TOP_OFFICE) {
                            $shop_name = "top-office";
                        } elseif($value['shop'] == BOTTOM_OFFICE) {
                            $shop_name = "bottom-office";
                        }
                        ?>

                        <tr class="<?php echo $shop_name; ?>">
                        <?php if(Session::get('role') == ADMIN) : ?><td class="text-center"><?php echo $value['shop']; ?></td><?php endif; ?>
                        <td class="text-center"><?php echo $myFormatForView; ?></td>
                        <td class="text-center"><?php echo $value['name']; ?></td>
                        <td class="text-center"><?php echo $value['quantity']; ?></td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <button type="button" class="btn"><a style="color:#555" href="<?php echo URL; ?>sold/edit/<?php echo $value['id_sold']; ?>">Изменить</a></button>
                                <button type="button" class="btn btn-danger"><a style="color:white" href="<?php echo URL; ?>sold/delete/<?php echo $value['id_sold']; ?>" onclick="return confirm_delete()">Удалить</a></button>
                            </div>
                        </td>
                        </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>

</div>
