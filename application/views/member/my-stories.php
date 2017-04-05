<?=$head?>
<?=$navbar?> 
<div class="blue-grey lighten-4">
    <div class="section container">
        <div class="row">
            <div class="col s0 m2 l1"></div>
            <div class="col s12 m8 l10">
                <div class="bx-title">
                    <h2 class="stand-title"><span>Your stories</span></h2>
                </div>
                <div class="card-tm2 white">
                    <div class="bx-btn-stories p40 right">
                        <a href="<?php echo base_url('write-story/' . $id_reg . ''); ?>" class="btn waves-effect waves-light blue-grey darken-3"><i class="material-icons left">mode_edit</i> Write a story</a>
                    </div>
                    <ul id="tabs-stories" class="tabs tabs-stories">
                        <li class="tab col s2"><a href="#mystories" class="black-text">Stories</a></li>
                        <li class="tab col s2"><a class="active black-text" href="#draft">Draft</a></li>
                    </ul>
                    <div id="mystories" class="col s12">
                        <?php foreach ($postmember_active as $val) { ?>
					    <div class="write-col">
                            <div class="col s8">
                                <a href="<?php echo base_url('read/' . $val['id_post'] . '/' . $val['seotitle']); ?>" target="_blank" class="black-text"><h3 class="stand-title"><?php echo $val['title']; ?></h3></a>

                                <small class="grey-text">Last edited <?php echo hitung_mundur(strtotime($val['last_edit'])); ?></small>
                            </div>
                            <div class="col s4">
							  <div class="right">
                                <a href="<?php echo base_url('member/postedit/' . $val['id_post'] . ''); ?>" class="btn waves-effect waves-light blue-grey darken-2">Edit</a>
                                <a href="<?php echo base_url('member/delete/' . $val['id_post'] . ''); ?>" class="btn waves-effect waves-light red darken-3">Delete</a>
							  </div>
                            </div>
						     <div class="clearfix"></div>
					   </div>
                        <?php } ?>
                    </div>
                    <div id="draft" class="col s12"> 
                        <?php foreach ($postmember_draft as $val) { ?>
					   <div class="write-col">
                            <div class="col s8">
                                <a href="<?php echo base_url('read/' . $val['id_post'] . '/' . $val['seotitle']); ?>" target="_blank" class="black-text"><h3 class="stand-title"><?php echo $val['title']; ?></h3></a>
                                <small class="grey-text">Last edited <?php echo hitung_mundur(strtotime($val['last_edit'])); ?></small>
                            </div>
                            <div class="col s4">
							   <div class="right">
                                <a href="<?php echo base_url('member/postedit/' . $val['id_post'] . ''); ?>" class="btn waves-effect waves-light blue-grey darken-2">Edit</a>
                                <a href="<?php echo base_url('member/delete/' . $val['id_post'] . ''); ?>" class="btn waves-effect waves-light red darken-3">Delete</a>
							  </div>
                            </div>
						   <div class="clearfix"></div>
					   </div>
                        <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                </div><!--end card-->
            </div>
            <div class="col s0 m2 l1"></div>
        </div>  
    </div>  
</div>
<?=$footer?>