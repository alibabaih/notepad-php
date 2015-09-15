<?php foreach($this->goods as $key => $value): ?>
    <?php $goods = $value['sum'];?>
<?php endforeach; ?>
<div id="content-wrapper">
    <div class="page-header">
        <h1><i class="fa fa-eye page-header-icon"></i>&nbsp;&nbsp;Аналитика</h1>
    </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading"><span class="panel-title">Итоговая таблица за месяцы в магазине на <?php echo $this->cashierSeptember[0][shop]; ?></span></div>
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
                            <th class="text-center"><?php echo number_format($this->cashierAugust[0][account_cashier], 0, ',', ' '); ?> руб.</th>
                            <th class="text-center"><?php echo number_format($this->cashierAugust[0][account_balance], 0, ',', ' '); ?> <i class="fa fa-rub"></i></th>
                            <th class="text-center"><?php echo number_format($this->cashierAugust[0][liwest_balance], 0, ',', ' '); ?> <i class="fa fa-rub"></i></th>
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
                            <th class="text-center"><?php echo number_format($this->cashierSeptember[0][account_cashier], 0, ',', ' '); ?> руб.</th>
                            <th class="text-center"><?php echo number_format($this->cashierSeptember[0][account_balance], 0, ',', ' '); ?> <i class="fa fa-rub"></i></th>
                            <th class="text-center"><?php echo number_format($this->cashierSeptember[0][liwest_balance], 0, ',', ' '); ?> <i class="fa fa-rub"></i></th>
                            <th class="text-center">
                                <?php echo number_format($goods - $this->depotListBySeptemberSold[0][sold] + $this->depotListBySeptemberBought[0][bought] + $this->sumRelatedBoughtSeptember[0][related] - $this->sumRelatedSoldSeptember[0][related], 0, ',', ' '); ?> <i class="fa fa-rub"></i>
<!--                                                            <hr />-->
<!--                                                            Всего сумма товаров "Ли Вест" на 01.08.2015 (день последнего учёта товаров): --><?php //echo $goods; ?><!--<br />-->
<!--                                                            Всего продано товаров "Ли Вест" на сумму: --><?php //echo $this->depotListBySeptemberSold[0][sold]; ?><!--<br />-->
<!--                                                            Всего куплено товаров "Ли Вест" на сумму: --><?php //echo $this->depotListBySeptemberBought[0][bought]; ?><!--<br />-->
<!--                                                            Всего куплено сопутствующих товаров на сумму: --><?php //echo $this->sumRelatedBoughtSeptember[0][related]; ?><!--<br />-->
<!--                                                            Всего продано сопутствующих товаров на сумму: --><?php //echo $this->sumRelatedSoldSeptember[0][related]; ?><!--<br />-->
<!--                                                            Goods: --><?php //echo $goods; ?>
<!--                                                            <hr />-->
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
    </div>
</div>

    </div>