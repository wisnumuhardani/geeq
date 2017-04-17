<?=$head?>
<?=$navbar?>
<div class="parallax-container">
    <div class="parallax">
        <img src="<?php echo base_url('assets/images/category/' . $image_category . ''); ?>" alt="<?php echo $seo_category; ?>"> 
    </div>
</div>
<div class="blue-grey lighten-3">
    <div class="section container">
        <div class="row">
            <div class="col s12 m8 l8">
                <div class="row">
                    <div class="bx-title">
                        <h2 class="stand-title st-1"><span><?php echo $name_cat; ?></span></h2>
                    </div>
                    <?php
                    foreach ($results as $val) {
                        $urllink = base_url('read/' . $val->id_post . '/' . $val->seotitle);
                        ?>
                        <div class="col s12 m4 l4">
                            <!--card-->
                            <div class="card-tm1 white">
                                <div class="feat-bx-sm">									
                                    <?php if (!empty($val->image) && file_exists('assets/picture/thumb/' . $val->image)) { ?>   
                                        <img src="<?php echo base_url('assets/picture/thumb/' . $val->image . ''); ?>" data-src="<?php echo base_url('assets/picture/thumb/' . $val->image . ''); ?>" class="img-card" alt="<?php echo $val->seotitle; ?>"/>
                                    <?php } elseif (!empty($val->video)) { ?>                                
                                        <img src="<?php echo ('http://img.youtube.com/vi/' . $val->video . '/0.jpg'); ?>" data-src="<?php echo ('http://img.youtube.com/vi/' . $val->video . '/0.jpg'); ?>" class="img-card" alt="<?php echo $val->seotitle; ?>">
                                    
                                    <?php } else { ?>
                                        <img src="<?php echo base_url('assets/images/no-image.jpg'); ?>" class="img-card"/>
                                    <?php } ?>									
                                    <div class="info-cnt white-text">
                                        <span><i class="material-icons">comment</i> 2K</span>
                                        <span><i class="material-icons">share</i> 1K</span>
                                        <span><i class="material-icons">visibility</i> <?php echo $val->hits; ?></span>
                                    </div>								
                                    <div class="bx-sdw">										
                                        <div class="bx-text-feat">
                                            <a href="<?php echo $urllink; ?>">
                                                <h1 class="stand-title white-text">
                                                    <?php echo $name_cat; ?> | <?php echo word_limiter($val->title, 6); ?>
                                                </h1>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="bx-usr-info">
                                    <?php

                                        if (file_exists('assets/member/' . $val->id_reg . '/thumb/' . $users[$val->id_reg]['picture'] )) {
                                            echo '<a href="' . base_url('profile/' . $val->id_reg) . '"><img class="circle usr-feat left" alt="' . $val->id_reg . '" src="' . base_url('assets/member/' . $val->id_reg . '/thumb/' . $users[$val->id_reg]['picture'] . '') . '" ></a>';
                                        } else {
                                            echo '<a href="' . base_url('profile/' . $val->id_reg) . '"><img class="circle usr-feat left" alt="' . $val->id_reg . '" src="' . base_url('assets/images/no-foto.jpg') . '"></a>';
                                        }

                                    ?>
                                    <div class="auth-date grey-text lighten-5">
                                        <span class="auth-feat">
                                            <a href="<?php echo base_url('profile/' . $val->id_reg . ''); ?>" class="grey-text lighten-5">
                                                <?php

                                                echo $users[$val->id_reg]['username'];
                                                ?>
                                            </a>
                                        </span>
                                        <div class="bx-date"><i class="material-icons">schedule</i><span class="feat-date"><?php echo hitung_mundur(strtotime($val->date)); ?> </span></div>
                                    </div>
                                    <div class="bx-sos right">
                                        <a href="#" class="grey-text lighten-2"><i class="material-icons">share</i></a>
                                        <a href="#" class="grey-text lighten-2"><i class="material-icons">bookmark</i></a>
                                    </div>
                                </div> 
                            </div>
                            <!--E:card-->
                        </div> 
                    <?php } ?>
                </div> 
                <div class="center">
                    <ul class="pagination"> 
                        <li><a href="#!"><?php echo $pagination; ?></a></li> 
                    </ul> 
                </div> 
            </div>


            <div class="col l4 s12 right-top-wp1">
                <div class="sc-ads1 center">
                    <img src="<?php echo base_url('assets/images/300x250.jpeg'); ?>"> 

                </div>
                <ul id="tabs-popular" class="tabs z-depth-1">
                    <li class="tab col s4"><a class="black-text" href="#popular">POPULAR</a></li>
                    <li class="tab col s4"><a class="black-text" href="#recent">RECENT</a></li>
                    <li class="tab col s4"><a class="black-text" href="#top-review">TOP REVIEW</a></li>
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
                                            <img src="<?php echo base_url('assets/images/no-image.jpg'); ?>" class="img-tab"/>
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
                                <div class="tab-text black-text">
                                    <a href="<?php echo $popular_url; ?>" class="black-text">
                                    <?php echo word_limiter($popular['title'], 5); ?>
                                    </a>
                                </div>							
                                <div class="bx-usr-info">
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
                    <!--e:tab popular-->
                </div>
                <div id="recent" class="col s12 white z-depth-2">
                    <!--tab recent-->
                    <ul class="tab-news"> 
                        <?php
                        foreach ($latest_new as $recent) {
                            $recent_url = base_url('read/' . $recent['id_post'] . '/' . $recent['seotitle']);
                            ?>
                            <li>
                                <div class="mask-tab left">
                                    <a href="<?php echo $recent_url; ?>">
                                        <?php if (!empty($recent['image']) && file_exists('assets/picture/thumb/' . $recent['image'])) { ?>   
                                            <img src="<?php echo base_url('assets/picture/thumb/' . $recent['image'] . ''); ?>" data-src="<?php echo base_url('assets/picture/thumb/' . $recent['image'] . ''); ?>" class="img-tab" alt="<?php echo $recent['seotitle']; ?>"/>
                                        <?php } elseif (!empty($recent['video'])) { ?>                                
                                            <img src="<?php echo ('http://img.youtube.com/vi/' . $recent['video'] . '/0.jpg'); ?>" data-src="<?php echo ('http://img.youtube.com/vi/' . $recent['video'] . '/0.jpg'); ?>" class="img-tab" alt="<?php echo $recent['seotitle']; ?>">
                                        <?php } else { ?>
                                            <img src="<?php echo base_url('assets/images/no-image.jpg'); ?>" class="img-tab"/>
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
                                <div class="tab-text black-text">
                                    <a href="<?php echo $recent_url; ?>" class="black-text">
                                    <?php echo word_limiter($recent['title'], 5); ?>
                                    </a>
                                </div>
                                <div class="bx-usr-info">
                                    <div class="auth-date grey-text lighten-5">
                                        <span class="auth-feat">
                                            <a href="<?php echo base_url('profile/' . $recent['id_reg'] . ''); ?>" class="grey-text lighten-5">
                                                <?php

                                                echo  $users[$recent['id_reg']]['username'];
                                                ?>
                                            </a>
                                        </span>
                                        <div class="bx-date"><i class="material-icons">schedule</i><span class="feat-date"><?php echo hitung_mundur(strtotime($recent['date'])); ?></span></div>
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
                    <!--e:tab recent-->
                </div>
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
                                            <img src="<?php echo base_url('assets/picture/thumb/' . $popular['image'] . ''); ?>" data-src="<?php echo base_url('assets/picture/thumb/' . $popular['image'] . ''); ?>" class="img-tab" alt="<?php echo $popular['seotitle']; ?>"/>
                                        <?php } elseif (!empty($popular['video'])) { ?>                                
                                            <img src="<?php echo ('http://img.youtube.com/vi/' . $popular['video'] . '/0.jpg'); ?>" data-src="<?php echo ('http://img.youtube.com/vi/' . $popular['video'] . '/0.jpg'); ?>" class="img-tab" alt="<?php echo $popular['seotitle']; ?>">
                                        <?php } else { ?>
                                            <img src="<?php echo base_url('assets/images/no-image.jpg'); ?>" class="img-tab"/>
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
                                <div class="tab-text black-text">
                                    <a href="<?php echo $popular_url; ?>" class="black-text">
                                        <?php echo word_limiter($popular['title'], 5); ?>
                                    </a>
                                </div>
                                <div class="bx-usr-info">
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
<?=$footer?>		