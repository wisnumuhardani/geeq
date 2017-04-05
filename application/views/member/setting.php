<?=$head?>
<?=$navbar?> 
<div class="blue-grey lighten-3">
    <div class="section container">
        <div class="row">
            <div class="col s0 m4 l2"></div>
            <div class="col s12 m4 l8">
                <div class="bx-title">
                    <h2 class="stand-title st-1"><span>Setting</span></h2>
                </div>
                <div class="card-tm2 white">
                    <form id="email">
                        <input hidden name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                        <input hidden name="id_reg" value="<?php echo $id_reg; ?>">
                        <input hidden name="id" value="<?php echo $id; ?>">
                        <div class="subtitle">Email</div>
                        <div class="setting-col">
                            <div class="col s12 m8 l8">
                                <h3 class="stand-title">Your email</h3>
                                <div class="input-field col s10">
                                    <input disabled value="<?php echo $email; ?>" id="disabled" type="text" class="validate nshow">
                                    <input name="email_baru" value="<?php echo $email; ?>" type="email" class="validate thide" style="display:none;" required>
                                </div>
                            </div>
                            <div class="col s12 m4 l4">
                                <a class="btn-geeq nshow">Edit email</a>
                                <button type="submit" class="btn-geeq nhide" style="display:none;">Save</button> 
                                <a class="btn-geeq nhide" style="display:none;">Cancel</a>
                            </div>
                        </div>
                    </form>
                    <div class="setting-col">
                        <div class="col s12 m9 l9">
                            <h3 class="stand-title">Notifications on your content</h3>
                            <span>We’ll email you when there are notifications on your stories and publications.</span>
                        </div>
                        <div class="col s12 m3 l3">
                            <div class="switch m40 right">
                                <form id="content">
                                    <input hidden name="id" value="<?php echo $setting_id; ?>">
                                    <input hidden name="id_reg" value="<?php echo $id_reg; ?>">
                                    <input hidden name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                    <label> 
                                        Off 
                                        <?php if ($not_content == '1') { ?>
                                            <input name="content" type="checkbox" checked>
                                        <?php } else { ?>
                                            <input name="content" type="checkbox">
                                        <?php } ?>
                                        <span class="lever"></span> 
                                        On
                                    </label>    
                                </form>  
                            </div>
                        </div>
                    </div>

                    <div class="setting-col">
                        <div class="col s12 m9 l9">
                            <h3 class="stand-title">Social notifications</h3>
                            <span>We’ll email you when your network interacts with you on Geeq</span>
                        </div>
                        <div class="col s12 m3 l3">
                            <div class="switch m40 right">
                                <form id="social">       
                                    <input hidden name="id" value="<?php echo $setting_id; ?>">
                                    <input hidden name="id_reg" value="<?php echo $id_reg; ?>">
                                    <input hidden name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                    <label> 
                                        Off 
                                        <?php if ($not_social == '1') { ?>
                                            <input name="social" type="checkbox" checked>
                                        <?php } else { ?>
                                            <input name="social" type="checkbox">
                                        <?php } ?>
                                        <span class="lever"></span> 
                                        On
                                    </label>    
                                </form>                           
                            </div>

                        </div>
                    </div>
                    <div class="clearfix"></div> 
                </div><!--end card-->
            </div>
            <div class="col s0 m4 l2"></div>
        </div>  
    </div>  
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('form#email').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: "<?php echo base_url('member/change_email'); ?>",
                type: "POST",
                data: $('form#email').serialize(),
                success: function () {
                    Materialize.toast('Update Success', 2000, 'green');                    
                    location.reload();
                }
            });
        });

        $("#content").change(function () {
            $.ajax({
                url: "<?php echo base_url('member/setting_notifikasi_content'); ?>",
                type: "POST",
                data: $('form#content').serialize(),
                success: function () {
                    Materialize.toast('Update Success', 2000, 'blue');
                }
            });
        });

        $("#social").change(function () {
            $.ajax({
                url: "<?php echo base_url('member/setting_notifikasi_social'); ?>",
                type: "POST",
                data: $('form#social').serialize(),
                success: function () {
                    Materialize.toast('Update Success', 2000, 'blue');
                }
            });
        });

    });
</script>
<?=$footer?>