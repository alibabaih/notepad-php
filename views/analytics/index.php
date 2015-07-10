<!--jQuery Data Tables-->
<script>
    init.push(function () {
        $('#jq-datatables-example').dataTable();
        $('#jq-datatables-example_wrapper .table-caption').text('Список товаров');
        $('#jq-datatables-example_wrapper .dataTables_filter input').attr('placeholder', 'Поиск...');
    });
</script>

<div id="content-wrapper">
    <div class="page-header">
        <h1><i class="fa fa-eye page-header-icon"></i>&nbsp;&nbsp;Аналитика</h1>
    </div>
    <!--How many products were in the beginning-->
    <?php foreach ($this->goods as $key => $value) : ?>
        <?php $bought_sum_n = $value['quantity_first'] * ($value['isc_cost'] * EURO); ?>
        <?php $bought_sum_total_n += $bought_sum_n; ?>
        <?php $value['name']; ?>
        <?php $value['quantity_first']; ?>
        <?php $value['isc_cost']*EURO; ?>
        <?php $bought_sum_n; ?>
    <?php endforeach;?>
    <!--Related products at the beginnings-->
    <?php foreach ($this->relatesProducts as $key => $value) : ?>
        <?php $related_beginnings += $value['related']; ?>
    <?php endforeach;?>
    <div class="alert alert-info alert-dark">
        <button type="button" class="close" data-dismiss="alert">×</button>
        Общая стоимость склада на 01.04.2015 составляла: <strong>
            <?php $depot = $bought_sum_total_n + $related_beginnings;
                echo number_format($bought_sum_total_n, 2, ',', ' ') . "(товары Ли Вест) + " . number_format($related_beginnings, 2, ',', ' ') . "(сопутствующие товары) = " . number_format($depot, 2, ',', ' '); ?> <i class="fa fa-rub"></i></strong>
    </div>
    <!--/How many products were in beginning-->



    <div class="row">
        <div class="col-md-6">
            <!--Related products were sold by us-->
                <?php foreach ($this->analyticsList as $key => $value) : ?>
                    <?php $sum_related_products_sold += $value['related_products']; ?>
                <?php endforeach;?>
                <?php echo 'Всего было продано сопутствующих товаров: <strong>' . number_format($sum_related_products_sold, 2, ',', ' ') . ' <i class="fa fa-rub"></i></strong><br />'; ?>
            <!--/Related products were sold by us-->

            <!--Related products were bought by us-->
                <?php foreach ($this->relatesProducts as $key => $value) : ?>
                    <?php $sum_related_products_bought += $value['related']; ?>
                <?php endforeach;?>
                <?php echo 'Сопутствующие товары на складах в сумме: <strong>' . number_format($sum_related_products_bought, 2, ',', ' ') . ' <i class="fa fa-rub"></i></strong><br />'; ?>
            <!--/Related products were bought by us-->
        </div>
        <div class="col-md-6">
            <!--How many products were bought-->
                <?php foreach ($this->depotBought as $key => $value) : ?>
                    <?php $bought_sum = $value['quantity'] * ($value['isc_cost'] * EURO); ?>
                    <?php $bought_sum_total += $bought_sum; ?>
                        <?php $value['name']; ?>
                        <?php $value['quantity']; ?>
                    <?php $value['isc_cost']*EURO; ?>
                        <?php $bought_sum; ?>
                <?php endforeach;?>
                <?php  echo 'Всего было куплено товаров на сумму:  <strong>' . number_format($bought_sum_total, 2, ',', ' ') . ' <i class="fa fa-rub"></i></strong><br />'; ?>
            <!--/How many products were bought-->

            <!--How many products were sold-->
                <?php foreach ($this->depotSold as $key => $value) : ?>
                    <?php $sold_sum = $value['quantity'] * ($value['isc_cost'] * EURO); ?>
                    <?php $sold_sum_total += $sold_sum; ?>
                        <?php $value['name']; ?>
                        <?php $value['quantity']; ?>
                    <?php $value['isc_cost']*EURO; ?>
                        <?php $sold_sum; ?>
                <?php endforeach;?>
                <?php echo 'Всего было продано товаров на сумму: <strong>' .  number_format($sold_sum_total, 2, ',', ' ') . ' <i class="fa fa-rub"></i></strong><br />'; ?>
            <!--/How many products were sold-->
        </div>
    </div>

    <hr/>
    <?php
        global $total_depot;
        $total_depot =  $bought_sum_total_n - $sold_sum_total + $bought_sum_total +  $sum_related_products_bought - $sum_related_products_sold . 'rub.';
    ?>
    <div class="alert alert-info alert-dark">
        <button type="button" class="close" data-dismiss="alert">×</button>
        Итого цена склада на данный момент с учётом сопутствующих товаров равна:  <strong><?php echo number_format($total_depot, 2, ',', ' '); ?> <i class="fa fa-rub"></i></strong>
    </div>
    <?php //echo $bought_sum_total_n . ' - ' . $sold_sum_total . ' + ' . $bought_sum_total . ' + ' .  $sum_related_products_bought . ' - ' . $sum_related_products_sold; ?>

    <hr/>
    <h4>Тестирование расчётов за июнь месяц:</h4>
    <p>Тестирование расчётов за июнь месяц:</p>
    <hr/>
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">Список отчётов по месяцам</span>
        </div>
        <div class="panel-body" style="overflow-x: scroll;">
            <div class="table-primary">
                <table  style="font-size: 13px;"  cellpadding="0" cellspacing="0" border="0" class="table table-bordered" >
                    <thead>
                        <tr>
                        <th class="text-center">Месяц</th>
                        <th class="text-center">Коммерческие расходы</th>
                        <th class="text-center">Зарплата</th>
                        <th class="text-center">Закупка</th>
                        <th class="text-center">Итого расходы</th>
                        <th class="text-center">Касса</th>
                        <th class="text-center">Счёт</th>
                        <th class="text-center">Склад</th>
                        <th class="text-center">Бонусный, выданные деньгами</th>
                        <th class="text-center">Товар, проданный в долг</th>
                        <th class="text-center">Товар в подарок</th>
                        <th class="text-center">Итого активы</th>
                        <th class="text-center">Выручка</th>
                        <th class="text-center">Вливания</th>
                        <th class="text-center">Карточка ли вест</th>
                        <th class="text-center">Прибыль операционная</th>
                        <th class="text-center">Дивиденды</th>
                        <th class="text-center">Бонусы, выплаченные деньгами</th>
                        <th class="text-center">Итого доход</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($this->analyticsListApril as $key => $value) :
                                $time1 = strtotime($value['date']);
                                $myFormatForView1 = date("M.Y", $time1);
                                $expenduteries_summ1 = $value['expenses'] + $value['salary'] + $value['purchases'];
                                $debt1 = $value['sold_in_debt'] - $value['returned_to_duty'];
                                $revenue1 = $value['non_cash_payment'] + $value['cash_payment'] + $value['infusion'];
                                $assets1 = $value['account_cashier'] + $value['account_balance'] + $total_depot;
                                $expenses_total1 += $value['expenses'];
                                $salary_total1 += $value['salary'];
                                $purchases_total1 += $value['purchases'];
                                $expenduteries_summ_total1 += $expenduteries_summ1;
                                $revenue_total1 += $revenue1;
                                $debt_total1 += $debt1;
                                $unpaid_goods_total1 += $value['unpaid_goods'];
                                $assets_total1 += $assets1;
                                $infusion_total1 += $value['infusion'];
                                $dividends_total1 += $value['dividends'];
                                $bonus_total1 += $value['bonus'];
                                $c1 = $revenue1 - $expenduteries_summ1;
                                $net_income1 = $c1 - $value['bonus'] - $value['dividends'];
                                $net_income_total1 += $net_income1;
                                $c_total1 += $c1;
                                $cash_bonus_total1 += $value['cash_bonus'];
                        endforeach; ?>
                        <tr>
                            <th class="text-center"><?php echo 'Апрель 2015'; ?></th>
                            <th class="text-center"><?php echo number_format($expenses_total1, 2, ',', ' '); ?>руб.</th>
                            <th class="text-center"><?php echo number_format($salary_total1, 2, ',', ' '); ?>руб.</th>
                            <th class="text-center"><?php echo number_format($purchases_total1, 2, ',', ' '); ?>руб.</th>
                            <th class="text-center" id="result"><?php echo number_format($expenduteries_summ_total1, 2, ',', ' '); ?>руб.</th>
                            <th class="text-center">-</th>
                            <th class="text-center">-</th>
                            <th class="text-center"><?php echo number_format($total_depot, 2, ',', ' '); ?>руб.</th>
                            <th class="text-center"><?php echo number_format($cash_bonus_total1, 2, ',', ' '); ?>руб.</th>
                            <th class="text-center"><?php echo number_format($debt_total1, 2, ',', ' '); ?>руб.</th>
                            <th class="text-center"><?php echo number_format($unpaid_goods_total1, 2, ',', ' '); ?>руб.</th>
                            <th class="text-center"  id="assets_sum"><?php echo number_format($assets1, 2, ',', ' '); ?>руб.</th>
                            <th class="text-center"  id="result"><?php echo number_format($revenue_total1, 2, ',', ' '); ?>руб.</th>
                            <th class="text-center"><?php echo number_format($infusion_total1, 2, ',', ' '); ?>руб.</th>
                            <th class="text-center">                 —</th>
                            <th class="text-center" id="operating_profit"><?php echo number_format($net_income_total1, 2, ',', ' '); ?>руб.</th>
                            <th class="text-center"><?php echo number_format($dividends_total1, 2, ',', ' '); ?>руб.</th>
                            <th class="text-center"><?php echo number_format($bonus_total1, 2, ',', ' '); ?>руб.</th>
                            <th class="text-center"  id="result"><?php echo number_format($c_total1, 2, ',', ' '); ?>руб.</th>
                        </tr>
                        <?php foreach ($this->analyticsListMay as $key => $value) :
                            $time2 = strtotime($value['date']);
                            $myFormatForView2 = date("M.Y", $time2);
                            $expenduteries_summ2 = $value['expenses'] + $value['salary'] + $value['purchases'];
                            $debt2 = $value['sold_in_debt'] - $value['returned_to_duty'];
                            $revenue2 = $value['non_cash_payment'] + $value['cash_payment'] + $value['infusion'];
                            $assets2 = $value['account_cashier'] + $value['account_balance'] + $total_depot2;
                            $expenses_total2 += $value['expenses'];
                            $salary_total2 += $value['salary'];
                            $purchases_total2 += $value['purchases'];
                            $expenduteries_summ_total2 += $expenduteries_summ2;
                            $revenue_total2 += $revenue2;
                            $debt_total2 += $debt2;
                            $unpaid_goods_total2 += $value['unpaid_goods'];
                            $assets_total2 += $assets2;
                            $infusion_total2 += $value['infusion'];
                            $dividends_total2 += $value['dividends'];
                            $bonus_total2 += $value['bonus'];
                            $c2 = $revenue2 - $expenduteries_summ2;
                            $net_income2 = $c2 - $value['bonus'] - $value['dividends'];
                            $net_income_total2 += $net_income2;
                            $c_total2 += $c2;
                            $cash_bonus_total2 += $value['cash_bonus'];
                        endforeach; ?>

                        <tr>
                            <th class="text-center"><?php echo 'Май 2015'; ?></th>
                            <th class="text-center"><?php echo number_format($expenses_total2, 2, ',', ' '); ?>руб.</th>
                            <th class="text-center"><?php echo number_format($salary_total2, 2, ',', ' '); ?>руб.</th>
                            <th class="text-center"><?php echo number_format($purchases_total2, 2, ',', ' '); ?>руб.</th>
                            <th class="text-center"  id="result"><?php echo number_format($expenduteries_summ_total2, 2, ',', ' '); ?>руб.</th>
                            <th class="text-center">-</th>
                            <th class="text-center">-</th>
                            <th class="text-center"><?php echo number_format($total_depot2, 2, ',', ' '); ?>руб.</th>
                            <th class="text-center"><?php echo number_format($cash_bonus_total2, 2, ',', ' '); ?>руб.</th>
                            <th class="text-center"><?php echo number_format($debt_total2, 2, ',', ' '); ?>руб.</th>
                            <th class="text-center"><?php echo number_format($unpaid_goods_total2, 2, ',', ' '); ?>руб.</th>
                            <th class="text-center" id="assets_sum"><?php echo number_format($assets2, 2, ',', ' '); ?>руб.</th>
                            <th class="text-center"  id="result"><?php echo number_format($revenue_total2, 2, ',', ' '); ?>руб.</th>
                            <th class="text-center"><?php echo number_format($infusion_total2, 2, ',', ' '); ?>руб.</th>
                            <th class="text-center">                 —</th>
                            <th class="text-center" id="operating_profit"><?php echo number_format($net_income_total2, 2, ',', ' '); ?>руб.</th>
                            <th class="text-center"><?php echo number_format($dividends_total2, 2, ',', ' '); ?>руб.</th>
                            <th class="text-center"><?php echo number_format($bonus_total2, 2, ',', ' '); ?>руб.</th>
                            <th class="text-center"  id="result"><?php echo number_format($c_total2, 2, ',', ' '); ?>руб.</th>
                        </tr>
                        <?php foreach ($this->analyticsListJune as $key => $value) :
                            $time2 = strtotime($value['date']);
                            $myFormatForView2 = date("M.Y", $time2);
                            $expenduteries_summ3 = $value['expenses'] + $value['salary'] + $value['purchases'];
                            $debt3 = $value['sold_in_debt'] - $value['returned_to_duty'];
                            $revenue3 = $value['non_cash_payment'] + $value['cash_payment'] + $value['infusion'];
                            $assets3 = $value['account_cashier'] + $value['account_balance'] + $total_depot2;
                            $expenses_total3 += $value['expenses'];
                            $salary_total3 += $value['salary'];
                            $purchases_total3 += $value['purchases'];
                            $expenduteries_summ_total3 += $expenduteries_summ2;
                            $revenue_total3 += $revenue3;
                            $debt_total3 += $debt3;
                            $unpaid_goods_total3 += $value['unpaid_goods'];
                            $assets_total3 += $assets3;
                            $infusion_total3 += $value['infusion'];
                            $dividends_total3 += $value['dividends'];
                            $bonus_total3 += $value['bonus'];
                            $c3 = $revenue3 - $expenduteries_summ3;
                            $net_income3 = $c3 - $value['bonus'] - $value['dividends'];
                            $net_income_total3 += $net_income2;
                            $c_total3 += $c3;
                            $cash_bonus_total3 += $value['cash_bonus'];
                        endforeach; ?>

                        <tr>
                            <th class="text-center"><?php echo 'Июнь 2015'; ?></th>
                            <th class="text-center"><?php echo number_format($expenses_total3, 2, ',', ' '); ?>руб.</th>
                            <th class="text-center"><?php echo number_format($salary_total3, 2, ',', ' '); ?>руб.</th>
                            <th class="text-center"><?php echo number_format($purchases_total3, 2, ',', ' '); ?>руб.</th>
                            <th class="text-center"  id="result"><?php echo number_format($expenduteries_summ_total3, 2, ',', ' '); ?>руб.</th>
                            <th class="text-center">-</th>
                            <th class="text-center">-</th>
                            <th class="text-center"><?php echo number_format($total_depot3, 2, ',', ' '); ?>руб.</th>
                            <th class="text-center"><?php echo number_format($cash_bonus_total3, 2, ',', ' '); ?>руб.</th>
                            <th class="text-center"><?php echo number_format($debt_total3, 2, ',', ' '); ?>руб.</th>
                            <th class="text-center"><?php echo number_format($unpaid_goods_total3, 2, ',', ' '); ?>руб.</th>
                            <th class="text-center" id="assets_sum"><?php echo number_format($assets3, 2, ',', ' '); ?>руб.</th>
                            <th class="text-center"  id="result"><?php echo number_format($revenue_total3, 2, ',', ' '); ?>руб.</th>
                            <th class="text-center"><?php echo number_format($infusion_total3, 2, ',', ' '); ?>руб.</th>
                            <th class="text-center">                 —</th>
                            <th class="text-center" id="operating_profit"><?php echo number_format($net_income_total3, 2, ',', ' '); ?>руб.</th>
                            <th class="text-center"><?php echo number_format($dividends_total3, 2, ',', ' '); ?>руб.</th>
                            <th class="text-center"><?php echo number_format($bonus_total3, 2, ',', ' '); ?>руб.</th>
                            <th class="text-center"  id="result"><?php echo number_format($c_total3, 2, ',', ' '); ?>руб.</th>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <hr/>

    <div class="panel">
    <div class="panel-heading">
        <span class="panel-title">Список отчётов за каждый день</span>
    </div>
    <div class="panel-body" style="overflow-x: scroll;">
        <div class="table-primary">
        <table  style="font-size: 13px;"  cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">
            <thead>
            <tr>
                <th class="text-center">Дата</th>
                <th class="text-center">Магазин</th>
                <th class="text-center">Коммерческие расходы</th>
                <th class="text-center">Зарплата</th>
                <th class="text-center">Закупка</th>
                <th class="text-center">Итого расходы</th>
                <th class="text-center">Касса</th>
                <th class="text-center">Счёт</th>
                <th class="text-center">Склад</th>
                <th class="text-center">Бонусный, выданные деньгами</th>
                <th class="text-center">Товар, проданный в долг</th>
                <th class="text-center">Товар в подарок</th>
                <th class="text-center">Итого активы</th>
                <th class="text-center">Выручка</th>
                <th class="text-center">Вливания</th>
                <th class="text-center">Карточка ли вест</th>
                <th class="text-center">Прибыль операционная</th>
                <th class="text-center">Дивиденды</th>
                <th class="text-center">Бонусы, выплаченные деньгами</th>
                <th class="text-center">Итого доход</th>
            </tr>
            </thead>
            <tbody>
            <?php
                foreach ($this->analyticsList as $key => $value) :
                    $time = strtotime($value['date']);
                    $myFormatForView = date("d.m.y", $time);
                    $expenduteries_summ = $value['expenses'] + $value['salary'] + $value['purchases'];
                    $debt = $value['sold_in_debt'] - $value['returned_to_duty'];
                    $revenue = $value['non_cash_payment'] + $value['cash_payment'] + $value['infusion'];
                    $assets = $value['account_cashier'] + $value['account_balance'] + $total_depot;
                    $expenses_total += $value['expenses'];
                    $salary_total += $value['salary'];
                    $purchases_total += $value['purchases'];
                    $expenduteries_summ_total += $expenduteries_summ;
                    $revenue_total += $revenue;
                    $debt_total += $debt;
                    $unpaid_goods_total += $value['unpaid_goods'];
                    $assets_total += $assets;
                    $infusion_total += $value['infusion'];
                    $dividends_total += $value['dividends'];
                    $bonus_total += $value['bonus'];
                    $c = $revenue - $expenduteries_summ;
                    $net_income = $c - $value['bonus'] - $value['dividends'];
                    $net_income_total += $net_income;
                    $c_total += $c;
                    $cash_bonus_total += $value['cash_bonus'];

                    //number_format(, 2, ',', ' ')
                    echo '<tr>';
                    echo '<td class="text-center">' . $myFormatForView  . '</td>';
                    echo '<td class="text-center">' . $value['shop'] . '</td>';
                    echo '<td class="text-center">' . number_format($value['expenses'], 2, ',', ' ') . ' руб.</td>';
                    echo '<td class="text-center">' . number_format($value['salary'], 2, ',', ' ') . ' руб.</td>';
                    echo '<td class="text-center">' . number_format($value['purchases'], 2, ',', ' ') . ' руб.</td>';
                    echo '<td class="text-center">' . number_format($expenduteries_summ, 2, ',', ' ') . ' руб.</td>';

                    echo '<td class="text-center">' . number_format($value['account_cashier'], 2, ',', ' ') . ' руб.</td>';
                    echo '<td class="text-center">' . number_format($value['account_balance'], 2, ',', ' ') . ' руб.</td>';

                    echo '<td class="text-center">' . number_format($total_depot, 2, ',', ' ') . ' руб.</td>';
                    echo '<td class="text-center">' . number_format($value['cash_bonus'], 2, ',', ' ') . ' руб.</td>';
                    echo '<td class="text-center">' . number_format($debt, 2, ',', ' ') . ' руб.</td>';
                    echo '<td class="text-center">' . number_format($value['unpaid_goods'], 2, ',', ' ') . ' руб.</td>';
                    echo '<td class="text-center">' . number_format($assets, 2, ',', ' ') . ' руб.</td>';
                    echo '<td class="text-center">' . number_format($revenue, 2, ',', ' ') . ' руб.</td>';
                    echo '<td class="text-center">' . number_format($value['infusion'], 2, ',', ' ') . ' руб.</td>';
                    echo '<td class="text-center">   —   </td>';
                    echo '<td class="text-center">' . number_format($net_income, 2, ',', ' ') . ' руб.</td>';
                    echo '<td class="text-center">' . number_format($value['dividends'], 2, ',', ' ') . ' руб.</td>';
                    echo '<td class="text-center">' . number_format($value['bonus'], 2, ',', ' ').'  руб.</td>';
                    echo '<td class="text-center">'. number_format($c, 2, ',', ' ') . ' руб.</td>';
                    echo '</tr>';
                endforeach;
            ?>
            <tr>
                <th class="text-center">—</th>
                <th class="text-center">—</th>
                <th class="text-center"><?php echo number_format($expenses_total, 2, ',', ' '); ?>руб.</th>
                <th class="text-center"><?php echo number_format($salary_total, 2, ',', ' '); ?>руб.</th>
                <th class="text-center"><?php echo number_format($purchases_total, 2, ',', ' '); ?>руб.</th>
                <th class="text-center"><?php echo number_format($expenduteries_summ_total, 2, ',', ' '); ?>руб.</th>
                <th class="text-center">-</th>
                <th class="text-center">-</th>
                <th class="text-center"><?php echo number_format($total_depot, 2, ',', ' '); ?>руб.</th>
                <th class="text-center"><?php echo number_format($cash_bonus_total, 2, ',', ' '); ?>руб.</th>
                <th class="text-center"><?php echo number_format($debt_total, 2, ',', ' '); ?>руб.</th>
                <th class="text-center"><?php echo number_format($unpaid_goods_total, 2, ',', ' '); ?>руб.</th>
                <th class="text-center"><?php echo number_format($assets, 2, ',', ' '); ?>руб.</th>
                <th class="text-center"><?php echo number_format($revenue_total, 2, ',', ' '); ?>руб.</th>
                <th class="text-center"><?php echo number_format($infusion_total, 2, ',', ' '); ?>руб.</th>
                <th class="text-center">                 —</th>
                <th class="text-center"><?php echo number_format($net_income_total, 2, ',', ' '); ?>руб.</th>
                <th class="text-center"><?php echo number_format($dividends_total, 2, ',', ' '); ?>руб.</th>
                <th class="text-center"><?php echo number_format($bonus_total, 2, ',', ' '); ?>руб.</th>
                <th class="text-center"><?php echo number_format($c_total, 2, ',', ' '); ?>руб.</th>
            </tr>


            </tbody>
        </table>
        </div>
    </div>
</div>

</div>
