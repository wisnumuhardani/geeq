<div class="blue-grey darken-4">
    <div class="section container"> 
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
                            <?php if (!empty($pick['image'])) { ?>   
                                <img src="<?php echo base_url('assets/picture/thumb/' . $pick['image'] . ''); ?>" data-src="<?php echo base_url('assets/picture/thumb/' . $pick['image'] . ''); ?>" class="img-card " alt="<?php echo $pick['seotitle']; ?>"/>
                            <?php } elseif (!empty($pick['video'])) { ?>                                
                                <img src="<?php echo ('http://img.youtube.com/vi/' . $pick['video'] . '/0.jpg'); ?>" data-src="<?php echo ('http://img.youtube.com/vi/' . $pick['video'] . '/0.jpg'); ?>" class="img-card " alt="<?php echo $pick['seotitle']; ?>">
                            <?php } elseif (!file_exists($pick['image']) || !file_exists($pick['video'])) { ?>   
                                <img src="<?php echo base_url('assets/images/no-image.jpg'); ?>" class="featimg "/>
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
                            $this->db->select('id_reg');
                            $this->db->select('picture');
                            $this->db->from('users');
                            $this->db->where('id_reg', $pick['id_reg']);
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
                            <div class="auth-date grey-text lighten-5 ">
                                <span class="auth-feat">
                                    <a href="<?php echo base_url('profile/' . $pick['id_reg'] . ''); ?>" class="grey-text lighten-5">
                                        <?php
                                        $this->db->select('id_reg');
                                        $this->db->select('username');
                                        $this->db->from('users');
                                        $this->db->where('id_reg', $pick['id_reg']);
                                        $query = $this->db->get();
                                        echo $query->row('username');
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