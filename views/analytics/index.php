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
    <h1>Инвентаризация на 01.04.2015</h1>
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
            <?php $augustRelatedSold = $value['related_products']; ?>
        <?php endforeach; ?>
        <?php $augustRelated = $augustRelatedBought - $augustRelatedSold; ?>
        <?php $totalAugustSumWithRelated = $augustRelated + $totalAugustSum; ?>
        <div class="col-md-12">
            <h1>Инвентаризация на 01.08.2015</h1>
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

    <h1>Инвентаризация on-line</h1>
    <div class="alert alert-info alert-dark">
        <button type="button" class="close" data-dismiss="alert">×</button>
        Итого цена склада на данный момент с учётом сопутствующих товаров равна:  <strong><?php echo number_format($total_depot, 2, ',', ' '); ?> <i class="fa fa-rub"></i></strong>
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
                        <th class="text-center">iБанк</th>
                        <th class="text-center">Карта Ли Вест</th>
                        <th class="text-center">Склад</th>
                        <th class="text-center"><span class="badge badge-success">Активы</span></th>
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

                            $all_account_cashier += $value['account_cashier'];
                            $all_account_balance += $value['account_balance'];

                            $all_sold_in_debt += $value['sold_in_debt'];
                            $all_infusion += $value['infusion'];
                        endforeach;
                    $all_expenditures = $expenses_all + $all_salary + $all_purchases + $all_bonus + $all_cash_bonus + $all_unpaid_goods + $all_dividends;
                    $all_revenue = $all_account_balance + $all_account_cashier + $all_infusion;
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
                                if($value['date']  == $currentDate) {
                                    $cashierTopOffice = $value['account_cashier'];
                                    //echo '<span class="tooltips-demo" data-toggle="tooltip" data-placement="top" data-original-title="за текущий день на'.TOP_OFFICE.'">' . $value['account_cashier'] . 'руб.</span>';
                                }
                            endforeach;
                            ?>
                            <?php foreach ($this->cashierBottom as $key => $value):
                                if($value['date'] == $currentDate) {
                                    $cashierBottomOffice = $value['account_cashier'];
                                    //echo '<span class="tooltips-demo" data-toggle="tooltip" data-placement="top" data-original-title="за текущий день на'.BOTTOM_OFFICE.'">' . $value['account_cashier'] . 'руб.</span>';
                                }
                            endforeach; ?>
                            <?php $cashierAllOffices = $cashierTopOffice + $cashierBottomOffice; ?>
                            <?php echo number_format($cashierAllOffices, 2, ',', ' '); ?>руб.
                        </th>
                        <th class="text-center"><?php echo number_format($value['account_balance'], 2, ',', ' '); ?>руб.</th>
                        <th class="text-center"><?php echo number_format($value['liwest_balance'], 2, ',', ' '); ?>руб.</th>
                        <th class="text-center"><?php echo number_format($total_depot, 2, ',', ' '); ?>руб.</th>
                        <th class="text-center">
                            <?php $actives = $cashierTopOffice + $cashierBottomOffice + $total_depot + $value['liwest_balance']; ?>
                            <?php echo '<span class="badge badge-success">' . number_format($actives, 2, ',', ' '); ?>руб.</span>
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
                <th class="text-center">Бонусы деньгами</th>
                <th class="text-center">Бонусы товаром</th>
                <th class="text-center">Товар в подарок</th>
                <th class="text-center">Дивиденды</th>
                <th class="text-center"><span class="badge badge-danger">Расходы итого</span></th>

                <th class="text-center">Касса</th>
                <th class="text-center">Счёт</th>
                <th class="text-center">Склад</th>
                <th class="text-center">Дебет</th>
                <th class="text-center"><span class="badge badge-info">Доход</span></th>

                <th class="text-center"><span class="badge badge-success">Выручка</span></th>
                <th class="text-center">Вливания</th>
                <th class="text-center"><span class="badge badge-success">Активы</span></th>

            </tr>
            </thead>
            <tbody>
            <?php
                foreach ($this->analyticsList as $key => $value) :
                    $time = strtotime($value['date']);
                    $myFormatForView = date("d.m.y", $time);
                    $debt = $value['sold_in_debt'] - $value['returned_to_duty'];
                    $assets = $value['account_cashier'] + $value['account_balance'] + $total_depot;
                    $all_expenditures = $value['expenses'] + $value['salary'] + $value['purchases'] + $value['bonus'] + $value['cash_bonus'] + $value['unpaid_goods'] + $value['dividends'];
                    $all_revenue = $value['non_cash_payment'] + $value['cash_payment'] + $value['infusion'];
                    $total_income = $all_revenue - $all_expenditures;

                    echo '<tr>';
                    echo '<td class="text-center">' . $myFormatForView  . '</td>';
                    echo '<td class="text-center">' . $value['shop'] . '</td>';
                    echo '<td class="text-center">' . number_format($value['expenses'], 2, ',', ' ') . ' руб.</td>';
                    echo '<td class="text-center">' . number_format($value['salary'], 2, ',', ' ') . ' руб.</td>';
                    echo '<td class="text-center">' . number_format($value['purchases'], 2, ',', ' ') . ' руб.</td>';
                    echo '<td class="text-center">' . number_format($value['bonus'], 2, ',', ' ') . ' руб.</td>';
                    echo '<td class="text-center">' . number_format($value['cash_bonus'], 2, ',', ' ') . ' руб.</td>';
                    echo '<td class="text-center">' . number_format($value['unpaid_goods'], 2, ',', ' ') . ' руб.</td>';
                    echo '<td class="text-center">' . number_format($value['dividends'], 2, ',', ' ') . ' руб.</td>';
                    echo '<td class="text-center"><span class="badge badge-danger">' . number_format($all_expenditures, 2, ',', ' ') . ' руб.</span></td>';
                    echo '<td class="text-center">' . number_format($value['account_cashier'], 2, ',', ' ') . ' руб.</td>';
                    echo '<td class="text-center">' . number_format($value['account_balance'], 2, ',', ' ') . ' руб.</td>';
                    echo '<td class="text-center">' . number_format($total_depot, 2, ',', ' ') . ' 11руб.</td>';

                    echo '<td class="text-center">' . number_format($debt, 2, ',', ' ') . ' руб.</td>';
                    echo '<td class="text-center"><span class="badge badge-info">' . number_format($total_income, 2, ',', ' ') . ' руб.</span></td>';

                    echo '<td class="text-center"><span class="badge badge-success">' . number_format($all_revenue, 2, ',', ' ') . ' руб.</span></td>';
                    echo '<td class="text-center">' . number_format($value['infusion'], 2, ',', ' ') . ' руб.</td>';
                    echo '<td class="text-center"><span class="badge badge-success">' . number_format($assets, 2, ',', ' ') . ' руб.</span></td>';

                    echo '</tr>';
                endforeach;
            ?>
            </tbody>
        </table>
        </div>
    </div>
</div>

</div>
