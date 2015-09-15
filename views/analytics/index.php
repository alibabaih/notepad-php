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
    <div class="row">

        <?php foreach ($this->goods as $key => $value) : ?>
            <?php $goods_beginnings += (($value['quantity_first_Mochalova'] + $value['quantity_first_Oktabrskaya']) * ($value['isc_cost'] * EURO)); ?>
        <?php endforeach;?>
        <!--Related products at the beginnings-->
        <?php foreach ($this->relatesProductsd as $key => $value) : ?>
            <?php $related_beginnings += $value['related']; ?>
        <?php endforeach;?>
        <div class="col-md-12">
        <a href="#" class="label" style="margin-bottom: 10px;">Инвентаризация на 01.04.2015</a>
        <div class="alert alert-info alert-dark">
            <button type="button" class="close" data-dismiss="alert">×</button>
            Общая стоимость склада на 01.04.2015 составляла: <strong>
                <?php $depot = $goods_beginnings + $related_beginnings;
                    echo number_format($goods_beginnings, 2, ',', ' ') . "(товары Ли Вест) + " . number_format($related_beginnings, 2, ',', ' ') . "(сопутствующие товары) = " . number_format($depot, 2, ',', ' '); ?> <i class="fa fa-rub"></i></strong>
        </div>
            </div>
    </div>
    <!--/How many products were in the beginning-->

    <!--How many products were in August-->
    <div class="row">
        <?php foreach($this->goods as $key => $value): ?>
            <?php $goods_august += (($value['quantity_august_Oktabrskaya'] + $value['quantity_august_Mochalova']) * $value['isc_cost'] * EURO);?>
        <?php endforeach; ?>
        <?php foreach($this->augustRelatedBought as $key => $value): ?>
            <?php $augustRelatedBought = $value['related'];
            ?>
        <?php endforeach; ?>
        <?php foreach($this->augustRelatedSold as $key => $value): ?>
            <?php $augustRelatedSold = $value['related']; ?>
        <?php endforeach; ?>
        <?php $augustRelated = $augustRelatedBought - $augustRelatedSold; ?>
        <?php $totalAugustSumWithRelated = $augustRelated + $goods_august; ?>
        <div class="col-md-12">
            <a href="#" class="label" style="margin-bottom: 10px;">Инвентаризация на 01.08.2015</a>
            <div class="alert alert-info alert-dark">
                <button type="button" class="close" data-dismiss="alert">×</button>
                Общая стоимость склада на 01.08.2015 составляла: <strong>
                    <?php
                    echo number_format($goods_august, 2, ',', ' ') . "(товары Ли Вест) + " . number_format($augustRelated, 2, ',', ' ') . "(сопутствующие товары) = " . number_format($totalAugustSumWithRelated, 2, ',', ' '); ?> <i class="fa fa-rub"></i></strong>
            </div>
        </div>
    </div>
    <!--/How many products were in August-->

    <!--How many products online-->
    <div class="row">
        <?php foreach($this->goods as $key => $value): ?>
            <?php $goods += (($value['quantity_august_Oktabrskaya'] + $value['quantity_august_Mochalova']) * $value['isc_cost'] * EURO);?>
        <?php endforeach; ?>
        <?php foreach($this->sumRelatedBought as $key => $value): ?>
            <?php $sumRelatedBought = $value['related'];?>
        <?php endforeach; ?>
        <?php foreach($this->sumRelatedSold as $key => $value): ?>
            <?php $sumRelatedSold = $value['related']; ?>
        <?php endforeach; ?>

        <?php foreach($this->sumLiwestBought as $key => $value): ?>
            <?php $sumLiwestBought += ($value['total_bought'] * ($value['isc_cost'] * EURO));
            ?>
        <?php endforeach; ?>
        <?php foreach($this->sumLiwestSold as $key => $value): ?>
            <?php $sumLiwestSold += ($value['total_sold'] * ($value['isc_cost'] * EURO)); ?>
        <?php endforeach; ?>

        <?php $sumRelated = $sumRelatedBought - $sumRelatedSold; ?>
        <?php $sumLiwest = $goods + ($sumLiwestBought - $sumLiwestSold); ?>
        <?php $totalSumWithRelated = $sumRelated + $sumLiwest; ?>
        <div class="col-md-12">
            <a href="#" class="label" style="margin-bottom: 10px;">Инвентаризация on-line</a>
            <div class="alert alert-info alert-dark">
                <button type="button" class="close" data-dismiss="alert">×</button>
                Итого цена склада равна: <strong>
                    <?php //$depot = $bought_sum_total_n + $related_beginnings;
                    echo number_format($sumLiwest, 2, ',', ' ') . "(товары Ли Вест) + " . number_format($sumRelated, 2, ',', ' ') . "(сопутствующие товары) = " . number_format($totalSumWithRelated, 2, ',', ' '); ?> <i class="fa fa-rub"></i></strong>
            </div>

<!--            <hr />-->
<!--            Всего сумма товаров "Ли Вест" на 01.08.2015 (день последнего учёта товаров): --><?php //echo $goods; ?><!--<br />-->
<!--            Всего продано товаров "Ли Вест" на сумму: --><?php //echo $sumLiwestSold; ?><!--<br />-->
<!--            Всего куплено товаров "Ли Вест" на сумму: --><?php //echo $sumLiwestBought; ?><!--<br />-->
<!--            Всего куплено сопутствующих товаров на сумму: --><?php //echo $sumRelatedBought; ?><!--<br />-->
<!--            Всего продано сопутствующих товаров на сумму: --><?php //echo $sumRelatedSold; ?><!--<br />-->
<!---->
<!--            <hr />-->
        </div>
    </div>
    <!--/How many products online-->




    <div class="panel">
        <div class="panel-heading" style="padding-bottom: 19px;">
            <span class="panel-title">Итоговая таблица за месяцы</span>
            <form class="form-inline" style="display: inline-block; float: right;" method="post" action="<? echo URL; ?>analytics/monthByShop" class="form">
                <select class="form-control form-group-margin" style="margin-bottom: 0px!important;" name="shop">
                    <option><?php echo TOP_OFFICE; ?></option>
                    <option><?php echo BOTTOM_OFFICE; ?></option>
                </select>
                <button type="submit" class="btn btn-primary">Сформировать</button>
            </form>
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
                            <th class="text-center"><span class="badge badge-danger"><?php echo EXPENDETURES; ?></span></th>
                            <th class="text-center"><?php echo DEBT; ?></th>
                            <th class="text-center">Вливание</th>
                            <th class="text-center"><span class="badge badge-success"><?php echo REVENUE; ?></span></th>
                            <th class="text-center"><span class="badge badge-info"><?php echo PROFIT; ?></span></th>
                            <th class="text-center">Касса</th>
                            <th class="text-center">iБанк</th>
                            <th class="text-center">Карта Ли Вест</th>
                            <th class="text-center">Склад</th>
                            <th class="text-center"><span class="badge badge-success" style="background-color: #DEB887; border: #DEB887;">Активы</span></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($this->analyticsListAugust as $key => $value) : endforeach;
                        $expenditures = $value['salary'] + $value['purchases'] + $value['bonus'] + $value['expenses'] + $value['dividends'] + $value['cash_bonus'] + $value['unpaid_goods'];
                        $debt = $value['sold_in_debt'] - $value['returned_to_duty'];
                        $revenue = $value['non_cash_payment '] + $value['cash_payment'] + $value['infusion'];
                        $income = $revenue - $expenditures;
                    ?>
                    <tr>
                        <th class="text-center">Август 2015</th>
                        <th class="text-center"><?php echo number_format($value['expenses'], 0, ',', ' '); ?> <i class="fa fa-rub"></i></th>
                        <th class="text-center"><?php echo number_format($value['salary'], 0, ',', ' '); ?> <i class="fa fa-rub"></i></th>
                        <th class="text-center"><?php echo number_format($value['purchases'], 0, ',', ' '); ?> <i class="fa fa-rub"></i></th>
                        <th class="text-center"><?php echo number_format($value['bonus'], 0, ',', ' '); ?> <i class="fa fa-rub"></i></th>
                        <th class="text-center"><?php echo number_format($value['cash_bonus'], 0, ',', ' '); ?> <i class="fa fa-rub"></i></th>
                        <th class="text-center"><?php echo number_format($value['unpaid_goods'], 0, ',', ' '); ?> <i class="fa fa-rub"></i></th>
                        <th class="text-center"><?php echo number_format($value['dividends'], 0, ',', ' '); ?> <i class="fa fa-rub"></i></th>
                        <th class="text-center"><span class="badge badge-danger"><?php echo number_format($expenditures, 0, ',', ' '); ?> <i class="fa fa-rub"></i></span></th>
                        <th class="text-center"><?php echo number_format($debt, 0, ',', ' '); ?> <i class="fa fa-rub"></i></th>
                        <th class="text-center"><?php echo number_format($value['infusion'], 0, ',', ' '); ?> <i class="fa fa-rub"></i></th>
                        <th class="text-center"><span class="badge badge-success"><?php echo number_format($revenue, 0, ',', ' '); ?> <i class="fa fa-rub"></i></span></th>
                        <th class="text-center"><span class="badge badge-info"><?php echo number_format($income, 0, ',', ' '); ?> <i class="fa fa-rub"></i></span></th>
                        <th class="text-center"><?php echo number_format($this->cashier_bankAugust[0][0][account_cashier]+$this->cashier_bankAugust[1][0][account_cashier], 0, ',', ' '); ?> руб.</th>
                        <th class="text-center"><?php echo number_format($this->cashier_bankAugust[0][0][account_balance]+$this->cashier_bankAugust[1][0][account_balance], 0, ',', ' '); ?> <i class="fa fa-rub"></i></th>
                        <th class="text-center"><?php echo number_format($this->cashier_bankAugust[0][0][liwest_balance]+$this->cashier_bankAugust[1][0][liwest_balance], 0, ',', ' '); ?> <i class="fa fa-rub"></i></th>
                        <th class="text-center">
                            <?php echo number_format($goods - $this->depotListByAugustSold[0][sold] + $this->depotListByAugustBought[0][bought] + $this->sumRelatedBoughtAugust[0][related] - $this->sumRelatedSoldAugust[0][related], 0, ',', ' '); ?> <i class="fa fa-rub"></i>
                        </th>
                        <th class="text-center">
                            <span class="badge badge-success" style="background-color: #DEB887; border: #DEB887;"><?php echo number_format($this->cashierAugust[0][account_cashier] + $this->cashierAugust[0][account_balance] + $this->cashierAugust[0][liwest_balance] + $goods - $this->depotListByAugustSold[0][sold] + $this->depotListByAugustBought[0][bought] + $this->sumRelatedBoughtAugust[0][related] - $this->sumRelatedSoldAugust[0][related], 0, ',', ' '); ?> <i class="fa fa-rub"></i></span>
                        </th>
                    </tr>



                    <?php
                    foreach ($this->analyticsListSeptember as $key => $value) : endforeach;
                    $expenditures = $value['salary'] + $value['purchases'] + $value['bonus'] + $value['expenses'] + $value['dividends'] + $value['cash_bonus'] + $value['unpaid_goods'];
                    $debt = $value['sold_in_debt'] - $value['returned_to_duty'];
                    $revenue = $value['non_cash_payment '] + $value['cash_payment'] + $value['infusion'];
                    $income = $revenue - $expenditures;
                    ?>
                    <tr>
                        <th class="text-center">Сентябрь 2015</th>
                        <th class="text-center"><?php echo number_format($value['expenses'], 0, ',', ' '); ?> <i class="fa fa-rub"></i></th>
                        <th class="text-center"><?php echo number_format($value['salary'], 0, ',', ' '); ?> <i class="fa fa-rub"></i></th>
                        <th class="text-center"><?php echo number_format($value['purchases'], 0, ',', ' '); ?> <i class="fa fa-rub"></i></th>
                        <th class="text-center"><?php echo number_format($value['bonus'], 0, ',', ' '); ?> <i class="fa fa-rub"></i></th>
                        <th class="text-center"><?php echo number_format($value['cash_bonus'], 0, ',', ' '); ?> <i class="fa fa-rub"></i></th>
                        <th class="text-center"><?php echo number_format($value['unpaid_goods'], 0, ',', ' '); ?> <i class="fa fa-rub"></i></th>
                        <th class="text-center"><?php echo number_format($value['dividends'], 0, ',', ' '); ?> <i class="fa fa-rub"></i></th>
                        <th class="text-center"><span class="badge badge-danger"><?php echo number_format($expenditures, 0, ',', ' '); ?> <i class="fa fa-rub"></i></span></th>
                        <th class="text-center"><?php echo number_format($debt, 0, ',', ' '); ?> <i class="fa fa-rub"></i></th>
                        <th class="text-center"><?php echo number_format($value['infusion'], 0, ',', ' '); ?> <i class="fa fa-rub"></i></th>
                        <th class="text-center"><span class="badge badge-success"><?php echo number_format($revenue, 0, ',', ' '); ?> <i class="fa fa-rub"></i></span></th>
                        <th class="text-center"><span class="badge badge-info"><?php echo number_format($income, 0, ',', ' '); ?> <i class="fa fa-rub"></i></span></th>
                        <th class="text-center"><?php echo number_format($this->cashier_bankSeptember[0][0][account_cashier]+$this->cashier_bankAugust[1][0][account_cashier], 0, ',', ' '); ?> руб.</th>
                        <th class="text-center"><?php echo number_format($this->cashier_bankSeptember[0][0][account_balance]+$this->cashier_bankAugust[1][0][account_balance], 0, ',', ' '); ?> <i class="fa fa-rub"></i></th>
                        <th class="text-center"><?php echo number_format($this->cashier_bankSeptember[0][0][liwest_balance]+$this->cashier_bankAugust[1][0][liwest_balance], 0, ',', ' '); ?> <i class="fa fa-rub"></i></th>
                        <th class="text-center">
                            <?php echo number_format($goods - $this->depotListBySeptemberSold[0][sold] + $this->depotListBySeptemberBought[0][bought] + $this->sumRelatedBoughtSeptember[0][related] - $this->sumRelatedSoldSeptember[0][related], 0, ',', ' '); ?> <i class="fa fa-rub"></i>
<!--                            <hr />-->
<!--                            Всего сумма товаров "Ли Вест" на 01.08.2015 (день последнего учёта товаров): --><?php //echo $goods; ?><!--<br />-->
<!--                            Всего продано товаров "Ли Вест" на сумму: --><?php //echo $this->depotListBySeptemberSold[0][sold]; ?><!--<br />-->
<!--                            Всего куплено товаров "Ли Вест" на сумму: --><?php //echo $this->depotListBySeptemberBought[0][bought]; ?><!--<br />-->
<!--                            Всего куплено сопутствующих товаров на сумму: --><?php //echo $this->sumRelatedBoughtSeptember[0][related]; ?><!--<br />-->
<!--                            Всего продано сопутствующих товаров на сумму: --><?php //echo $this->sumRelatedSoldSeptember[0][related]; ?><!--<br />-->
<!--                            Goods: --><?php //echo $goods; ?>
<!--                            <hr />-->
                        </th>
                        <th class="text-center">
                            <span class="badge badge-success" style="background-color: #DEB887; border: #DEB887;"><?php echo number_format($this->cashierSeptember[0][account_cashier] + $this->cashierSeptember[0][account_balance] + $this->cashierSeptember[0][liwest_balance] + $goods - $this->depotListBySeptemberSold[0][sold] + $this->depotListBySeptemberBought[0][bought] + $this->sumRelatedBoughtSeptember[0][related] - $this->sumRelatedSoldSeptember[0][related], 0, ',', ' '); ?> <i class="fa fa-rub"></i></span>
                        </th>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <hr/>

<!--    <div class="panel">-->
<!--    <div class="panel-heading">-->
<!--        <span class="panel-title">Список отчётов за каждый день</span>-->
<!--    </div>-->
<!--    <div class="panel-body" style="overflow-x: scroll;">-->
<!--        <div class="table-primary">-->
<!--        <table  style="font-size: 13px;"  cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">-->
<!--            <thead>-->
<!--            <tr>-->
<!--                <th class="text-center">Дата</th>-->
<!--                <th class="text-center">Магазин</th>-->
<!--                <th class="text-center">Коммерческие расходы</th>-->
<!--                <th class="text-center">Зарплата</th>-->
<!--                <th class="text-center">Закупка</th>-->
<!--                <th class="text-center">Бонусы деньгами</th>-->
<!--                <th class="text-center">Бонусы товаром</th>-->
<!--                <th class="text-center">Товар в подарок</th>-->
<!--                <th class="text-center">Дивиденды</th>-->
<!--                <th class="text-center"><span class="badge badge-danger">Расходы итого</span></th>-->
<!---->
<!--                <th class="text-center">Касса</th>-->
<!--                <th class="text-center">Счёт</th>-->
<!--                <th class="text-center">Склад</th>-->
<!--                <th class="text-center">Дебет</th>-->
<!--                <th class="text-center"><span class="badge badge-info">Доход</span></th>-->
<!---->
<!--                <th class="text-center"><span class="badge badge-success">Выручка</span></th>-->
<!--                <th class="text-center">Вливания</th>-->
<!--                <th class="text-center"><span class="badge badge-success">Активы</span></th>-->
<!---->
<!--            </tr>-->
<!--            </thead>-->
<!--            <tbody>-->
<!--            --><?php
//                foreach ($this->analyticsList as $key => $value) :
//                    $time = strtotime($value['date']);
//                    $myFormatForView = date("d.m.y", $time);
//                    $debt = $value['sold_in_debt'] - $value['returned_to_duty'];
//                    $assets = $value['account_cashier'] + $value['account_balance'] + $total_depot;
//                    $all_expenditures = $value['expenses'] + $value['salary'] + $value['purchases'] + $value['bonus'] + $value['cash_bonus'] + $value['unpaid_goods'] + $value['dividends'];
//                    $all_revenue = $value['non_cash_payment'] + $value['cash_payment'] + $value['infusion'];
//                    $total_income = $all_revenue - $all_expenditures;
//
//                    echo '<tr>';
//                    echo '<td class="text-center">' . $myFormatForView  . '</td>';
//                    echo '<td class="text-center">' . $value['shop'] . '</td>';
//                    echo '<td class="text-center">' . number_format($value['expenses'], 2, ',', ' ') . ' руб.</td>';
//                    echo '<td class="text-center">' . number_format($value['salary'], 2, ',', ' ') . ' руб.</td>';
//                    echo '<td class="text-center">' . number_format($value['purchases'], 2, ',', ' ') . ' руб.</td>';
//                    echo '<td class="text-center">' . number_format($value['bonus'], 2, ',', ' ') . ' руб.</td>';
//                    echo '<td class="text-center">' . number_format($value['cash_bonus'], 2, ',', ' ') . ' руб.</td>';
//                    echo '<td class="text-center">' . number_format($value['unpaid_goods'], 2, ',', ' ') . ' руб.</td>';
//                    echo '<td class="text-center">' . number_format($value['dividends'], 2, ',', ' ') . ' руб.</td>';
//                    echo '<td class="text-center"><span class="badge badge-danger">' . number_format($all_expenditures, 2, ',', ' ') . ' руб.</span></td>';
//                    echo '<td class="text-center">' . number_format($value['account_cashier'], 2, ',', ' ') . ' руб.</td>';
//                    echo '<td class="text-center">' . number_format($value['account_balance'], 2, ',', ' ') . ' руб.</td>';
//                    echo '<td class="text-center">' . number_format($total_depot, 2, ',', ' ') . ' 11руб.</td>';
//
//                    echo '<td class="text-center">' . number_format($debt, 2, ',', ' ') . ' руб.</td>';
//                    echo '<td class="text-center"><span class="badge badge-info">' . number_format($total_income, 2, ',', ' ') . ' руб.</span></td>';
//
//                    echo '<td class="text-center"><span class="badge badge-success">' . number_format($all_revenue, 2, ',', ' ') . ' руб.</span></td>';
//                    echo '<td class="text-center">' . number_format($value['infusion'], 2, ',', ' ') . ' руб.</td>';
//                    echo '<td class="text-center"><span class="badge badge-success">' . number_format($assets, 2, ',', ' ') . ' руб.</span></td>';
//
//                    echo '</tr>';
//                endforeach;
//            ?>
<!--            </tbody>-->
<!--        </table>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

</div>
