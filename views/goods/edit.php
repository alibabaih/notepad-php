<div id="content-wrapper">

    <!--Change item-->
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">Изменить товар</span>
        </div>
        <div class="panel-body">
            <form method="post" action="<? echo URL; ?>goods/editSave/<?php echo $this->good['id']; ?>" class="form">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Название товара</label>
                            <input type="text" name="name" placeholder="Название товара" value="<?php echo $this->good['name']; ?>" class="form-control">
                        </div>
                    </div>

                        <div class="col-sm-4">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">Остаток, кол-во (П.Мочалова)</label>
                                <input type="text" name="quantity_august_Mochalova" placeholder="Количество товара" value="<?php echo $this->good['quantity_august_Mochalova']; ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group no-margin-hr">
                                <label class="control-label">Остаток, кол-во (Октябрьская)</label>
                                <input type="text" name="quantity_august_Oktabrskaya" placeholder="Количество товара" value="<?php echo $this->good['quantity_august_Oktabrskaya']; ?>" class="form-control">
                            </div>
                        </div>
                    


                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Баллы</label>
                            <input type="text" name="point" value="<?php echo $this->good['point']; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">ИСЦ (мы закупаем по этой цене), <i class="fa fa-eur"></i></label>
                            <input type="text" name="isc_cost" value="<?php echo $this->good['isc_cost']; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Закупочная цена, <i class="fa fa-eur"></i></label>
                            <input type="text" name="purches_cost" value="<?php echo $this->good['purches_cost']; ?>" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 no-margin-hr">
                        <label class="control-label">Категория</label>
                        <div class="form-group">
                            <select name="category_id" class="form-control">
                                <option value="<?php echo $this->good['category_id']; ?>" selected><?php echo $this->good['category']; ?></option>
                                <?php
                                foreach ($this->getCategoryList as $key => $value) {

                                    echo "<option value=" .$value['id_cat'] . ">" . $value['category'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Дистрибьютор, <i class="fa fa-rub"></i></label>
                            <input type="text" name="distributor_rub_cost" value="<?php echo $this->good['distributor_rub_cost']; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Клиент, <i class="fa fa-rub"></i></label>
                            <input type="text" name="customer_rub_cost" value="<?php echo $this->good['customer_rub_cost']; ?>" class="form-control">
                        </div>
                    </div>
                </div>

                <!--
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Баллы</label>
                            <input type="text" name="point" value="<?php echo $this->good['point']; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">ИСЦ, <i class="fa fa-eur"></i></label>
                            <input type="text" name="isc_cost" value="<?php echo $this->good['isc_cost']; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Дистрибьютор, <i class="fa fa-eur"></i></label>
                            <input type="text" name="distributor_ye_cost" value="<?php echo $this->good['distributor_ye_cost']; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">Клиент, <i class="fa fa-eur"></i></label>
                            <input type="text" name="customer_ye_cost" value="<?php echo $this->good['customer_ye_cost']; ?>" class="form-control">
                        </div>
                    </div>
                </div>
                -->
                <input type="submit" class="btn btn-success btn-block" value="Изменить"/>
            </form>
        </div>
    </div>

</div>
