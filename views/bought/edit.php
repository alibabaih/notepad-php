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
            <form method="post" action="<? echo URL; ?>bought/editSave/<?php echo $this->bought['id_bought']; ?>" class="form">
                <div class="row">
                    <div class="col-md-6">
                        <?php
                            $time = strtotime($this->bought['date']);
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
                                <?php if (Session::get('role') == 'default'): ?>
                                    <option value="<?php echo Session::get('office'); ?>"><?php echo Session::get('office'); ?></option>
                                <?php endif; ?>
                                <?php if (Session::get('role') == 'owner'): ?>
                                <option value="Павла Мочалова" <?php if ($this->bought['shop'] == 'Павла Мочалова') echo 'selected'; ?>>Павла Мочалова</option>
                                <option value="Октябрьская" <?php if ($this->bought['shop'] == 'Октябрьская') echo 'selected'; ?>>Октябрьская</option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div id="sold">
                    <div class="row" id="sold_item">
                        <div class="col-md-8">
                            <div class="form-group">
                                <select name="good_id" id="jquery-select2-example" class="form-control">
                                    <option value="<?php echo $this->bought['good_id']; ?>" selected><?php echo $this->bought['name']; ?></option>
                                    <?php
                                    foreach ($this->getGood as $key => $value) {
                                        echo '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="quantity" class="form-control" value="<?php echo $this->bought['quantity']; ?>" placeholder="Количество" onkeyup="return proverka(this);">
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
