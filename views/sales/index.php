<!--jQuery Data Tables-->
<script>
    $(document).ready()
</script>
<div id="content-wrapper">
    <div class="page-header">
        <h1><i class="fa fa-upload page-header-icon"></i>&nbsp;&nbsp;Склад
        </h1>
    </div>


    <div class="panel">
    <div class="panel-heading">
        <span class="panel-title">Список отчётов</span>
    </div>
    <div class="panel-body" style="overflow-x: scroll;">
        <div class="row">
<!--                <pre>--><?php //echo print_r($this->items); ?><!--</pre>-->
<!--                    <th class="text-center">Название</th>-->
<!--                    <th class="text-center">01.04</th>-->
<!--                    <th class="text-center">Продано</th>-->
<!--                </tr>-->
<!--                </thead>-->
<!--                <tbody>-->
                <?php $count = 0;
                foreach ($this->items as $key => $value) : ?>
                    <?php $new_arr[] = $value['total_sold']; ?>
<!--                        <tr>-->

                            <?php //echo $value['name']; ?>
                            <?php number_format($value['total_sold'], 3, '.', ''); ?>

<!--                        </tr>-->
                <?php endforeach; ?>
<!--                </tbody>-->
<!--            </table>-->
<!--            </div>-->
            <div class="col-sm-12">
                <table  style="font-size: 13px;"  cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" >
            <thead>
            <tr>
                <th class="text-center">Арт.</th>
                <th class="text-center">Название</th>
                <th class="text-center">Инвентаризация</th>
                <th class="text-center">Закуплено</th>
                <th class="text-center">Сбыто</th>
                <th class="text-center">Остаток</th>
                <th class="text-center">Цена шт, руб</th>
                <th class="text-center">Итого, руб</th>
            </tr>
            </thead>
            <tbody>
            <?php $count1 = 0;
            foreach ($this->items2 as $key => $value) :

                $sum_item = $value['quantity_first'] + $value['total_bought'] - $new_arr[$count1];
                ?>
                <tr>
                    <td><?php echo $value['id']; ?></td>
                    <td><?php echo $value['name']; ?></td>
                    <td><?php echo number_format($value['quantity_first'], 2, '.', ''); ?></td>
                    <td><?php echo number_format($value['total_bought'], 2, '.', ''); ?></td>
                    <td><?php echo number_format($new_arr[$count1], 2, '.', ''); ?></td>
                    <td ><?php echo number_format($sum_item, 2, '.', ''); ?></td>
                    <td><?php echo $value['isc_cost'] * EURO; ?></td>
                    <td><?php echo number_format($sum_item * ($value['isc_cost'] * EURO), 2, '.', ''); ?></td>
                    <?php $count1++; ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
            </div>
            </div>
    </div>
</div>

</div>
