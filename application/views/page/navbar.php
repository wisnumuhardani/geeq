<div class="head-geeq blue-grey darken-4">
    <div class="container">
        <a href="<?php echo base_url(); ?>" class="brand-logo">
            <img src="<?php echo base_url('assets/images/logo-geeq.png'); ?>" alt="logo">
        </a>
        <div class="right lb-ads1">

			<iframe id='abade3b9' name='abade3b9' src='http://revive.consumedmedia.id/www/delivery/afr.php?zoneid=68&amp;cb=INSERT_RANDOM_NUMBER_HERE' frameborder='0' scrolling='no' width='728' height='90'><a href='http://revive.consumedmedia.id/www/delivery/ck.php?n=abd34e44&amp;cb=INSERT_RANDOM_NUMBER_HERE' target='_blank'><img src='http://revive.consumedmedia.id/www/delivery/avw.php?zoneid=68&amp;cb=INSERT_RANDOM_NUMBER_HERE&amp;n=abd34e44' border='0' alt='' /></a></iframe>
			<!--<img src="<?php echo base_url('assets/banner/lb-728x90.jpeg'); ?>">-->

        </div>
    </div>
    <div class="clearfix"></div>
</div>
<nav class="blue-grey darken-3" role="navigation">
    <div class="nav-wrapper container">
        <ul class="hide-on-med-and-down">
            <li><a href="<?php echo base_url('category/ngayal'); ?>">Ngayal</a></li>
            <li><a href="<?php echo base_url('category/tekno'); ?>">Tekno</a></li>
            <li><a href="<?php echo base_url('category/tantangan'); ?>">Tantangan</a></li>
            <li><a href="<?php echo base_url('category/geeq-oto'); ?>">GEEQ Oto</a></li>
            <li><a href="<?php echo base_url('category/ngetop'); ?>">Ngetop</a></li>
            <!--<li><a href="<?php echo base_url('category/berita-pilihan'); ?>">Berita Pilihan</a></li>-->
            <li><a href="<?php echo base_url('category/video'); ?>">Video</a></li>
        </ul>
        <a href="#" class="right" id="search"><i class="material-icons">search</i></a>
        <?php if (!$this->ion_auth->logged_in()) { ?> 
            <a href="#loginmodal" class="modal-trigger right btn-top" >Sign in/ Sign up</a>
        <?php } else { ?> 
            <a href="#" data-activates="dropdown-menuser" class="right btn-top dropdown-button usr-login">
			   <?php if(!empty($datalogin['profil_picture'])): ?>
                <img src="<?php echo base_url('assets/member/' . $datalogin['id_reg'] . '/thumb/' . $datalogin['profil_picture'] . ''); ?>" alt="" class="circle usr-feat">
			   <?php else: ?>
			   <img src="<?php echo base_url('assets/images/no-foto.jpg'); ?>" alt="" class="circle usr-noprofile">
			   <?php endif;?>
				
            </a>
            <a href="#" data-activates="dropdown-notif" class="right btn-top dropdown-button"><i class="material-icons prefix">notifications</i></a>
            <!--<a href="<?php echo base_url('write-story/' . $datalogin['id_reg'] . ''); ?>" class="modal-trigger right btn-top">Write Content</a>-->
 		    <a href="<?php echo base_url('write-story/' . $datalogin['id_reg'] . ''); ?>" class="modal-trigger right btn-top"><i class="material-icons prefix">mode_edit</i></a>
        <?php } ?>
        <ul id="nav-mobile" class="side-nav">
             <li><a href="<?php echo base_url('category/ngayal'); ?>">Ngayal</a></li>
            <li><a href="<?php echo base_url('category/tekno'); ?>">Tekno</a></li>
            <li><a href="<?php echo base_url('category/tantangan'); ?>">Tantangan</a></li>
            <li><a href="<?php echo base_url('category/geeq-oto'); ?>">GEEQ Oto</a></li>
            <li><a href="<?php echo base_url('category/ngetop'); ?>">Ngetop</a></li>
            <!--<li><a href="<?php echo base_url('category/berita-pilihan'); ?>">Berita Pilihan</a></li>-->
            <li><a href="<?php echo base_url('category/video'); ?>">Video</a></li>
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
</nav>
<!--
<div id="nav-top" style="display:none;">
<div class="nav-top">
	<nav class="blue-grey darken-3" role="navigation">
    <div class="nav-wrapper container">
		<a href="<?php echo base_url(); ?>" >
		<img src="<?php echo base_url('assets/images/favico/64x64.png');?>" class="left icon-nav">  
		</a>
        <ul class="hide-on-med-and-down">
            <li><a href="<?php echo base_url('category/sci-fi'); ?>">Sci-Fi</a></li>
            <li><a href="<?php echo base_url('category/tech'); ?>">Tech</a></li>
            <li><a href="<?php echo base_url('category/extreme-sport'); ?>">Extreme Sport</a></li>
            <li><a href="<?php echo base_url('category/automotive'); ?>">Automotive</a></li>
            <li><a href="<?php echo base_url('category/top-stories'); ?>">Top Stories</a></li>
            <li><a href="<?php echo base_url('category/editorial-pick'); ?>">Editorial Pick</a></li>
            <li><a href="<?php echo base_url('category/video'); ?>">Video</a></li>
        </ul>
        <a href="#" class="right" id="search"><i class="material-icons">search</i></a>
        <?php if (!$this->ion_auth->logged_in()) { ?> 
            <a href="#loginmodal" class="modal-trigger right btn-top" >Sign in/ Sign up</a>
        <?php } else { ?> 
            <a href="#" data-activates="dropdown-menuser" class="right btn-top dropdown-button usr-login">
			   <?php if(!empty($datalogin['profil_picture'])): ?>
                <img src="<?php echo base_url('assets/member/' . $datalogin['id_reg'] . '/thumb/' . $datalogin['profil_picture'] . ''); ?>" alt="" class="circle usr-feat">
			   <?php else: ?>
			   <img src="<?php echo base_url('assets/images/no-foto.jpg'); ?>" alt="" class="circle usr-noprofile">
			   <?php endif;?>
				
            </a>
            <a href="#" data-activates="dropdown-notif" class="right btn-top dropdown-button"><i class="material-icons prefix">notifications</i></a>
            <a href="<?php echo base_url('write-story/' . $datalogin['id_reg'] . ''); ?>" class="modal-trigger right btn-top">Write Content</a>
        <?php } ?>
        <ul id="nav-mobile" class="side-nav">
            <li><a href="<?php echo base_url('category/sci-fi'); ?>">Sci-Fi</a></li>
            <li><a href="<?php echo base_url('category/tech'); ?>">Tech</a></li>
            <li><a href="<?php echo base_url('category/extreme-sport'); ?>">Extreme Sport</a></li>
            <li><a href="<?php echo base_url('category/automotive'); ?>">Automotive</a></li>
            <li><a href="<?php echo base_url('category/top-stories'); ?>">Top Stories</a></li>
            <li><a href="<?php echo base_url('category/editorial-pick'); ?>">Editorial Pick</a></li>
            <li><a href="<?php echo base_url('category/video'); ?>">Video</a></li>
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
</nav>
</div>
</div>
-->
<div class="bx-search blue-grey darken-4" style="display:none;">
    <div id="seachform" class="section container">
        <div class="col s12 m12 l12"> 
            <form class="search-form" method="get" action="<?php echo base_url('page/searchresult'); ?>">
                <div class="input-field s12 m12 l12">
                    <!-- <a href="#" class="right"><i class="material-icons prefix">search</i></a> --> 
                    <button class="right" type="submit"><i class="material-icons blue-grey-text">search</i></button> 
                    <input id="keyword" type="text" name="keyword" class="validate" required>
                    <label for="icon_prefix">Search in Geeq</label>            
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Dropdown notification -->
<div id="dropdown-notif" class="dropdown-notification">
    No notification yet!
</div>

<ul id="dropdown-menuser" class="dropdown-content">
    <!--<li class="nav-point"><div class="mypoint-nav">My point</div><div class="bx-point-nav right">143</div></li>-->
    <li><a href="<?php echo base_url('write-story/' . $datalogin['id_reg'] . ''); ?>">New Stories</a></li>
    <li><a href="<?php echo base_url('my-stories/' . $datalogin['id_reg'] . ''); ?>">Draft</a></li>
    <li><a href="<?php echo base_url('my-stories/' . $datalogin['id_reg'] . ''); ?>">My Stories</a></li>
    <li class="divider"></li>
    <li><a href="<?php echo base_url('profile/' . $datalogin['id_reg'] . ''); ?>">Profile</a></li>
    <li><a href="<?php echo base_url('setting/' . $datalogin['id_reg'] . ''); ?>">Setting</a></li>
    <li><a href="<?php echo base_url('user/logout'); ?>">Sign out</a></li>
</ul>

<!-- Modal Structure -->
<div id="loginmodal" class="modal ">
    <div class="modal-header blue-grey darken-4">
        <img src="<?php echo base_url('assets/images/logo-geeq.png'); ?>">
    </div>
    <div class="modal-content blue-grey darken-4">
        <input type="hidden" id="csrf_token_name" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
        <a href="javascript:void(0)" class="bt-soc-login facebook" onclick="toggleSignInFacebook();">
            <svg style="width:34px;height:34px" viewBox="0 0 24 24">
            <path fill="#fff" d="M19,4V7H17A1,1 0 0,0 16,8V10H19V13H16V20H13V13H11V10H13V7.5C13,5.56 14.57,4 16.5,4M20,2H4A2,2 0 0,0 2,4V20A2,2 0 0,0 4,22H20A2,2 0 0,0 22,20V4C22,2.89 21.1,2 20,2Z" />
            </svg>
            <span>Masuk dengan Facebook</span>
        </a> 
        <a href="javascript:void(0)" class="bt-soc-login google" onclick="toggleSignInGoogle();" style="margin-bottom: 8px;">
            <svg class="svgIcon-use" width="34" height="34" viewBox="0 0 25 25">
            <g fill="none" fill-rule="evenodd"><path d="M20.66 12.693c0-.603-.054-1.182-.155-1.738H12.5v3.287h4.575a3.91 3.91 0 0 1-1.697 2.566v2.133h2.747c1.608-1.48 2.535-3.65 2.535-6.24z" fill="#4285F4"/><path d="M12.5 21c2.295 0 4.22-.76 5.625-2.06l-2.747-2.132c-.76.51-1.734.81-2.878.81-2.214 0-4.088-1.494-4.756-3.503h-2.84v2.202A8.498 8.498 0 0 0 12.5 21z" fill="#34A853"/><path d="M7.744 14.115c-.17-.51-.267-1.055-.267-1.615s.097-1.105.267-1.615V8.683h-2.84A8.488 8.488 0 0 0 4 12.5c0 1.372.328 2.67.904 3.817l2.84-2.202z" fill="#FBBC05"/><path d="M12.5 7.38c1.248 0 2.368.43 3.25 1.272l2.437-2.438C16.715 4.842 14.79 4 12.5 4a8.497 8.497 0 0 0-7.596 4.683l2.84 2.202c.668-2.01 2.542-3.504 4.756-3.504z" fill="#EA4335"/></g>
            </svg>
            <span>Masuk dengan Google</span>
        </a> 
		<div class="reg-geeq">Belum punya akun GEEQ.ID? Masuk <a href="<?php echo base_url('register'); ?>" class="red-text darken-4">di sini</a></div>		
    </div>
	<!--
    <div class="modal-footer">
        <p>To use Geeq you must have cookies enabled.
            If you sign up with Facebook, we’ll start you off with a network by automatically importing any followers/followees or friends already on Geeq. Also, we’ll never post to Facebook without your permission. For more info, please see <a href="#">Login FAQ</a>.</p>
    </div>
	-->
</div>
<!--Modal Login-->