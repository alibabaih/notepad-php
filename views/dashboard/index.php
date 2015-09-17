<script>
    function confirm_delete() {
        return confirm('Вы уверены?');
    }
</script>
<main style="background-color: #FCFCFC;">
    <div class="row">
        <div class="col s12">
            <a href="<?php echo URL ?>dashboard/add" class="btn-floating btn-large waves-effect waves-light red"><i
                    class="material-icons">add</i></a>
        </div>
    </div>
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
                                <small style="display: block; text-align: center"><?php echo $value['place']; ?></small>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <p style="font-weight: 500; color: #757575;" class="center-align"><?php echo $value['name']; ?></p>
                        <div style="background-color: rgba(224, 224, 224, 0.34);" class="divider person"></div>
                        <p style="font-weight: 500; color: #757575;" class="center-align"><?php echo $value['phone']; ?></p>

                        <p class="truncate"><?php echo $value['record']; ?></p>
                        <div class="divider"></div>
                        <div style="margin-bottom: 0px;" class="row">
                            <div class="col s12">
                                <span style="text-align: center; display: block; margin: 15px;">
                                <a style="color: #757575;" onclick="return confirm_delete()" href="<?php echo URL; ?>dashboard/delete/<?php echo $value['id']; ?>">Удалить</a>
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
                        <div class="row">
                            <div class="col s12">
                                <h5 style="font-weight: 300; text-align: center;">
                                    <?php echo date('d.m.y', strtotime($value['date'])); ?>
                                    в <?php echo substr($value['time'], 0, 5); ?>
                                </h5>
                                <small style="display: block; text-align: center"><?php echo $value['place']; ?></small>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <blockquote>
                            <p><?php echo $value['name']; ?></p>

                            <p><?php echo $value['phone']; ?></p>

                            <p class="truncate"><?php echo $value['record']; ?></p>
                        </blockquote>
                        <div class="divider"></div>
                        <div class="row">
                            <div class="col s6"><a
                                    href="<?php echo URL; ?>dashboard/delete/<?php echo $value['id']; ?>">Удалить</a>
                            </div>
                            <div class="col s6"><a href="<?php echo URL; ?>dashboard/edit/<?php echo $value['id']; ?>">Изменить</a>
                            </div>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</main>


