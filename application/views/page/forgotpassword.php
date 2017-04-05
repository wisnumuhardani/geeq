<div class="grey lighten-2 padtb60">
    <div class="section container"> 
        <div class="row"> 
            <div class="col l4 offset-l4 m8 offset-m2 s12">
                <h5>Lupa Password</h5>
                <small>Masukan email yang Anda daftarkan:</small>
                <div class="text-center red-text"> 
                    <?php echo $message; ?>   
                </div>
                <?php echo form_open("user/forgotpassword"); ?>
                <div class="input-field">                    
                    <?php echo form_input($identity); ?>
                    <label>Email</label>
                </div>
                <div class="input-field">
                    <button class="btn orange" type="submit" name="submit">SUBMIT</button>
                </div>
                <?php echo form_close(); ?> 
            </div>
        </div>
    </div>
</div>
