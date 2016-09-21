<div>
    <div>
        预订须知
    </div>
   
    <div class="y-margin-top-20px">
        <script id="com_booking_policy_data" style="min-height:500px;"></script>
    </div>
    
</div>

<script>

    var m_com_booking_policy_UEditor = null;

    $(function() {
        m_com_booking_policy_UEditor = UE.getEditor('com_booking_policy_data');
        m_com_booking_policy_UEditor.addListener("ready", function () {
            // editor准备好之后才可以使用
            <?php if(isset($visa_data)) { ?>
            m_com_booking_policy_UEditor.setContent(<?php echo json_encode($booking_data);?>);
            <?php } else { ?>
            m_com_booking_policy_UEditor.setContent("<span style=\"color:#ccc\">【请输入预订须知】<br/> ... ... </span>");
            <?php }
            ?>

        });
    })

    function com_booking_policy_get_data() {
        return m_com_booking_policy_UEditor.getContent() ;
    }

    function com_booking_policy_is_validate() {
        return m_com_booking_policy_UEditor.getContent().length > 0 ;
    }

</script>
