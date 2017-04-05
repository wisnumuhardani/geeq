<?=$head?>
<?=$navbar?> 
<div class="padtb60 blue-grey lighten-2">
    <div class="container">
        <div class="row">            
            <div class="col l4 offset-l4 m8 offset-m2 s12">  
			 <div class="card-tm white bx-login">
                <h5>Sign in</h5>
			   <div class="txt-login">Sign in to access your account.</div>
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


			   <div class="txt-login">or</div>
                <div class="text-center red-text"> 
                    <?php echo $message; ?>   
                </div>
                <?php echo form_open("user/login"); ?>
			    <div class="txt-login">Sign In with Email :</div>
                <div class="row"> 
                    <div class="input-field col l12 s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="icon_prefix" type="email" name="identity" class="validate" required>
                        <label for="email" data-error="format email salah" data-success="format email benar">Email</label>     
                    </div>
                    <div class="input-field col l12 s12">
                        <i class="small material-icons prefix">lock_outline</i>
                        <input id="password" type="password" name="password" class="validate" required>
                        <label for="password">Password</label>
                    </div> 
                    <div class="col l12 s12 m12 mb15">
                        <button name="submit" type="submit" class="btn waves-effect blueloker z-depth-0 blue-grey darken-3">LOGIN</button> 
				   </div>
				   <div class="col l12 s12 m12 mb15 txt-login">
                        Lupa password? <a class="modal-trigger" href="#forgot-password">Klik disini</a>
                    </div>  
                </div>
                <?php echo form_close(); ?>
			   <!--
                <p>To use Geeq you must have cookies enabled.
                    If you sign up with Facebook, we’ll start you off with a network by automatically importing any followers/followees or friends already on Geeq. Also, we’ll never post to Facebook without your permission. For more info, please see <a href="#">Login FAQ</a>.</p>-->
				<div class="clearfix"></div>	
			 </div>
            </div>   
        </div>
    </div>
</div>


<div id="forgot-password" class="modal">
    <div class="modal-content"> 
        <div class="center mb15">
            <h5 class="nomargin">Lupa Password</h5>
            <small>Masukan email yang Anda daftarkan:</small>
        </div>
        <?php echo form_open("user/forgotpassword"); ?>
        <div class="input-field col l12 s12">
            <i class="small material-icons prefix">email_outline</i>
            <input id="icon_prefix" type="email" name="identity" class="validate">
            <label for="icon_prefix">Email</label>
        </div> 
        <div class="center">
            <button class="waves-effect waves-light btn red darken-3" type="submit">Reset Password</button>
        </div>
        <?php echo form_close(); ?> 
    </div> 
</div>
<?=$footer?>