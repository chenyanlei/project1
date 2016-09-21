<div>
    <div>
        请添加该产品的签证信息
    </div>
    <div class="y-margin-top-20px">
        <script id="com_product_visa_data" style="min-height:500px;"></script>
    </div>
    <div class="diliver_line"></div>
</div>

<script>

    var m_com_product_visa_UEditor = null;

    $(function() {
        m_com_product_visa_UEditor = UE.getEditor('com_product_visa_data');
        m_com_product_visa_UEditor.addListener("ready", function () {
            // editor准备好之后才可以使用
            <?php if(isset($visa_data)) { ?>
            m_com_product_visa_UEditor.setContent(<?php echo json_encode($visa_data);?>);
            <?php } else { ?>
            m_com_product_visa_UEditor.setContent("<span style=\"color:#ccc\">【请输入签证信息】<br/> ... ... </span>");
            <?php }
            ?>



        });
    })

    function com_product_visa_get_data() {
        return m_com_product_visa_UEditor.getContent()  ;
    }

    function com_product_visa_is_validate() {
        return m_com_product_visa_UEditor.getContent().length>0 ;
    }

</script>
