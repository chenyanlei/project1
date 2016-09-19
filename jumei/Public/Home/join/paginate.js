/**
 * User: xiaojuhuang
 * Time:12-1-6 AM8:20
 * Function:
 */
jQuery(function ($) {
    $("[name='hrsPaginateField']").live({
        keydown:function (event) {

            var value = $(this).val();

            var laststep = $(this).attr("laststep");
            var max = $(this).attr("max");
            var url = $(this).attr("link");
            var update = $(this).attr("update");
            if (event.keyCode == 13 && value*1 <= laststep*1 && value*1 > 0) {
                event.preventDefault();
                url = url + "&offset=" + ((value*1 - 1) * max);
                if (update != null) {
                    createProgresser(update)     ;
                    $(update).load(url+"&t="+new Date().getTime());
//                    $.cookie("listUrl",url);
                } else
                    window.location.href = url
            }
        },
        keyup:function(event){
            var laststep = $(this).attr("laststep");
            var value = $(this).val();
            if ((!(/^(\+|-)?\d+$/.test( value ))&& value!="") || value*1>laststep*1) {

                $(this).val("");
                return false;
            }
        }
    });
    $("[name='hrPreHref']").live({
        click:function () {
            $(this).die("click");
            var url = $(this).attr("link");
            var update = $(this).attr("update");
//            $.cookie("listUrl",url);
            createProgresser(update)     ;
            $(update).load(url+"&t="+new Date().getTime());
            return false;
        }
    });
    $("[name='hrNextHref']").live({
        click:function () {
            $(this).die("click");
            var url = $(this).attr("link");
            var update = $(this).attr("update");
//            $.cookie("listUrl",url);
            createProgresser(update)     ;
            $(update).load(url+"&t="+new Date().getTime());
            return false;
        }
    });
});

