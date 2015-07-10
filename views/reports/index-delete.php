<div id="content-wrapper">
    <div class="page-header">
        <h1><i class="fa fa-shopping-cart page-header-icon"></i>&nbsp;&nbsp;Финансовые отчёты</h1>
    </div>

    <script>
        init.push(function () {
            var options = {
                todayBtn: "linked",
                format: 'dd.mm.yy',
                orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto'
            }
            $("#masked-inputs-examples-date").mask("99.99.99");
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
                            <input type="text" name="date" class="form-control" value="<?php echo date("d.m.y"); ?>" id="bs-datepicker-example">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <label class="control-label">Сопутствующий товар</label>
                            <input type="text" name="related_products" placeholder="Сопутствующий товар" class="form-control" onkeyup="return proverka(this);" />
                            <i class="fa fa-ruble form-control-feedback"></i>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <label class="control-label">Закуплено продукции</label>
                            <input type="text" name="purchases" placeholder="Закуплено продукции" class="form-control" onkeyup="return proverka(this);" />
                            <i class="fa fa-ruble form-control-feedback"></i>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <label class="control-label">Выдано бонусов деньгами</label>
                            <input type="text" name="bonus" placeholder="Выдано бонусов деньгами" class="form-control" onkeyup="return proverka(this);" />
                            <i class="fa fa-ruble form-control-feedback"></i>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <label class="control-label">Неоплаченный товар</label>
                            <input type="text" name="unpaid_goods" placeholder="Неоплаченный товар" class="form-control" onkeyup="return proverka(this);" />
                            <i class="fa fa-ruble form-control-feedback"></i>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <label class="control-label">Безналичная оплата</label>
                            <input type="text" name="non_cash_payment" placeholder="Безналичная оплата" class="form-control" onkeyup="return proverka(this);" />
                            <i class="fa fa-ruble form-control-feedback"></i>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <label class="control-label">Наличная оплата</label>
                            <input type="text" name="cash_payment" placeholder="Наличная оплата" class="form-control" onkeyup="return proverka(this);" />
                            <i class="fa fa-ruble form-control-feedback"></i>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <label class="control-label">Оплата бонусами</label>
                            <input type="text" name="cash_bonus" placeholder="Оплата бонусами" class="form-control" onkeyup="return proverka(this);" />
                            <i class="fa fa-ruble form-control-feedback"></i>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <label class="control-label">Оплата за услуги</label>
                            <input type="text" name="services" placeholder="Оплата за услуги" class="form-control" onkeyup="return proverka(this);" />
                            <i class="fa fa-ruble form-control-feedback"></i>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <label class="control-label">Деньги в кассе</label>
                            <input type="text" name="account_cashier" placeholder="Деньги в кассе" class="form-control" onkeyup="return proverka(this);" />
                            <i class="fa fa-ruble form-control-feedback"></i>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <label class="control-label">Деньги на счёте</label>
                            <input type="text" name="account_balance" placeholder="Деньги на счёте" class="form-control" onkeyup="return proverka(this);" />
                            <i class="fa fa-ruble form-control-feedback"></i>
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
                            <label class="control-label">Вливание</label>
                            <input type="text" name="infusion" placeholder="Вливание" class="form-control" onkeyup="return proverka(this);" />
                            <i class="fa fa-ruble form-control-feedback"></i>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <label class="control-label">Дивиденды</label>
                            <input type="text" name="dividends" placeholder="Дивиденды" class="form-control" onkeyup="return proverka(this);" />
                            <i class="fa fa-ruble form-control-feedback"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Комментарий</label>
                    <textarea name="comment" placeholder="Комментарий" class="form-control"></textarea>
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
        <!-- Show reports на Октябрьской -->
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">Список отчётов</span><span style="float: right;" class="label label-info">ул. Октябрьская, 9а</span>
            </div>
                <div class="panel-body" style="overflow-x: scroll;">
                    <table class="table table-bordered" style="font-size: 13px;">
                        <thead>
                        <?php
                        echo "<tr>";
                        echo "<th class=\"text-center\">Дата</th>";
                        echo "<th class=\"text-center\">Безналичная оплата</th>";
                        echo "<th class=\"text-center\">Наличная оплата</th>";
                        echo "<th class=\"text-center\">Оплата бонусами</th>";
                        echo "<th class=\"text-center\">Оплата услуг</th>";
                        echo "<th class=\"text-center\">Зарплата</th>";
                        echo "<th class=\"text-center\">Закуплено продукции</th>";
                        echo "<th class=\"text-center\">Выдано бонусов деньгами</th>";
                        echo "<th class=\"text-center\">Коммерческие расходы</th>";
                        echo "<th class=\"text-center\">Деньги на счёте</th>";
                        echo "<th class=\"text-center\">Касса</th>";
                        echo "<th class=\"text-center\">Вливание</th>";
                        echo "<th class=\"text-center\">Дивиденды</th>";
                        echo "<th class=\"text-center\">Продано в долг на</th>";
                        echo "<th class=\"text-center\">Долг возвращён на</th>";
                        echo "<th class=\"text-center\">Сопутствующий товар</th>";
                        echo "<th class=\"text-center\">Неоплаченный товар</th>";


                        echo "<th class=\"text-center\">Все расходы</th>";
                        echo "<th class=\"text-center\">Выручка</th>";
                        echo "<th class=\"text-center\">Итог продаж</th>";


                        echo "<th class=\"text-center\">Комментарий</th>";
                        echo "<th class=\"text-center\">Действия</th>";
                        echo "</tr>";
                        ?>
                        </thead>
                        <tbody>
                        <?php
                            foreach ($this->reportsShopOktabrskaya as $key => $value) {
                                //$today = $value['date'];//date("Y-m-d");
                                $time = strtotime($value['date']);
                                $myFormatForView = date("d.m.y", $time);
                                $a = $value['salary'] + $value['purchases'] + $value['bonus'] + $value['expenses'] + $value['dividends'];
                                $b = $value['non_cash_payment'] + $value['cash_payment'] + $value['infusion'];
                                $c = $value['non_cash_payment'] + $value['cash_payment'] - $value['services'];
                                echo '<tr>
                                <td class="text-center">' . $myFormatForView . '</td>
                                <td class="text-center">' . $value['non_cash_payment'] . ' руб.</td>
                                <td class="text-center">' . $value['cash_payment'] . ' руб.</td>
                                <td class="text-center">' . $value['cash_bonus'] . ' руб.</td>
                                <td class="text-center">' . $value['services'] . ' руб.</td>
                                <td class="text-center">' . $value['salary'] . ' руб.</td>
                                <td class="text-center">' . $value['purchases'] . ' руб.</td>
                                <td class="text-center">' . $value['bonus'] . ' руб.</td>
                                <td class="text-center">' . $value['expenses'] . ' руб.</td>
                                <td class="text-center">' . $value['account_balance'] . ' руб.</td>
                                <td class="text-center">' . $value['account_cashier'] . ' руб.</td>
                                <td class="text-center">' . $value['infusion'] . ' руб.</td>
                                <td class="text-center">' . $value['dividends'] . ' руб.</td>
                                <td class="text-center">' . $value['sold_in_debt'] . ' руб.</td>
                                <td class="text-center">' . $value['returned_to_duty'] . ' руб.</td>
                                <td class="text-center">' . $value['related_products'] . ' руб.</td>
                                <td class="text-center">' . $value['unpaid_goods'] . ' руб.</td>
                                <td class="text-center">' . $a . ' руб.</td>
                                <td class="text-center">' . $b . ' руб.</td>
                                <td class="text-center">' . $c . ' руб.</td>
                                <td class="text-center">' . $value['comment'] . '</td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-xs" style="width: 130px;">
                                        <button type="button" class="btn"><a style="color:#555" href="'.URL.'reports/edit/'.$value['id'].'">Изменить</a></button>
                                        <button type="button" class="btn btn-danger" ><a style="color:white" href="'.URL.'reports/delete/'.$value['id'].'">Удалить</a></button>
                                    </div>
                                </td>
                                </tr>';
                            }
                        ?>

                        </tbody>
                    </table>
                </div>
        </div>
    <?php endif; ?>

    <?php if (Session::get('office') == BOTTOM_OFFICE || (Session::get('role') == ADMIN)): ?>
        <!-- Show reports на Мочалова-->
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">Список отчётов</span><span style="float: right;" class="label label-info">ул. Павла Мочалова, 11</span>
            </div>
                <div class="panel-body" style="overflow-x: scroll;">
                <table class="table table-bordered" style="font-size: 13px;">
                    <thead>
                    <?php
                    echo "<tr>";
                    echo "<th class=\"text-center\">Дата</th>";
                    echo "<th class=\"text-center\">Безналичная оплата</th>";
                    echo "<th class=\"text-center\">Наличная оплата</th>";
                    echo "<th class=\"text-center\">Оплата бонусами</th>";
                    echo "<th class=\"text-center\">Оплата услуг</th>";
                    echo "<th class=\"text-center\">Зарплата</th>";
                    echo "<th class=\"text-center\">Закуплено продукции</th>";
                    echo "<th class=\"text-center\">Выдано бонусов деньгами</th>";
                    echo "<th class=\"text-center\">Коммерческие расходы</th>";
                    echo "<th class=\"text-center\">Деньги на счёте</th>";
                    echo "<th class=\"text-center\">Касса</th>";
                    echo "<th class=\"text-center\">Вливание</th>";
                    echo "<th class=\"text-center\">Дивиденды</th>";
                    echo "<th class=\"text-center\">Продано в долг на</th>";
                    echo "<th class=\"text-center\">Долг возвращён на</th>";
                    echo "<th class=\"text-center\">Сопутствующий товар</th>";
                    echo "<th class=\"text-center\">Неоплаченный товар</th>";


                    echo "<th class=\"text-center\">Все расходы</th>";
                    echo "<th class=\"text-center\">Выручка</th>";
                    echo "<th class=\"text-center\">Итог продаж</th>";


                    echo "<th class=\"text-center\">Комментарий</th>";
                    echo "<th class=\"text-center\">Действия</th>";
                    echo "</tr>";
                    ?>
                    </thead>
                    <tbody>
                    <?php
                        foreach ( $this->reportsShopPavlaMochalova as $key => $value) {
                            //$today = $value['date'];//date("Y-m-d");
                            $time = strtotime($value['date']);
                            $myFormatForView = date("d.m.y", $time);
                            $a = $value['salary'] + $value['purchases'] + $value['bonus'] + $value['expenses'] + $value['dividends'];
                            $b = $value['non_cash_payment'] + $value['cash_payment'] + $value['infusion'];
                            $c = $value['non_cash_payment'] + $value['cash_payment'] - $value['services'];
                            echo '<tr>
                                <td class="text-center">' . $myFormatForView .  '</td>
                                <td class="text-center">' . $value['non_cash_payment'] . ' руб.</td>
                                <td class="text-center">' . $value['cash_payment'] . ' руб.</td>
                                <td class="text-center">' . $value['cash_bonus'] . ' руб.</td>
                                <td class="text-center">' . $value['services'] . ' руб.</td>
                                <td class="text-center">' . $value['salary'] . ' руб.</td>
                                <td class="text-center">' . $value['purchases'] . ' руб.</td>
                                <td class="text-center">' . $value['bonus'] . ' руб.</td>
                                <td class="text-center">' . $value['expenses'] . ' руб.</td>
                                <td class="text-center">' . $value['account_balance'] . ' руб.</td>
                                <td class="text-center">' . $value['account_cashier'] . ' руб.</td>
                                <td class="text-center">' . $value['infusion'] . ' руб.</td>
                                <td class="text-center">' . $value['dividends'] . ' руб.</td>
                                <td class="text-center">' . $value['sold_in_debt'] . ' руб.</td>
                                <td class="text-center">' . $value['returned_to_duty'] . ' руб.</td>
                                <td class="text-center">' . $value['related_products'] . ' руб.</td>
                                <td class="text-center">' . $value['unpaid_goods'] . ' руб.</td>
                                <td class="text-center">' . $a . ' руб.</td>
                                <td class="text-center">' . $b . ' руб.</td>
                                <td class="text-center">' . $c . ' руб.</td>
                                <td class="text-center">' . $value['comment'] . '</td>
                                <td class="text-center">

                                        <button type="button" class="btn btn-xs"><a style="color:#555" href="'.URL.'reports/edit/'.$value['id'].'">Изменить</a></button>
                                        <button type="button" class="btn btn-xs btn-danger"><a style="color:white" href="'.URL.'reports/delete/'.$value['id'].'">Удалить</a></button>

                                </td>
                                </tr>';
                        }
                    ?>
                    </tbody>
                </table>

            </div>
        </div>
    <?php endif; ?>







    <div class="panel invoice">
        <div class="invoice-header">
            <h3>
                <div>
                    <small><strong>Lander</strong>App</small><br>
                    INVOICE #244
                </div>
            </h3>
            <address>
                LanderApp Ltd.<br>
                Los Angeles, Lander Street, 32<br>
                90080 CA, USA
            </address>
            <div class="invoice-date">
                <small><strong>Date</strong></small><br>
                February 21, 2015
            </div>
        </div> <!-- / .invoice-header -->
        <div class="invoice-info">
            <div class="invoice-recipient">
                <strong>Mr. John Smith</strong><br>
                New York, Pass Avenue, 109<br>
                10012 NY, USA
            </div> <!-- / .invoice-recipient -->
            <div class="invoice-total">
                TOTAL:
                <span>$4,657.75</span>
            </div> <!-- / .invoice-total -->
        </div> <!-- / .invoice-info -->
        <hr>
        <div class="invoice-table">
            <table>
                <thead>
                <tr>
                    <th>
                        Task description
                    </th>
                    <th>
                        Rate
                    </th>
                    <th>
                        Hours
                    </th>
                    <th>
                        Line total
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        Website design and development
                        <div class="invoice-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</div>
                    </td>
                    <td>
                        $50.00
                    </td>
                    <td>
                        50
                    </td>
                    <td>
                        $2,500.00
                    </td>
                </tr>
                <tr>
                    <td>
                        Branding
                        <div class="invoice-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</div>
                    </td>
                    <td>
                        $47.95
                    </td>
                    <td>
                        45
                    </td>
                    <td>
                        $2,157.75
                    </td>
                </tr>
                </tbody>
            </table>
        </div> <!-- / .invoice-table -->
    </div>




</div>
