<script>
    function confirm_delete() {
        return confirm('Вы уверены?');
    }
//    window.onload = function() {
//        if (window.jQuery) {
//            // jQuery is loaded
//            alert("Yeah!");
//        } else {
//            // jQuery is not loaded
//            alert("Doesn't Work");
//        }
//    }
    $(document).ready(function() {
        $('.tr').on('click', function() {
            $(this).toggleClass('truncate-show');
        });
    });
</script>
<style>
    #tr {
        cursor: pointer;
    }
    .empty-record {
        height: 22px;
    }
</style>
<main style="background-color: #FCFCFC;">

    <ul style="margin: 0px 10px 0px 10px; border-top: 0px;" class="collapsible" data-collapsible="accordion">
        <li>
            <div class="collapsible-header">
                <h5 class="header" style="margin-top: auto; padding-top: 9px; font-weight: 300;color: #ee6e73; text-align: center;">Август</h5>
            </div>
            <div class="collapsible-body">
                <div class="row">
                    <div class="col s12">
                        <h6 class="header" style="margin-top: 15px; padding: 0 0.75rem; font-weight: 300;color: #757575; text-align: right; text-transform: uppercase;">Август</h6>
                        <?php foreach ($this->month8 as $key => $value): ?>
                            <div id="grid" data-columns>
                                <div class="card">
                                    <div style="margin-bottom: 15px;" class="row">
                                        <div class="col s12">
                                            <h5 style="font-weight: 300; text-align: center;">
                                                <?php echo date('d.m.y', strtotime($value['date'])); ?>
                                                в <?php echo substr($value['time'], 0, 5); ?>
                                            </h5>
                                            <small style="display: block; text-align: center">
                                                <?php if($value['place'] == 'SOME') { echo SOME; } ?>
                                                <?php if($value['place'] == 'BOTTOM') { echo BOTTOM; } ?>
                                                <?php if($value['place'] == 'TOP') { echo TOP; } ?>
                                                <?php if($value['place'] == 'EMPTY_FIELD') { echo EMPTY_FIELD; } ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="divider"></div>
                                    <p style="margin-bottom: 10px; font-weight: 500; color: #757575;" class="center-align"><?php echo $value['name']; ?></p>
                                    <div style="background-color: rgba(224, 224, 224, 0.34);" class="divider person"></div>
                                    <p style="margin-top:10px;  font-weight: 500; color: #757575;" class="center-align"><?php echo $value['phone']; ?></p>

                                    <?php if(empty($value['record'])) { echo '<div class="empty-record"></div>'; } ?>
                                    <p style="margin: 0px 15px 20px 15px; color: #757575; text-align: center;" class="truncate tr"><?php echo $value['record']; ?></p>

                                    <div class="divider"></div>
                                    <div style="margin-bottom: 0px;" class="row">
                                        <div class="col s12">
                                <span style="text-align: center; display: block; margin: 15px;">
                                <a style="color: #757575;" onclick="confirm_delete()" href="<?php echo URL; ?>dashboard/delete/<?php echo $value['id']; ?>">Удалить</a>
                                |
                                <a style="color: #757575;" href="<?php echo URL; ?>dashboard/edit/<?php echo $value['id']; ?>">Изменить</a>
                                </span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="collapsible-header">
                <h5 class="header" style="margin-top: auto; padding-top: 9px; font-weight: 300;color: #ee6e73; text-align: center;">1</h5>
            </div>
            <div class="collapsible-body">
                <div class="row">
                    <div class="col s12">
                        <h6 class="header" style="margin-top: 15px; padding: 0 0.75rem; font-weight: 300;color: #757575; text-align: right; text-transform: uppercase;">Сентябрь</h6>
                        <?php foreach ($this->month9 as $key => $value): ?>
                            <div id="grid" data-columns>
                                <div class="card">
                                    <div style="margin-bottom: 15px;" class="row">
                                        <div class="col s12">
                                            <h5 style="font-weight: 300; text-align: center;">
                                                <?php echo date('d.m.y', strtotime($value['date'])); ?>
                                                в <?php echo substr($value['time'], 0, 5); ?>
                                            </h5>
                                            <small style="display: block; text-align: center">
                                                <?php if($value['place'] == 'SOME') { echo SOME; } ?>
                                                <?php if($value['place'] == 'BOTTOM') { echo BOTTOM; } ?>
                                                <?php if($value['place'] == 'TOP') { echo TOP; } ?>
                                                <?php if($value['place'] == 'EMPTY_FIELD') { echo EMPTY_FIELD; } ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="divider"></div>
                                    <p style="padding: inherit; margin: 10px 0 10px 0; font-weight: 500; color: #757575;" class="center-align"><?php echo $value['name']; ?></p>
                                    <div style="background-color: rgba(224, 224, 224, 0.34);" class="divider person"></div>
                                    <p style="padding: inherit; margin: 10px 0 10px 0; font-weight: 500; color: #757575;" class="center-align"><?php echo $value['phone']; ?></p>

                                    <?php if(empty($value['record'])) { echo '<div class="empty-record"></div>'; } ?>
                                    <p style="padding: inherit; margin: 0px 15px 20px 15px; color: #757575; text-align: center;" class="truncate tr"><?php echo $value['record']; ?></p>

                                    <div class="divider"></div>
                                    <div style="margin-bottom: 0px;" class="row">
                                        <div class="col s12">
                                <span style="text-align: center; display: block; margin: 15px;">
                                <a style="color: #757575;" onclick="confirm_delete()" href="<?php echo URL; ?>dashboard/delete/<?php echo $value['id']; ?>">Удалить</a>
                                |
                                <a style="color: #757575;" href="<?php echo URL; ?>dashboard/edit/<?php echo $value['id']; ?>">Изменить</a>
                                </span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="collapsible-header">
                <h5 class="header" style="margin-top: auto; padding-top: 9px; font-weight: 300;color: #ee6e73; text-align: center;">Октябрь</h5>
            </div>
            <div class="collapsible-body">
                <div class="row">
                    <div class="col s12">
                        <h6 class="header" style="margin-top: 15px; padding: 0 0.75rem; font-weight: 300;color: #757575; text-align: right; text-transform: uppercase;">Сентябрь</h6>
                        <?php foreach ($this->month9 as $key => $value): ?>
                            <div id="grid" data-columns>
                                <div class="card">
                                    <div style="margin-bottom: 15px;" class="row">
                                        <div class="col s12">
                                            <h5 style="font-weight: 300; text-align: center;">
                                                <?php echo date('d.m.y', strtotime($value['date'])); ?>
                                                в <?php echo substr($value['time'], 0, 5); ?>
                                            </h5>
                                            <small style="display: block; text-align: center">
                                                <?php if($value['place'] == 'SOME') { echo SOME; } ?>
                                                <?php if($value['place'] == 'BOTTOM') { echo BOTTOM; } ?>
                                                <?php if($value['place'] == 'TOP') { echo TOP; } ?>
                                                <?php if($value['place'] == 'EMPTY_FIELD') { echo EMPTY_FIELD; } ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="divider"></div>
                                    <p style="padding: inherit; margin: 10px 0 10px 0; font-weight: 500; color: #757575;" class="center-align"><?php echo $value['name']; ?></p>
                                    <div style="background-color: rgba(224, 224, 224, 0.34);" class="divider person"></div>
                                    <p style="padding: inherit; margin: 10px 0 10px 0; font-weight: 500; color: #757575;" class="center-align"><?php echo $value['phone']; ?></p>

                                    <?php if(empty($value['record'])) { echo '<div class="empty-record"></div>'; } ?>
                                    <p style="padding: inherit; margin: 0px 15px 20px 15px; color: #757575; text-align: center;" class="truncate tr"><?php echo $value['record']; ?></p>

                                    <div class="divider"></div>
                                    <div style="margin-bottom: 0px;" class="row">
                                        <div class="col s12">
                                <span style="text-align: center; display: block; margin: 15px;">
                                <a style="color: #757575;" onclick="confirm_delete()" href="<?php echo URL; ?>dashboard/delete/<?php echo $value['id']; ?>">Удалить</a>
                                |
                                <a style="color: #757575;" href="<?php echo URL; ?>dashboard/edit/<?php echo $value['id']; ?>">Изменить</a>
                                </span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </li>
    </ul>



<!--    <div class="row">-->
<!--        <div class="col s12">-->
<!--            <h2 class="header" style="font-weight: 300;color: #ee6e73; text-align: center;">Август</h2>-->
<!--            --><?php //foreach ($this->month8 as $key => $value): ?>
<!--                <div id="grid" data-columns>-->
<!--                    <div class="card">-->
<!--                        <div style="margin-bottom: 15px;" class="row">-->
<!--                            <div class="col s12">-->
<!--                                <h5 style="font-weight: 300; text-align: center;">-->
<!--                                    --><?php //echo date('d.m.y', strtotime($value['date'])); ?>
<!--                                    в --><?php //echo substr($value['time'], 0, 5); ?>
<!--                                </h5>-->
<!--                                <small style="display: block; text-align: center">-->
<!--                                    --><?php //if($value['place'] == 'SOME') { echo SOME; } ?>
<!--                                    --><?php //if($value['place'] == 'BOTTOM') { echo BOTTOM; } ?>
<!--                                    --><?php //if($value['place'] == 'TOP') { echo TOP; } ?>
<!--                                    --><?php //if($value['place'] == 'EMPTY_FIELD') { echo EMPTY_FIELD; } ?>
<!--                                </small>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="divider"></div>-->
<!--                        <p style="margin-bottom: 10px; font-weight: 500; color: #757575;" class="center-align">--><?php //echo $value['name']; ?><!--</p>-->
<!--                        <div style="background-color: rgba(224, 224, 224, 0.34);" class="divider person"></div>-->
<!--                        <p style="margin-top:10px;  font-weight: 500; color: #757575;" class="center-align">--><?php //echo $value['phone']; ?><!--</p>-->
<!---->
<!--                        --><?php //if(empty($value['record'])) { echo '<div class="empty-record"></div>'; } ?>
<!--                        <p style="margin: 0px 15px 20px 15px; color: #757575; text-align: center;" class="truncate tr">--><?php //echo $value['record']; ?><!--</p>-->
<!---->
<!--                        <div class="divider"></div>-->
<!--                        <div style="margin-bottom: 0px;" class="row">-->
<!--                            <div class="col s12">-->
<!--                                <span style="text-align: center; display: block; margin: 15px;">-->
<!--                                <a style="color: #757575;" onclick="confirm_delete()" href="--><?php //echo URL; ?><!--dashboard/delete/--><?php //echo $value['id']; ?><!--">Удалить</a>-->
<!--                                |-->
<!--                                <a style="color: #757575;" href="--><?php //echo URL; ?><!--dashboard/edit/--><?php //echo $value['id']; ?><!--">Изменить</a>-->
<!--                                </span>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!--                </div>-->
<!--            --><?php //endforeach; ?>
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    <div class="divider"></div>-->
<!---->
<!--    <div class="row">-->
<!--        <div class="col s12">-->
<!--            <h4 class="header" style="font-weight: 300;color: #757575; text-align: right; text-transform: uppercase;">Сентябрь</h4>-->
<!--            --><?php //foreach ($this->month9 as $key => $value): ?>
<!--                <div id="grid" data-columns>-->
<!--                    <div class="card">-->
<!--                        <div style="margin-bottom: 15px;" class="row">-->
<!--                            <div class="col s12">-->
<!--                                <h5 style="font-weight: 300; text-align: center;">-->
<!--                                    --><?php //echo date('d.m.y', strtotime($value['date'])); ?>
<!--                                    в --><?php //echo substr($value['time'], 0, 5); ?>
<!--                                </h5>-->
<!--                                <small style="display: block; text-align: center">-->
<!--                                    --><?php //if($value['place'] == 'SOME') { echo SOME; } ?>
<!--                                    --><?php //if($value['place'] == 'BOTTOM') { echo BOTTOM; } ?>
<!--                                    --><?php //if($value['place'] == 'TOP') { echo TOP; } ?>
<!--                                    --><?php //if($value['place'] == 'EMPTY_FIELD') { echo EMPTY_FIELD; } ?>
<!--                                </small>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="divider"></div>-->
<!--                        <p style="margin-bottom: 10px; font-weight: 500; color: #757575;" class="center-align">--><?php //echo $value['name']; ?><!--</p>-->
<!--                        <div style="background-color: rgba(224, 224, 224, 0.34);" class="divider person"></div>-->
<!--                        <p style="margin-top:10px;  font-weight: 500; color: #757575;" class="center-align">--><?php //echo $value['phone']; ?><!--</p>-->
<!---->
<!--                        --><?php //if(empty($value['record'])) { echo '<div class="empty-record"></div>'; } ?>
<!--                        <p style="margin: 0px 15px 20px 15px; color: #757575; text-align: center;" class="truncate tr">--><?php //echo $value['record']; ?><!--</p>-->
<!---->
<!--                        <div class="divider"></div>-->
<!--                        <div style="margin-bottom: 0px;" class="row">-->
<!--                            <div class="col s12">-->
<!--                                <span style="text-align: center; display: block; margin: 15px;">-->
<!--                                <a style="color: #757575;" onclick="confirm_delete()" href="--><?php //echo URL; ?><!--dashboard/delete/--><?php //echo $value['id']; ?><!--">Удалить</a>-->
<!--                                |-->
<!--                                <a style="color: #757575;" href="--><?php //echo URL; ?><!--dashboard/edit/--><?php //echo $value['id']; ?><!--">Изменить</a>-->
<!--                                </span>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!--                </div>-->
<!--            --><?php //endforeach; ?>
<!--        </div>-->
<!--    </div>-->

</main>


<script>
    $(document).ready(function() {
        moment.locale("ru");
        //var month_now = moment().format('MMMM');
        var month_now = 1;

        $('h5.header').each(function() {
            var month = $(this).text();
            parseInt(month);
            console.log(typeof month);
            console.log(typeof month_now);
            var i = (month == month_now);
            console.log(i);
            if(month == month_now) {
                $(this).parent().addClass('active');
            }




        });

    });
</script>

