<!-- Get jQuery from Google CDN -->
<!--[if !IE]> -->
<script type="text/javascript"> window.jQuery || document.write('<script src="<?php echo URL; ?>assets/javascripts/jquery.min.js">'+"<"+"/script>"); </script>
<!-- <![endif]-->
<!--[if lte IE 9]>
<!--<script type="text/javascript"> window.jQuery || document.write('<script src="<?php echo URL; ?>assets/javascripts/jquery1.8.3.min.js">'+"<"+"/script>"); </script>-->
<![endif]-->


<!-- LanderApp's javascripts -->
<script src="<?php echo URL; ?>assets/javascripts/bootstrap.min.js"></script>
<script src="<?php echo URL; ?>assets/javascripts/landerapp.min.js"></script>

<!-- Used for X-Editable demo only. You can remove this lines -->
<script src="<?php echo URL; ?>assets/javascripts/jquery.mockjax.js"></script>
<script src="<?php echo URL; ?>assets/javascripts/demo-mock.js"></script>
<!---->

<!--<script type="text/javascript">-->
<!--    window.LanderApp.start([-->
<!--        function () {-->
<!--            $("#signin-form_id").validate({ focusInvalid: true, errorPlacement: function () {} });-->
<!---->
<!--            // Validate username-->
<!--            $("#username_id").rules("add", {-->
<!--                required: true,-->
<!--                minlength: 3-->
<!--            });-->
<!---->
<!--            // Validate password-->
<!--            $("#password_id").rules("add", {-->
<!--                required: true,-->
<!--                minlength: 3-->
<!--            });-->
<!--        }-->
<!--    ]);-->
<!--</script>-->

<script type="text/javascript">
    init.push(function () {
        // Javascript code here

    })
    window.LanderApp.start(init);
</script>

</body>

</html>
