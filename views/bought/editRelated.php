<div id="content-wrapper">

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

    <!-- Создать отчёт с проданными товарами -->
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">Создать новый проданный товар</span>
        </div>
        <div class="panel-body">
            <form method="post" action="<? echo URL; ?>bought/editSaveRelated/<?php echo $this->boughtRelated['id']; ?>" class="form">
                <div class="row">
                    <div class="col-md-6">
                        <?php
                            $time = strtotime($this->boughtRelated['date']);
                            $myFormatForView = date("d.m.y", $time);
                        ?>
                        <div class="form-group">
                            <!--@TODO:  -->
                            <label class="control-label">Дата</label>
                            <input  type="text" name="date" id="bs-datepicker-example" value="<?php echo $myFormatForView; ?>" class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <!--@TODO:  -->
                            <label class="control-label">Магазин</label>
                            <select class="form-control" name="shop">
                                <option value="Павла Мочалова" <?php if ($this->boughtRelated['shop'] == 'Павла Мочалова') echo 'selected'; ?>>Павла Мочалова</option>
                                <option value="Октябрьская" <?php if ($this->boughtRelated['shop'] == 'Октябрьская') echo 'selected'; ?>>Октябрьская</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div id="sold">
                    <div class="row" id="sold_item">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Приход сопутствующего товара на сумму</label>
                                <input type="text" name="related"  value="<?php echo $this->boughtRelated['related']; ?>" class="form-control" placeholder="Приход сопутствующего товара на сумму" onkeyup="return proverka(this);">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Приход бонусов, баллы</label>
                                <input type="text" name="points" value="<?php echo $this->boughtRelated['points']; ?>" class="form-control" placeholder="Приход бонусов, баллы" onkeyup="return proverka(this);">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label></label><input type="submit" class="btn btn-success" value="Создать"/>
                    </div>
                    <div class="col-md-6">
                        <p class="help-block text-right"><i class="fa fa-asterisk form-control-feedback"></i> Дробные числа записываются через точку. Например: 246.54</p>
                    </div>
                </div>
            </form>
        </div>
    </div>


</div>
