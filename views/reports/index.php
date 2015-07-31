<script>
    init.push(function () {
        var options = {
            todayBtn: "linked",
            format: 'dd.mm.yy',
            orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto'
        }
        $("#masked-inputs-examples-date").mask("99.99.99");
        $('.bs-datepicker-example').datepicker(options);
        $('#tooltips-demo label').tooltip();
        var options2 = {
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
            <h1 class="col-xs-12 col-sm-6 text-center text-left-sm"><i class="fa fa-shopping-cart page-header-icon"></i>&nbsp;&nbsp;Финансовые отчёты</h1>
            <div class="col-xs-12 col-sm-6">
                <div class="input-daterange input-group" id="bs-datepicker-range" style="float: right">
                    <form class="form-inline" method="post" action="<? echo URL; ?>reports/period/<?php echo $value['id']; ?>" class="form">
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

    <!-- Report create -->
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">Создать новый отчёт</span>
            <?php //print_r($this->reportsList) ?>
        </div>
        <div class="panel-body">
            <form method="post" action="<? echo URL; ?>reports/create" class="form">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Магазин</label>
                            <select class="form-control" name="shop">
                                <?php if (Session::get('role') == 'default'): ?>
                                    <option value="<?php echo Session::get('office'); ?>"><?php echo Session::get('office'); ?></option>
                                <?php endif; ?>

                                <?php if (Session::get('role') == 'owner'): ?>
                                    <option value="Павла Мочалова">Павла Мочалова</option>
                                    <option value="Октябрьская">Октябрьская</option>
                                <?php endif; ?>
                                <!--<option value="Павла Мочалова">Павла Мочалова</option>
                                <option value="Октябрьская">Октябрьская</option>-->
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                            <label class="control-label">Дата</label>
                            <input type="text" name="date" class="form-control bs-datepicker-example" value="<?php echo date("d.m.y"); ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <div id="tooltips-demo"><label class="control-label" data-toggle="tooltip" data-placement="right" data-original-title="Весь товар за наличный и безналичный расчёт, не зависит от других пунктов.">Сопутствующий товар</label></div>
                            <input type="text" name="related_products" placeholder="Сопутствующий товар" class="form-control" onkeyup="return proverka(this);" />
                            <i class="fa fa-ruble form-control-feedback"></i>

                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <div id="tooltips-demo"><label class="control-label" data-toggle="tooltip" data-placement="right" data-original-title="Затраты на любую продукцию (Ли Вест и сопутствующие)">Закуплено продукции</label></div>
                            <input type="text" name="purchases" placeholder="Закуплено продукции" class="form-control" onkeyup="return proverka(this);" />
                            <i class="fa fa-ruble form-control-feedback"></i>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <div id="tooltips-demo"><label class="control-label" data-toggle="tooltip" data-placement="right" data-original-title="Бонусы выдаются клиентам деньгами.">Выдано бонусов деньгами</label></div>
                            <input type="text" name="bonus" placeholder="Выдано бонусов деньгами" class="form-control" onkeyup="return proverka(this);" />
                            <i class="fa fa-ruble form-control-feedback"></i>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <div id="tooltips-demo"><label class="control-label" data-toggle="tooltip" data-placement="right" data-original-title="Любой товар, ушедший по нулевой цене, НО не в долг.">Неоплаченный товар</label></div>
                            <input type="text" name="unpaid_goods" placeholder="Неоплаченный товар" class="form-control" onkeyup="return proverka(this);" />
                            <i class="fa fa-ruble form-control-feedback"></i>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <div id="tooltips-demo"><label class="control-label" data-toggle="tooltip" data-placement="right" data-original-title="Оплата через терминал за всё.">Безналичная оплата</label></div>
                            <input type="text" name="non_cash_payment" placeholder="Безналичная оплата" class="form-control" onkeyup="return proverka(this);" />
                            <i class="fa fa-ruble form-control-feedback"></i>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <div id="tooltips-demo"><label class="control-label" data-toggle="tooltip" data-placement="right" data-original-title="Наличка без учёта вливаний, но с учётом всех остальных денег.">Наличная оплата без вливания</label></div>
                            <input type="text" name="cash_payment" placeholder="Наличная оплата" class="form-control" onkeyup="return proverka(this);" />
                            <i class="fa fa-ruble form-control-feedback"></i>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <div id="tooltips-demo"><label class="control-label" data-toggle="tooltip" data-placement="right" data-original-title="Весь товар, за который покупатели оплатили бонусами.">Оплата бонусами</label></div>
                            <input type="text" name="cash_bonus" placeholder="Оплата бонусами" class="form-control" onkeyup="return proverka(this);" />
                            <i class="fa fa-ruble form-control-feedback"></i>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <div id="tooltips-demo"><label class="control-label" data-toggle="tooltip" data-placement="right" data-original-title="Все услуги без разделения не зависимо от способа оплаты.">Оплата за услуги</label></div>
                            <input type="text" name="services" placeholder="Оплата за услуги" class="form-control" onkeyup="return proverka(this);" />
                            <i class="fa fa-ruble form-control-feedback"></i>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <div id="tooltips-demo"><label class="control-label" data-toggle="tooltip" data-placement="right" data-original-title="Вся наличка включая вливание.">Деньги в кассе</label></div>
                            <input type="text" name="account_cashier" placeholder="Деньги в кассе" class="form-control" onkeyup="return proverka(this);" />
                            <i class="fa fa-ruble form-control-feedback"></i>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <?php if (Session::get('office') == TOP_OFFICE){ ?>
                                <div id="tooltips-demo"><label class="control-label" data-toggle="tooltip" data-placement="right" data-original-title="Деньги из iБанка.">Деньги на счёте</label></div>
                                <input type="text" name="account_balance" placeholder="Деньги на счёте" class="form-control" onkeyup="return proverka(this);" disabled />
                                <i class="fa fa-ruble form-control-feedback"></i>
                            <? } else {  ?>
                                <div id="tooltips-demo"><label class="control-label" data-toggle="tooltip" data-placement="right" data-original-title="Деньги из iБанка.">Деньги на счёте</label></div>
                                <input type="text" name="account_balance" placeholder="Деньги на счёте" class="form-control" onkeyup="return proverka(this);" />
                                <i class="fa fa-ruble form-control-feedback"></i>
                            <?php } ?>

                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <label class="control-label">Выдано зарплаты</label>
                            <input type="text" name="salary" placeholder="Выдано зарплаты" class="form-control" onkeyup="return proverka(this);" />
                            <i class="fa fa-ruble form-control-feedback"></i>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <label class="control-label">Коммерческие расходы</label>
                            <input type="text" name="expenses" placeholder="Коммерческие расходы" class="form-control" onkeyup="return proverka(this);" />
                            <i class="fa fa-ruble form-control-feedback"></i>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <label class="control-label">Продано в долг на</label>
                            <input type="text" name="sold_in_debt" placeholder="Продано в долг на" class="form-control" onkeyup="return proverka(this);" />
                            <i class="fa fa-ruble form-control-feedback"></i>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <label class="control-label">Долг возвращён на</label>
                            <input type="text" name="returned_to_duty" placeholder="Долг возвращён на" class="form-control" onkeyup="return proverka(this);" />
                            <i class="fa fa-ruble form-control-feedback"></i>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <div id="tooltips-demo"><label class="control-label" data-toggle="tooltip" data-placement="right" data-original-title="Деньги, привнесённые из вне.">Вливание</label></div>
                            <input type="text" name="infusion" placeholder="Вливание" class="form-control" onkeyup="return proverka(this);" />
                            <i class="fa fa-ruble form-control-feedback"></i>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <div id="tooltips-demo"><label class="control-label" data-toggle="tooltip" data-placement="right" data-original-title="Деньги, взятые В.А. и Т.С. без указания причин на личные нужды.">Дивиденды</label></div>
                            <input type="text" name="dividends" placeholder="Дивиденды" class="form-control" onkeyup="return proverka(this);" />
                            <i class="fa fa-ruble form-control-feedback"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Комментарий</label>
                    <textarea name="comment" placeholder="Комментарий" class="form-control"></textarea>
                </div>
                    <input name="modified" type="text" hidden="hidden" value="<?php echo date('Y-m-d H:i:s'); ?>" />
                    <input name="created_by" type="text" hidden="hidden" value="<?php echo Session::get('comment'); ?>" />
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

    <!-- Report show -->
    <?php foreach ($this->reportsShop as $key => $value) : ?>
        <?php
            $time = strtotime($value['date']);
            $myFormatForView = date("d.m.Y", $time);
            $all_expenses = $value['salary'] + $value['purchases'] + $value['bonus'] + $value['expenses'] + $value['dividends'] + $value['cash_bonus'] + $value['unpaid_goods'];
            $revenue = $value['non_cash_payment'] + $value['cash_payment'] + $value['returned_to_duty'];
            $total = $value['non_cash_payment'] + $value['cash_payment'] + $value['services'];
            $shop_name = 0;
            if($value['shop'] == TOP_OFFICE) {
                $shop_name = "top-office";
            } elseif($value['shop'] == BOTTOM_OFFICE) {
                $shop_name = "bottom-office";
            }
        ?>
    <div class="panel <?php echo $shop_name; ?>">
        <div class="panel-heading">
            <span class="panel-title">
                Отчёт за <?php echo $myFormatForView; ?> <?php if(Session::get('role') == ADMIN) {echo ' на '. $value['shop'];} ?>
            </span>
            <div class="panel-heading-controls">
                <button class="btn btn-xs btn-warning btn-outline"><a style="color:#555" href="<?php echo URL; ?>reports/edit/<?php echo $value['id']; ?>"><span class="fa fa-pencil"></span>&nbsp;&nbsp;Изменить</a></button>
                <button class="btn btn-xs btn-danger btn-outline"><a style="color:#555" href="<?php echo URL; ?>reports/delete/<?php echo $value['id']; ?>" onclick="return confirm_delete()"><span class="fa fa-trash-o"></span>&nbsp;&nbsp;Удалить</a></button>

            </div>
        </div>

        <div class="panel-body">
                <div class="row">
                    <div class="col-sm-3">
                        Сопутствующий товар: <span style="float: right"><?php echo number_format($value['related_products'], 2, ',', ' '); ?> руб.</span>
                    </div>
                    <div class="col-sm-3">
                        Закуплено продукции: <span style="float: right"><?php echo number_format($value['purchases'], 2, ',', ' '); ?> руб.</span>
                    </div>
                    <div class="col-sm-3">
                        Выдано бонусов деньгами: <span style="float: right"><?php echo number_format($value['bonus'], 2, ',', ' '); ?> руб.</span>
                    </div>
                    <div class="col-sm-3">
                        Неоплаченный товар: <span style="float: right"><?php echo number_format($value['unpaid_goods'], 2, ',', ' '); ?> руб.</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        Безналичная оплата: <span style="float: right"><?php echo number_format($value['non_cash_payment'], 2, ',', ' '); ?> руб.</span>
                    </div>
                    <div class="col-sm-3">
                        Наличная : <span style="float: right"><?php echo number_format($value['cash_payment'], 2, ',', ' '); ?> руб.</span>
                    </div>
                    <div class="col-sm-3">
                        Оплата бонусами: <span style="float: right"><?php echo number_format($value['cash_bonus'], 2, ',', ' '); ?> руб.</span>
                    </div>
                    <div class="col-sm-3">
                        Оплата за услуги: <span style="float: right"><?php echo number_format($value['services'], 2, ',', ' '); ?> руб.</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        Деньги в кассе: <span style="float: right"> <?php echo number_format($value['account_cashier'], 2, ',', ' '); ?> руб.</span>
                    </div>
                    <div class="col-sm-3">
                        Деньги на счёте: <span style="float: right"> <?php echo number_format($value['account_balance'], 2, ',', ' '); ?> руб.</span>
                    </div>
                    <div class="col-sm-3">
                        Выдано зарплаты: <span style="float: right"> <?php echo number_format($value['salary'], 2, ',', ' '); ?> руб.</span>
                    </div>
                    <div class="col-sm-3">
                        Коммерческие расходы: <span style="float: right"> <?php echo number_format($value['expenses'], 2, ',', ' '); ?> руб.</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        Продано в долг на: <span style="float: right"> <?php echo number_format($value['sold_in_debt'], 2, ',', ' '); ?> руб.</span>
                    </div>
                    <div class="col-sm-3">
                        Долг возвращён на: <span style="float: right"> <?php echo number_format($value['returned_to_duty'], 2, ',', ' '); ?> руб.</span>
                    </div>
                    <div class="col-sm-3">
                        Вливание: <span style="float: right"> <?php echo number_format($value['infusion'], 2, ',', ' '); ?> руб.</span>
                    </div>
                    <div class="col-sm-3">
                        Дивиденды: <span style="float: right"> <?php echo number_format($value['dividends'], 2, ',', ' '); ?> руб.</span>
                    </div>
                </div>
                <?php if($value['comment'] != null) : ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <br/>Комментарий: <em><?php echo $value['comment']; ?></em>
                        </div>
                    </div>
                <?php endif; ?>
                <hr/>
                <div class="row">
                    <div class="col-sm-4">
                        <span class="badge badge-danger">Все расходы: <?php echo number_format($all_expenses, 2, ',', ' '); ?> руб.</span> <br />
                        <?php if(Session::get('role') == ADMIN) : ?>
                        <?php echo '<em>Зарплата ('.$value['salary'] .') + Закупка продукции ('. $value['purchases'] .') + Выдано бонусов деньгами ('. $value['bonus'] .') + Коммерческие расходы ('. $value['expenses'] .') + Дивиденды ('. $value['dividends'] .') + Оплата бонусами ('. $value['cash_bonus'] . ') + Неоплаченный товар (товар в подарок) (' . $value['unpaid_goods'] . ')</em>'; ?>
                        <?php endif; ?>
                    </div>
                    <div class="col-sm-4">
                        <span class="badge badge-info">Выручка: <?php echo number_format($revenue, 2, ',', ' '); ?> руб.</span> <br />
                        <?php if(Session::get('role') == ADMIN) : ?>
                            <?php echo '<em>Безналичная оплата ('.$value['non_cash_payment'] .') + Наличная оплата ('. $value['cash_payment'] .') +  Долг возвращён на ('. $value['returned_to_duty'] .')</em>'; ?>
                        <?php endif; ?>
                    </div>
                    <div class="col-sm-4">
                        <span class="badge badge-success">Итог продаж: <?php echo number_format($total, 2, ',', ' '); ?> руб. из них Услуги на: <?php echo number_format($value['services'], 2, ',', ' '); ?>  руб.</span><br />
                        <?php if(Session::get('role') == ADMIN) : ?>
                            <?php echo '<em>Безналичная оплата ('.$value['non_cash_payment'] .') + Наличная оплата ('. $value['cash_payment'] .') + Оплата за услуги ('. $value['services'] .')</em>'; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if(Session::get('role') == ADMIN) { echo '<hr/>'; } ?>
                <div class="row">
                <div class="col-sm-3">
                    <?php if(Session::get('role') == ADMIN) : ?>
                        Запись создана: <?php echo $value['modified']; ?>
                    <?php endif; ?>
                </div>
                <div class="col-sm-3">
                    <?php if(Session::get('role') == ADMIN) : ?>
                        Запись обновлена: <?php echo $value['updated']; ?>
                    <?php endif; ?>
                </div>
                <div class="col-sm-3">
                    <?php if(Session::get('role') == ADMIN) : ?>
                        Создано: <?php echo $value['created_by']; ?>
                    <?php endif; ?>
                </div>
                <div class="col-sm-3">
                    <?php if(Session::get('role') == ADMIN) : ?>
                        Изменено: <?php echo $value['modified_by']; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

</div>
