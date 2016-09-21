<style>
    *{
        color:#585858;
        font-size: 14px;
    }
    #des_continent {
        list-style: none;
        display: block;
    }  
    .continent:hover{
        background: #585858;
        color:#fff;
    }
    .continent{
        height:30px;
        line-height:30px;
        padding-left:10px;
        padding-right: 10px;
        float: left;
        margin-right: 20px;
        border:1px solid #ccc;
        cursor: pointer;
    }
    .country{
        float: left;
        height:30px;
        line-height: 30px;
        padding-left: 10px;
        padding-right: 10px;
        border:1px solid #ccc;
        margin-right: 20px;
        margin-bottom:10px;
        cursor: pointer;
    }
    .country:hover{
        background: #585858;
        color:#fff;
    }

    #des_country{
        margin-top: 40px;  
        margin-bottom:30px;
    }

    .clear{
        clear: both;
    }
    .qsc-active {
        background-color: #585858 !important;
        color:#fff;
    }
    #country_content:after{
        content: '';
        display: block;
        clear:both;
    }
</style>

<div style="clear: both"></div>

<?php
    function com_des_continent_active($continent, $cur) {
        if($continent == $cur) {
            return "qsc-active";
        }
    }
?>
<div>
    <div style="margin-bottom:40px;">
        请选择该产品的目的地
    </div> 
    <div style="margin-bottom:20px;font-weight:bold">洲</div>
    <div id="des_continent" >
        <?php
        if(isset($continent)) { ?>
            <div class="continent <?php echo com_des_continent_active('asia', $continent);?>" data="asia">亚洲</div>
            <div class="continent <?php echo com_des_continent_active('europe', $continent);?>" data="europe">欧洲</div>
            <div class="continent <?php echo com_des_continent_active('north_america', $continent);?>" data="north_america">北美洲</div>
            <div class="continent <?php echo com_des_continent_active('south_america', $continent);?>" data="south_america">南美洲</div>
            <div class="continent <?php echo com_des_continent_active('africa', $continent);?>" data="africa">非洲</div>
            <div class="continent <?php echo com_des_continent_active('oceania', $continent);?>" data="oceania">大洋洲</div>
        <?php } else {
        ?>
            <div class="continent" data="asia">亚洲</div>
            <div class="continent" data="europe">欧洲</div>
            <div class="continent" data="north_america">北美洲</div>
            <div class="continent" data="south_america">南美洲</div>
            <div class="continent" data="africa">非洲</div>
            <div class="continent" data="oceania">大洋洲</div>
        <?php }
        ?>
        <div style="clear: both"></div>
    </div>
    
    <div id="des_country">
        <div id="country_title" style="margin-bottom:20px;font-weight:bold"></div>
        <div id="country_content">          
        </div>
        <div style="clear: both"></div>
    </div>
    <div id="des_city">
    </div>
    <div class="diliver_line" style="margin-top:0px;margin-bottom:40px;"></div>
</div>
<script>
    var m_destination = new Array() ;
    var m_destination_is_loading = false ;
    var m_select_continent = "<?php if(isset($continent)) echo $continent; else echo "";?>" ;
    var m_select_country = new Array() ;
    <?php
     if(isset($country) ) {
        $obj_country = json_decode($country) ;
        foreach($obj_country as $obj_country_item) { ?>
        m_select_country.push("<?php echo $obj_country_item; ?>") ;
    <?php
        }
     }
    ?>

    var m_select_continent_cn_name = "<?php
        if(isset($continent)) {
            $CI = & get_instance() ;
            $CI->load->library('commen') ;
            echo $CI->commen->continent_to_ch_name($continent);
        } else{
            echo "" ;
        }
    ?>";

    function com_destination_get_continent() {
        return m_select_continent;
    }
    function com_destination_clear() {
        m_select_continent = "";
        m_select_country.length =0 ;
        $("#des_continent .continent").removeClass('qsc-active') ;
        $("#des_continent .country").removeClass('qsc-active') ;
    }
    function com_destination_get_countries() {
        return m_select_country;
    }
    function com_destination_is_validate() {
        if(m_select_continent != "" && m_select_country.length > 0) {
            return true ;
        }
        return false ;
    }

    $(function(){
        get_all_destination() ;
        $("#des_continent .continent").click(function(){
            var  destination = $(this).attr("data") ;
            $("#des_continent .continent").removeClass('qsc-active') ;
            $(this).addClass('qsc-active') ;
            var name = $(this).html() ;
            m_select_country.length =0 ;
            destination_convert(destination, name) ;
            m_select_continent = $(this).attr("data") ;
        }) ;

        $("#country_content").delegate(".country", "click", function(){
            $(this).toggleClass("qsc-active");
            var name = $(this).text() ;
            if($(this).hasClass("qsc-active")) {
                m_select_country.push(name) ;
            } else {
                m_select_country.remove(name) ;
            }
        }) ;
    }) ;

    function destination_convert(destination, name) {
        if(m_destination.length == 0) {
            get_all_destination() ;
        } else {
            show_continent_data(destination, name) ;
        }
    }

    function add_country(country_div, index_obj) {
        var div = document.createElement("div") ;
        div.innerHTML= index_obj.name;
        var classname = "country" ;
        if(m_select_country.length > 0) {
            for(var index=0;index<m_select_country.length;index++) {
                if(m_select_country[index] == index_obj.name) {
                    classname += " qsc-active";
                    break ;
                }
            }
        }
        div.className = classname;
        country_div.append(div) ;
    }

    function show_continent_data(continent, name) {
        var arr = m_destination[continent] ;
        var country_div = $("#country_content") ;
        var title_div = $("#country_title") ;
        title_div.html("请选择<span color='red'>" + name + "</span>的国家")  ;
        country_div.empty();
        for(index=0;index<arr.length;index++) {
            var index_obj = arr[index] ;
            add_country(country_div,index_obj) ;
        }
    }

    function get_all_destination() {
        if(m_destination_is_loading) {
            return;
        }
        m_destination_is_loading = true ;
        $.get(
            "/destination/get_all_list" ,
            {
                d_type:2
            },
            function(data){
                desObj = JSON.parse(data) ;
                if(desObj.result.err == 0) {
                    m_destination_is_loading = false ;
                    m_destination = desObj.content;
                    if(m_select_continent.length > 0) {
                        destination_convert(m_select_continent, m_select_continent_cn_name) ;
                    }
                }
            }) ;
    }

    Array.prototype.indexOf = function(val) {
        for (var i = 0; i < this.length; i++) {
            if (this[i] == val) return i;
        }
        return -1;
    };

    Array.prototype.remove = function(val) {
        var index = this.indexOf(val);
        if (index > -1) {
            this.splice(index, 1);
        }
    };
</script>