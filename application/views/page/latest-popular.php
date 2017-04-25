<div class="blue-grey lighten-3">
    <div class="section container">
        <div class="row">
			


            <div class="col s12 m8 l8">
<div class="center lb-ads1">

<script type='text/javascript'><!--//<![CDATA[
   var m3_u = (location.protocol=='https:'?'https://revive.consumedmedia.id/www/delivery/ajs.php':'http://revive.consumedmedia.id/www/delivery/ajs.php');
   var m3_r = Math.floor(Math.random()*99999999999);
   if (!document.MAX_used) document.MAX_used = ',';
   document.write ("<scr"+"ipt type='text/javascript' src='"+m3_u);
   document.write ("?zoneid=75");
   document.write ('&amp;cb=' + m3_r);
   if (document.MAX_used != ',') document.write ("&amp;exclude=" + document.MAX_used);
   document.write (document.charset ? '&amp;charset='+document.charset : (document.characterSet ? '&amp;charset='+document.characterSet : ''));
   document.write ("&amp;loc=" + escape(window.location));
   if (document.referrer) document.write ("&amp;referer=" + escape(document.referrer));
   if (document.context) document.write ("&context=" + escape(document.context));
   if (document.mmm_fo) document.write ("&amp;mmm_fo=1");
   document.write ("'><\/scr"+"ipt>");
//]]>--></script><noscript><a href='http://revive.consumedmedia.id/www/delivery/ck.php?n=a76f6af9&amp;cb=INSERT_RANDOM_NUMBER_HERE' target='_blank'><img src='http://revive.consumedmedia.id/www/delivery/avw.php?zoneid=75&amp;cb=INSERT_RANDOM_NUMBER_HERE&amp;n=a76f6af9' border='0' alt='' /></a></noscript>

        </div>
                <div class="bx-title">
                    <h2 class="stand-title"><span>LATEST NEWS</span></h2>
                </div>
                <div class="row">                
                    <div id="loadmorehome"></div>  
                </div>
                <div class="center">
                    <button class="white-text btn red darken-4 loadmore" id="loadmorebtn" data-val="0">Loadmore</button>
                </div>

<div class="center lb-ads1">

<script type='text/javascript'><!--//<![CDATA[
   var m3_u = (location.protocol=='https:'?'https://revive.consumedmedia.id/www/delivery/ajs.php':'http://revive.consumedmedia.id/www/delivery/ajs.php');
   var m3_r = Math.floor(Math.random()*99999999999);
   if (!document.MAX_used) document.MAX_used = ',';
   document.write ("<scr"+"ipt type='text/javascript' src='"+m3_u);
   document.write ("?zoneid=76");
   document.write ('&amp;cb=' + m3_r);
   if (document.MAX_used != ',') document.write ("&amp;exclude=" + document.MAX_used);
   document.write (document.charset ? '&amp;charset='+document.charset : (document.characterSet ? '&amp;charset='+document.characterSet : ''));
   document.write ("&amp;loc=" + escape(window.location));
   if (document.referrer) document.write ("&amp;referer=" + escape(document.referrer));
   if (document.context) document.write ("&context=" + escape(document.context));
   if (document.mmm_fo) document.write ("&amp;mmm_fo=1");
   document.write ("'><\/scr"+"ipt>");
//]]>--></script><noscript><a href='http://revive.consumedmedia.id/www/delivery/ck.php?n=acb1a6ec&amp;cb=INSERT_RANDOM_NUMBER_HERE' target='_blank'><img src='http://revive.consumedmedia.id/www/delivery/avw.php?zoneid=76&amp;cb=INSERT_RANDOM_NUMBER_HERE&amp;n=acb1a6ec' border='0' alt='' /></a></noscript>

        </div>

            </div>
            <!--Popular-->		
            <div class="col s4 right-top-wp2">
                <div class="sc-ads1 center">
                   
<iframe id='ac9324e0' name='ac9324e0' src='http://revive.consumedmedia.id/www/delivery/afr.php?zoneid=72&amp;cb=INSERT_RANDOM_NUMBER_HERE' frameborder='0' scrolling='no' width='300' height='250'><a href='http://revive.consumedmedia.id/www/delivery/ck.php?n=ad242c90&amp;cb=INSERT_RANDOM_NUMBER_HERE' target='_blank'><img src='http://revive.consumedmedia.id/www/delivery/avw.php?zoneid=72&amp;cb=INSERT_RANDOM_NUMBER_HERE&amp;n=ad242c90' border='0' alt='' /></a></iframe>

                    <!--<img src="<?php echo base_url('assets/banner/mr-300x250.jpeg'); ?>">-->
                </div>
                <ul id="tabs-popular" class="tabs z-depth-1">
                    <li class="tab col s6"><a class="black-text" href="#popular">POPULAR</a></li>
                    <li class="tab col s6"><a class="black-text" href="#top-review">TOP REVIEW</a></li>
                </ul>
                <div id="popular" class="tab-cntn col s12 white z-depth-2">
                    <!--tab popular-->
                    <ul class="tab-news">
                        <?php
                        foreach ($popular_post as $popular) {
                            $popular_url = base_url('read/' . $popular['id_post'] . '/' . $popular['seotitle']);
                            ?>
                            <li>
                                <div class="mask-tab left">	
                                    <a href="<?php echo $popular_url; ?>">
                                        <?php if (!empty($popular['image']) && file_exists('assets/picture/thumb/' . $popular['image'])) { ?>   
                                            <img src="<?php echo base_url('assets/picture/thumb/' . $popular['image'] . ''); ?>" data-src="<?php echo base_url('assets/picture/thumb/' . $popular['image'] . ''); ?>" class="img-tab" alt="<?php echo $popular['seotitle']; ?>"/>
                                        <?php } elseif (!empty($popular['video'])) { ?>                                
                                            <img src="<?php echo ('http://img.youtube.com/vi/' . $popular['video'] . '/0.jpg'); ?>" data-src="<?php echo ('http://img.youtube.com/vi/' . $popular['video'] . '/0.jpg'); ?>" class="img-tab" alt="<?php echo $popular['seotitle']; ?>">
                                        <?php } else { ?>
                                            <img src="<?php echo base_url('assets/images/no-image.jpg'); ?>" class="responsive-img"/>
                                        <?php } ?>
                                    </a>
                                </div>
                                <?php
                                $this->db->select('name');
                                $this->db->select('seotitle');
                                $this->db->from('post_category');
                                $this->db->where('id', $popular['category']);
                                $this->db->limit('5');
                                $query = $this->db->get();
                                {
                                    ?>
                                    <a href="<?php echo base_url('category/' . $query->row('seotitle') . ''); ?>">
                                        <span class="cat-label red darken-4">  
                                            <?php echo $query->row('name'); ?>
                                        </span>
                                    </a>
                                <?php } ?>
                                <div class="tab-text">
                                    <a href="<?php echo $popular_url; ?>" class="black-text">
                                        <?php echo word_limiter($popular['title'], 6); ?>
                                    </a>
                                </div>							
                                <div class="bx-usr-info">
                                    <?php
                                        if (file_exists('assets/member/' . $popular['id_reg'] . '/thumb/' . $users[$popular['id_reg']]['picture'])) {
                                            echo '<a href="' . base_url('profile/' . $popular['id_reg']) . '"><img class="circle usr-feat left" alt="' . $popular['id_reg']. '" src="' . base_url('assets/member/' . $popular['id_reg'] . '/thumb/' . $users[$popular['id_reg']]['picture']  . '') . '" ></a>';
                                        } else {
                                            echo '<a href="' . base_url('profile/' . $popular['id_reg']) . '"><img class="circle usr-feat left" alt="' . $popular['id_reg']. '" src="' . base_url('assets/images/no-foto.jpg') . '"></a>';
                                        }
                                    ?>
                                    <div class="auth-date grey-text lighten-5">
                                        <span class="auth-feat">
                                            <a href="<?php echo base_url('profile/' . $popular['id_reg'] . ''); ?>" class="grey-text lighten-5">
                                                <?php
                                                echo $users[$popular['id_reg']]['username'];
                                                ?>
                                            </a>
                                        </span>
                                        <div class="bx-date"><i class="material-icons">schedule</i><span class="feat-date"><?php echo date("d M Y", strtotime($popular['date'])); ?></span></div>
                                    </div>
                                    <div class="bx-sos right">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $popular_url; ?>" target="_blank" class="grey-text lighten-2"><i class="material-icons">share</i></a>
                                        <a href="#" class="grey-text lighten-2"><i class="material-icons">bookmark</i></a>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </li> 
<?php } ?>
                    </ul>
                    <!--e:tab popular-->
                </div>
                <!--tab recent
    <div id="recent" class="col s12 white z-depth-2">
        
        <ul class="tab-news"> 
                <?php
                foreach ($latest_new as $recent) {
                    $recent_url = base_url('read/' . $recent['id_post'] . '/' . $recent['seotitle']);
                    ?>
                        <li>
                            <div class="mask-tab left">
                                <a href="<?php echo $recent_url; ?>">
                    <?php if (!empty($recent['image'])) { ?>   
                                                <img src="<?php echo base_url('assets/picture/thumb/' . $recent['image'] . ''); ?>" data-src="<?php echo base_url('assets/picture/thumb/' . $recent['image'] . ''); ?>" class="responsive-img img-tab" alt="<?php echo $recent['seotitle']; ?>"/>
                    <?php } elseif (!empty($recent['video'])) { ?>                                
                                                <img src="<?php echo ('http://img.youtube.com/vi/' . $recent['video'] . '/0.jpg'); ?>" data-src="<?php echo ('http://img.youtube.com/vi/' . $recent['video'] . '/0.jpg'); ?>" class="responsive-img img-tab" alt="<?php echo $recent['seotitle']; ?>">
                    <?php } elseif (!file_exists($recent['image']) || !file_exists($recent['video'])) { ?>   
                                                <img src="<?php echo base_url('assets/images/no-image.jpg'); ?>" class="responsive-img"/>
                    <?php } else { ?>
                                                <img src="<?php echo base_url('assets/images/no-image.jpg'); ?>" class="responsive-img"/>
    <?php } ?>
                                </a>	
                            </div>
                    <?php
                    $this->db->select('name');
                    $this->db->select('seotitle');
                    $this->db->from('post_category');
                    $this->db->where('id', $recent['category']);
                    $query = $this->db->get();
                    {
                        ?>
                                        <a href="<?php echo base_url('category/' . $query->row('seotitle') . ''); ?>">
                                            <span class="cat-label red darken-4">  
                        <?php echo $query->row('name'); ?>
                                            </span>
                                        </a>
                    <?php } ?>	
                            <div class="tab-text">
                                <a href="<?php echo $recent_url; ?>" class="black-text">
    <?php echo word_limiter($recent['title'], 6); ?>
                                </a>
                            </div>
                            <div class="bx-usr-info">
                                <div class="auth-date grey-text lighten-5">
                                    <span class="auth-feat">
                                        <a href="<?php echo base_url('profile/' . $recent['id_reg'] . ''); ?>" class="grey-text darken-4">
    <?php echo $recent['editor']; ?>
                                        </a>
                                    </span>
                                    <div class="bx-date"><i class="material-icons">schedule</i><span class="feat-date"><?php echo date("d M Y", strtotime($recent['date'])); ?></span></div>
                                </div>
                                <div class="bx-sos right">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $recent_url; ?>" target="_blank" class="grey-text lighten-2"><i class="material-icons">share</i></a>
                                    <a href="#" class="grey-text lighten-2"><i class="material-icons">bookmark</i></a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </li> 
<?php } ?>
        </ul>
        
    </div>
                <!--e:tab recent-->
                <div id="top-review" class="col s12 white z-depth-2">
                    <!--tab recent-->
                    <ul class="tab-news">
                        <?php
                        foreach ($popular_post as $popular) {
                            $popular_url = base_url('read/' . $popular['id_post'] . '/' . $popular['seotitle']);
                            ?>
                            <li>
                                <div class="mask-tab left">
                                    <a href="<?php echo $popular_url; ?>">
                                        <?php if (!empty($popular['image']) && file_exists('assets/picture/thumb/' . $popular['image'])) { ?>   
                                            <img src="<?php echo base_url('assets/picture/thumb/' . $popular['image'] . ''); ?>" data-src="<?php echo base_url('assets/picture/thumb/' . $popular['image'] . ''); ?>" class="responsive-img img-tab" alt="<?php echo $popular['seotitle']; ?>"/>
                                        <?php } elseif (!empty($popular['video'])) { ?>                                
                                            <img src="<?php echo ('http://img.youtube.com/vi/' . $popular['video'] . '/0.jpg'); ?>" data-src="<?php echo ('http://img.youtube.com/vi/' . $popular['video'] . '/0.jpg'); ?>" class="responsive-img img-tab" alt="<?php echo $popular['seotitle']; ?>">
                                        
                                        <?php } else { ?>
                                            <img src="<?php echo base_url('assets/images/no-image.jpg'); ?>" class="responsive-img"/>
                                <?php } ?>
                                    </a>	
                                </div>
                                <?php
                                $this->db->select('name');
                                $this->db->select('seotitle');
                                $this->db->from('post_category');
                                $this->db->where('id', $popular['category']);

                                $query = $this->db->get();
                                {
                                    ?>
                                    <a href="<?php echo base_url('category/' . $query->row('seotitle') . ''); ?>">
                                        <span class="cat-label red darken-4">  
                                    <?php echo $query->row('name'); ?>
                                        </span>
                                    </a>
                                        <?php } ?>
                                <div class="tab-text">
                                    <a href="<?php echo $popular_url; ?>" class="black-text">
                                    <?php echo word_limiter($popular['title'], 5); ?>
                                    </a>
                                </div>
                                <div class="bx-usr-info">
                                    <?php

                                        if (file_exists('assets/member/' . $popular['id_reg'] . '/thumb/' . $users[$popular['id_reg']]['picture'])) {
                                            echo '<a href="' . base_url('profile/' . $popular['id_reg']) . '"><img class="circle usr-feat left" alt="' . $popular['id_reg']. '" src="' . base_url('assets/member/' . $popular['id_reg'] . '/thumb/' . $users[$popular['id_reg']]['picture'] . '') . '" ></a>';
                                        } else {
                                            echo '<a href="' . base_url('profile/' . $popular['id_reg']) . '"><img class="circle usr-feat left" alt="' . $popular['id_reg']. '" src="' . base_url('assets/images/no-foto.jpg') . '"></a>';
                                        }
                                    ?>
                                    <div class="auth-date grey-text lighten-5">
                                        <span class="auth-feat">
                                            <a href="<?php echo base_url('profile/' . $popular['id_reg'] . ''); ?>" class="grey-text lighten-5">
                                                <?php
                                                echo $users[$popular['id_reg']]['username'];
                                                ?>
                                            </a>
                                        </span>
                                        <div class="bx-date"><i class="material-icons">schedule</i><span class="feat-date"><?php echo hitung_mundur(strtotime($popular['date'])); ?></span></div>
                                    </div>
                                    <div class="bx-sos right">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $popular_url; ?>" target="_blank" class="grey-text lighten-2"><i class="material-icons">share</i></a>
                                        <a href="#" class="grey-text lighten-2"><i class="material-icons">bookmark</i></a>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </li> 
<?php } ?>
                    </ul> 
                </div>
            </div> 
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        getpost(0);
        $("#loadmorebtn").click(function (e) {
            e.preventDefault();
            var page = $(this).data('val');
            getpost(page);
        });
    });

    var getpost = function (page) {
        $("#loader").show();
        $.ajax({
            url: "<?php echo base_url('page/loadmorehome'); ?>",
            type: 'GET',
            data: {page: page}
        }).done(function (response) {
            $("#loadmorehome").append(response);
            $("#loader").hide();
            $('#loadmorebtn').data('val', ($('#loadmorebtn').data('val') + 1));
            scroll();
        });
    };
    var scroll = function () {
        $('html, body').animate({
            scrollTop: $('#loadmorebtn').offset().top
        }, 1000);
    };
</script>