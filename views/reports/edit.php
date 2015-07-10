<div id="content-wrapper">
    <div class="page-header">
        <h1><i class="fa fa-shopping-cart page-header-icon"></i>&nbsp;&nbsp;Финансовые отчёты</h1>
    </div>

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

    <script>
        function proverka(input) {
            var value = input.value;
            var rep = /[-/\\,;":'a-zA-Zа-яА-Я]/;
            if (rep.test(value)) {
                value = value.replace(rep, '');
                input.value = value;
            }
        }
    </script>

    <!-- Report create -->
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">Изменить отчёт</span>
            <?php //print_r($this->reportsList) ?>
        </div>
        <div class="panel-body">
            <form method="post" action="<? echo URL; ?>reports/editSave/<?php echo $this->report['id']; ?>" class="form">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <!--@TODO:  -->
                            <label class="control-label">Магазин</label>
                            <select class="form-control" name="shop">
                                <?php if (Session::get('role') == 'default'): ?>
                                    <option value="<?php echo Session::get('office'); ?>" selected><?php echo Session::get('office'); ?></option>
                                <?php endif; ?>
                                <?php if (Session::get('role') == 'owner'): ?>
                                    <option value="Павла Мочалова" <?php if ($this->report['shop'] == 'Павла Мочалова') echo 'selected'; ?>>Павла Мочалова</option>
                                    <option value="Октябрьская" <?php if ($this->report['shop'] == 'Октябрьская') echo 'selected'; ?>>Октябрьская</option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php
                            $time = strtotime($this->report['date']);
                            $myFormatForView = date("d.m.y", $time);
                            ?>
                            <label class="control-label">Дата</label>
                            <input type="text" name="date" class="form-control" id="bs-datepicker-example"  value="<?php echo $myFormatForView ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <label class="control-label">Сопутствующий товар</label>
                            <input type="text" name="related_products" value="<?php echo $this->report['related_products']; ?>" placeholder="Сопутствующий товар" class="form-control" onkeyup="return proverka(this);" />
                            <i class="fa fa-ruble form-control-feedback"></i>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <label class="control-label">Закуплено продукции</label>
                            <input type="text" name="purchases" placeholder="Закуплено продукции" class="form-control" onkeyup="return proverka(this);" value="<?php echo $this->report['purchases']; ?>" />
                            <i class="fa fa-ruble form-control-feedback"></i>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <label class="control-label">Выдано бонусов деньгами</label>
                            <input type="text" name="bonus" placeholder="Выдано бонусов деньгами" class="form-control" onkeyup="return proverka(this);" value="<?php echo $this->report['bonus']; ?>" />
                            <i class="fa fa-ruble form-control-feedback"></i>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <label class="control-label">Неоплаченный товар</label>
                            <input type="text" name="unpaid_goods" value="<?php echo $this->report['unpaid_goods']; ?>" onkeyup="return proverka(this);" placeholder="Неоплаченный товар" class="form-control" />
                            <i class="fa fa-ruble form-control-feedback"></i>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <label class="control-label">Безналичная оплата</label>
                            <input type="text" name="non_cash_payment" placeholder="Безналичная оплата" class="form-control" onkeyup="return proverka(this);" value="<?php echo $this->report['non_cash_payment']; ?>" />
                            <i class="fa fa-ruble form-control-feedback"></i>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <label class="control-label">Наличная оплата</label>
                            <input type="text" name="cash_payment" placeholder="Наличная оплата" class="form-control" onkeyup="return proverka(this);" value="<?php echo $this->report['cash_payment']; ?>" />
                            <i class="fa fa-ruble form-control-feedback"></i>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <label class="control-label">Оплата бонусами</label>
                            <input type="text" name="cash_bonus" placeholder="Оплата бонусами" class="form-control" onkeyup="return proverka(this);" value="<?php echo $this->report['cash_bonus']; ?>" />
                            <i class="fa fa-ruble form-control-feedback"></i>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <label class="control-label">Оплата за услуги</label>
                            <input type="text" name="services" placeholder="Оплата за услуги" class="form-control" onkeyup="return proverka(this);" value="<?php echo $this->report['services']; ?>" />
                            <i class="fa fa-ruble form-control-feedback"></i>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <label class="control-label">Деньги в кассе</label>
                            <input type="text" name="account_cashier" placeholder="Деньги в кассе" class="form-control" onkeyup="return proverka(this);" value="<?php echo $this->report['account_cashier']; ?>" />
                            <i class="fa fa-ruble form-control-feedback"></i>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <label class="control-label">Деньги на счёте</label>
                            <input type="text" name="account_balance" placeholder="Деньги на счёте" class="form-control" onkeyup="return proverka(this);" value="<?php echo $this->report['account_balance']; ?>" />
                            <i class="fa fa-ruble form-control-feedback"></i>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <label class="control-label">Выдано зарплаты</label>
                            <input type="text" name="salary" placeholder="Выдано зарплаты" class="form-control" onkeyup="return proverka(this);" value="<?php echo $this->report['salary']; ?>" />
                            <i class="fa fa-ruble form-control-feedback"></i>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <label class="control-label">Коммерческие расходы</label>
                            <input type="text" name="expenses" placeholder="Коммерческие расходы" class="form-control" onkeyup="return proverka(this);" value="<?php echo $this->report['expenses']; ?>" />
                            <i class="fa fa-ruble form-control-feedback"></i>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <label class="control-label">Продано в долг на</label>
                            <input type="text" name="sold_in_debt" value="<?php echo $this->report['sold_in_debt']; ?>" onkeyup="return proverka(this);" placeholder="Продано в долг на" class="form-control" />
                            <i class="fa fa-ruble form-control-feedback"></i>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <label class="control-label">Долг возвращён на</label>
                            <input type="text" name="returned_to_duty" value="<?php echo $this->report['returned_to_duty']; ?>" placeholder="Долг возвращён на" class="form-control" onkeyup="return proverka(this);" />
                            <i class="fa fa-ruble form-control-feedback"></i>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <label class="control-label">Вливание</label>
                            <input type="text" name="infusion" placeholder="Вливание" class="form-control" onkeyup="return proverka(this);" value="<?php echo $this->report['infusion']; ?>" />
                            <i class="fa fa-ruble form-control-feedback"></i>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group  has-feedback">
                            <label class="control-label">Дивиденды</label>
                            <input type="text" name="dividends" placeholder="Дивиденды" class="form-control" onkeyup="return proverka(this);" value="<?php echo $this->report['dividends']; ?>" />
                            <i class="fa fa-ruble form-control-feedback"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Комментарий</label>
                    <textarea name="comment" placeholder="Комментарий" class="form-control" ><?php echo $this->report['comment']; ?></textarea>
                </div>
                <input name="modified_by" type="text" hidden="hidden" value="<?php echo Session::get('comment'); ?>" />
                <div class="row">
                    <div class="col-md-6">
                        <label></label><input type="submit" class="btn btn-success" value="Изменить"/>
                    </div>
                    <div class="col-md-6">
                        <p class="help-block text-right"><i class="fa fa-asterisk form-control-feedback"></i> Дробные числа записываются через точку. Например: 246.54</p>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
