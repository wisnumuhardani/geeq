<?=$head?>
<?=$navbar?> 
<div class="padtb60 blue-grey lighten-4">
    <div class="container">
        <div class="row"> 
            <div class="col l4 offset-l4 m8 offset-m2 s12 center">
			 <div class="card-tm2 white bx-login">
                <h5>Register</h5>
                <?php echo $message; ?> 
                <?php echo form_open("user/register"); ?>  
                <div class="row">
                    <div class="input-field col s12 m12">
                        <i class="material-icons prefix">mail_outline</i>
                        <input class="validate" name="email" type="email" placeholder="Email" required>
                     </div>
                    <div class="input-field col s12 m12">
                        <i class="small material-icons prefix">lock_outline</i>
                        <input placeholder="Password min 8 Karakter" class="validate" name="password" type="password" required/> 
                    </div>
                    <div class="input-field col s12 m12">
                        <i class="small material-icons prefix">lock_outline</i>
                        <input placeholder="Ulangi password" class="validate" name="confirm_password"  type="password" required/> 
                    </div> 
                    <div class="col s12 m12">
                        <button name="submit" type="submit" class="btn waves-effect blueloker z-depth-0 blue-grey darken-3">DAFTAR</button>
                    </div>
                </div>
                <?php echo form_close(); ?>
                Sudah Punya Akun? <a class="modal-trigger" href="<?php echo base_url('login'); ?>">Login sekarang</a>
			   <div class="clearfix"></div>
			  </div>
            </div> 
        </div> 
    </div> 
</div> 
<?=$footer?>