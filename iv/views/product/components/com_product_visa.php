<div>
    <div>
        请添加该产品的签证信息
    </div>
    <div class="diliver_line"></div>

    <div class="y-margin-top-20px">
        <textarea id="com_product_visa_data" cols="102" rows="12" class="form"></textarea>
    </div>
    <div class="diliver_line"></div>
</div>

<script>

    function com_product_visa_get_data() {
        return $("#com_product_visa_data").val() ;
    }

    function com_product_visa_is_validate() {
        return $("#com_product_visa_data").val() != "" ;
    }

</script>
