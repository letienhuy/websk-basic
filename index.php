<?php
    require_once('system/header.php');
    if(empty($_GET['page']) || $_GET['page'] < 1){
        $_GET['page'] = 1;
    }
    $limit = 10;
    $total = count(db_where('sukien', ['date_start', '>', date('Y-m-d')]));
    $start = ($_GET['page'] - 1) * $limit;
    $sukien = db_whereRaw('sukien', "date_start > ".date('Y-m-d')." limit $start,$limit");
    $slide = db_whereRaw('sukien', "date_start > ".date('Y-m-d')." order by rand() limit 4");
?>
<div id="content">
    <div class="container">
        <div class="slide-home">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php foreach($slide as $item){ ?>
                    <div class="swiper-slide">
                        <img src="<?php echo $item['poster']; ?>" alt="" class="thumb-slide">
                    </div>
                <?php } ?>
            </div>
        </div>
        <!-- Swiper JS -->
        <script src="<?php echo base_url();?>/public/js/swiper.min.js"></script>
        <!-- Initialize Swiper -->
        <script>
            var swiper = new Swiper('.swiper-container', {
                slidesPerView: 2,
                spaceBetween: 30,
                breakpoints: {
                    768: {
                    slidesPerView: 1,
                    spaceBetween: 30
                    }
                }
            });
        </script>
        </div>
        <div class="list">
            <h1 class="title">SỰ KIỆN ĐANG DIỄN RA (<?php echo $total; ?>)</h1>
            <div class="row">
            <?php foreach($sukien as $item){ ?>
                <div class="col-sm-6">
                    <div class="item">
                        <img class="thumb" src="<?php echo $item['poster']; ?>"/>
                        <div class="info">
                            <h3>
                                <a href="<?php echo base_url().'/chitiet.php?id='.$item['id']; ?>"><?php echo $item['name'];?></a>
                            </h3>
                            <div class="info-date">
                                <div class="col-xs-6">
                                    <span><i class="fa fa-calendar-check-o" style="color: #ff3c00;"></i> <?php echo date('d/m/Y', strtotime($item['date_start'])); ?></span>
                                    <?php $dd = db_where('diadiem', ['id', $item['id_diadiem']])[0]; ?>
                                    <span><i class="fa fa-map-marker" style="color: blue;"></i> <?php echo $dd['name']; ?></span>
                                </div>
                                <div class="col-xs-6" style="text-align: right;">
                                    <span>
                                        <?php echo date('H:iA', strtotime($item['time_start'])); ?> - <?php echo date('H:iA', strtotime($item['time_stop'])); ?>
                                    </span>
                                    <span>
                                        <?php if($item['price']) echo "<b>".$item['price']." đ</b>"; else echo "<b>Miễn phí</b>" ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
        <?php echo paginate($_GET['page'], $total, $limit); ?>
    </div>
</div>
<?php
    require_once('system/footer.php');
?>