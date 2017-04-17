<?=$head?>
<?=$navbar?>
<div class="padtb60">
    <div class="container">
        <div class="row">  
            <div class="col l12 s12 m12">
                Kumpulan #<?php echo $namakeyword; ?>
            </div> 
            <?php
            foreach ($results['articles'] as $val) {
                $urllink = base_url('read/' . $val->id_post . '/' . $val->seotitle);
                ?>
                <div class="col s12 m4 l3">
                    <div class="card-tm1 white">
                        <div class="feat-bx-sm"> 
                            <?php if (!empty($val->image) && file_exists('assets/picture/thumb/' . $val->image)) { ?>   
                                <img src="<?php echo base_url('assets/picture/thumb/' . $val->image . ''); ?>" data-src="<?php echo base_url('assets/picture/thumb/' . $val->image . ''); ?>" class="responsive-img" alt="<?php echo $val->seotitle; ?>"/>
                            <?php } elseif (!empty($val->video)) { ?>                                
                                <img src="<?php echo ('http://img.youtube.com/vi/' . $val->video . '/0.jpg'); ?>" data-src="<?php echo ('http://img.youtube.com/vi/' . $val->video . '/0.jpg'); ?>" class="responsive-img" alt="<?php echo $val->seotitle; ?>">
                            
                            <?php } else { ?>
                                <img src="<?php echo base_url('assets/images/no-image.jpg'); ?>" class="responsive-img"/>
                            <?php } ?>	
                            <div class="info-cnt white-text">
                                <span><i class="material-icons">comment</i> 2K</span>
                                <span><i class="material-icons">share</i> 1K</span>
                                <span><i class="material-icons">visibility</i> <?php echo $val->hits; ?></span>
                            </div>
                            <div class="bx-sdw">
                                <span class="cat-label teal">
                                    <?php
                                    $this->db->select('name');
                                    $this->db->from('post_category');
                                    $this->db->where('id', $val->category);
                                    $query = $this->db->get();
                                    echo $query->row('name');
                                    ?>
                                </span>
                                <div class="bx-text-feat">
                                    <a href="<?php echo $urllink; ?>">
                                        <h1 class="stand-title white-text">
                                            <?php echo word_limiter($val->title, 8); ?>
                                        </h1>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="bx-usr-info">
                            <?php
                                if (file_exists('assets/member/' . $val->id_reg . '/' . $users[$val->id_reg]['picture'] )) {
                                    echo '<a href="' .  base_url('profile/' . $val->id_reg) . '"><img class="circle usr-feat left" src="' . base_url('assets/member/' . $val->id_reg . '/' . $users[$val->id_reg]['picture'] . '') . '" ></a>';
                                } else {
                                    echo '<a href="' .  base_url('profile/' . $val->id_reg) . '"><img class="circle usr-feat left" src="' . base_url('assets/images/no-foto.jpg') . '"></a>';
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
                                <div class="bx-date"><i class="material-icons">schedule</i><span class="feat-date"><?php echo hitung_mundur(strtotime($val->date)); ?></span></div>
                            </div>
                            <div class="bx-sos right">
                                <a href="#" class="grey-text lighten-2"><i class="material-icons">share</i></a>
                                <a href="#" class="grey-text lighten-2"><i class="material-icons">bookmark</i></a>
                            </div>
                        </div> 
                    </div>
                </div> 
            <?php } ?> 
        </div>
    </div>
</div>							
<?=$footer?>