<div id="content-wrapper">

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



    <!-- Show reports на Октябрьской -->
    <div class="panel">
        <div class="panel-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-example" href="#collapseOne">
                Список отчётов для офиса на ул. Октябрьской, 9а
            </a>
<!--            <span style="float: right;" class="label label-info">ул. Октябрьская, 9а</span>-->
        </div>
        <div id="collapseOne" class="panel-collapse collapse">
            <div class="panel-body" style="overflow-x: scroll;">
                <table class="table table-hover" style="font-size: 13px;">
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
                        foreach ( $this->reportsMonth as $key => $value) {
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
                                    <button type="button" class="btn btn-danger"><a style="color:white" href="'.URL.'reports/delete/'.$value['id'].'">Удалить</a></button>
                                </div>

                            </td>
                            </tr>';
                        }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Show reports на Мочалова-->
    <div class="panel">
        <div class="panel-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-example" href="#collapseTwo">
                Список отчётов для офиса на ул. Павла Мочалова, 11
            </a>
<!--            <span style="float: right;" class="label label-info">ул. Павла Мочалова, 11</span>-->
        </div>
        <div id="collapseTwo" class="panel-collapse collapse">
        <div class="panel-body" style="overflow-x: scroll;">
            <table class="table table-hover" style="font-size: 13px;">
                <thead>
                <?php
                echo "<tr>";
                echo "<th class=\"text-center castom\">Дата</th>";
                echo "<th class=\"text-center castom\">Безналичная оплата</th>";
                echo "<th class=\"text-center castom\">Наличная оплата</th>";
                echo "<th class=\"text-center castom\">Оплата бонусами</th>";
                echo "<th class=\"text-center castom\">Оплата услуг</th>";
                echo "<th class=\"text-center castom\">Зарплата</th>";
                echo "<th class=\"text-center castom\">Закуплено продукции</th>";
                echo "<th class=\"text-center castom\">Выдано бонусов деньгами</th>";
                echo "<th class=\"text-center castom\">Коммерческие расходы</th>";
                echo "<th class=\"text-center castom\">На счёте</th>";
                echo "<th class=\"text-center castom\">Касса</th>";
                echo "<th class=\"text-center castom\">Вливание</th>";
                echo "<th class=\"text-center castom\">Дивиденды</th>";
                echo "<th class=\"text-center castom\">Продано в долг</th>";
                echo "<th class=\"text-center castom\">Долг возвращён</th>";
                echo "<th class=\"text-center castom\">Сопутствующий товар</th>";
                echo "<th class=\"text-center castom\">Неоплаченный товар</th>";


                echo "<th class=\"text-center castom\">результат</th>";


                echo "<th class=\"text-center castom\">Комментарий</th>";
                echo "<th class=\"text-center castom\">Действия</th>";
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
                            <td class="text-center">' . $myFormatForView . '</td>
                            <td class="text-center">' . $value['non_cash_payment'] . ' <i class="fa fa-rub"></i></td>
                            <td class="text-center">' . $value['cash_payment'] . ' <i class="fa fa-rub"></i></td>
                            <td class="text-center">' . $value['cash_bonus'] . ' <i class="fa fa-rub"></i></td>
                            <td class="text-center">' . $value['services'] . ' <i class="fa fa-rub"></i></td>
                            <td class="text-center">' . $value['salary'] . ' <i class="fa fa-rub"></i></td>
                            <td class="text-center">' . $value['purchases'] . ' <i class="fa fa-rub"></i></td>
                            <td class="text-center">' . $value['bonus'] . ' <i class="fa fa-rub"></i></td>
                            <td class="text-center">' . $value['expenses'] . ' <i class="fa fa-rub"></i></td>
                            <td class="text-center">' . $value['account_balance'] . ' <i class="fa fa-rub"></i></td>
                            <td class="text-center">' . $value['account_cashier'] . ' <i class="fa fa-rub"></i></td>
                            <td class="text-center">' . $value['infusion'] . ' <i class="fa fa-rub"></i></td>
                            <td class="text-center">' . $value['dividends'] . ' <i class="fa fa-rub"></i></td>
                            <td class="text-center">' . $value['sold_in_debt'] . ' <i class="fa fa-rub"></i></td>
                            <td class="text-center">' . $value['returned_to_duty'] . ' <i class="fa fa-rub"></i></td>
                            <td class="text-center">' . $value['related_products'] . ' <i class="fa fa-rub"></i></td>
                            <td class="text-center">' . $value['unpaid_goods'] . ' <i class="fa fa-rub"></i></td>
                            <td class="text-center"> результат </td>
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
    </div>
















</div>
