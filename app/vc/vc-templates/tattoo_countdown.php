<?php 

$uniqID = 'time-' . uniqid();

?>


<script type="text/javascript">
  jQuery(function ($) {
    'use strict';
    var time = 60 * 51,
    display = $('#<?php echo esc_js($uniqID); ?>');
    startTimer(time, display);
});
</script>

<h6 class="counters"><span id="<?php echo esc_attr($uniqID); ?>"></span></h6>
        
