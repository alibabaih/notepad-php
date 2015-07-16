<script>
    init.push(function () {
        // Single select good
        $("#jquery-select2-example").select2({
            allowClear: true,
            placeholder: "Выберите товар"
        });
        //date picker
        $("#masked-inputs-examples-date").mask("99.99.99");

        var options = {
            todayBtn: "linked",
            format: 'dd.mm.yy',
            orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto'
        }
        $('#bs-datepicker-example').datepicker(options);

    });

    function proverka(input) {
        var value = input.value;
        var rep = /[-/\\,;":'a-zA-Zа-яА-Я]/;
        if (rep.test(value)) {
            value = value.replace(rep, '');
            input.value = value;
        }
    }
</script>

    <div id="content-wrapper">
        <div class="page-header">
            <h1><i class="fa fa-share page-header-icon"></i>&nbsp;&nbsp;Транзакции между офисами</h1>
        </div>

        <!-- Создать отчёт с проданными товарами -->
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">Изменить транзакционный сопутствующий товар</span>
            </div>
            <div class="panel-body">
                <form method="post" action="<? echo URL; ?>transaction/editSaveRelated/<?php echo $this->transaction['id']; ?>" class="form">
                    <div class="row">
                        <div class="col-md-4">
                            <?php
                                $time = strtotime($this->transaction['date']);
                                $myFormatForView = date("d.m.y", $time);
                            ?>
                            <div class="form-group">
                                <!--@TODO:  -->
                                <label class="control-label">Дата <?php echo $myFormatForView ?> <?php echo ' ' . $this->transaction['id']; ?></label>
                                <input  type="text" name="date" class="form-control" value="<?php echo $myFormatForView ?>"  id="bs-datepicker-example"/>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <!--@TODO:  -->
                                        <label class="control-label">Из магазина</label>
                                        <select class="form-control" name="items_were_send_from">
                                            <option value="<?php echo $this->transaction['items_were_send_from']; ?> selected"><?php echo $this->transaction['items_were_send_from']; ?></option>
                                            <option value="Павла Мочалова">Павла Мочалова</option>
                                            <option value="Октябрьская">Октябрьская</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <!--@TODO:  -->
                                        <label class="control-label">В магазин</label>
                                        <select class="form-control" name="items_were_send_to">
                                            <option value="<?php echo $this->transaction['items_were_send_to']; ?> selected"><?php echo $this->transaction['items_were_send_to']; ?></option>
                                            <option value="Павла Мочалова">Павла Мочалова</option>
                                            <option value="Октябрьская">Октябрьская</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="sold">
                        <div class="row" id="sold_item">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="sum" class="form-control" value="<?php echo $this->transaction['sum']; ?>" placeholder="Сумма" onkeyup="return proverka(this);">
                                </div>
                            </div>
                            <!--                        <div class="col-md-1">-->
                            <!--                            <p class="addSoldField">Добавить поле</p>-->
                            <!--                        </div>-->
                        </div>
                    </div>
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


    </div> <!-- / #content-wrapper -->
