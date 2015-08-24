<script>
    init.push(function () {
        var options = {
            todayBtn: "linked",
            format: 'dd.mm.yy',
            orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto'
        }
        $("#masked-inputs-examples-date").mask("99.99.99");
        $('.bs-datepicker-example').datepicker(options);
    });
</script>

<div id="content-wrapper">
    <div class="page-header">
        <h1><i class="menu-icon fa fa-dashboard"></i>&nbsp;&nbsp;Главная</h1>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Выручка, расход</span>
                </div>
                <div class="panel-body">
                    <table  style="font-size: 13px;"  cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <th class="text-center">Дата</th>
                            <th class="text-center">Магазин</th>
                            <th class="text-center">Выручка</th>
                            <th class="text-center">Расход</th>
                            <th class="text-center">Итого (выручка и расход)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ( $this->revenue as $key => $value):
                                    $time = strtotime($value['date']);
                                    $myFormatForView = date("d.m.y", $time);
                                    $revenue = $value['non_cash_payment'] + $value['cash_payment'] + $value['infusion'];
                                    $overhead_costs = $value['salary'] + $value['purchases'] + $value['bonus'] + $value['expenses'] + $value['dividends'] + $value['cash_bonus'] + $value['unpaid_goods'];
                                    $total = $revenue - $overhead_costs;
                                    echo '<tr>';
                                    echo '<td class="text-center">' . $myFormatForView . '</td>';
                                    echo '<td class="text-center">' . $value['shop'] . '</td>';
                                    echo '<td class="text-center">' . number_format($revenue, 2, ',', ' ') . ' руб.</td>';
                                    echo '<td class="text-center">' . number_format($overhead_costs, 2, ',', ' ') . ' руб.</td>';
                                    echo '<td class="text-center">' . number_format($total, 2, ',', ' ') . ' руб.</td>';
                                    echo '</tr>';
                                endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Дебет (существующий долг)</span>
                </div>
                <div class="panel-body">
                    <?php
                        foreach($this->debt as $key => $value) :
                            $loan = $value['loan'];
                            $deposit = $value['deposit'];
                            $promissory = $loan - $deposit;
                        endforeach;
                    ?>
                    <p>Продано в долг — долг возвращён с 1 апреля 2014 года:
                        <?php
                            if($promissory >= 0){
                                echo ' нам должны '. number_format($promissory, 2, ',', ' '). ' руб.';
                            }
                            if($promissory <= 0){
                                echo ' мы должны '. number_format($promissory, 2, ',', ' '). ' руб.';
                            }
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Сформировать отчёт сколько стоил склад на определённую дату</span>
                </div>
                <div class="panel-body">
                    <?php
                    $now = date('Y-m-d',strtotime("now"));
                    $previousWeek = date('Y-m-d',strtotime("-1 week"));
                    echo $now . ' '. $previousWeek;
                    ?>

                    <form class="form-inline" method="post" action="<? echo URL; ?>dashboard/period" class="form">
                        <div class="form-group">
                            <label>Подсчёт суммы склада на дату: </label>
                            <input type="text" class="form-control bs-datepicker-example" name="date" placeholder="Дата">
                        </div>
                        <button type="submit" class="btn btn-primary">Сформировать</button>
                    </form>
                </div>
            </div>
        </div>
    </div>






</div>