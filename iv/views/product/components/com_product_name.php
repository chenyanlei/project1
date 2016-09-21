<div>
    <div>
        请用一句话描述一下该产品的名称
    </div>
  
    <div class="y-margin-top-20px" style="margin-bottom:40px;">
        <textarea id="product_name" class="form" placeholder="请输入名称" cols="102" rows="5" type="text" ><?php if(isset($title)) {
                echo $title ;
            }?></textarea>
    </div>

    
</div>

<script>

    function com_product_name_get_name() {
        return $("#product_name").val() ;
    }

    function com_product_name_is_validate() {
        return $("#product_name").val() != "" ;
    }

</script>
