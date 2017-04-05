<div class="grey lighten-2">
    <div class="section container">
        <div class="row">
            <div class="det-art col s12 m8 l8">
                <div class="card-tm1 white">
                    <div class="mask-det">                         
                        <?php if ($content[0]['image'] != "") { ?>
                            <img class="responsive-img" src="<?php echo base_url('assets/picture/' . $content[0]['image'] . ''); ?>"/>
                        <?php } elseif (($content[0]['video'] != "")) { ?>
                            <iframe width="100%" height="550" src="https://www.youtube.com/embed/<?php echo $content[0]['video']; ?>" frameborder="0" allowfullscreen></iframe> 
                        <?php } else { ?>
                            <img class="responsive-img" src="<?php echo base_url('assets/images/no-image.jpg') ?>"/>
                        <?php } ?>  
                    </div>
                    <div class="det-cont">
                        <h1 class="stand-title">
                            <?php echo $content[0]['title']; ?>
                        </h1>
                        <div class="bx-usr-info"> 
                            <?php
                            $this->db->select('id_reg');
                            $this->db->select('picture');
                            $this->db->from('users');
                            $this->db->where('id_reg', $content[0]['id_reg']);
                            $query = $this->db->get();
                            if ($query->row('picture') != "") {
                                if (!file_exists($query->row('picture'))) {
                                    echo '<a href="' . base_url('profile/' . $query->row('id_reg')) . '"><img class="circle usr-feat left" src="' . base_url('assets/member/' . $query->row('id_reg') . '/thumb/' . $query->row('picture') . '') . '" ></a>';
                                } else {
                                    echo '<a href="' . base_url('profile/' . $query->row('id_reg')) . '"><img class="circle usr-feat left" src="' . base_url('assets/images/no-foto.jpg') . '"></a>';
                                }
                            } else {
                                echo '<a href="' . base_url('profile/' . $query->row('id_reg')) . '"><img class="circle usr-feat left" src="' . base_url('assets/images/no-foto.jpg') . '"></a>';
                            }
                            ?>							
                            <div class="auth-date grey-text lighten-5">
                                <span class="auth-feat">
                                    <a href="<?php echo base_url('profile/' . $content[0]['id_reg'] . ''); ?>" class="teal-text">
                                        <?php echo $content[0]['editor']; ?>
                                    </a>
                                </span>
                                <div class="bx-date"><i class="material-icons">schedule</i><span class="feat-date"><?php echo hitung_mundur(strtotime($content[0]['date'])); ?> </span></div>
                            </div>
                            <div class="bx-sos right">
                                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url('read/' . $content[0]['id_post'] . '/' . $content[0]['seotitle'] . ''); ?>" class="grey-text lighten-2"><i class="material-icons">share</i></a>
                                <a href="#" class="grey-text lighten-2"><i class="material-icons">bookmark</i></a>
                            </div>
                        </div> 
                        <div class="p-art">
                            <?php echo $content[0]['content']; ?>
                            <?php if (!empty($content[0]['tag'])) { ?>                                                            
                                <i class="fa fa-tags"></i>  
                                <?php
                                $tagss = explode(',', $content[0]['tag']);
                                foreach ($tagss as $tag) {
                                    $this->db->select('*');
                                    $this->db->from('tags');
                                    $this->db->where('id', $tag);
                                    $query = $this->db->get();
                                    foreach ($query->result() as $row) {
                                        echo '<a href="' . base_url('tag?keyword=' . $row->seotitle . '') . '"><span class="chip">' . $row->name . '</span></a>';
                                    }
                                }
                                ?>
                                <br><br>
                            <?php } ?>    
                            <div class="row">
                                <form>
                                    <div class="col s12">	
                                        <h6>Tuliskan Komentar Anda</h6>
                                    </div>
                                    <div class="input-field col s12 l6">
                                        <i class="material-icons prefix">face</i>
                                        <input placeholder="Name" id="icon_prefix" type="text" class="validate"> 
                                    </div>
                                    <div class="input-field col s12 l6">
                                        <i class="material-icons prefix">mail_outline</i>
                                        <input placeholder="Email" id="email" type="email" class="validate"> 
                                    </div>
                                    <div class="input-field col s12">
                                        <i class="material-icons">create</i>
                                        <textarea placeholder="Comment" id="comment" class="materialize-textarea" data-length="255" length="255"></textarea> 
                                    </div>
                                    <div class="col s6">
                                        <button class="btn" type="submit">Submit Comment</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end col8-->


            <!-- SIDEBAR -->
            <div class="col l4 s12 right-top-wp1"> 
                <div class="newsletter card-tm1 black ">
                    <h4 class="white-text">Subscribe to RSS Feeds</h4> 

                    <form id="subscribe">
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                        <div class="input-field col s12">
                            <i class="material-icons white-text prefix">email</i>
                            <input id="icon_prefix" type="email" name="email" required class="validate white-text">  
                            <label for="icon_prefix">Email</label>
                        </div>					
                        <button class="waves-effect waves-light btn right" type="submit"><i class="material-icons right">send</i>Subscribe</button>
                    </form> 

                    <div class="clearfix"></div>
                    <p class="white-text">Get all latest content delivered to your email a few times a month.</p>
                </div>
                <div class="sc-ads1 center">
                    <img src="<?php echo base_url('assets/images/300x250.jpeg'); ?>"> 
                </div>
                <ul id="tabs-popular" class="tabs z-depth-1">
                    <li class="tab col s4"><a class="teal-text" href="#popular">POPULAR</a></li>
                    <li class="tab col s4"><a class="teal-text" href="#recent">RECENT</a></li>
                    <li class="tab col s4"><a class="teal-text" href="#top-review">TOP REVIEW</a></li>
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
                                        <?php if (!empty($popular['image'])) { ?>   
                                            <img src="<?php echo base_url('assets/picture/thumb/' . $popular['image'] . ''); ?>" data-src="<?php echo base_url('assets/picture/thumb/' . $popular['image'] . ''); ?>" class="responsive-img" alt="<?php echo $popular['seotitle']; ?>"/>
                                        <?php } elseif (!empty($popular['video'])) { ?>                                
                                            <img src="<?php echo ('http://img.youtube.com/vi/' . $popular['video'] . '/0.jpg'); ?>" data-src="<?php echo ('http://img.youtube.com/vi/' . $popular['video'] . '/0.jpg'); ?>" class="responsive-img" alt="<?php echo $popular['seotitle']; ?>">
                                        <?php } elseif (!file_exists($popular['image']) || !file_exists($popular['video'])) { ?>   
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
                                $this->db->where('id', $popular['category']);
                                $query = $this->db->get(); {
                                    ?>
                                    <a href="<?php echo base_url('category/' . $query->row('seotitle') . ''); ?>">
                                        <span class="cat-label teal">  
                                            <?php echo $query->row('name'); ?>
                                        </span>
                                    </a>
                                <?php } ?>							

                                <div class="tab-text black-text">
                                    <a href="<?php echo $popular_url; ?>">
                                        <?php echo word_limiter($popular['title'], 5); ?>
                                    </a>
                                </div>							
                                <div class="bx-usr-info">
                                    <div class="auth-date grey-text lighten-5">
                                        <span class="auth-feat">
                                            <a href="<?php echo base_url('profile/' . $popular['id_reg'] . ''); ?>" class="teal-text">
                                                <?php echo $popular['editor']; ?>
                                            </a>
                                        </span>
                                        <div class="bx-date"><i class="material-icons">schedule</i><span class="feat-date"><?php echo hitung_mundur(strtotime($popular['date'])); ?></span></div>
                                    </div>
                                    <div class="bx-sos right">
                                        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $popular_url; ?>" class="grey-text lighten-2"><i class="material-icons">share</i></a>
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
                                        <?php if (!empty($recent['image'])) { ?>   
                                            <img src="<?php echo base_url('assets/picture/thumb/' . $recent['image'] . ''); ?>" data-src="<?php echo base_url('assets/picture/thumb/' . $recent['image'] . ''); ?>" class="responsive-img" alt="<?php echo $recent['seotitle']; ?>"/>
                                        <?php } elseif (!empty($recent['video'])) { ?>                                
                                            <img src="<?php echo ('http://img.youtube.com/vi/' . $recent['video'] . '/0.jpg'); ?>" data-src="<?php echo ('http://img.youtube.com/vi/' . $recent['video'] . '/0.jpg'); ?>" class="responsive-img" alt="<?php echo $recent['seotitle']; ?>">
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
                                $query = $this->db->get(); {
                                    ?>
                                    <a href="<?php echo base_url('category/' . $query->row('seotitle') . ''); ?>">
                                        <span class="cat-label teal">  
        <?php echo $query->row('name'); ?>
                                        </span>
                                    </a>
    <?php } ?>	
                                <div class="tab-text black-text">
                                    <a href="<?php echo $recent_url; ?>">
    <?php echo word_limiter($recent['title'], 5); ?>
                                    </a>
                                </div>
                                <div class="bx-usr-info">
                                    <div class="auth-date grey-text lighten-5">
                                        <span class="auth-feat"><a href="profile.php" class="teal-text"><?php echo $recent['editor']; ?></a></span>
                                        <div class="bx-date"><i class="material-icons">schedule</i><span class="feat-date"><?php echo hitung_mundur(strtotime($recent['date'])); ?></span></div>
                                    </div>
                                    <div class="bx-sos right">
                                        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $recent_url; ?>" class="grey-text lighten-2"><i class="material-icons">share</i></a>
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
    <?php if (!empty($popular['image'])) { ?>   
                                            <img src="<?php echo base_url('assets/picture/thumb/' . $popular['image'] . ''); ?>" data-src="<?php echo base_url('assets/picture/thumb/' . $popular['image'] . ''); ?>" class="responsive-img" alt="<?php echo $popular['seotitle']; ?>"/>
                                        <?php } elseif (!empty($popular['video'])) { ?>                                
                                            <img src="<?php echo ('http://img.youtube.com/vi/' . $popular['video'] . '/0.jpg'); ?>" data-src="<?php echo ('http://img.youtube.com/vi/' . $popular['video'] . '/0.jpg'); ?>" class="responsive-img" alt="<?php echo $popular['seotitle']; ?>">
                                        <?php } elseif (!file_exists($popular['image']) || !file_exists($popular['video'])) { ?>   
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
    $this->db->where('id', $popular['category']);
    $query = $this->db->get(); {
        ?>
                                    <a href="<?php echo base_url('category/' . $query->row('seotitle') . ''); ?>">
                                        <span class="cat-label teal">  
                                    <?php echo $query->row('name'); ?>
                                        </span>
                                    </a>
                                        <?php } ?>
                                <div class="tab-text black-text">
                                    <a href="<?php echo $popular_url; ?>">
                                <?php echo word_limiter($recent['title'], 5); ?>
                                    </a>
                                </div>
                                <div class="bx-usr-info">
                                    <div class="auth-date grey-text lighten-5">
                                        <span class="auth-feat"><a href="profile.php" class="teal-text"><?php echo $popular['editor']; ?></a></span>
                                        <div class="bx-date"><i class="material-icons">schedule</i><span class="feat-date"><?php echo hitung_mundur(strtotime($popular['date'])); ?></span></div>
                                    </div>
                                    <div class="bx-sos right">
                                        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $popular_url; ?>" class="grey-text lighten-2"><i class="material-icons">share</i></a>
                                        <a href="#" class="grey-text lighten-2"><i class="material-icons">bookmark</i></a>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </li> 
<?php } ?>	
                    </ul>
                    <!--e:tab recent-->
                </div>
            </div>
            <!-- END SIDEBAR-->
        </div>
    </div>  
</div>			