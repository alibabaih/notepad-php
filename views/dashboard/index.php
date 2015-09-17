<div class="row">
    <div class="col s12">
        <a href="<?php echo URL ?>dashboard/add" class="btn-floating btn-large waves-effect waves-light red"><i
                class="material-icons">add</i></a>
    </div>
</div>
<!--<pre>--><?php //print_r($this->notes); ?><!--</pre>-->

            <?php
                for($i = 0; $i <= 11; $i++) {
                    if (!empty($this->notes[$i])) {
                        $month = $i;
                        echo '<h4 class="light center-align">Месяц: '. ++ $month.'</h4>';
                        echo '<div class="row"><div class="col s12">';

                        //print_r($this->notes[$i]);
                        foreach ($this->notes[$i] as $key => $value): ?>
                            <div  id="grid" data-columns>
                            <div class="card" >
                                <div class="card-content">
                                    <span class="card-title center-align black-text" style="margin: 0 auto; display: block;">
                                        <script>
                                            moment.locale("ru")
                                            var date = moment("<?php echo $value['time']; ?>", "YYYY-MM-DD HH:mm").format('LLL');
                                            document.write(date);
                                        </script>
                                    </span>
                                    <p>Имя: <?php echo $value['name']; ?></p>
                                    <p>Телефон: <?php echo $value['phone']; ?></p>
                                    <p>Дополнительная информация:</p>
                                    <div class="card-panel">
                                        <p class="truncate" style="height: 22px;"><?php echo $value['record']; ?></p>
                                    </div>
                                </div>
                                <div class="card-action">
                                    <a href="<?php echo URL; ?>dashboard/delete/<?php echo $value['id']; ?>">Удалить</a>
                                    <a href="<?php echo URL; ?>dashboard/edit/<?php echo $value['id']; ?>">Изменить</a>
                                </div>
                            </div>
                            </div>
                            <?php endforeach; ?>

                        </div></div>
                        <hr />
<?php
                    }
                }
            ?>


