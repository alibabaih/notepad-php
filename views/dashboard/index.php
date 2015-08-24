<div id="content-wrapper">

    <div class="row">
        <div class="col-md-12">
            <button class="respond">click</button>
            <p class="ajaxContent"></p>
            <script>
                $(".respond").click(function() {
                    //alert('button was clicked');
                    $.ajax({
                        type: 'GET',
                        url: '/dashboard/revenue',
                        timeout: 3000,
                        datatype: 'json',
                        //data: '',
                        success: function(result) {
                            //console.log(result);
                            //$('.ajaxContent').append(result);
                            var res = result.slice(1,-1);
                            console.log(res);
                            $('.ajaxContent').html('Date: ' + result.date + ', Revenue: ' + result.revenue);

                            //$.each(result, function(key, value){
                                //$('.ajaxContent').append(value['date'] + ' ' + value['revenue']);
                                //console.log(key+ ':' + value);
//                                $.each(value, function(key, value){
//                                    console.log(value['date'] + ' ' + value['revenue']);
//                                });
                            //});
                        }
                    });
                });

            </script>

        </div>
    </div>


    <div class="row">
        <div class="col-md-3">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Выручка ул.Павла Мочалова</span>
                </div>
                <div class="panel-body scroll-panel">
                    <?php
                    $revenueBottom = array();
                    foreach ($this->revenue as $key=>$value): ?>
                        <?php if($value['shop'] == BOTTOM_OFFICE): ?>
                            <?php $revenue = $value['non_cash_payment'] + $value['cash_payment'] + $value['returned_to_duty'];
                            array_push($revenueBottom, $revenue);
                            ?>
                            <?php echo 'Дата: ' . $value['date'] . ' Сумма: ' . number_format($revenue, 2, ',', ' ').'руб. <br />'; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Выручка ул.Октябрьская</span>
                </div>
                <div class="panel-body scroll-panel">
                    <?php
                    $revenueTop = array();
                    foreach ($this->revenue as $key=>$value): ?>
                        <?php if($value['shop'] == TOP_OFFICE): ?>
                            <?php $revenue = $value['non_cash_payment'] + $value['cash_payment'] + $value['returned_to_duty'];
                            array_push($revenueTop, $revenue);
                            ?>
                            <?php echo 'Дата: ' . $value['date'] . ' Сумма: ' . number_format($revenue, 2, ',', ' ').'руб. <br />'; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Расход ул.Павла Мочалова</span>
                </div>
                <div class="panel-body scroll-panel">
                    <?php
                    $expendituresBottom = array();
                    foreach ($this->expenditures as $key=>$value): ?>
                        <?php if($value['shop'] == BOTTOM_OFFICE): ?>
                            <?php $expenditures = $value['salary'] + $value['purchases'] + $value['bonus'] + $value['expenses'] + $value['dividends'] + $value['cash_bonus'] + $value['unpaid_goods'];
                            array_push($expendituresBottom, $expenditures); ?>
                            <?php echo 'Дата: ' . $value['date'] . ' Сумма: ' . number_format($expenditures, 2, ',', ' ').'руб. <br />'; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Расход ул.Октябрьская</span>
                </div>
                <div class="panel-body scroll-panel">
                    <?php
                    $expendituresTop = array();
                    foreach ($this->expenditures as $key=>$value): ?>
                        <?php if($value['shop'] == TOP_OFFICE): ?>
                            <?php $expenditures = $value['salary'] + $value['purchases'] + $value['bonus'] + $value['expenses'] + $value['dividends'] + $value['cash_bonus'] + $value['unpaid_goods'];
                            array_push($expendituresTop, $expenditures);
                            ?>
                            <?php echo 'Дата: ' . $value['date'] . ' Сумма: ' . number_format($expenditures, 2, ',', ' ').'руб. <br />'; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<!--        -->
    <div class="row">
        <div class="col-md-4">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Выручка - Расход ул.Октябрьская</span>
                </div>
                <div class="panel-body scroll-panel">
<!--                    --><?php
//                        $resultTop = array();
//                        for($i = 0; $i < sizeof($revenueTop); $i++)
//                        {
//                            echo $result = $revenueTop[$i] - $expendituresTop[$i];
//                            array_push($revenueTop, $result);
//                            echo '<br />';
//                        }
//                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Выручка - Расход ул.Павла Мочалова</span>
                </div>
                <div class="panel-body scroll-panel">
<!--                    --><?php
//                        $resultBottom = array();
//                        for($i = 0; $i < sizeof($revenueBottom); $i++)
//                        {
//                            echo $result = $revenueBottom[$i] - $expendituresBottom[$i];
//                            array_push($revenueTop, $result);
//                            echo '<br />';
//                        }
//                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Выручка - Расход Всего</span>
                </div>
                <div class="panel-body scroll-panel">
<!--                    --><?php
//                        for($i = 0; $i < sizeof($revenueTop); $i++)
//                        {
//                            echo $result= $revenueTop[$i] + $resultBottom[$i];
//                            echo '<br />';
//                        }
//                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Склад</span>
                </div>
                <div class="panel-body">
                    <?php
                    $now = date('Y-m-d',strtotime("now"));
                    $previousWeek = date('Y-m-d',strtotime("-1 week"));
                    echo $now . ' '. $previousWeek;
                    ?>

                    <form class="form-inline" method="post" action="<? echo URL; ?>dashboard/period/<?php echo $value['id']; ?>" class="form">
                        <div class="form-group">
                            <label>Подсчёт суммы склада на дату: </label>
                            <input type="text" class="form-control bs-datepicker-example" name="start" placeholder="Дата">
                        </div>
                        <button type="submit" class="btn btn-primary">Сформировать</button>
                    </form>
                </div>
            </div>
        </div>
    </div>






</div>