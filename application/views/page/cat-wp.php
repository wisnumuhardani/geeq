<div class="blue-grey lighten-3">
    <div class="section container">
        <div class="row">
            <div class="col s12 m6 l8">
                <div class="row">
                    <div class="col s12 m6 l6">
                        <div class="bx-title">
                            <h2 class="stand-title st-1"><span>NGAYAL</span></h2>
                        </div>
                        <ul class="list-channel tab-news card-tm1 white">
                            <?php
                            $no = 0;
                            foreach ($scifi_post as $scifi) {
                                $no++;
                                $scifi_url = base_url('read/' . $scifi['id_post'] . '/' . $scifi['seotitle']);
                                ?>
                                <?php if ($no == '1') { ?>
                                    <li>
                                        <div class="mask-tab left">
                                            <a href="<?php echo $scifi_url; ?>">
                                                <?php if (!empty($scifi['image'])) { ?>   
                                                    <img src="<?php echo base_url('assets/picture/thumb/' . $scifi['image'] . ''); ?>" data-src="<?php echo base_url('assets/picture/thumb/' . $scifi['image'] . ''); ?>" class="mask-tab" alt="<?php echo $scifi['seotitle']; ?>"/>
                                                <?php } elseif (!empty($scifi['video'])) { ?>                                
                                                    <img src="<?php echo ('http://img.youtube.com/vi/' . $scifi['video'] . '/0.jpg'); ?>" data-src="<?php echo ('http://img.youtube.com/vi/' . $scifi['video'] . '/0.jpg'); ?>" class="mask-tab " alt="<?php echo $scifi['seotitle']; ?>">
                                                <?php } elseif (!file_exists($scifi['image']) || !file_exists($scifi['video'])) { ?>   
                                                    <img src="<?php echo base_url('assets/images/no-image.jpg'); ?>" class="mask-tab "/>
                                                <?php } else { ?>
                                                    <img src="<?php echo base_url('assets/images/no-image.jpg'); ?>" class="mask-tab "/>
                                                <?php } ?>
                                            </a>
                                        </div>
                                        <div class="tab-text">
                                            <a href="<?php echo $scifi_url; ?>" class="black-text">
                                                <?php echo word_limiter($scifi['title'], 12); ?>
                                            </a>
                                        </div>
                                        <div class="bx-usr-info">
                                            <?php
                                            $this->db->select('id_reg');
                                            $this->db->select('picture');
                                            $this->db->from('users');
                                            $this->db->where('id_reg', $scifi['id_reg']);
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
                                                    <a href="<?php echo base_url('profile/' . $scifi['id_reg'] . ''); ?>" class="grey-text lighten-5">
                                                        <?php
                                                        $this->db->select('id_reg');
                                                        $this->db->select('username');
                                                        $this->db->from('users');
                                                        $this->db->where('id_reg', $scifi['id_reg']);
                                                        $query = $this->db->get();
                                                        echo $query->row('username');
                                                        ?>
                                                    </a>
                                                </span>
                                                <div class="bx-date">
                                                    <i class="material-icons">schedule</i><span class="feat-date"><?php echo hitung_mundur(strtotime($scifi['date'])); ?></span>
                                                </div>
                                            </div>
                                            <div class="bx-sos right">
                                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $scifi_url; ?>" class="grey-text lighten-2" target="_blank"><i class="material-icons">share</i></a>
                                                <a href="#" class="grey-text lighten-2"><i class="material-icons">bookmark</i></a>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </li>
                                <?php } else { ?>
                                    <li>
                                        <div class="mask-tab left">
                                            <a href="<?php echo $scifi_url; ?>">
                                                <?php if (!empty($scifi['image'])) { ?>   
                                                    <img data-src="<?php echo base_url('assets/picture/thumb/' . $scifi['image'] . ''); ?>" src="<?php echo base_url('assets/picture/thumb/' . $scifi['image'] . ''); ?>" class="img-tab " alt="<?php echo $scifi['seotitle']; ?>"/>
                                                <?php } elseif (!empty($scifi['video'])) { ?>                                
                                                    <img src="<?php echo ('http://img.youtube.com/vi/' . $scifi['video'] . '/0.jpg'); ?>" data-src="<?php echo ('http://img.youtube.com/vi/' . $scifi['video'] . '/0.jpg'); ?>" class="img-tab " alt="<?php echo $scifi['seotitle']; ?>">
                                                <?php } elseif (!file_exists($scifi['image']) || !file_exists($scifi['video'])) { ?>   
                                                    <img src="<?php echo base_url('assets/images/no-image.jpg'); ?>" class="img-tab "/>
                                                <?php } else { ?>
                                                    <img src="<?php echo base_url('assets/images/no-image.jpg'); ?>" class="img-tab "/>
                                                <?php } ?>	
                                            </a>
                                        </div>
                                        <div class="tab-text">
                                            <a href="<?php echo $scifi_url; ?>" class="black-text"><?php echo word_limiter($scifi['title'], 12); ?></a>
                                        </div>
                                        <div class="bx-usr-info">
                                            <?php
                                            $this->db->select('id_reg');
                                            $this->db->select('picture');
                                            $this->db->from('users');
                                            $this->db->where('id_reg', $scifi['id_reg']);
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
                                                    <a href="<?php echo base_url('profile/' . $scifi['id_reg'] . ''); ?>" class="grey-text lighten-5">
                                                        <?php
                                                        $this->db->select('id_reg');
                                                        $this->db->select('username');
                                                        $this->db->from('users');
                                                        $this->db->where('id_reg', $scifi['id_reg']);
                                                        $query = $this->db->get();
                                                        echo $query->row('username');
                                                        ?>
                                                    </a>
                                                </span>
                                                <div class="bx-date"><i class="material-icons">schedule</i><span class="feat-date"><?php echo date("d M Y", strtotime($scifi['date'])); ?></span></div>
                                            </div>
                                            <div class="bx-sos right">
                                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $scifi_url; ?>" target="_blank" class="grey-text lighten-2"><i class="material-icons">share</i></a>
                                                <a href="#" class="grey-text lighten-2"><i class="material-icons">bookmark</i></a>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="col s12 m6 l6">
                        <div class="bx-title">
                            <h2 class="stand-title st-1"><span>TANTANGAN</span></h2>
                        </div>
                        <ul class="list-channel tab-news card-tm1 white">
                            <?php
                            $no = 0;
                            foreach ($sport_post as $sport) {
                                $no++;
                                $sport_url = base_url('read/' . $sport['id_post'] . '/' . $sport['seotitle']);
                                ?>
                                <?php if ($no == '1') { ?>
                                    <li>
                                        <div class="mask-tab left"> 
                                            <a href="<?php echo $sport_url; ?>">
                                                <?php if (!empty($sport['image'])) { ?>   
                                                    <img src="<?php echo base_url('assets/picture/thumb/' . $sport['image'] . ''); ?>" data-src="<?php echo base_url('assets/picture/thumb/' . $sport['image'] . ''); ?>" class="mask-tab " alt="<?php echo $sport['seotitle']; ?>"/>
                                                <?php } elseif (!empty($sport['video'])) { ?>                                
                                                    <img src="<?php echo ('http://img.youtube.com/vi/' . $sport['video'] . '/0.jpg'); ?>" data-src="<?php echo ('http://img.youtube.com/vi/' . $sport['video'] . '/0.jpg'); ?>" class="mask-tab " alt="<?php echo $sport['seotitle']; ?>">
                                                <?php } elseif (!file_exists($sport['image']) || !file_exists($sport['video'])) { ?>   
                                                    <img src="<?php echo base_url('assets/images/no-image.jpg'); ?>" class="mask-tab "/>
                                                <?php } else { ?>
                                                    <img src="<?php echo base_url('assets/images/no-image.jpg'); ?>" class="mask-tab "/>
                                                <?php } ?>
                                            </a>
                                        </div>
                                        <div class="tab-text">
                                            <a href="<?php echo $sport_url; ?>" class="black-text"><?php echo word_limiter($sport['title'], 12); ?></a>
                                        </div>
                                        <div class="bx-usr-info">
                                            <?php
                                            $this->db->select('id_reg');
                                            $this->db->select('picture');
                                            $this->db->from('users');
                                            $this->db->where('id_reg', $sport['id_reg']);
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
                                                    <a href="<?php echo base_url('profile/' . $sport['id_reg'] . ''); ?>" class="grey-text lighten-5">
                                                        <?php
                                                        $this->db->select('id_reg');
                                                        $this->db->select('username');
                                                        $this->db->from('users');
                                                        $this->db->where('id_reg', $sport['id_reg']);
                                                        $query = $this->db->get();
                                                        echo $query->row('username');
                                                        ?>
                                                    </a>
                                                </span>
                                                <div class="bx-date"><i class="material-icons">schedule</i><span class="feat-date"><?php echo hitung_mundur(strtotime($sport['date'])); ?></span></div>
                                            </div>
                                            <div class="bx-sos right">
                                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $sport_url; ?>" target="_blank" class="grey-text lighten-2"><i class="material-icons">share</i></a>
                                                <a href="#" class="grey-text lighten-2"><i class="material-icons">bookmark</i></a>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </li>
                                <?php } else { ?>
                                    <li>
                                        <div class="mask-tab left">
                                            <a href="<?php echo $sport_url; ?>">
                                                <?php if (!empty($sport['image'])) { ?>   
                                                    <img src="<?php echo base_url('assets/picture/thumb/' . $sport['image'] . ''); ?>" data-src="<?php echo base_url('assets/picture/thumb/' . $sport['image'] . ''); ?>" class="img-tab " alt="<?php echo $sport['seotitle']; ?>"/>
                                                <?php } elseif (!empty($sport['video'])) { ?>                                
                                                    <img src="<?php echo ('http://img.youtube.com/vi/' . $sport['video'] . '/0.jpg'); ?>" data-src="<?php echo ('http://img.youtube.com/vi/' . $sport['video'] . '/0.jpg'); ?>" class="img-tab " alt="<?php echo $sport['seotitle']; ?>">
                                                <?php } elseif (!file_exists($sport['image']) || !file_exists($sport['video'])) { ?>   
                                                    <img src="<?php echo base_url('assets/images/no-image.jpg'); ?>" class="img-tab "/>
                                                <?php } else { ?>
                                                    <img src="<?php echo base_url('assets/images/no-image.jpg'); ?>" class="img-tab "/>
                                                <?php } ?>	
                                            </a>
                                        </div>
                                        <div class="tab-text">
                                            <a href="<?php echo $sport_url; ?>" class="black-text"><?php echo word_limiter($sport['title'], 12); ?></a>
                                        </div>
                                        <div class="bx-usr-info">
                                            <?php
                                            $this->db->select('id_reg');
                                            $this->db->select('picture');
                                            $this->db->from('users');
                                            $this->db->where('id_reg', $sport['id_reg']);
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
                                                    <a href="<?php echo base_url('profile/' . $sport['id_reg'] . ''); ?>" class="grey-text lighten-5">
                                                        <?php
                                                        $this->db->select('id_reg');
                                                        $this->db->select('username');
                                                        $this->db->from('users');
                                                        $this->db->where('id_reg', $sport['id_reg']);
                                                        $query = $this->db->get();
                                                        echo $query->row('username');
                                                        ?>
                                                    </a>
                                                </span>
                                                <div class="bx-date"><i class="material-icons">schedule</i><span class="feat-date"><?php echo date("d M Y", strtotime($sport['date'])); ?></span></div>
                                            </div>
                                            <div class="bx-sos right">
                                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $sport_url; ?>" target="_blank" class="grey-text lighten-2"><i class="material-icons">share</i></a>
                                                <a href="#" class="grey-text lighten-2"><i class="material-icons">bookmark</i></a>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </li>
                                    <?php
                                }
                            }
                            ?>                      
                        </ul>
                    </div>
                    <div class="col col s12 m6 l6">
                        <div class="bx-title">
                            <h2 class="stand-title st-1"><span>TECH</span></h2>
                        </div>
                        <ul class="list-channel tab-news card-tm1 white">
                            <?php
                            $no = 0;
                            foreach ($tech_post as $tech) {
                                $no++;
                                $tech_url = base_url('read/' . $tech['id_post'] . '/' . $tech['seotitle']);
                                ?>
                                <?php if ($no == '1') { ?>
                                    <li>
                                        <div class="mask-tab left">
                                            <a href="<?php echo $tech_url; ?>">
                                                <?php if (!empty($tech['image'])) { ?>   
                                                    <img src="<?php echo base_url('assets/picture/thumb/' . $tech['image'] . ''); ?>" data-src="<?php echo base_url('assets/picture/thumb/' . $tech['image'] . ''); ?>" class="mask-tab " alt="<?php echo $tech['seotitle']; ?>"/>
                                                <?php } elseif (!empty($tech['video'])) { ?>                                
                                                    <img src="<?php echo ('http://img.youtube.com/vi/' . $tech['video'] . '/0.jpg'); ?>" data-src="<?php echo ('http://img.youtube.com/vi/' . $tech['video'] . '/0.jpg'); ?>" class="mask-tab " alt="<?php echo $tech['seotitle']; ?>">
                                                <?php } elseif (!file_exists($tech['image']) || !file_exists($tech['video'])) { ?>   
                                                    <img src="<?php echo base_url('assets/images/no-image.jpg'); ?>" class="mask-tab "/>
                                                <?php } else { ?>
                                                    <img src="<?php echo base_url('assets/images/no-image.jpg'); ?>" class="mask-tab "/>
                                                <?php } ?>
                                            </a>
                                        </div>
                                        <div class="tab-text">
                                            <a href="<?php echo $tech_url; ?>" class="black-text"><?php echo word_limiter($tech['title'], 12); ?></a>
                                        </div>
                                        <div class="bx-usr-info">
                                            <?php
                                            $this->db->select('id_reg');
                                            $this->db->select('picture');
                                            $this->db->from('users');
                                            $this->db->where('id_reg', $tech['id_reg']);
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
                                                    <a href="<?php echo base_url('profile/' . $scifi['id_reg'] . ''); ?>" class="grey-text lighten-5">
                                                        <?php
                                                        $this->db->select('id_reg');
                                                        $this->db->select('username');
                                                        $this->db->from('users');
                                                        $this->db->where('id_reg', $tech['id_reg']);
                                                        $query = $this->db->get();
                                                        echo $query->row('username');
                                                        ?>
                                                    </a>
                                                </span>
                                                <div class="bx-date"><i class="material-icons">schedule</i><span class="feat-date"><?php echo hitung_mundur(strtotime($tech['date'])); ?></span></div>
                                            </div>
                                            <div class="bx-sos right">
                                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $tech_url; ?>" target="_blank" class="grey-text lighten-2"><i class="material-icons">share</i></a>
                                                <a href="#" class="grey-text lighten-2"><i class="material-icons">bookmark</i></a>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </li>
                                <?php } else { ?>
                                    <li>
                                        <div class="mask-tab left">
                                            <a href="<?php echo $tech_url; ?>">
                                                <?php if ($tech['image'] != "") { ?>
                                                    <img class="materialboxed" data-src="<?php echo base_url('assets/picture/thumb/' . $tech['image'] . ''); ?>" src="<?php echo base_url('assets/picture/thumb/' . $tech['image'] . ''); ?>" class="img-tab "/>
                                                <?php } elseif (($tech['video'] != "")) { ?>
                                                    <img src="http://img.youtube.com/vi/<?php echo $tech['video']; ?>/0.jpg" class="img-tab "/>
                                                <?php } else { ?>
                                                    <img src="<?php echo base_url('assets/image/no-image.jpg') ?>" alt="<?php echo $tech['seotitle']; ?>" class="img-tab "/>
                                                <?php } ?> 
                                            </a>
                                        </div>
                                        <div class="tab-text">
                                            <a href="<?php echo $tech_url; ?>" class="black-text"><?php echo word_limiter($tech['title'], 12); ?></a>
                                        </div>
                                        <div class="bx-usr-info">
                                            <?php
                                            $this->db->select('id_reg');
                                            $this->db->select('picture');
                                            $this->db->from('users');
                                            $this->db->where('id_reg', $tech['id_reg']);
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
                                                    <a href="<?php echo base_url('profile/' . $tech['id_reg'] . ''); ?>" class="grey-text lighten-5">
                                                        <?php
                                                        $this->db->select('id_reg');
                                                        $this->db->select('username');
                                                        $this->db->from('users');
                                                        $this->db->where('id_reg', $tech['id_reg']);
                                                        $query = $this->db->get();
                                                        echo $query->row('username');
                                                        ?>
                                                    </a>
                                                </span>
                                                <div class="bx-date"><i class="material-icons">schedule</i><span class="feat-date"><?php echo date("d M Y", strtotime($tech['date'])); ?></span></div>
                                            </div>
                                            <div class="bx-sos right">
                                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $tech_url; ?>" target="_blank" class="grey-text lighten-2"><i class="material-icons">share</i></a>
                                                <a href="#" class="grey-text lighten-2"><i class="material-icons">bookmark</i></a>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </li>
                                    <?php
                                }
                            }
                            ?>                              
                        </ul>
                    </div>
                    <div class="col col s12 m6 l6">
                        <div class="bx-title">
                            <h2 class="stand-title st-1"><span>AUTOMOTIVE</span></h2>
                        </div>
                        <ul class="list-channel tab-news card-tm1 white">
                            <?php
                            $no = 0;
                            foreach ($otomotif_post as $otomotif) {
                                $no++;
                                $otomotif_url = base_url('read/' . $otomotif['id_post'] . '/' . $otomotif['seotitle']);
                                ?>
                                <?php if ($no == '1') { ?>
                                    <li>
                                        <div class="mask-tab left"> 
                                            <a href="<?php echo $otomotif_url; ?>">
                                                <?php if (!empty($otomotif['image'])) { ?>   
                                                    <img src="<?php echo base_url('assets/picture/thumb/' . $otomotif['image'] . ''); ?>" data-src="<?php echo base_url('assets/picture/thumb/' . $otomotif['image'] . ''); ?>" class="mask-tab " alt="<?php echo $otomotif['seotitle']; ?>"/>
                                                <?php } elseif (!empty($otomotif['video'])) { ?>                                
                                                    <img src="<?php echo ('http://img.youtube.com/vi/' . $otomotif['video'] . '/0.jpg'); ?>" data-src="<?php echo ('http://img.youtube.com/vi/' . $otomotif['video'] . '/0.jpg'); ?>" class="" alt="<?php echo $otomotif['seotitle']; ?>">
                                                <?php } elseif (!file_exists($otomotif['image']) || !file_exists($otomotif['video'])) { ?>   
                                                    <img src="<?php echo base_url('assets/images/no-image.jpg'); ?>" class="mask-tab "/>
                                                <?php } else { ?>
                                                    <img src="<?php echo base_url('assets/images/no-image.jpg'); ?>" class="mask-tab "/>
                                                <?php } ?>
                                            </a>
                                        </div>
                                        <div class="tab-text">
                                            <a href="<?php echo $otomotif_url; ?>" class="black-text"><?php echo word_limiter($otomotif['title'], 12); ?></a>
                                        </div>
                                        <div class="bx-usr-info">
                                            <?php
                                            $this->db->select('id_reg');
                                            $this->db->select('picture');
                                            $this->db->from('users');
                                            $this->db->where('id_reg', $otomotif['id_reg']);
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
                                                    <a href="<?php echo base_url('profile/' . $otomotif['id_reg'] . ''); ?>" class="grey-text lighten-5">
                                                        <?php
                                                        $this->db->select('id_reg');
                                                        $this->db->select('username');
                                                        $this->db->from('users');
                                                        $this->db->where('id_reg', $otomotif['id_reg']);
                                                        $query = $this->db->get();
                                                        echo $query->row('username');
                                                        ?>
                                                    </a>
                                                </span>
                                                <div class="bx-date"><i class="material-icons">schedule</i><span class="feat-date"><?php echo hitung_mundur(strtotime($otomotif['date'])); ?></span></div>
                                            </div>
                                            <div class="bx-sos right">
                                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $otomotif_url; ?>" target="_blank" class="grey-text lighten-2"><i class="material-icons">share</i></a>
                                                <a href="#" class="grey-text lighten-2"><i class="material-icons">bookmark</i></a>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </li>
                                <?php } else { ?>
                                    <li>
                                        <div class="mask-tab left">
                                            <a href="<?php echo $otomotif_url; ?>">
                                                <?php if ($otomotif['image'] != "") { ?>
                                                    <img class="materialboxed" data-src="<?php echo base_url('assets/picture/thumb/' . $otomotif['image'] . ''); ?>" src="<?php echo base_url('assets/picture/thumb/' . $otomotif['image'] . ''); ?>" class=""/>
                                                <?php } elseif (($otomotif['video'] != "")) { ?>
                                                    <img src="http://img.youtube.com/vi/<?php echo $otomotif['video']; ?>/0.jpg" class="img-tab "/>
                                                <?php } else { ?>
                                                    <img src="<?php echo base_url('assets/image/no-image.jpg') ?>" alt="<?php echo $otomotif['seotitle']; ?>" class="img-tab "/>
                                                <?php } ?> 
                                            </a>
                                        </div>
                                        <div class="tab-text">
                                            <a href="<?php echo $otomotif_url; ?>" class="black-text"><?php echo word_limiter($otomotif['title'], 12); ?></a>
                                        </div>
                                        <div class="bx-usr-info">
                                            <?php
                                            $this->db->select('id_reg');
                                            $this->db->select('picture');
                                            $this->db->from('users');
                                            $this->db->where('id_reg', $otomotif['id_reg']);
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
                                                    <a href="<?php echo base_url('profile/' . $otomotif['id_reg'] . ''); ?>" class="grey-text lighten-5">
                                                        <?php
                                                        $this->db->select('id_reg');
                                                        $this->db->select('username');
                                                        $this->db->from('users');
                                                        $this->db->where('id_reg', $otomotif['id_reg']);
                                                        $query = $this->db->get();
                                                        echo $query->row('username');
                                                        ?>
                                                    </a>
                                                </span>
                                                <div class="bx-date"><i class="material-icons">schedule</i><span class="feat-date"><?php echo hitung_mundur(strtotime($otomotif['date'])); ?></span></div>
                                            </div>
                                            <div class="bx-sos right">
                                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $otomotif_url; ?>" target="_blank" class="grey-text lighten-2"><i class="material-icons">share</i></a>
                                                <a href="#" class="grey-text lighten-2"><i class="material-icons">bookmark</i></a>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </li>
                                    <?php
                                }
                            }
                            ?>                             
                        </ul>
                    </div>
                </div>
            </div><!--end col8-->
            <div class="col s4 right-top-wp1">
			   <div class="sc-ads1 center">
                                        <iframe id='ac47b054' name='ac47b054' src='http://revive.consumedmedia.id/www/delivery/afr.php?zoneid=69&amp;cb=INSERT_RANDOM_NUMBER_HERE' frameborder='0' scrolling='no' width='300' height='250'><a href='http://revive.consumedmedia.id/www/delivery/ck.php?n=ad8ff19e&amp;cb=INSERT_RANDOM_NUMBER_HERE' target='_blank'><img src='http://revive.consumedmedia.id/www/delivery/avw.php?zoneid=69&amp;cb=INSERT_RANDOM_NUMBER_HERE&amp;n=ad8ff19e' border='0' alt='' /></a></iframe>
                    <!--<img src="<?php echo base_url('assets/banner/mr-300x250.jpeg'); ?>">-->


                </div>
                <div class="newsletter card-tm1 black">
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
                
            </div>
        </div>
    </div>  
</div>																																												