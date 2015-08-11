<!--jQuery Data Tables-->
<script>
    init.push(function () {
        $('#jq-datatables-example').dataTable();
        $('#jq-datatables-example_wrapper .table-caption').text('Список товаров');
        $('#jq-datatables-example_wrapper .dataTables_filter input').attr('placeholder', 'Поиск...');
        $('.tooltips-demo').tooltip();
    });

</script>

<div id="content-wrapper">
    <div class="page-header">
        <h1><i class="fa fa-eye page-header-icon"></i>&nbsp;&nbsp;Аналитика</h1>
    </div>
    <!--How many products were in the beginning-->
    <?php foreach ($this->goods as $key => $value) : ?>
        <?php $bought_sum_n = ($value['quantity_august_Mochalova'] + $value['quantity_august_Oktabrskaya']) * ($value['isc_cost'] * EURO); ?>
        <?php $bought_sum_total_n += $bought_sum_n; ?>
        <?php $value['name']; ?>
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
        <!--Related products-->
        <div class="col-md-6">
            <!--Related products were sold by us-->
                <?php foreach ($this->analyticsList as $key => $value) : ?>
                    <?php $sum_related_products_sold += $value['related_products']; ?>
                <?php endforeach;?>
                <?php echo 'Всего было продано сопутствующих товаров с 1 Апреля: <strong>' . number_format($sum_related_products_sold, 2, ',', ' ') . ' <i class="fa fa-rub"></i></strong><br />'; ?>
            <!--/Related products were sold by us-->

            <!--Related products were bought by us-->
                <?php foreach ($this->relatesProducts as $key => $value) : ?>
                    <?php $sum_related_products_bought += $value['related']; ?>
                <?php endforeach;?>
                <?php $sum_related_products_on_depot = $sum_related_products_bought - $sum_related_products_sold; ?>
                <?php echo 'Сейчас сопутствующих товаров на складах на сумму: <strong>' . number_format($sum_related_products_on_depot, 2, ',', ' ') . ' <i class="fa fa-rub"></i></strong><br />'; ?>
            <!--/Related products were bought by us-->
        </div>
        <!--/Related products-->

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
                <?php  echo 'Всего было куплено товаров Ли Вест на сумму:  <strong>' . number_format($bought_sum_total, 2, ',', ' ') . ' <i class="fa fa-rub"></i></strong><br />'; ?>
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
    <div class="row">
        <?php foreach($this->goods as $key => $value): ?>
            <?php $augustSum = ($value['quantity_august_Oktabrskaya'] + $value['quantity_august_Mochalova']) * $value['isc_cost'] * EURO;
                $totalAugustSum += $augustSum;
            ?>
        <?php endforeach; ?>
        <?php foreach($this->augustRelatedBought as $key => $value): ?>
            <?php $augustRelatedBought = $value['related'];
            ?>
        <?php endforeach; ?>
        <?php foreach($this->augustRelatedSold as $key => $value): ?>
            <?php $augustRelatedSold = $value['related_products'];
            ?>
        <?php endforeach; ?>
        <?php $augustRelated = $augustRelatedBought - augustRelatedSold; ?>
        <?php $totalAugustSumWithRelated = $augustRelated + $totalAugustSum; ?>
        <div class="col-md-12">
            <div class="alert alert-info alert-dark">
                <button type="button" class="close" data-dismiss="alert">×</button>
                Общая стоимость склада на 01.08.2015 составляла: <strong>
                    <?php //$depot = $bought_sum_total_n + $related_beginnings;
                    echo number_format($totalAugustSum, 2, ',', ' ') . "(товары Ли Вест) + " . number_format($augustRelated, 2, ',', ' ') . "(сопутствующие товары) = " . number_format($totalAugustSumWithRelated, 2, ',', ' '); ?> <i class="fa fa-rub"></i></strong>
            </div>
        </div>
    </div>

    <hr/>
    <?php $total_depot =  $bought_sum_total_n - $sold_sum_total + $bought_sum_total +  $sum_related_products_bought - $sum_related_products_sold . 'rub.'; ?>
    <div class="alert alert-info alert-dark">
        <button type="button" class="close" data-dismiss="alert">×</button>
        !Итого цена склада на данный момент с учётом сопутствующих товаров равна:  <strong><?php echo number_format($total_depot, 2, ',', ' '); ?> <i class="fa fa-rub"></i></strong>
    </div>
    <?php //echo $bought_sum_total_n . ' - ' . $sold_sum_total . ' + ' . $bought_sum_total . ' + ' .  $sum_related_products_bought . ' - ' . $sum_related_products_sold; ?>


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
                        <th class="text-center">Бонусы деньгами</th>
                        <th class="text-center">Бонусы товаром</th>
                        <th class="text-center">Товар в подарок</th>
                        <th class="text-center">Дивиденды</th>
                        <th class="text-center"><span class="badge badge-danger">Расходы итого</span></th>

                        <th class="text-center">Товар, проданный в долг</th>
                        <th class="text-center">Вливание</th>
                        <th class="text-center"><span class="badge badge-success">Выручка</span></th>

                        <th class="text-center"><span class="badge badge-info">Доход</span></th>

                        <th class="text-center">Касса</th>
                        <th class="text-center">Склад</th>
                        <th class="text-center">Активы</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $expenses_all; $all_salary; $all_purchases; $all_bonus; $all_cash_bonus; $all_unpaid_goods; $all_dividends; $all_sold_in_debt; $all_infusion;
                        foreach ($this->analyticsListJuly as $key => $value) :
                            $time1 = strtotime($value['date']);
                            $myFormatForView1 = date("M.Y", $time1);
                            $expenses_all += $value['expenses'];
                            $all_salary += $value['salary'];
                            $all_purchases += $value['purchases'];
                            $all_bonus += $value['bonus'];
                            $all_cash_bonus += $value['cash_bonus'];
                            $all_unpaid_goods += $value['unpaid_goods'];
                            $all_dividends += $value['dividends'];

                            $all_sold_in_debt += $value['sold_in_debt'];
                            $all_infusion += $value['infusion'];
                        endforeach;
                    $all_expenditures = $expenses_all + $all_salary + $all_purchases + $all_bonus + $all_cash_bonus + $all_unpaid_goods + $all_dividends;
                    $all_revenue = $all_sold_in_debt + $all_infusion;
                    $total_income = $all_revenue - $all_expenditures;


                    ?>
                    <tr>
                        <th class="text-center">Август 2015</th>
                        <th class="text-center"><?php echo number_format($expenses_all, 2, ',', ' '); ?> руб.</th>
                        <th class="text-center"><?php echo number_format($all_salary, 2, ',', ' '); ?> руб.</th>
                        <th class="text-center"><?php echo number_format($all_purchases, 2, ',', ' '); ?> руб.</th>
                        <th class="text-center"><?php echo number_format($all_bonus, 2, ',', ' '); ?> руб.</th>
                        <th class="text-center"><?php echo number_format($all_cash_bonus, 2, ',', ' '); ?> руб.</th>
                        <th class="text-center"><?php echo number_format($all_unpaid_goods, 2, ',', ' '); ?> руб.</th>
                        <th class="text-center"><?php echo number_format($all_dividends, 2, ',', ' '); ?>руб.</th>
                        <th class="text-center"><span class="badge badge-danger"><?php echo number_format($all_expenditures, 2, ',', ' '); ?>руб.</span></th>

                        <th class="text-center"><?php echo number_format($all_sold_in_debt, 2, ',', ' '); ?>руб.</th>
                        <th class="text-center"><?php echo number_format($all_infusion, 2, ',', ' '); ?>руб.</th>
                        <th class="text-center"><span class="badge badge-success"><?php echo number_format($all_revenue, 2, ',', ' '); ?>руб.</span></th>

                        <th class="text-center"><span class="badge badge-info"><?php echo number_format($total_income, 2, ',', ' '); ?>руб.</span></th>

                        <!-- Касса -->
                        <th class="text-center">
                            <?php
                                //check on current date and existence of the value
                                $currentDate = date('Y-m-d');
                                $yesterday = date("Y-m-d", time() - 86400);
                            ?>
                            <?php  foreach ($this->cashierTop as $key => $value):
                                if($value['date']  == $yesterday) {
                                    $cashierTopOffice = $value['account_cashier'];
                                    echo '<span class="tooltips-demo" data-toggle="tooltip" data-placement="top" data-original-title="за текущий день на'.TOP_OFFICE.'">' . $value['account_cashier'] . 'руб.</span>';
                                }
                            endforeach;
                            ?>
                            <?php echo ' & '; ?>
                            <?php foreach ($this->cashierBottom as $key => $value):
                                if($value['date'] == $yesterday) {
                                    $cashierBottomOffice = $value['account_cashier'];
                                    echo '<span class="tooltips-demo" data-toggle="tooltip" data-placement="top" data-original-title="за текущий день на'.BOTTOM_OFFICE.'">' . $value['account_cashier'] . 'руб.</span>';
                                }
//                                if ($value['date'] == $yesterday) {
//                                    echo $value['account_cashier'] . 'руб. <small>за предыдущий день на ' . BOTTOM_OFFICE . '</small>';
//                                }
//                                if ($value['date'] == $currentDateMinus2) {
//                                    echo $value['account_cashier'] . 'руб. <small>за ' . $value['date'] . ' на ' . BOTTOM_OFFICE . '</small>';
//                                }
//                                if ($value['date'] == $currentDateMinus3) {
//                                    echo $value['account_cashier'] . 'руб. <small>за ' . $value['date'] . ' на ' . BOTTOM_OFFICE . '</small>';
//                                }
                            endforeach; ?>
                        </th>
                        <th class="text-center"><?php echo number_format($total_depot, 2, ',', ' '); ?>руб.</th>
                        <th class="text-center">
                            <?php $actives = $cashierTopOffice + $cashierBottomOffice + $total_depot; ?>
                            <?php echo number_format($actives, 2, ',', ' '); ?>руб.
                        </th>
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
