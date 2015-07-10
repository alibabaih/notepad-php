<div id="content-wrapper">

    <div class="alert alert-danger alert-dark">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Обращаем внимание! </strong>
        Добавлена возможность формирования отчётов с возможностью указывания конечной и началобной дат.
    </div>


    <div class="row">
        <div class="col-md-3">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Выручка ул.Павла Мочалова</span>
                </div>
                <div class="panel-body">

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Выручка ул.Октябрьская</span>
                </div>
                <div class="panel-body">

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Расход ул.Павла Мочалова</span>
                </div>
                <div class="panel-body">

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Расход ул.Октябрьская</span>
                </div>
                <div class="panel-body">

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
                    <?php echo $total_depot; ?>
                </div>
            </div>
        </div>
    </div>




    <div class="row">
        <div class="col-md-8">

            <?php foreach ($this->debt as $key => $value) :
                $sold += $value['sold_in_debt'];
                $returned += $value['returned_to_duty'];
            endforeach; ?>
            <?php foreach ($this->debtOfficeOktabrskaya as $key => $value) :
                $soldOktabrskaya += $value['sold_in_debt'];
                $returnedOktabrskaya += $value['returned_to_duty'];
            endforeach; ?>
            <?php foreach ($this->debtOfficePavlaMochalova as $key => $value) :
                $soldPavlaMochalova += $value['sold_in_debt'];
                $returnedPavlaMochalova += $value['returned_to_duty'];
            endforeach; ?>

            <div class="stat-panel">
                <div class="stat-row">
                    <div class="stat-cell bg-success darker">
                        <i class="fa fa-lightbulb-o bg-icon" style="font-size:60px;line-height:80px;height:80px;"></i>
                        <span class="text-bg">Долговые обязательства в этом месяце</span><br>
                        <span class="text-sm">Статистические данные</span>
                    </div>
                </div>
                <div class="stat-row">
                    <div class="stat-counters bg-success no-border-b no-padding text-center">
                        <div class="stat-cell col-xs-4 padding-sm no-padding-hr">
                        </div>
                        <div class="stat-cell col-xs-4 padding-sm no-padding-hr">
                            <span class="text-bg">Павла Мочалова, 11</span>
                        </div>
                        <div class="stat-cell col-xs-4 padding-sm no-padding-hr">
                            <span class="text-bg">Октябрьская, 9а</span>
                        </div>
                        <div class="stat-cell col-xs-4 padding-sm no-padding-hr">
                            <span class="text-bg">В сумме</span>
                        </div>
                    </div>
                </div>
                <div class="stat-row">
                    <div class="stat-counters bg-success no-border-b no-padding text-center">
                        <div class="stat-cell col-xs-4 padding-sm no-padding-hr">
                            <span class="text-bg">Нам должны на сумму</span>
                        </div>
                        <div class="stat-cell col-xs-4 padding-sm no-padding-hr">
                            <span class="text-bg"><strong><?php echo $soldPavlaMochalova; ?> <i class="fa fa-rouble"></i></strong></span>
                        </div>
                        <div class="stat-cell col-xs-4 padding-sm no-padding-hr">
                            <span class="text-bg"><strong><?php echo $soldOktabrskaya; ?> <i class="fa fa-rouble"></i></strong></span>
                        </div>
                        <div class="stat-cell col-xs-4 padding-sm no-padding-hr">
                            <span class="text-bg"><strong><?php echo $soldPavlaMochalova + $soldOktabrskaya; ?> <i class="fa fa-rouble"></i></strong></span>
                        </div>
                    </div>
                </div>
                <div class="stat-row">
                    <div class="stat-counters bg-success no-border-b no-padding text-center">
                        <div class="stat-cell col-xs-4 padding-sm no-padding-hr">
                            <span class="text-bg">Долг возвращён</span>
                        </div>
                        <div class="stat-cell col-xs-4 padding-sm no-padding-hr">
                            <span class="text-bg"><strong><?php echo $returnedPavlaMochalova; ?> <i class="fa fa-rouble"></i></strong></span>
                        </div>
                        <div class="stat-cell col-xs-4 padding-sm no-padding-hr">
                            <span class="text-bg"><strong><?php echo $returnedOktabrskaya; ?> <i class="fa fa-rouble"></i></strong></span>
                        </div>
                        <div class="stat-cell col-xs-4 padding-sm no-padding-hr">
                            <span class="text-bg"><strong><?php echo $returnedPavlaMochalova + $returnedOktabrskaya; ?> <i class="fa fa-rouble"></i></strong></span>
                        </div>
                    </div>
                </div>
                <div class="stat-row">
                    <div class="stat-counters bg-success no-border-b no-padding text-center">
                        <div class="stat-cell col-xs-4 padding-sm no-padding-hr">
                            <span class="text-bg">Итог</span><br />
                            <span class="text-xs">(нам должны минус мы должны)</span>
                        </div>
                        <div class="stat-cell col-xs-4 padding-sm no-padding-hr">
                            <span class="text-bg"><strong><?php echo $soldPavlaMochalova - $returnedPavlaMochalova; ?> <i class="fa fa-rouble"></i></strong></span>
                        </div>
                        <div class="stat-cell col-xs-4 padding-sm no-padding-hr">
                            <span class="text-bg"><strong><?php echo $soldOktabrskaya -  $returnedOktabrskaya ?> <i class="fa fa-rouble"></i></strong></span>
                        </div>
                        <div class="stat-cell col-xs-4 padding-sm no-padding-hr">
                            <!--<span class="text-bg"><strong><?php   ?> <i class="fa fa-rouble"></i></strong></span><br>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <?php if (Session::get('login') == 'vasya') : ?>
            <div class="stat-panel">
                <div class="stat-cell bg-danger valign-middle">
                    <i class="fa fa-trophy bg-icon"></i>
                    <!--Ценник клиент-->
                    <?php foreach($this->earnedToday as $key => $value) :
                        $cost = +$value['non_cash_payment'] + $value['cash_payment'] + $value['infusion'];
                    endforeach;
                    //echo $cost;
                    ?>
                    <span class="text-xlg"><span class="text-lg text-slim"></span><strong><?php echo $cost; ?> <i class="fa fa-rouble"></i></strong></span><br>
                    <span class="text-bg">Заработанно сегодня</span><br>
                    <span class="text-sm">Сумма  отражает реальную выручку, для более подробного учёта пройдите в <a href="<?php echo URL; ?>reports"> продажи продукции</a></span>

                </div>
            </div>
            <? endif; ?>
            <div class="stat-panel">
                <div class="stat-cell bg-danger valign-middle">
                    <i class="fa fa-trophy bg-icon"></i>
                    <!--Ценник клиент-->
                    <?php foreach($this->earnedYesterday as $key => $value) :
                        $cost_yesterday += $value['non_cash_payment'] + $value['cash_payment'] + $value['infusion'];
                    endforeach;
                    //echo $cost;
                    ?>
                    <span class="text-xlg"><span class="text-lg text-slim"></span><strong><?php echo $cost_yesterday; ?> <i class="fa fa-rouble"></i></strong></span><br>
                    <span class="text-bg">Заработанно вчера</span><br>
                    <span class="text-sm">Сумма отражает реальную выручку, для более подробного учёта пройдите в <a href="<?php echo URL; ?>reports"> продажи продукции</a></span>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <?php if (Session::get('login') == 'vasya') : ?>
            <!-- При включении этого блока выключай счётчики ниже, иначе данные будут удваиваться!-->
            <div class="col-sm-8">
                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-title">Долговые обязательства</span>
                    </div>
                    <div class="panel-body">
                        <h3>На оба офиса</h3>
                        <?php foreach ($this->debt as $key => $value) :
                            //echo 'Sold in debt ' . $value['sold_in_debt'] . '<br />';
                            $sold += $value['sold_in_debt'];
                            //echo 'Returned to duty ' . $value['returned_to_duty'] . '<br/>';
                            $returned += $value['returned_to_duty'];
                        endforeach; ?>
                        <p>Нам должны на сумму в: <?php echo $sold; ?> руб.</p>
                        <p>Мы должны на сумму в: <?php echo $returned; ?> руб.</p>
                        <p>Итог: <?php echo $sold - $returned; ?> rub.</p>
                        <h3>Октябрьская, 9а</h3>
                        <?php foreach ($this->debtOfficeOktabrskaya as $key => $value) :
                            //echo 'Sold in debt ' . $value['sold_in_debt'] . '<br />';
                            $soldOktabrskaya += $value['sold_in_debt'];
                            //echo 'Returned to duty ' . $value['returned_to_duty'] . '<br/>';
                            $returnedOktabrskaya += $value['returned_to_duty'];
                        endforeach; ?>
                        <p>Нам должны на сумму в: <?php echo $soldOktabrskaya; ?> руб.</p>
                        <p>Мы должны на сумму в: <?php echo $returnedOktabrskaya; ?> руб.</p>
                        <h3>Павла Мочалова, 11</h3>
                        <?php foreach ($this->debtOfficePavlaMochalova as $key => $value) :
                            //echo 'Sold in debt ' . $value['sold_in_debt'] . '<br />';
                            $soldPavlaMochalova += $value['sold_in_debt'];
                            //echo 'Returned to duty ' . $value['returned_to_duty'] . '<br/>';
                            $returnedPavlaMochalova += $value['returned_to_duty'];
                        endforeach; ?>
                        <p>Нам должны на сумму в: <?php echo $soldPavlaMochalova; ?> руб.</p>
                        <p>Мы должны на сумму в: <?php echo $returnedPavlaMochalova; ?> руб.</p>
                        <p>Показатели даны на основе <a href="<?php echo URL; ?>reports">финансовых отчётов</a></p>
                        <?php //print_r($_SESSION); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

</div>