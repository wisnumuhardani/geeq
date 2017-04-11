<?=$head?>
<?=$navbar?>
<div class="blue-grey lighten-3">
    <div class="section container">
        <div class="row">
            <div class="det-art col s12 m8 l8 ">
                <div class="card-tm1 white z-depth-0">

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
                                    <a href="<?php echo base_url('profile/' . $content[0]['id_reg'] . ''); ?>" class="grey-text lighten-5">
                                        <?php
                                        $this->db->select('id_reg');
                                        $this->db->select('username');
                                        $this->db->from('users');
                                        $this->db->where('id_reg', $content[0]['id_reg']);
                                        $query = $this->db->get();
                                        echo $query->row('username');
                                        ?>
                                    </a>
                                </span>
                        <div class="bx-date"><!--<i class="material-icons">schedule</i>--><span class="feat-date"><?php echo date("d M Y", strtotime($content[0]['date'])); ?> </span></div>
                            </div>
                            <div class="bx-sos right">
                                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url('read/' . $content[0]['id_post'] . '/' . $content[0]['seotitle'] . ''); ?>" class="grey-text lighten-2"><i class="material-icons">share</i></a>
                                <a href="#" class="grey-text lighten-2"><i class="material-icons">bookmark</i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div> 




                        <div class="mask-det">                         
                            <?php if ($content[0]['image'] != "") { ?>
                                <img class="img-tab" src="<?php echo base_url('assets/picture/' . $content[0]['image'] . ''); ?>"/>
                            <?php } elseif (($content[0]['video'] != "")) { ?>
                                <iframe width="100%" height="550" src="https://www.youtube.com/embed/<?php echo $content[0]['video']; ?>" frameborder="0" allowfullscreen></iframe> 
                            <?php } else { ?>
                                <img class="img-tab" src="<?php echo base_url('assets/images/no-image.jpg') ?>"/>
                            <?php } ?>  
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
                                <div class="col s12">
                                    <div class="reaction-box">
                                            <div class="reac-title" style="margin:0;">Bagaimana reaksi Anda tentang artikel ini?</div>

                                        <div class="reaction">
                                            <form id="loves">
                                                <input hidden type="text" name="id_post" value="<?php echo $content[0]['id_post']; ?>">
                                                <input hidden name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                                <div  class="reaction-icon">
                                                    <img src="<?= base_url('assets/images/icon/suka-banget_01.png') ?>" alt="rofl">
                                                    <div class="ttl-reac blue-grey darken-4 white-text"><?= $love*100/100; ?>%
                                                    <span>Suka Banget</span></div>
                                                </div>
                                            </form>
                                            <form id="smile">
                                                <input hidden type="text" name="id_post" value="<?php echo $content[0]['id_post']; ?>">
                                                <input hidden name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                                <div class="reaction-icon">
                                                    <img src="<?= base_url('assets/images/icon/suka_01.png') ?>" alt="smile">
												 <div class="ttl-reac blue-grey darken-4 white-text"><?= $smile *100/100; ?>%
                                                    <span>Suka</span></div>
                                                </div>
                                            </form>
                                            <form id="rofl">
                                                <input hidden type="text" name="id_post" value="<?php echo $content[0]['id_post']; ?>">
                                                <input hidden name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                                <div  class="reaction-icon">
                                                    <img src="<?= base_url('assets/images/icon/biasa-aja_01.png') ?>" alt="rofl">
												<div class="ttl-reac blue-grey darken-4 white-text"><?= $rofl *100/100; ?>%
                                                    <span>Biasa Aja</span></div>
                                                </div>
                                            </form>

                                            <form id="sad">
                                                <input hidden type="text" name="id_post" value="<?php echo $content[0]['id_post']; ?>">
                                                <input hidden name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                                <div class="reaction-icon">
                                                    <img src="<?= base_url('assets/images/icon/kecewa_01.png') ?>" alt="sad">
												 <div class="ttl-reac blue-grey darken-4 white-text"><?= $sad *100/100; ?>%
                                                    <span>Sedih</span></div>
                                                </div>
                                            </form>
                                            <form id="disappointed">
                                                <input hidden type="text" name="id_post" value="<?php echo $content[0]['id_post']; ?>">
                                                <input hidden name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                                <div class="reaction-icon">
                                                    <img src="<?= base_url('assets/images/icon/sedih_01.png') ?>" alt="disappointed">
												 <div class="ttl-reac blue-grey darken-4 white-text"><?= $disappointed *100/100; ?>%
                                                    <span>Kecewa</span></div>
                                                </div>
                                            </form>                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 bx-comment">

                                    <a class="btn waves-effect waves-light z-depth-0 blue-grey darken-3 btn-comment">
									<?= $total_comment ?> Komentar
								  </a>

                                    <div id="bx-comment" style="display:none;">
                                        <h5>
                                            Komentar 
                                            <small><?= $total_comment ?> Komentar </small>
                                        </h5> 
                                        <hr>
                                        <form id="comment_form" action="<?php echo base_url('page/add_comment/' . $content[0]['id_post'] . '') ?>" method='post'>
                                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                            <div class="row">
                                                <div class="input-group col l6 s12">
                                                    <label for="comment_name">Name:</label>
                                                    <input type="text" required name="comment_name" id='name' value="<?= set_value("comment_name") ?>"/>
                                                </div>
                                                <div class="input-group col l6 s12">
                                                    <label for="email">E-mail :</label>
                                                    <input type="text" name="comment_email" value="<?= set_value("comment_email") ?>" id='email'/>
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <label for="comment">Comment :</label>
                                                <textarea class="materialize-textarea" name="comment_body" value="<?= set_value("comment_body") ?>" id="comment"></textarea>
                                            </div>
                                            <input hidden name='parent_id' value="0" id='parent_id'/>
                                            <input hidden name='id_post' value="<?= $content[0]['id_post'] ?>" id='parent_id'/>
                                            <div id='submit_button'>
                                                <input class="btn waves-effect waves-light z-depth-0 blue-grey darken-3 " type="submit" name="submit" value="Kirim Komentar"/>
                                            </div>
                                        </form>
                                        <hr>                           
                                        <?php echo $comments; ?>
                                        <hr>    
                                    </div><!--bxcomment-->  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end col8-->


            <!-- SIDEBAR -->
            <div class="col l4 s12 right-top-wp1"> 
                <div class="sc-ads1 center">
                    <img src="<?php echo base_url('assets/banner/mr-300x250.jpeg'); ?>"> 
                </div>
                <div class="newsletter card-tm1 black ">
                    <h4 class="white-text">Subscribe to RSS Feeds</h4> 

                    <form id="subscribe">
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                        <div class="input-field col s12">
                            <i class="material-icons white-text prefix">email</i>
                            <input id="icon_prefix" type="email" name="email" required class="validate white-text">  
                            <label for="icon_prefix">Email</label>
                        </div>					
                        <button class="waves-effect waves-light btn right red darken-4" type="submit"><i class="material-icons right">send</i>Subscribe</button>
                    </form> 

                    <div class="clearfix"></div>
                    <p class="white-text">Get all latest content delivered to your email a few times a month.</p>
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
                                        <?php if (!empty($popular['image'])) { ?>   
                                            <img src="<?php echo base_url('assets/picture/thumb/' . $popular['image'] . ''); ?>" data-src="<?php echo base_url('assets/picture/thumb/' . $popular['image'] . ''); ?>" class="img-tab" alt="<?php echo $popular['seotitle']; ?>"/>
                                        <?php } elseif (!empty($popular['video'])) { ?>                                
                                            <img src="<?php echo ('http://img.youtube.com/vi/' . $popular['video'] . '/0.jpg'); ?>" data-src="<?php echo ('http://img.youtube.com/vi/' . $popular['video'] . '/0.jpg'); ?>" class="img-tab" alt="<?php echo $popular['seotitle']; ?>">
                                        <?php } elseif (!file_exists($popular['image']) || !file_exists($popular['video'])) { ?>   
                                            <img src="<?php echo base_url('assets/images/no-image.jpg'); ?>" class="img-tab"/>
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

                                <div class="tab-text">
                                    <a href="<?php echo $popular_url; ?>" class="black-text">
                                <?php echo word_limiter($popular['title'], 10); ?>
                                    </a>
                                </div>							
                                <div class="bx-usr-info">
                                    <?php
                                    $this->db->select('id_reg');
                                    $this->db->select('picture');
                                    $this->db->from('users');
                                    $this->db->where('id_reg', $popular['id_reg']);
                                    $query = $this->db->get();
                                    if ($query->row('picture') != "") {
                                        if (!file_exists($query->row('picture'))) {
                                            echo '<a href="' . base_url('profile/' . $query->row('id_reg')) . '"><img class="circle usr-feat left" alt="' . $query->row('id_reg') . '" src="' . base_url('assets/member/' . $query->row('id_reg') . '/thumb/' . $query->row('picture') . '') . '" ></a>';
                                        } else {
                                            echo '<a href="' . base_url('profile/' . $query->row('id_reg')) . '"><img class="circle usr-feat left" alt="' . $query->row('id_reg') . '" src="' . base_url('assets/images/no-foto.jpg') . '"></a>';
                                        }
                                    } else {
                                        echo '<a href="' . base_url('profile/' . $query->row('id_reg')) . '"><img class="circle usr-feat left" alt="' . $query->row('id_reg') . '" src="' . base_url('assets/images/no-foto.jpg') . '"></a>';
                                    }
                                    ?>
                                    <div class="auth-date grey-text lighten-5">
                                        <span class="auth-feat">
                                            <a href="<?php echo base_url('profile/' . $popular['id_reg'] . ''); ?>" class="grey-text lighten-5">
                                                <?php
                                                $this->db->select('id_reg');
                                                $this->db->select('username');
                                                $this->db->from('users');
                                                $this->db->where('id_reg', $popular['id_reg']);
                                                $query = $this->db->get();
                                                echo $query->row('username');
                                                ?>
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
                                            <img src="<?php echo base_url('assets/picture/thumb/' . $recent['image'] . ''); ?>" data-src="<?php echo base_url('assets/picture/thumb/' . $recent['image'] . ''); ?>" class="img-tab" alt="<?php echo $recent['seotitle']; ?>"/>
                                        <?php } elseif (!empty($recent['video'])) { ?>                                
                                            <img src="<?php echo ('http://img.youtube.com/vi/' . $recent['video'] . '/0.jpg'); ?>" data-src="<?php echo ('http://img.youtube.com/vi/' . $recent['video'] . '/0.jpg'); ?>" class="img-tab" alt="<?php echo $recent['seotitle']; ?>">
                                        <?php } elseif (!file_exists($recent['image']) || !file_exists($recent['video'])) { ?>   
                                            <img src="<?php echo base_url('assets/images/no-image.jpg'); ?>" class="img-tab"/>
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
                                <?php echo word_limiter($recent['title'], 10); ?>
                                    </a>
                                </div>
                                <div class="bx-usr-info">
                                    <?php
                                    $this->db->select('id_reg');
                                    $this->db->select('picture');
                                    $this->db->from('users');
                                    $this->db->where('id_reg', $popular['id_reg']);
                                    $query = $this->db->get();
                                    if ($query->row('picture') != "") {
                                        if (!file_exists($query->row('picture'))) {
                                            echo '<a href="' . base_url('profile/' . $query->row('id_reg')) . '"><img class="circle usr-feat left" alt="' . $query->row('id_reg') . '" src="' . base_url('assets/member/' . $query->row('id_reg') . '/thumb/' . $query->row('picture') . '') . '" ></a>';
                                        } else {
                                            echo '<a href="' . base_url('profile/' . $query->row('id_reg')) . '"><img class="circle usr-feat left" alt="' . $query->row('id_reg') . '" src="' . base_url('assets/images/no-foto.jpg') . '"></a>';
                                        }
                                    } else {
                                        echo '<a href="' . base_url('profile/' . $query->row('id_reg')) . '"><img class="circle usr-feat left" alt="' . $query->row('id_reg') . '" src="' . base_url('assets/images/no-foto.jpg') . '"></a>';
                                    }
                                    ?>
                                    <div class="auth-date grey-text lighten-5">
                                        <span class="auth-feat">
                                            <a href="<?php echo base_url('profile/' . $recent['id_reg'] . ''); ?>" class="grey-text lighten-5">
                                                <?php
                                                $this->db->select('id_reg');
                                                $this->db->select('username');
                                                $this->db->from('users');
                                                $this->db->where('id_reg', $recent['id_reg']);
                                                $query = $this->db->get();
                                                echo $query->row('username');
                                                ?>
                                            </a>
                                        </span>
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
                                            <img src="<?php echo base_url('assets/picture/thumb/' . $popular['image'] . ''); ?>" data-src="<?php echo base_url('assets/picture/thumb/' . $popular['image'] . ''); ?>" class="img-tab" alt="<?php echo $popular['seotitle']; ?>"/>
                                        <?php } elseif (!empty($popular['video'])) { ?>                                
                                            <img src="<?php echo ('http://img.youtube.com/vi/' . $popular['video'] . '/0.jpg'); ?>" data-src="<?php echo ('http://img.youtube.com/vi/' . $popular['video'] . '/0.jpg'); ?>" class="img-tab" alt="<?php echo $popular['seotitle']; ?>">
                                        <?php } elseif (!file_exists($popular['image']) || !file_exists($popular['video'])) { ?>   
                                            <img src="<?php echo base_url('assets/images/no-image.jpg'); ?>" class="img-tab"/>
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
                                    <?php echo word_limiter($recent['title'], 10); ?>
                                    </a>
                                </div>
                                <div class="bx-usr-info">
                                    <?php
                                    $this->db->select('id_reg');
                                    $this->db->select('picture');
                                    $this->db->from('users');
                                    $this->db->where('id_reg', $popular['id_reg']);
                                    $query = $this->db->get();
                                    if ($query->row('picture') != "") {
                                        if (!file_exists($query->row('picture'))) {
                                            echo '<a href="' . base_url('profile/' . $query->row('id_reg')) . '"><img class="circle usr-feat left" alt="' . $query->row('id_reg') . '" src="' . base_url('assets/member/' . $query->row('id_reg') . '/thumb/' . $query->row('picture') . '') . '" ></a>';
                                        } else {
                                            echo '<a href="' . base_url('profile/' . $query->row('id_reg')) . '"><img class="circle usr-feat left" alt="' . $query->row('id_reg') . '" src="' . base_url('assets/images/no-foto.jpg') . '"></a>';
                                        }
                                    } else {
                                        echo '<a href="' . base_url('profile/' . $query->row('id_reg')) . '"><img class="circle usr-feat left" alt="' . $query->row('id_reg') . '" src="' . base_url('assets/images/no-foto.jpg') . '"></a>';
                                    }
                                    ?>
                                    <div class="auth-date grey-text lighten-5">
                                        <span class="auth-feat">
                                            <a href="<?php echo base_url('profile/' . $popular['id_reg'] . ''); ?>" class="grey-text lighten-5">
                                                <?php
                                                $this->db->select('id_reg');
                                                $this->db->select('username');
                                                $this->db->from('users');
                                                $this->db->where('id_reg', $popular['id_reg']);
                                                $query = $this->db->get();
                                                echo $query->row('username');
                                                ?>
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
                    <!--e:tab recent-->
                </div>
            </div>
            <!-- END SIDEBAR-->
        </div>
    </div>  
</div>
<?=$editorial?>
<script type='text/javascript'>
    $(function () {
        $("a.reply").click(function () {
            var id = $(this).attr("id");
            $("#parent_id").attr("value", id);
            $("#name").focus();
        });
    }
    );
    $('#smile').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo base_url('reaction/smile'); ?>",
            type: "post",
            data: $('#smile').serialize(),
            success: function () {
                Materialize.toast('Makasih bro', 5000, 'brown');
                location.reload();
            }
        });
    });
    $('#rofl').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo base_url('reaction/rofl'); ?>",
            type: "post",
            data: $('#rofl').serialize(),
            success: function () {
                Materialize.toast('Makasih bro', 5000, 'brown');
                location.reload();
            }
        });
    });
    $('#loves').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo base_url('reaction/love'); ?>",
            type: "post",
            data: $('#loves').serialize(),
            success: function () {
                Materialize.toast('Makasih bro', 5000, 'brown');
                location.reload();
            }
        });
    });
    $('#sad').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo base_url('reaction/sad'); ?>",
            type: "post",
            data: $('#sad').serialize(),
            success: function () {
                Materialize.toast('Makasih bro', 5000, 'brown');
                location.reload();
            }
        });
    });
    $('#disappointed').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo base_url('reaction/disappointed'); ?>",
            type: "post",
            data: $('#disappointed').serialize(),
            success: function () {
                Materialize.toast('Makasih bro', 5000, 'brown');
                location.reload();
            }
        });
    });
</script>
<?=$footer?>