<script>
    function confirm_delete() {
        return confirm('Вы уверены?');
    }
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
<main class="light-grey">

    <ul class="collapsible main-accordion" data-collapsible="accordion">
        <li>
            <div class="collapsible-header">
                <h5 class="header">Август</h5>
            </div>
            <div class="collapsible-body">
                <div class="row">
                    <div class="col s12">
                        <h6 class="header" style="float: left;">Календарь</h6>
                        <h6 class="header">Август</h6>

                        <div class="row"><div class="col s12 m12 l12" style="text-align: center;"><div style="    margin-top: 10px;display: inline-block; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.06), 0 1px 5px 0 rgba(0, 0, 0, 0.06);   background-color: #F7F7F7;border-radius: 2px;">
                                    <?php for($i = 1; $i <= 31; $i++) { ?>
                                        <p style="text-align: center;margin: 0;padding: 5px; float: left; width: 45px; height: 45px;"><a style="color:#505050;padding-top: 6px;display: block;" href="#<?php echo $i; ?>"><?php echo $i; ?></a></p>
                                    <?php } ?>
                                </div></div></div>

                        <?php foreach ($this->month8 as $key => $value): ?>
                            <div id="grid" data-columns>
                                <div class="card">
                                    <div class="when" class="row">
                                        <div class="col s12">

                                            <h5 class="date-time"><a name="<?php echo date('j', strtotime($value['date'])); ?>"></a><?php echo date('d.m.y', strtotime($value['date'])); ?> в <?php echo substr($value['time'], 0, 5); ?></h5>
                                            <small class="where">
                                                <?php if($value['place'] == 'SOME') { echo SOME; } ?>
                                                <?php if($value['place'] == 'BOTTOM') { echo BOTTOM; } ?>
                                                <?php if($value['place'] == 'TOP') { echo TOP; } ?>
                                                <?php if($value['place'] == 'EMPTY_FIELD') { echo EMPTY_FIELD; } ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="divider"></div>
                                    <p class="center-align person"><?php echo $value['name']; ?></p>
                                    <div class="divider person"></div>
                                    <p class="center-align person"><?php echo $value['phone']; ?></p>

                                    <?php if(empty($value['record'])) { echo '<div class="empty-record"></div>'; } ?>
                                    <p style="padding: inherit; margin: 0px 15px 20px 15px; color: #757575; text-align: center;" class="truncate tr"><?php echo $value['record']; ?></p>
                                    <div class="divider"></div>
                                    <div class="row edit">
                                        <div class="col s12">
                                            <span class="edit"><a style="color: #757575;" onclick="confirm_delete()" href="<?php echo URL; ?>dashboard/delete/<?php echo $value['id']; ?>">Удалить</a> | <a style="color: #757575;" href="<?php echo URL; ?>dashboard/edit/<?php echo $value['id']; ?>">Изменить</a></span>
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
                <h5 class="header">Сентябрь</h5>
            </div>
            <div class="collapsible-body">
                <div class="row">
                    <div class="col s12">
                        <h6 class="header" style="float: left;">Календарь</h6>
                        <h6 class="header">Сентябрь</h6>
                        <div class="row">
                            <div class="col s12 m12 l12" style="text-align: center;">
                                <div style="margin-top: 10px;display: inline-block; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.06), 0 1px 5px 0 rgba(0, 0, 0, 0.06);   background-color: #F7F7F7;border-radius: 2px;">
                                    <?php for($i = 1; $i <= 31; $i++) { ?>
                                        <p style="text-align: center;margin: 0;padding: 5px; float: left; width: 45px; height: 45px;"><a style="color:#505050;padding-top: 6px;display: block;" href="#<?php echo $i; ?>"><?php echo $i; ?></a></p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
<!--                        <hr />-->

                        <?php
                        //days var
                        $days = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31);
                        $day_1 = array();$day_2 = array();$day_3 = array();$day_4 = array();$day_5 = array();$day_6 = array();$day_7 = array();$day_8 = array();$day_9 = array();$day_10 = array();
                        $day_11 = array();$day_12 = array();$day_13 = array();$day_14 = array();$day_15 = array();$day_16 = array();$day_17 = array();$day_18 = array();$day_19 = array();$day_20 = array();
                        $day_21 = array();$day_22 = array();$day_23 = array();$day_24 = array();$day_25 = array();$day_26 = array();$day_27 = array();$day_28 = array();$day_29 = array();$day_30 = array();
                        $day_31 = array();
                        //time vars
                        $time_array = array("0" => array("time" => '09:00:00'), "1" => array("time" => '09:15:00'), "2" => array("time" => '09:30:00'), "3" => array("time" => '09:45:00'), "4" => array("time" => '10:00:00'), "5" => array("time" => '10:15:00'), "6" => array("time" => '10:30:00'), "7" => array("time" => '10:45:00'), "8" => array("time" => '11:00:00'), "9" => array("time" => '11:15:00'), "10" => array("time" => '11:30:00'), "11" => array("time" => '11:45:00'), "12" => array("time" => '12:00:00'), "13" => array("time" => '12:15:00'), "14" => array("time" => '12:30:00'), "15" => array("time" => '12:45:00'), "16" => array("time" => '13:00:00'), "17" => array("time" => '13:15:00'), "18" => array("time" => '13:30:00'), "19" => array("time" => '13:45:00'), "20" => array("time" => '14:00:00'), "21" => array("time" => '14:15:00'), "22" => array("time" => '14:30:00'), "23" => array("time" => '14:45:00'), "24" => array("time" => '15:00:00'), "25" => array("time" => '15:15:00'), "26" => array("time" => '15:30:00'), "27" => array("time" => '15:45:00'), "28" => array("time" => '16:00:00'), "29" => array("time" => '16:15:00'), "30" => array("time" => '16:30:00'), "31" => array("time" => '16:45:00'), "32" => array("time" => '17:00:00'), "33" => array("time" => '17:15:00'), "34" => array("time" => '17:30:00'), "35" => array("time" => '17:45:00'), "36" => array("time" => '18:00:00'), "37" => array("time" => '18:15:00'), "38" => array("time" => '18:30:00'), "39" => array("time" => '18:45:00'), "40" => array("time" => '19:00:00'));
                        $day_records_1 = array();$day_records_2 = array();$day_records_3 = array();$day_records_4 = array();$day_records_5 = array();
                        $day_records_6 = array();$day_records_7 = array();$day_records_8 = array();$day_records_9 = array();$day_records_10 = array();
                        $day_records_11 = array();$day_records_12 = array();$day_records_13 = array();$day_records_14 = array();$day_records_15 = array();
                        $day_records_16 = array();$day_records_17 = array();$day_records_18 = array();$day_records_19 = array();$day_records_20 = array();
                        $day_records_21 = array();$day_records_22 = array();$day_records_23 = array();$day_records_24 = array();$day_records_25 = array();
                        $day_records_26 = array();$day_records_27 = array();$day_records_28 = array();$day_records_29 = array();$day_records_30 = array();
                        $day_31 = array();

                        //collect data by days

                        foreach ($this->month9 as $key => $value):
                            if(date('j', strtotime($value['date'])) == $days[0]) {
                                $data = array();
                                $data['id'] = $value['id'];
                                $data['date'] = $value['date'];
                                $data['time'] = $value['time'];
                                $data['place'] = $value['place'];
                                $data['name'] = $value['name'];
                                $data['phone'] = $value['phone'];
                                $data['record'] = $value['record'];
                                array_push($day_1, $data);
                            }
                            if(date('j', strtotime($value['date'])) == $days[1]) {
                                $data = array();
                                $data['id'] = $value['id'];
                                $data['date'] = $value['date'];
                                $data['time'] = $value['time'];
                                $data['place'] = $value['place'];
                                $data['name'] = $value['name'];
                                $data['phone'] = $value['phone'];
                                $data['record'] = $value['record'];
                                array_push($day_2, $data);
                            }
                            if(date('j', strtotime($value['date'])) == $days[2]) {
                                $data = array();
                                $data['id'] = $value['id'];
                                $data['date'] = $value['date'];
                                $data['time'] = $value['time'];
                                $data['place'] = $value['place'];
                                $data['name'] = $value['name'];
                                $data['phone'] = $value['phone'];
                                $data['record'] = $value['record'];
                                array_push($day_3, $data);
                            }
                            if(date('j', strtotime($value['date'])) == $days[3]) {
                                $data = array();
                                $data['id'] = $value['id'];
                                $data['date'] = $value['date'];
                                $data['time'] = $value['time'];
                                $data['place'] = $value['place'];
                                $data['name'] = $value['name'];
                                $data['phone'] = $value['phone'];
                                $data['record'] = $value['record'];
                                array_push($day_4, $data);
                            }
                            if(date('j', strtotime($value['date'])) == $days[4]) {
                                $data = array();
                                $data['id'] = $value['id'];
                                $data['date'] = $value['date'];
                                $data['time'] = $value['time'];
                                $data['place'] = $value['place'];
                                $data['name'] = $value['name'];
                                $data['phone'] = $value['phone'];
                                $data['record'] = $value['record'];
                                array_push($day_5, $data);
                            }
                            if(date('j', strtotime($value['date'])) == $days[5]) {
                                $data = array();
                                $data['id'] = $value['id'];
                                $data['date'] = $value['date'];
                                $data['time'] = $value['time'];
                                $data['place'] = $value['place'];
                                $data['name'] = $value['name'];
                                $data['phone'] = $value['phone'];
                                $data['record'] = $value['record'];
                                array_push($day_6, $data);
                            }
                            if(date('j', strtotime($value['date'])) == $days[6]) {
                                $data = array();
                                $data['id'] = $value['id'];
                                $data['date'] = $value['date'];
                                $data['time'] = $value['time'];
                                $data['place'] = $value['place'];
                                $data['name'] = $value['name'];
                                $data['phone'] = $value['phone'];
                                $data['record'] = $value['record'];
                                array_push($day_7, $data);
                            }
                            if(date('j', strtotime($value['date'])) == $days[7]) {
                                $data = array();
                                $data['id'] = $value['id'];
                                $data['date'] = $value['date'];
                                $data['time'] = $value['time'];
                                $data['place'] = $value['place'];
                                $data['name'] = $value['name'];
                                $data['phone'] = $value['phone'];
                                $data['record'] = $value['record'];
                                array_push($day_8, $data);
                            }
                            if(date('j', strtotime($value['date'])) == $days[8]) {
                                $data = array();
                                $data['id'] = $value['id'];
                                $data['date'] = $value['date'];
                                $data['time'] = $value['time'];
                                $data['place'] = $value['place'];
                                $data['name'] = $value['name'];
                                $data['phone'] = $value['phone'];
                                $data['record'] = $value['record'];
                                array_push($day_9, $data);
                            }
                            if(date('j', strtotime($value['date'])) == $days[9]) {
                                $data = array();
                                $data['id'] = $value['id'];
                                $data['date'] = $value['date'];
                                $data['time'] = $value['time'];
                                $data['place'] = $value['place'];
                                $data['name'] = $value['name'];
                                $data['phone'] = $value['phone'];
                                $data['record'] = $value['record'];
                                array_push($day_10, $data);
                            }
                            if(date('j', strtotime($value['date'])) == $days[10]) {
                                $data = array();
                                $data['id'] = $value['id'];
                                $data['date'] = $value['date'];
                                $data['time'] = $value['time'];
                                $data['place'] = $value['place'];
                                $data['name'] = $value['name'];
                                $data['phone'] = $value['phone'];
                                $data['record'] = $value['record'];
                                array_push($day_11, $data);
                            }
                            if(date('j', strtotime($value['date'])) == $days[11]) {
                                $data = array();
                                $data['id'] = $value['id'];
                                $data['date'] = $value['date'];
                                $data['time'] = $value['time'];
                                $data['place'] = $value['place'];
                                $data['name'] = $value['name'];
                                $data['phone'] = $value['phone'];
                                $data['record'] = $value['record'];
                                array_push($day_12, $data);
                            }
                            if(date('j', strtotime($value['date'])) == $days[12]) {
                                $data = array();
                                $data['id'] = $value['id'];
                                $data['date'] = $value['date'];
                                $data['time'] = $value['time'];
                                $data['place'] = $value['place'];
                                $data['name'] = $value['name'];
                                $data['phone'] = $value['phone'];
                                $data['record'] = $value['record'];
                                array_push($day_13, $data);
                            }
                            if(date('j', strtotime($value['date'])) == $days[13]) {
                                $data = array();
                                $data['id'] = $value['id'];
                                $data['date'] = $value['date'];
                                $data['time'] = $value['time'];
                                $data['place'] = $value['place'];
                                $data['name'] = $value['name'];
                                $data['phone'] = $value['phone'];
                                $data['record'] = $value['record'];
                                array_push($day_14, $data);
                            }
                            if(date('j', strtotime($value['date'])) == $days[14]) {
                                $data = array();
                                $data['id'] = $value['id'];
                                $data['date'] = $value['date'];
                                $data['time'] = $value['time'];
                                $data['place'] = $value['place'];
                                $data['name'] = $value['name'];
                                $data['phone'] = $value['phone'];
                                $data['record'] = $value['record'];
                                array_push($day_15, $data);
                            }
                            if(date('j', strtotime($value['date'])) == $days[15]) {
                                $data = array();
                                $data['id'] = $value['id'];
                                $data['date'] = $value['date'];
                                $data['time'] = $value['time'];
                                $data['place'] = $value['place'];
                                $data['name'] = $value['name'];
                                $data['phone'] = $value['phone'];
                                $data['record'] = $value['record'];
                                array_push($day_16, $data);
                            }
                            if(date('j', strtotime($value['date'])) == $days[16]) {
                                $data = array();
                                $data['id'] = $value['id'];
                                $data['date'] = $value['date'];
                                $data['time'] = $value['time'];
                                $data['place'] = $value['place'];
                                $data['name'] = $value['name'];
                                $data['phone'] = $value['phone'];
                                $data['record'] = $value['record'];
                                array_push($day_17, $data);
                            }
                            if(date('j', strtotime($value['date'])) == $days[17]) {
                                $data = array();
                                $data['id'] = $value['id'];
                                $data['date'] = $value['date'];
                                $data['time'] = $value['time'];
                                $data['place'] = $value['place'];
                                $data['name'] = $value['name'];
                                $data['phone'] = $value['phone'];
                                $data['record'] = $value['record'];
                                array_push($day_18, $data);
                            }
                            if(date('j', strtotime($value['date'])) == $days[18]) {
                                $data = array();
                                $data['id'] = $value['id'];
                                $data['date'] = $value['date'];
                                $data['time'] = $value['time'];
                                $data['place'] = $value['place'];
                                $data['name'] = $value['name'];
                                $data['phone'] = $value['phone'];
                                $data['record'] = $value['record'];
                                array_push($day_19, $data);
                            }
                            if(date('j', strtotime($value['date'])) == $days[19]) {
                                $data = array();
                                $data['id'] = $value['id'];
                                $data['date'] = $value['date'];
                                $data['time'] = $value['time'];
                                $data['place'] = $value['place'];
                                $data['name'] = $value['name'];
                                $data['phone'] = $value['phone'];
                                $data['record'] = $value['record'];
                                array_push($day_20, $data);
                            }
                            if(date('j', strtotime($value['date'])) == $days[20]) {
                                $data = array();
                                $data['id'] = $value['id'];
                                $data['date'] = $value['date'];
                                $data['time'] = $value['time'];
                                $data['place'] = $value['place'];
                                $data['name'] = $value['name'];
                                $data['phone'] = $value['phone'];
                                $data['record'] = $value['record'];
                                array_push($day_21, $data);
                            }
                            if(date('j', strtotime($value['date'])) == $days[21]) {
                                $data = array();
                                $data['id'] = $value['id'];
                                $data['date'] = $value['date'];
                                $data['time'] = $value['time'];
                                $data['place'] = $value['place'];
                                $data['name'] = $value['name'];
                                $data['phone'] = $value['phone'];
                                $data['record'] = $value['record'];
                                array_push($day_22, $data);
                            }
                            if(date('j', strtotime($value['date'])) == $days[22]) {
                                $data = array();
                                $data['id'] = $value['id'];
                                $data['date'] = $value['date'];
                                $data['time'] = $value['time'];
                                $data['place'] = $value['place'];
                                $data['name'] = $value['name'];
                                $data['phone'] = $value['phone'];
                                $data['record'] = $value['record'];
                                array_push($day_23, $data);
                            }
                            if(date('j', strtotime($value['date'])) == $days[23]) {
                                $data = array();
                                $data['id'] = $value['id'];
                                $data['date'] = $value['date'];
                                $data['time'] = $value['time'];
                                $data['place'] = $value['place'];
                                $data['name'] = $value['name'];
                                $data['phone'] = $value['phone'];
                                $data['record'] = $value['record'];
                                array_push($day_24, $data);
                            }
                            if(date('j', strtotime($value['date'])) == $days[24]) {
                                $data = array();
                                $data['id'] = $value['id'];
                                $data['date'] = $value['date'];
                                $data['time'] = $value['time'];
                                $data['place'] = $value['place'];
                                $data['name'] = $value['name'];
                                $data['phone'] = $value['phone'];
                                $data['record'] = $value['record'];
                                array_push($day_25, $data);
                            }
                            if(date('j', strtotime($value['date'])) == $days[25]) {
                                $data = array();
                                $data['id'] = $value['id'];
                                $data['date'] = $value['date'];
                                $data['time'] = $value['time'];
                                $data['place'] = $value['place'];
                                $data['name'] = $value['name'];
                                $data['phone'] = $value['phone'];
                                $data['record'] = $value['record'];
                                array_push($day_26, $data);
                            }
                            if(date('j', strtotime($value['date'])) == $days[26]) {
                                $data = array();
                                $data['id'] = $value['id'];
                                $data['date'] = $value['date'];
                                $data['time'] = $value['time'];
                                $data['place'] = $value['place'];
                                $data['name'] = $value['name'];
                                $data['phone'] = $value['phone'];
                                $data['record'] = $value['record'];
                                array_push($day_27, $data);
                            }
                            if(date('j', strtotime($value['date'])) == $days[27]) {
                                $data = array();
                                $data['id'] = $value['id'];
                                $data['date'] = $value['date'];
                                $data['time'] = $value['time'];
                                $data['place'] = $value['place'];
                                $data['name'] = $value['name'];
                                $data['phone'] = $value['phone'];
                                $data['record'] = $value['record'];
                                array_push($day_28, $data);
                            }
                            if(date('j', strtotime($value['date'])) == $days[28]) {
                                $data = array();
                                $data['id'] = $value['id'];
                                $data['date'] = $value['date'];
                                $data['time'] = $value['time'];
                                $data['place'] = $value['place'];
                                $data['name'] = $value['name'];
                                $data['phone'] = $value['phone'];
                                $data['record'] = $value['record'];
                                array_push($day_29, $data);
                            }
                            if(date('j', strtotime($value['date'])) == $days[29]) {
                                $data = array();
                                $data['id'] = $value['id'];
                                $data['date'] = $value['date'];
                                $data['time'] = $value['time'];
                                $data['place'] = $value['place'];
                                $data['name'] = $value['name'];
                                $data['phone'] = $value['phone'];
                                $data['record'] = $value['record'];
                                array_push($day_30, $data);
                            }
                            if(date('j', strtotime($value['date'])) == $days[30]) {
                                $data = array();
                                $data['id'] = $value['id'];
                                $data['date'] = $value['date'];
                                $data['time'] = $value['time'];
                                $data['place'] = $value['place'];
                                $data['name'] = $value['name'];
                                $data['phone'] = $value['phone'];
                                $data['record'] = $value['record'];
                                array_push($day_31, $data);
                            }
                        endforeach;


                        //echo '<pre>'; print_r($day_1); echo '</pre>';

                        //checking by times
                        foreach ($time_array as $key_time_array => $value_time_array){
                            $found = false;

                            foreach ($day_1 as $key => $value){
                                if ($day_1[$key]['time'] == $time_array[$key_time_array]['time']) {
                                    $day_records_1[$key_time_array]['time']  = $day_1[$key]['time'];
                                    $day_records_1[$key_time_array]['name'] = $day_1[$key]['name'];

                                    $day_records_1[$key_time_array]['date'] = $day_1[$key]['date'];
                                    $day_records_1[$key_time_array]['place'] = $day_1[$key]['place'];
                                    $day_records_1[$key_time_array]['phone'] = $day_1[$key]['phone'];
                                    $day_records_1[$key_time_array]['record'] = $day_1[$key]['record'];
                                    $day_records_1[$key_time_array]['id'] = $day_1[$key]['id'];

                                    $found = true;
                                }
                            }
                            if (!$found){
                                //add
                                $day_records_1[$key_time_array]['time']  = $time_array[$key_time_array]['time'];
                                $day_records_1[$key_time_array]['name'] = "Время не занято";
                            }
                        }

                        //echo '----<pre>'; print_r($day_records_1); echo '</pre>----';
                        ?>


                        <div class="row">
                            <div class="col s4 m4 l4">
                                <ul style="margin: 0.5rem 0 1rem 0; border: 1px solid #e0e0e0;" class="collection">
                                <?php foreach($day_records_1 as $k => $v): ?>
                                    <li class="collection-item">

                                        <span class="title">
                                            <?php if(isset($v['date'])){echo date('d.m.y', strtotime($v['date'])) . ' ';} ?>
                                            <?php if(isset($v['phone'])) {echo '<span>' . substr($v['time'], 0, 5) . '</span>';} ?>
                                            <?php if(!isset($v['phone'])) {echo '<span class="green">' . substr($v['time'], 0, 5) . '</span>';} ?>
                                            <small class="where">
                                                <?php if($v['place'] == 'BOTTOM') { echo 'Павла Мочалова'; } ?>
                                                <?php if($v['place'] == 'TOP') { echo 'Октябрьская'; } ?>
                                            </small>
                                        </span>
                                        <br />
                                            <?php echo $v['name'] .' '. $v['phone'] .' '. $v['record']; ?>

                                        <span class="edit">
                                            <a style="color: #757575;" onclick="confirm_delete()" href="<?php echo URL; ?>dashboard/delete/<?php echo $v['id']; ?>">Удалить</a>
                                            |
                                            <a style="color: #757575;" href="<?php echo URL; ?>dashboard/edit/<?php echo $v['id']; ?>">Изменить</a>
                                        </span>

                                    </li>
                                <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>







                        <hr />
                        <?php foreach ($this->month9 as $key => $value): ?>
                            <div id="grid" data-columns>

                                <div class="card">
                                    <div class="when" class="row">
                                        <div class="col s12">
                                            <h5 class="date-time">
                                                <a name="<?php echo date('j', strtotime($value['date'])); ?>"></a>
                                                <?php echo date('d.m.y', strtotime($value['date'])); ?> в <?php echo substr($value['time'], 0, 5); ?>
                                            </h5>
                                            <small class="where">
                                                <?php if($value['place'] == 'SOME') { echo SOME; } ?>
                                                <?php if($value['place'] == 'BOTTOM') { echo 'Павла Мочалова'; } ?>
                                                <?php if($value['place'] == 'TOP') { echo 'Октябрьская'; } ?>
                                                <?php if($value['place'] == 'EMPTY_FIELD') { echo EMPTY_FIELD; } ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="divider"></div>
                                    <p class="center-align person"><?php echo $value['name']; ?></p>
                                    <div class="divider person"></div>
                                    <p class="center-align person"><?php echo $value['phone']; ?></p>

                                    <?php if(empty($value['record'])) { echo '<div class="empty-record"></div>'; } ?>
                                    <p style="padding: inherit; margin: 0px 15px 20px 15px; color: #757575; text-align: center;" class="truncate tr"><?php echo $value['record']; ?></p>
                                    <div class="divider"></div>
                                    <div class="row edit">
                                        <div class="col s12">
                                            <span class="edit"><a style="color: #757575;" onclick="confirm_delete()" href="<?php echo URL; ?>dashboard/delete/<?php echo $value['id']; ?>">Удалить</a> | <a style="color: #757575;" href="<?php echo URL; ?>dashboard/edit/<?php echo $value['id']; ?>">Изменить</a></span>
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
                <h5 class="header">Октябрь</h5>
            </div>
            <div class="collapsible-body">
                <div class="row">
                    <div class="col s12">
                        <h6 class="header" style="float: left;">Календарь</h6>
                        <h6 class="header">Октябрь</h6>

                        <div class="row"><div class="col s12 m12 l12" style="text-align: center;"><div style="    margin-top: 10px;display: inline-block; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.06), 0 1px 5px 0 rgba(0, 0, 0, 0.06);   background-color: #F7F7F7;border-radius: 2px;">
                                    <?php for($i = 1; $i <= 31; $i++) { ?>
                                        <p style="text-align: center;margin: 0;padding: 5px; float: left; width: 45px; height: 45px;"><a style="color:#505050;padding-top: 6px;display: block;" href="#<?php echo $i; ?>"><?php echo $i; ?></a></p>
                                    <?php } ?>
                                </div></div></div>

                        <?php foreach ($this->month10 as $key => $value): ?>
                            <div id="grid" data-columns>
                                <div class="card">
                                    <div class="when" class="row">
                                        <div class="col s12">

                                            <h5 class="date-time"><a name="<?php echo date('j', strtotime($value['date'])); ?>"></a><?php echo date('d.m.y', strtotime($value['date'])); ?> в <?php echo substr($value['time'], 0, 5); ?></h5>
                                            <small class="where">
                                                <?php if($value['place'] == 'SOME') { echo SOME; } ?>
                                                <?php if($value['place'] == 'BOTTOM') { echo BOTTOM; } ?>
                                                <?php if($value['place'] == 'TOP') { echo TOP; } ?>
                                                <?php if($value['place'] == 'EMPTY_FIELD') { echo EMPTY_FIELD; } ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="divider"></div>
                                    <p class="center-align person"><?php echo $value['name']; ?></p>
                                    <div class="divider person"></div>
                                    <p class="center-align person"><?php echo $value['phone']; ?></p>

                                    <?php if(empty($value['record'])) { echo '<div class="empty-record"></div>'; } ?>
                                    <p style="padding: inherit; margin: 0px 15px 20px 15px; color: #757575; text-align: center;" class="truncate tr"><?php echo $value['record']; ?></p>
                                    <div class="divider"></div>
                                    <div class="row edit">
                                        <div class="col s12">
                                            <span class="edit"><a style="color: #757575;" onclick="confirm_delete()" href="<?php echo URL; ?>dashboard/delete/<?php echo $value['id']; ?>">Удалить</a> | <a style="color: #757575;" href="<?php echo URL; ?>dashboard/edit/<?php echo $value['id']; ?>">Изменить</a></span>
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
                <h5 class="header">Ноябрь</h5>
            </div>
            <div class="collapsible-body">
                <div class="row">
                    <div class="col s12">
                        <h6 class="header" style="float: left;">Календарь</h6>
                        <h6 class="header">Ноябрь</h6>

                        <div class="row"><div class="col s12 m12 l12" style="text-align: center;"><div style="    margin-top: 10px;display: inline-block; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.06), 0 1px 5px 0 rgba(0, 0, 0, 0.06);   background-color: #F7F7F7;border-radius: 2px;">
                                    <?php for($i = 1; $i <= 31; $i++) { ?>
                                        <p style="text-align: center;margin: 0;padding: 5px; float: left; width: 45px; height: 45px;"><a style="color:#505050;padding-top: 6px;display: block;" href="#<?php echo $i; ?>"><?php echo $i; ?></a></p>
                                    <?php } ?>
                                </div></div></div>

                        <?php foreach ($this->month11 as $key => $value): ?>
                            <div id="grid" data-columns>
                                <div class="card">
                                    <div class="when" class="row">
                                        <div class="col s12">

                                            <h5 class="date-time"><a name="<?php echo date('j', strtotime($value['date'])); ?>"></a><?php echo date('d.m.y', strtotime($value['date'])); ?> в <?php echo substr($value['time'], 0, 5); ?></h5>
                                            <small class="where">
                                                <?php if($value['place'] == 'SOME') { echo SOME; } ?>
                                                <?php if($value['place'] == 'BOTTOM') { echo BOTTOM; } ?>
                                                <?php if($value['place'] == 'TOP') { echo TOP; } ?>
                                                <?php if($value['place'] == 'EMPTY_FIELD') { echo EMPTY_FIELD; } ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="divider"></div>
                                    <p class="center-align person"><?php echo $value['name']; ?></p>
                                    <div class="divider person"></div>
                                    <p class="center-align person"><?php echo $value['phone']; ?></p>

                                    <?php if(empty($value['record'])) { echo '<div class="empty-record"></div>'; } ?>
                                    <p style="padding: inherit; margin: 0px 15px 20px 15px; color: #757575; text-align: center;" class="truncate tr"><?php echo $value['record']; ?></p>
                                    <div class="divider"></div>
                                    <div class="row edit">
                                        <div class="col s12">
                                            <span class="edit"><a style="color: #757575;" onclick="confirm_delete()" href="<?php echo URL; ?>dashboard/delete/<?php echo $value['id']; ?>">Удалить</a> | <a style="color: #757575;" href="<?php echo URL; ?>dashboard/edit/<?php echo $value['id']; ?>">Изменить</a></span>
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
                <h5 class="header">Декабрь</h5>
            </div>
            <div class="collapsible-body">
                <div class="row">
                    <div class="col s12">
                        <h6 class="header" style="float: left;">Календарь</h6>
                        <h6 class="header">Декабрь</h6>

                        <div class="row"><div class="col s12 m12 l12" style="text-align: center;"><div style="    margin-top: 10px;display: inline-block; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.06), 0 1px 5px 0 rgba(0, 0, 0, 0.06);   background-color: #F7F7F7;border-radius: 2px;">
                                    <?php for($i = 1; $i <= 31; $i++) { ?>
                                        <p style="text-align: center;margin: 0;padding: 5px; float: left; width: 45px; height: 45px;"><a style="color:#505050;padding-top: 6px;display: block;" href="#<?php echo $i; ?>"><?php echo $i; ?></a></p>
                                    <?php } ?>
                                </div></div></div>

                        <?php foreach ($this->month12 as $key => $value): ?>
                            <div id="grid" data-columns>
                                <div class="card">
                                    <div class="when" class="row">
                                        <div class="col s12">

                                            <h5 class="date-time"><a name="<?php echo date('j', strtotime($value['date'])); ?>"></a><?php echo date('d.m.y', strtotime($value['date'])); ?> в <?php echo substr($value['time'], 0, 5); ?></h5>
                                            <small class="where">
                                                <?php if($value['place'] == 'SOME') { echo SOME; } ?>
                                                <?php if($value['place'] == 'BOTTOM') { echo BOTTOM; } ?>
                                                <?php if($value['place'] == 'TOP') { echo TOP; } ?>
                                                <?php if($value['place'] == 'EMPTY_FIELD') { echo EMPTY_FIELD; } ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="divider"></div>
                                    <p class="center-align person"><?php echo $value['name']; ?></p>
                                    <div class="divider person"></div>
                                    <p class="center-align person"><?php echo $value['phone']; ?></p>

                                    <?php if(empty($value['record'])) { echo '<div class="empty-record"></div>'; } ?>
                                    <p style="padding: inherit; margin: 0px 15px 20px 15px; color: #757575; text-align: center;" class="truncate tr"><?php echo $value['record']; ?></p>
                                    <div class="divider"></div>
                                    <div class="row edit">
                                        <div class="col s12">
                                            <span class="edit"><a style="color: #757575;" onclick="confirm_delete()" href="<?php echo URL; ?>dashboard/delete/<?php echo $value['id']; ?>">Удалить</a> | <a style="color: #757575;" href="<?php echo URL; ?>dashboard/edit/<?php echo $value['id']; ?>">Изменить</a></span>
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
</main>

<a style="position: fixed;bottom: 0;right: 0;border-radius: 2px;background-color: #EE6E73;margin-right: 10px;margin-bottom: 10px;" class="btn-floating btn-large waves-effect waves-light" href="<?php echo URL ?>dashboard/add"><i class="material-icons">note_add</i></a>

<script>
    $(document).ready(function() {
        moment.locale("ru");
        var months = {1: "Январь",2: "Февраль", 3: "Март",4: "Апрель", 5: "Май", 6: "Июнь", 7: "Июль", 8: "Август", 9: "Сентябрь", 10: "Октябрь", 11: "Ноябрь", 12: "Декабрь"};
        var month_now = moment().format("M"); //get current month number

        $('h5.header').each(function() {
            var month = $(this).text(); console.log(month);
            var intMonth = monthToNumber(month); //parseInt(month);console.log(typeof month); console.log(typeof month_now);var i = (month == month_now);console.log(i);
            if(intMonth == month_now) {
                $(this).parent().addClass('active');
            }
        });
        function monthToNumber(month) {
            for(var i = 1; i <= 12; i++) {
                if(months[i] == month) {
                    return i; //console.log('--' + i);
                }
            }
        }

    });
</script>

