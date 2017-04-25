<?=$head?>
<?=$navbar?>
<div class="dash-profile">
    <div class="bx-cover" style="background:url('<?php echo base_url(); ?>/assets/member/<?php echo $info_user[0]['id_reg']; ?>/<?php echo $info_user[0]['cover']; ?>') 0px 0px; background-size:cover">
        <div class="bg-infoprofile">
            <div class="container">
                <div class="bx-dash">
                    <div class="indash-profile">  
                        <?php
                        
                            if (!empty($info_user[0]['picture']) &&  file_exists('assets/member/' . $info_user[0]['id_reg'] . '/' . $info_user[0]['picture'])) {
                                echo '<img src="' . base_url('assets/member/' . $info_user[0]['id_reg'] . '/' . $info_user[0]['picture'] . '') . '" >';
                            } else {
                                echo '<img src="' . base_url('assets/images/no-foto.jpg') . '">';
                            }
                        
                        ?>   
                        <div class="indash-info-profile">

                            <h1><?php echo $info_user[0]['first_name'] . ' ' . $info_user[0]['last_name']; ?></h1>
                            <div class="fol-profile">
                                <span><a href="#"><?php echo $following; ?></a> Following</span>
                                <span><a href="#"><?php echo $followers; ?></a> Followers</span>
                            </div>
                            <span><?php echo $info_user[0]['bio']; ?></span>
                            <div class="clearfix"></div>
                            <?php if ($this->ion_auth->logged_in()) { ?> 
                                <?php if ($info_user[0]['id_reg'] == $datalogin['id_reg']) { ?>     
                                    <div class="bt-edit left">
                                        <a  href="<?php echo base_url('setting/' . $datalogin['id_reg'] . ''); ?>" class="btn-geeq">Edit profile</a>
                                        <a href="#gantifoto" class="btn-geeq">Edit Foto Profile</a>
                                        <a href="#ganticover" class="btn-geeq">Edit Cover Profie</a>
                                        <!--                                        <a class="btn-geeq nhide" style="display:none;">Save</a>
                                                                                <a class="btn-geeq nhide" style="display:none;">Cancel</a>-->
                                    </div>
                                    <?php
                                }
                            }
                            ?> 
                        </div>
                    </div><!--end indash-profile-->
                </div>
            </div><!--container-->
        </div>
    </div><!--bx-conver-->
    <div class="container">
        <div class="nav-dash">
            <ul>
                <li><a href="<?php echo base_url('profile/' . $info_user[0]['id_reg']); ?>">Profile</a></li>
                <li><a href="<?php echo base_url('my-stories/' . $datalogin['id_reg'] . ''); ?>">My Stories</a></li>
            </ul>
            <div class="bx-scr right">
                <h3><?php echo $info_user[0]['total_poin'];?> <span>Point</span></h3>
                <!--<h3>280 <span>Reads (30 Days)</span></h3>-->
			
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<div class="blue-grey lighten-2">
    <div class="section container">
        <div class="row">
           
            <div class="col s12 m12 l3 left-top-profile">
                 <div class="bx-title">
                    <h2 class="stand-title"><span>TOP PROFILE</span></h2>
                </div>
                <div class="card-tm2 white">
                    <?php foreach ($top_profile as $val) { ?> 
                        <div class="bx-profile">
                            <a href="<?php echo base_url('profile/' . $val['id_reg']); ?>">
                                <?php                                
                                    if (!empty($val['picture']) && file_exists('assets/member/' . $val['id_reg'] . '/thumb/' . $val['picture'] )) {
                                        echo '<img class="circle usr-feat" src="' . base_url('assets/member/' . $val['id_reg'] . '/thumb/' . $val['picture'] . '') . '" >';
                                    } else {
                                        echo '<img src="' . base_url('assets/images/no-foto.jpg') . '">';
                                    }                                
                                ?>  
                            </a>
                            <a href="<?php echo base_url('profile/' . $val['id_reg']); ?>" class="profile-author grey-text">
                                <?php echo $val['first_name'] . ' ' . $val['last_name']; ?>
                            </a>
                            <span class="point-prof"><strong><?=$val['total_poin']?></strong> Point</span>
                            <a href="#" class="btn-follow right">Follow</a>
                            <div class="clearfix"></div>          
                        </div>
                    <?php } ?>
                </div>
            </div>
            
            <div class="col s12 m12 l6">
                <?php
                foreach ($results as $val) {
                    $results_url = base_url('read/' . $val->id_post . '/' . $val->seotitle);
                    ?>
                    <div class="card-tm1 white list-feed">
                        <div class="feat-bx-sm" onclick="location.href = '<?php echo $results_url; ?>'">  
                            <?php if (!empty($val->image) && file_exists('assets/picture/medium/' . $val->image)) { ?>   
                                <img src="<?php echo base_url('assets/picture/medium/' . $val->image . ''); ?>" data-src="<?php echo base_url('assets/picture/thumb/' . $val->image . ''); ?>" class="img-card" alt="<?php echo $val->seotitle; ?>"/>
                            <?php } elseif (!empty($val->video)) { ?>                                
                                <img src="<?php echo ('http://img.youtube.com/vi/' . $val->video . '/0.jpg'); ?>" data-src="<?php echo ('http://img.youtube.com/vi/' . $val->video . '/0.jpg'); ?>" class="img-card" alt="<?php echo $val->seotitle; ?>">
                            
                            <?php } else { ?>
                                <img src="<?php echo base_url('assets/images/no-img-article.jpg'); ?>" class="img-card"/>
                            <?php } ?>  
                            <div class="info-cnt white-text">
                                <span><i class="material-icons">comment</i> 2K</span>
                                <span><i class="material-icons">share</i> 1K</span>
                                <span><i class="material-icons">visibility</i> 10K</span>
                            </div>
                            <div class="bx-sdw"> 
                                <?php
                                $this->db->select('name');
                                $this->db->select('seotitle');
                                $this->db->from('post_category');
                                $this->db->where('id', $val->category);
                                $query = $this->db->get(); {
                                    ?>
                                    <a href="<?php echo base_url('category/' . $query->row('seotitle') . ''); ?>">
                                        <span class="cat-label red darken-4">  
                                            <?php echo $query->row('name'); ?>
                                        </span>
                                    </a>
                                <?php } ?>
                            </div>
                            <div class="bx-text-feat">
                                <a href="<?php echo $results_url; ?>">
                                    <h1 class="stand-title white-text"><?php echo $val->title; ?></h1>
                                </a>
                            </div>
                        </div>
                        <div class="bx-usr-info">
                            <a href="<?php echo base_url('profile/' . $info_user[0]['id_reg']); ?>">
                                <img src="<?php echo base_url('assets/member/' . $info_user[0]['id_reg'] . '/' . $info_user[0]['picture'] . ''); ?>" alt="" class="circle usr-feat left">
                            </a>
                            <div class="auth-date grey-text lighten-5 ">
                                <span class="auth-feat">
                                    <a href="<?php echo base_url('profile/' . $info_user[0]['id_reg'] . ''); ?>" class="grey-text lighten-5">
                                        <?php
                                        echo $users[$info_user[0]['id_reg']]['username'];
                                        ?>
                                    </a>
                                </span>
                                <div class="bx-date"><i class="material-icons">schedule</i><span class="feat-date"><?php echo hitung_mundur(strtotime($val->date)); ?></span></div>
                            </div>
                            <div class="bx-sos right">
                                <a href="#" class="grey-text lighten-2"><i class="material-icons">share</i></a>
                                <a href="#" class="grey-text lighten-2"><i class="material-icons">bookmark</i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div><!--end card-tm1-->
                <?php } ?>
            </div>
            <!--RIGHT-->
            <div class="col s12 m12 l3 right-top-geeq">
                <div class="bx-title">
                    <h2 class="stand-title"><span>TOP GEEQ</span></h2>
                </div>
                <?php
                foreach ($top_geeq as $val) {
                    $top_url = base_url('read/' . $val['id_post'] . '/' . $val['seotitle']);
                    ?>
                    <div class="card-tm1 white">
                        <div class="feat-bx-sm">
                            <img src="<?php echo base_url('assets/picture/thumb/' . $val['image'] . ''); ?>" class="img-card responsive-img">
                            <div class="info-cnt white-text">
                                <span><i class="material-icons">comment</i> 2K</span>
                                <span><i class="material-icons">share</i> 1K</span>
                                <span><i class="material-icons">visibility</i> 10K</span>
                            </div>
                            <div class="bx-sdw">
							  <?php
                                $this->db->select('name');
                                $this->db->select('seotitle');
                                $this->db->from('post_category');
                                $this->db->where('id', $val['category']);
                                $query = $this->db->get(); {
                                ?>
                                <a href="<?php echo base_url('category/' . $query->row('seotitle') . ''); ?>">
                                        <span class="cat-label red darken-4">  
                                            <?php echo $query->row('name'); ?>
                                        </span>
                                    </a>
                                <?php } ?>	
                                <div class="bx-text-feat">
                                    <a href="<?php echo $top_url; ?>">
                                        <h1 class="stand-title white-text">
                                            <?php echo word_limiter($val['title'], 12); ?>   
                                        </h1>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="bx-usr-info">
                            <a href="<?php echo base_url('profile/' . $val['id_reg']); ?>"> 
                                <?php

                                    if (file_exists('assets/member/' . $val['id_reg'] . '/thumb/' . $users[$val['id_reg']]['picture'])) {
                                        echo '<a href="' . base_url('profile/' . $val['id_reg']) . '"><img class="circle usr-feat left" src="' . base_url('assets/member/' . $val['id_reg'] . '/thumb/' . $users[$val['id_reg']]['picture'] . '') . '" ></a>';
                                    } else {
                                        echo '<a href="' . base_url('profile/' . $val['id_reg']) . '"><img class="circle usr-feat left" src="' . base_url('assets/images/no-foto.jpg') . '"></a>';
                                    }

                                ?>
                                <div class="auth-date grey-text lighten-5 ">
                                    <span class="auth-feat">
                                    <a href="<?php echo base_url('profile/' . $val['id_reg'] . ''); ?>" class="grey-text lighten-5">
                                        <?php
                                        echo $users[$val['id_reg']]['username'];
                                        ?>
                                    </a>
                                </span>
                                    <div class="bx-date">
                                        <i class="material-icons">schedule</i>
                                        <span class="feat-date">
                                            <?php echo hitung_mundur(strtotime($val['date'])); ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="bx-sos right">
                                    <a href="#" class="grey-text lighten-2"><i class="material-icons">share</i></a>
                                    <a href="#" class="grey-text lighten-2"><i class="material-icons">bookmark</i></a>
                                </div>
                                <div class="clearfix"></div>
                        </div>
                    </div><!--end card-tm1--> 
                <?php } ?>
            </div>
            <!--E:RIGHT-->
        </div>  
    </div>  
</div>

<!-- Modal gantifoto -->
<div id="gantifoto" class="modal">
    <form id="updatefoto" method="post" enctype="multipart/form-data">
        <div class="modal-content">
            <h6>Ganti Foto Profil <small>Size 400x400px</small></h6>
            <input hidden name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>"/>
            <input hidden name="id_reg" value="<?php echo $datalogin['id_reg']; ?>"/>
            <input hidden name="id" value="<?php echo $datalogin['id']; ?>"/>
            <div class="file-field input-field">                        
                <div class="btn">
                    <span>Pilih Foto</span>
                    <input type="file" name="picture">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
            <button class="btn z-depth-0" type="submit">Simpan</button>
            <a href="#!" class=" modal-action modal-close waves-effect waves-red darken-4 btn-flat">Batal</a>
        </div>  
    </form>
</div>

<!-- Modal cover update -->
<div id="ganticover" class="modal">
    <form id="updatecover" method="post" enctype="multipart/form-data">
        <div class="modal-content">
            <h6>Ganti Cover Profil <small>Size 1366x400px</small></h6> 
            <input hidden name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>"/>
            <input hidden name="id_reg" value="<?php echo $datalogin['id_reg']; ?>"/>
            <input hidden name="id" value="<?php echo $datalogin['id']; ?>"/>
            <div class="file-field input-field">                        
                <div class="btn">
                    <span>Pilih Foto</span>
                    <input type="file" name="picture">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
            <button class="btn z-depth-0" type="submit">Simpan</button>
            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Batal</a>
        </div>  
    </form>
</div>


<script type="text/javascript">
    $(document).ready(function () {
        $('#updatefoto').on('submit', function (e) {
            e.preventDefault();
            var form = $('#updatefoto')[0];
            var data = new FormData(form);
            $.ajax({
                url: "<?php echo base_url('member/fotoupdate'); ?>",
                type: "POST",
                enctype: 'multipart/form-data',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
                success: function (data) {
                    Materialize.toast('Update Success', 2000, 'green');
                    location.reload();
                },
                error: function (e) {
                    Materialize.toast('Update Error', 2000, 'green');
                    location.reload();
                }
            });
        });
        //GANTI COVER
        $('#updatecover').on('submit', function (e) {
            e.preventDefault();
            var form = $('#updatecover')[0];
            var data = new FormData(form);
            $.ajax({
                url: "<?php echo base_url('member/coverupdate'); ?>",
                type: "POST",
                enctype: 'multipart/form-data',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
                success: function (data) {
                    Materialize.toast('Update Success', 2000, 'green');
                    location.reload();
                },
                error: function (e) {
                    Materialize.toast('Update Error', 2000, 'green');
                    location.reload();
                }
            });
        });
    });
</script>
<?=$footer?>