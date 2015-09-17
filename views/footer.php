<script src="<?php echo URL; ?>assets/js/salvattore.js"></script>
<!-- App javascript -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>


<script>
    $(document).ready(function() {
        $('select').material_select();
        $(".button-collapse").sideNav();
        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15, // Creates a dropdown of 15 years to control year
            format: 'yyyy-mm-dd'
        });
        $('.collapsible').collapsible({
            accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
        });
    });
</script>
    </body>
</html>
