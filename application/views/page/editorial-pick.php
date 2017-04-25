<div class="blue-grey darken-4">
    <div class="section container"> 
		<div class="center lb-ads1">
			<script type='text/javascript'><!--//<![CDATA[
   var m3_u = (location.protocol=='https:'?'https://revive.consumedmedia.id/www/delivery/ajs.php':'http://revive.consumedmedia.id/www/delivery/ajs.php');
   var m3_r = Math.floor(Math.random()*99999999999);
   if (!document.MAX_used) document.MAX_used = ',';
   document.write ("<scr"+"ipt type='text/javascript' src='"+m3_u);
   document.write ("?zoneid=69");
   document.write ('&amp;cb=' + m3_r);
   if (document.MAX_used != ',') document.write ("&amp;exclude=" + document.MAX_used);
   document.write (document.charset ? '&amp;charset='+document.charset : (document.characterSet ? '&amp;charset='+document.characterSet : ''));
   document.write ("&amp;loc=" + escape(window.location));
   if (document.referrer) document.write ("&amp;referer=" + escape(document.referrer));
   if (document.context) document.write ("&context=" + escape(document.context));
   if (document.mmm_fo) document.write ("&amp;mmm_fo=1");
   document.write ("'><\/scr"+"ipt>");
//]]>--></script><noscript><a href='http://revive.consumedmedia.id/www/delivery/ck.php?n=ac32432f&amp;cb=INSERT_RANDOM_NUMBER_HERE' target='_blank'><img src='http://revive.consumedmedia.id/www/delivery/avw.php?zoneid=69&amp;cb=INSERT_RANDOM_NUMBER_HERE&amp;n=ac32432f' border='0' alt='' /></a></noscript>


        </div>
        <div class="row">
            <div class="bx-title">
                <h2 class="stand-title st-1 white-text"><span>Editor Pick</span></h2>
            </div> 
        </div>
        <div class="row mdivh">
            <?php
            foreach ($editorial_pick as $pick) {
                $pick_url = base_url('read/' . $pick['id_post'] . '/' . $pick['seotitle']);
                ?>
                <div class="col s12 m3">
                    <div class="card-tm1 white">
                        <div class="feat-bx-sm"> 						
                            <?php if (!empty($pick['image']) && file_exists('assets/picture/thumb/' . $pick['image'])) { ?>   
                                <img src="<?php echo base_url('assets/picture/thumb/' . $pick['image'] . ''); ?>" data-src="<?php echo base_url('assets/picture/thumb/' . $pick['image'] . ''); ?>" class="img-card " alt="<?php echo $pick['seotitle']; ?>"/>
                            <?php } elseif (!empty($pick['video'])) { ?>                                
                                <img src="<?php echo ('http://img.youtube.com/vi/' . $pick['video'] . '/0.jpg'); ?>" data-src="<?php echo ('http://img.youtube.com/vi/' . $pick['video'] . '/0.jpg'); ?>" class="img-card " alt="<?php echo $pick['seotitle']; ?>">
                            <?php } else { ?>
                                <img src="<?php echo base_url('assets/images/no-image.jpg'); ?>" class="featimg "/>
                            <?php } ?>

                            <div class="info-cnt white-text">
                                <span><i class="material-icons">comment</i> 2K</span>
                                <span><i class="material-icons">share</i> 1K</span>
                                <span><i class="material-icons">visibility</i> <?php echo $pick['hits']; ?></span>
                            </div>
                            <div class="bx-sdw">
                                <?php
                                $this->db->select('name');
                                $this->db->select('seotitle');
                                $this->db->from('post_category');
                                $this->db->where('id', $pick['category']);
                                $query = $this->db->get(); {
                                    ?>
                                    <a href="<?php echo base_url('category/' . $query->row('seotitle') . ''); ?>">
                                        <span class="cat-label red darken-4">  
                                            <?php echo $query->row('name'); ?>
                                        </span>
                                    </a>
                                <?php } ?>					
                                <div class="bx-text-feat">
                                    <a href="<?php echo $pick_url; ?>">
                                        <h1 class="stand-title white-text"> 
                                            <?php echo word_limiter($pick['title'], 12); ?>    
                                        </h1>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="bx-usr-info">
                            <?php
                                if (file_exists('assets/member/' . $pick['id_reg'].'/thumb/'. $users[$pick['id_reg']]['picture'])) {
                                    echo '<a href="' . base_url('profile/' . $pick['id_reg']) . '"><img class="circle usr-feat left" src="' . base_url('assets/member/' . $pick['id_reg'] . '/thumb/' . $users[$pick['id_reg']]['picture'] . '') . '" ></a>';
                                } else {
                                    echo '<a href="' . base_url('profile/' . $pick['id_reg']) . '"><img class="circle usr-feat left" src="' . base_url('assets/images/no-foto.jpg') . '"></a>';
                                }
                            ?>                         
                            <div class="auth-date grey-text lighten-5 ">
                                <span class="auth-feat">
                                    <a href="<?php echo base_url('profile/' . $pick['id_reg'] . ''); ?>" class="grey-text lighten-5">
                                        <?php
                                        echo $users[$pick['id_reg']]['username'];
                                        ?>
                                    </a>
                                </span>
                                <div class="bx-date"><i class="material-icons">schedule</i>
                                    <span class="feat-date"><?php echo date("d M Y", strtotime($pick['date'])); ?></span>
                                </div>
                            </div>
                            <div class="bx-sos right">
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $pick_url; ?>" class="grey-text lighten-2" target="_blank"><i class="material-icons">share</i></a>
                                <a href="#" class="grey-text lighten-2"><i class="material-icons">bookmark</i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div> 
                    </div>
                </div>
            <?php } ?>
        </div><!--end row-->
    </div>	
</div>					