<div class="col-sm-offset-2 col-sm-10">

    <style>
        .face_img {
            width: 300px;
            height: 200px;

        }
        .title_txt {
            position: absolute;
            bottom: 0px;
            width: 300px;
            color: white;
            background: #000000;
            opacity: 0.5;
            height: 40px;
            font-size: 14px;
            line-height: 40px;
            text-align: center;
            text-overflow : clip | ellipsis;
        }
        .item {
            position: relative;
            float: left;
            margin-top: 40px;
            margin-right: 40px;
        }

        #my_share ul>li{
            display: table;
            float: left;
        }
    </style>

    <div id="my_share" style="margin-bottom: 50px">
    <ul style="list-style: none">
    <?php
    $list = $data['data'];
    $aid = $data['uid'] ;
    foreach($list as $item) { ?>
        <li>
        <a href="/product/get_share_detail?id=<?=$item['id']?>&aid=<?=$aid?>&p_type=<?=$item['p_type']?>">
            <div class="item">
                <img class="face_img" src="<?php echo 'http://img.qsctrip.com/'.$item['face_img'];?>">
                <div class="title_txt">
                    <?php echo $item['title'];?>
                </div>
            </div>
        </a>
        </li>
    <?php } ?>
    </ul>
        <div style="clear: both"></div>
    </div>
</div>