<?=$head?>
<?=$navbar?>

<div class="section featured">
    <div class="row">
        <div class="col s12 m3 l2 no-pad">
            <?php
            $no = 0;
            foreach ($top_latest_new as $val) {
                $no++;
                $url = base_url('read/' . $val['id_post'] . '/' . $val['seotitle']);
                ?>
                <?php if ($no <= 2) { ?>
                    <div id="<?php echo $no; ?>" class="feat-bx-sm">        

                        <?php if (!empty($val['image']) && file_exists('assets/picture/thumb/' . $val['image'])) { ?>   
                            <img src="<?php echo base_url('assets/picture/thumb/' . $val['image'] . ''); ?>" data-src="<?php echo base_url('assets/picture/thumb/' . $val['image'] . ''); ?>" class="featimg " alt="<?php echo $val['seotitle']; ?>"/>
                        <?php } elseif (!empty($val['video'])) { ?>                                
                            <img src="<?php echo ('http://img.youtube.com/vi/' . $val['video'] . '/0.jpg'); ?>" data-src="<?php echo ('http://img.youtube.com/vi/' . $val['video'] . '/0.jpg'); ?>" class="featimg " alt="<?php echo $val['seotitle']; ?>">
                        <?php } else { ?>
                            <img src="<?php echo base_url('assets/images/no-image.jpg'); ?>" class="featimg "/>
                        <?php } ?>
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
                            $query = $this->db->get();
                            {
                                ?>
                                <a href="<?php echo base_url('category/' . $query->row('seotitle') . ''); ?>">
                                    <span class="cat-label red darken-4">  
            <?php echo $query->row('name'); ?>
                                    </span>
                                </a>
        <?php } ?>	
                            <div class="bx-text-feat">
                                <a href="<?php echo $url; ?>">
                                    <h1 class="stand-title white-text"><?php echo $val['title']; ?></h1>
                                </a> 
                                <?php
                                    if (file_exists('assets/member/' . $val['id_reg'] . '/thumb/' . $users[$val['id_reg']]['picture'])) {
                                        echo '<a href="' . base_url('profile/' . $val['id_reg'] . '') . '"><img class="circle usr-feat" src="' . base_url('assets/member/' . $val['id_reg'] . '/thumb/' . $users[$val['id_reg']]['picture'] . '') . '" ></a>';
                                    } else {
                                        echo '<a href="' . base_url('profile/' . $val['id_reg'] . '') . '"><img class="circle usr-feat" src="' . base_url('assets/images/no-foto.jpg') . '"></a>';
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
                            </div>
                        </div> 
                    </div>
                    <?php
                }
            }
            ?>
        </div>	

        <div class="col s12 m6 no-pad">
            <!--carausel-->	
            <div class="slider"> 
                <?php
                $this->db->select('name');
                $this->db->select('seotitle');
                $this->db->from('post_category');
                $this->db->where('id', $val['category']);
                $query = $this->db->get(); {
                    ?>
                    <a href="<?php echo base_url('category/' . $query->row('seotitle') . ''); ?>">
                        <span class="cat-label label-slider red darken-4">  
                            Top Stories
                        </span>
                    </a>
                <?php } ?>	
                <ul class="slides">
                    <?php
                    $no = 0;
                    foreach ($top_story as $val) {
                        $no++;
                        $url = base_url('read/' . $val['id_post'] . '/' . $val['seotitle']);
                        ?>
                        <?php if ($no <= 5) { ?>
                            <li id="<?php echo $no; ?>"> 
                                <?php if (!empty($val['image']) && file_exists('assets/picture/medium/' . $val['image'] )) { ?>   
                                    <img src="<?php echo base_url('assets/picture/medium/' . $val['image'] . ''); ?>" data-src="<?php echo base_url('assets/picture/medium/' . $val['image'] . ''); ?>" class="img-card " alt="<?php echo $val['seotitle']; ?>"/>
                                <?php } elseif (!empty($val['video'])) { ?>                                
                                    <img src="<?php echo ('http://img.youtube.com/vi/' . $val['video'] . '/0.jpg'); ?>" data-src="<?php echo ('http://img.youtube.com/vi/' . $val['video'] . '/0.jpg'); ?>" class="img-card " alt="<?php echo $val['seotitle']; ?>">
                                <?php } else { ?>
                                    <img src="<?php echo base_url('assets/images/no-image.jpg'); ?>" class="featimg "/>
                                <?php } ?>
                                <div class="info-cnt white-text">
                                    <span><i class="material-icons">comment</i> 2K</span>
                                    <span><i class="material-icons">share</i> 1K</span>
                                    <span><i class="material-icons">visibility</i> <?php echo $val['hits']; ?></span>
                                </div>
                                <div class="bx-sdw">
                                    <div class="bx-text-feat"> 
                                        <a href="<?php echo $url; ?>"><h1 class="stand-title white-text"><?php echo $val['title']; ?></h1></a> 
                                        <?php
                                            if (file_exists('assets/member/' .$val['id_reg']. '/thumb/' . $users[$val['id_reg']]['picture'] )) {
                                                echo '<a href="' . base_url('profile/' . $val['id_reg'] . '') . '"><img class="circle usr-feat" src="' . base_url('assets/member/' .$val['id_reg']. '/thumb/' . $users[$val['id_reg']]['picture'] . '') . '" ></a>';
                                            } else {
                                                echo '<a href="' . base_url('profile/' . $val['id_reg'] . '') . '"><img class="circle usr-feat" src="' . base_url('assets/images/no-foto.jpg') . '"></a>';
                                            }
                                        ?>
                                        <div class="auth-date grey-text lighten-5">
                                            <span class="auth-feat">
                                                <a href="<?php echo base_url('profile/' . $val['id_reg'] . ''); ?>" class="grey-text lighten-5">
                                                    <a href="<?php echo base_url('profile/' . $val['id_reg'] . ''); ?>" class="grey-text lighten-5">
                                                        <?php
                                                        echo $users[$val['id_reg']]['username'];
                                                        ?>
                                                    </a>
                                                </a>
                                            </span>
                                            <div class="bx-date"><i class="material-icons">schedule</i><span class="feat-date"><?php echo hitung_mundur(strtotime($val['date'])); ?></span></div>
                                        </div>
                                    </div>
                                </div> 
                            </li>   
                            <?php
                        }
                    }
                    ?>
                </ul>
            </div>			
            <!--E:carausel-->
        </div> 


        <div class="col s12 m2 no-pad">
            <?php
            $no = 0;
            foreach ($top_latest_new as $val) {
                $no++;
                $url = base_url('read/' . $val['id_post'] . '/' . $val['seotitle']);
                ?>
                <?php if ($no >= 3 && $no < 5) { ?>
                    <div id="<?php echo $no; ?>" class="feat-bx-sm">					
                        <?php if (!empty($val['image']) && file_exists('assets/picture/thumb/' . $val['image'])) { ?>   
                            <img src="<?php echo base_url('assets/picture/thumb/' . $val['image'] . ''); ?>" data-src="<?php echo base_url('assets/picture/thumb/' . $val['image'] . ''); ?>" class="featimg " alt="<?php echo $val['seotitle']; ?>"/>
                        <?php } elseif (!empty($val['video'])) { ?>                                
                            <img src="<?php echo ('http://img.youtube.com/vi/' . $val['video'] . '/0.jpg'); ?>" data-src="<?php echo ('http://img.youtube.com/vi/' . $val['video'] . '/0.jpg'); ?>" class="featimg " alt="<?php echo $val['seotitle']; ?>">

                        <?php } else { ?>
                            <img src="<?php echo base_url('assets/images/no-image.jpg'); ?>" class="featimg "/>
                        <?php } ?>					
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
                            $query = $this->db->get();
                            {
                                ?>
                                <a href="<?php echo base_url('category/' . $query->row('seotitle') . ''); ?>">
                                    <span class="cat-label red darken-4">  
            <?php echo $query->row('name'); ?>
                                    </span>
                                </a>
        <?php } ?>
                            <div class="bx-text-feat">
                                <a href="<?php echo $url; ?>"><h1 class="stand-title white-text"><?php echo $val['title']; ?></h1></a>
                                <?php

                                    if (file_exists('assets/member/' . $val['id_reg'] . '/thumb/' . $users[$val['id_reg']]['picture'])) {
                                        echo '<a href="' . base_url('profile/' . $val['id_reg'] . '') . '"><img class="circle usr-feat" src="' . base_url('assets/member/' . $val['id_reg'] . '/thumb/' . $users[$val['id_reg']]['picture'] . '') . '" ></a>';
                                    } else {
                                        echo '<a href="' . base_url('profile/' . $val['id_reg'] . '') . '"><img class="circle usr-feat" src="' . base_url('assets/images/no-foto.jpg') . '"></a>';
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
                            </div>
                        </div> 
                    </div>
                    <?php
                }
            }
            ?>
        </div> 

        <div class="col s12 m2 no-pad">
            <?php
            $no = 0;
            foreach ($top_latest_new as $val) {
                $no++;
                $url = base_url('read/' . $val['id_post'] . '/' . $val['seotitle']);
                ?>
                    <?php if ($no >= 5 && $no < 7) { ?>
                    <div id="<?php echo $no; ?>" class="feat-bx-sm">        
                        <?php if (!empty($val['image']) && file_exists('assets/picture/thumb/' . $val['image'])) { ?>   
                            <img src="<?php echo base_url('assets/picture/thumb/' . $val['image'] . ''); ?>" data-src="<?php echo base_url('assets/picture/thumb/' . $val['image'] . ''); ?>" class="featimg " alt="<?php echo $val['seotitle']; ?>"/>
                        <?php } elseif (!empty($val['video'])) { ?>                                
                            <img src="<?php echo ('http://img.youtube.com/vi/' . $val['video'] . '/0.jpg'); ?>" data-src="<?php echo ('http://img.youtube.com/vi/' . $val['video'] . '/0.jpg'); ?>" class="featimg " alt="<?php echo $val['seotitle']; ?>">
                        <?php } else { ?>
                            <img src="<?php echo base_url('assets/images/no-image.jpg'); ?>" class="featimg "/>
        <?php } ?>	
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
                            $query = $this->db->get();
                            {
                                ?>
                                <a href="<?php echo base_url('category/' . $query->row('seotitle') . ''); ?>">
                                    <span class="cat-label red darken-4">  
                                <?php echo $query->row('name'); ?>
                                    </span>
                                </a>
                                <?php } ?>
                            <div class="bx-text-feat">
                                <a href="<?php echo $url; ?>"><h1 class="stand-title white-text"><?php echo $val['title']; ?></h1></a>
                                <?php
                                    if (file_exists('assets/member/' . $val['id_reg'] . '/thumb/' . $users[$val['id_reg']]['picture'] )) {
                                        echo '<a href="' . base_url('profile/' . $val['id_reg'] . '') . '"><img class="circle usr-feat" src="' . base_url('assets/member/' . $val['id_reg'] . '/thumb/' . $users[$val['id_reg']]['picture'] . '') . '" ></a>';
                                    } else {
                                        echo '<a href="' . base_url('profile/' . $val['id_reg'] . '') . '"><img class="circle usr-feat" src="' . base_url('assets/images/no-foto.jpg') . '"></a>';
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
                            </div>
                        </div> 
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>

<?=$editorial?>
<?=$allcat?>
<?=$video?>
<?=$latest?>
<?=$footer?>