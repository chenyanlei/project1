<div>
    <div>
        请添加该产品的费用说明
    </div>

    <div class="y-margin-top-20px">
<!--        <textarea id="com_product_fee_desc_data" cols="102" rows="12" class="form"></textarea>-->
        <script id="com_product_fee_desc_data" style="min-height:500px;"></script>
    </div>
</div>

<script>

    var m_com_product_fee_desc_UEditor = null;

    $(function() {
        m_com_product_fee_desc_UEditor = UE.getEditor('com_product_fee_desc_data');
        m_com_product_fee_desc_UEditor.addListener("ready", function () {
            // editor准备好之后才可以使用
            <?php if(isset($visa_data)) { ?>
            m_com_product_fee_desc_UEditor.setContent(<?php echo json_encode($fee_desc_data);?>);
            <?php } else { ?>
            m_com_product_fee_desc_UEditor.setContent("<span style=\"color:#ccc\">【请输入费用说明】<br/> ... ... </span>");
            <?php }
            ?>

        });
    })

    function com_product_fee_desc_get_data() {
//        return $("#com_product_fee_desc_data").val() ;
        return m_com_product_fee_desc_UEditor.getContent() ;
    }

    function com_product_fee_desc_is_validate() {
//        return $("#com_product_fee_desc_data").val() != "" ;
        return m_com_product_fee_desc_UEditor.getContent().length>0 ;
    }

</script>
