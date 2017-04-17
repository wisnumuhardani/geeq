<div class="blue-grey darken-4">
    <div class="section container">
        <div class="row">
            <div class="bx-title">
                <h2 class="stand-title white-text st-1"><span>FEATURED VIDEO</span></h2>
            </div>
        </div>
        <div class="row">
            <?php
            foreach ($video_post as $val) {
                $val_url = base_url('read/' . $val['id_post'] . '/' . $val['seotitle']);
                ?>
                <div class="col s12 m3">
                    <div class="card-tm1 white">
                        <div class="feat-bx-sm">
                            <a href="<?php echo $val_url; ?>">
                                <i class="material-icons white-text btn-play">play_circle_outline</i>  
                                <?php if ($val['image'] != "") { ?>
                                    <img data-src="<?php echo $val['image']; ?>" src="<?php echo $val['image']; ?>" alt="<?php echo $val['seotitle']; ?>" class="img-vid responsive-img"/>
                                <?php } elseif (($val['video'] != "")) { ?>
                                    <img src="http://img.youtube.com/vi/<?php echo $val['video']; ?>/0.jpg" class="img-vid responsive-img" alt="<?php echo $val['seotitle']; ?>"/>
                                <?php } else { ?>
                                    <img src="<?php echo base_url('assets/image/no-image.jpg'); ?>" alt="<?php echo $val['seotitle']; ?>" class="img-vid responsive-img"/>
                                <?php } ?>
                            </a>
                            <div class="info-cnt white-text">
                                <span><i class="material-icons">comment</i> 2K</span>
                                <span><i class="material-icons">share</i> 1K</span>
                                <span><i class="material-icons">visibility</i> <?php echo $val['hits']; ?></span>
                            </div>
                            <div class="bx-sdw">
                                <?php
                                $this->db->select('name');
                                $this->db->select('seotitle');
                                $this->db->from('post_category');
                                $this->db->where('id', $val['category']);
                                $query = $this->db->get(); {
                                    ?>
                                    <!--
        <a href="<?php echo base_url('category/' . $query->row('seotitle') . ''); ?>">
          <span class="cat-label grey darken-4">  
                                    <?php #echo $query->row('name');   ?>
          </span>
        </a>-->
                                <?php } ?>
                                <div class="bx-text-feat">
                                    <a href="<?php echo $val_url; ?>">
                                        <h1 class="stand-title white-text">
                                            <?php echo word_limiter($val['title'], 8); ?>
                                        </h1>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="bx-usr-info"> 
                            <?php

                                if (!file_exists(base_url('assets/member/' . $val['id_reg'] . '/' . $users[$val['id_reg']]['picture']. ''))) {
                                    echo '<a href="' . base_url('profile/' . $val['id_reg'] . '') . '"><img class="circle usr-feat left" src="' . base_url('assets/member/' . $val['id_reg'] . '/' . $users[$val['id_reg']]['picture']. '') . '" ></a>';
                                } else {
                                    echo '<a href="' . base_url('profile/' . $val['id_reg'] . '') . '"><img class="circle usr-feat left" src="' . base_url('assets/images/no-foto.jpg') . '"></a>';
                                }

                            ?>							
                            <div class="auth-date grey-text lighten-5">
                                <span class="auth-feat">
                                    <a href="<?php echo base_url('profile/' . $val['id_reg'] . ''); ?>" class="grey-text lighten-5">
                                        <?php
                                        echo $users[$val['id_reg']]['username'];
                                        ?>
                                    </a>
                                </span>
                                <div class="bx-date"><i class="material-icons">schedule</i><span class="feat-date"><?php echo hitung_mundur(strtotime($val['date'])); ?></span></div>
                            </div>
                            <div class="bx-sos right">
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $val_url; ?>" target="_blank" class="grey-text lighten-2"><i class="material-icons">share</i></a>
                                <a href="#" class="grey-text lighten-2"><i class="material-icons">bookmark</i></a>
                            </div>
                        </div> 
                    </div>
                </div> 
            <?php } ?>
        </div><!--end row-->
    </div>
</div>	