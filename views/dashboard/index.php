<div id="content-wrapper">

    <div class="row">
        <div class="col-md-12">
            <button class="respond">click</button>
            <p class="ajaxContent"></p>
            <script type="text/javascript" src-"http://cdnjs.cloudflare.com/ajax/libs/d3/3.2.2/d3.v3.min.js"></script>
            <script type="text/javascript" src-"http://cdnjs.cloudflare.com/ajax/libs/d3/3.2.2/d3.v3.min.js"></script>
            <script>
                var chartObject = uv.chart(chartType, graphDefinition, optionalConfiguration);

                $(".respond").click(function() {
                    //alert('button was clicked');
                    $.ajax({
                        type: 'GET',
                        url: '/dashboard/ajax',
                        timeout: 3000,
                        datatype: 'json',
                        //data: '',
                        success: function(result) {
                            $('.ajaxContent').append(result);
                            var graphdef = {
                                categories: ['uvCharts'],
                                dataset : {
                                    'uvCharts' : result
                                }
                            }
                            var chart = uv.chart('Line', graphdef);
                        }
                    });
                });



            </script>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
<!--            <div id="chart_div" style="width: 900px; height: 500px;"></div>-->
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Выручка ул.Павла Мочалова</span>
                </div>
                <div class="panel-body scroll-panel">
                    <?php foreach ($this->revenue as $key=>$value): ?>
                        <?php if($value['shop'] == BOTTOM_OFFICE): ?>
                            <?php $revenue = $value['non_cash_payment'] + $value['cash_payment'] + $value['returned_to_duty']; ?>
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
                    <?php foreach ($this->revenue as $key=>$value): ?>
                        <?php if($value['shop'] == TOP_OFFICE): ?>
                            <?php $revenue = $value['non_cash_payment'] + $value['cash_payment'] + $value['returned_to_duty']; ?>
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
                    <?php foreach ($this->expenditures as $key=>$value): ?>
                        <?php if($value['shop'] == BOTTOM_OFFICE): ?>
                            <?php $expenditures = $value['salary'] + $value['purchases'] + $value['bonus'] + $value['expenses'] + $value['dividends'] + $value['cash_bonus'] + $value['unpaid_goods']; ?>
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
                    <?php foreach ($this->expenditures as $key=>$value): ?>
                        <?php if($value['shop'] == TOP_OFFICE): ?>
                            <?php $expenditures = $value['salary'] + $value['purchases'] + $value['bonus'] + $value['expenses'] + $value['dividends'] + $value['cash_bonus'] + $value['unpaid_goods']; ?>
                            <?php echo 'Дата: ' . $value['date'] . ' Сумма: ' . number_format($expenditures, 2, ',', ' ').'руб. <br />'; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
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