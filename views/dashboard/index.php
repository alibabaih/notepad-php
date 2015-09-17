<script>
    function confirm_delete() {
        return confirm('Вы уверены?');
    }

</script>
<script>
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

    <ul class="collapsible" data-collapsible="accordion">
        <li>
            <div class="collapsible-header"><i class="material-icons">filter_drama</i>First</div>
            <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
        </li>
        <li>
            <div class="collapsible-header active"><i class="mdi-maps-place"></i>Second</div>
            <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
        </li>
        <li>
            <div class="collapsible-header"><i class="material-icons">whatshot</i>Third</div>
            <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
        </li>
    </ul>

    <div class="row">
        <div class="col s12">
            <h2 class="header" style="font-weight: 300;color: #ee6e73; text-align: center;">Август</h2>
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

    <div class="divider"></div>

    <div class="row">
        <div class="col s12">
            <h2 class="header" style="font-weight: 300;color: #ee6e73; text-align: center;">Сентябрь</h2>
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

</main>


