

<div id="content-wrapper">
    <div class="page-header">
        <h1><i class="fa fa-upload page-header-icon"></i>&nbsp;&nbsp;Сформированный отчёт <small><?php print_r($this->date); ?></small></h1>
    </div>
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">Список отчётов <small><?php print_r($this->date); ?></small></span>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="note">
                    <?php foreach($this->relatedSold as $key => $value): $relatedSold = $value['related']; endforeach; ?>
                    <?php foreach($this->relatedBought as $key => $value): $relatedBought = $value['related']; endforeach; ?>
                    <?php $related = $relatedBought - $relatedSold; ?>
                    <h5 style="display: inline-block;" class="note-title">Сопутствующие товары на <?php print_r($this->date); ?> : </h5> <span class="badge badge-success"><?php echo number_format($related, 2, '.', ' ') ?> руб.</span>
                    <h5 class="note-title add-depot">Общая сумма склада на <?php print_r($this->date); ?> с учётом сопутствующих товаров: </h5>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php foreach ($this->items as $key => $value) : ?>
                    <?php number_format($value['total_sold'], 3, '.', ''); ?>
                    <?php $new_arr[] = $value['total_sold']; ?>
                <?php endforeach; ?>

                <div class="col-sm-12">
                    <table  style="font-size: 13px;"  cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" >
                        <thead>
                        <tr>
                            <th class="text-center">Арт.</th>
                            <th class="text-center">Название</th>
                            <th class="text-center">Инвентаризация П. Мочалова</th>
                            <th class="text-center">Инвентаризация Октябрьская</th>
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
                            $sum_item = $value['quantity_august_Mochalova'] + $value['quantity_august_Oktabrskaya'] + $value['total_bought'] - $new_arr[$count1];
                            $item_on_sum = $sum_item * ($value['isc_cost'] * EURO);
                            $liwest_depot_cost += $item_on_sum;
                            ?>
                            <tr>
                                <td><?php echo $value['id']; ?></td>
                                <td><?php echo $value['name']; ?></td>
                                <td><?php echo number_format($value['quantity_august_Mochalova'], 2, '.', ''); ?></td>
                                <td><?php echo number_format($value['quantity_august_Oktabrskaya'], 2, '.', ''); ?></td>
                                <td><?php echo number_format($value['total_bought'], 2, '.', ''); ?></td>
                                <td><?php echo number_format($new_arr[$count1], 2, '.', ''); ?></td>
                                <td ><?php echo number_format($sum_item, 2, '.', ''); ?></td>
                                <td><?php echo $value['isc_cost'] * EURO; ?></td>
                                <td><?php echo number_format($item_on_sum, 2, '.', ''); ?></td>
                                <?php $count1++; ?>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php global $total_depot_cost;
                    $total_depot_cost = $related + $liwest_depot_cost;
                    $total_depot_cost = number_format($total_depot_cost, 2, '.', ' ');
                    echo 'Общая сумма склада на настоящий момент с учётом сопутствующих товаров <span class="badge badge-danger depot">' . $total_depot_cost . ' руб.</span>';
                    ?>
                </div>
            </div>
        </div>
    </div>

</div>
<script type="text/javascript">
    $(document).ready(function(){
        //alert(jQuery.fn.jquery);
        $('.depot').clone().appendTo('.add-depot');
    });

</script>