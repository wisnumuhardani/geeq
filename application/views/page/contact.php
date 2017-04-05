<?=$head?>
<?=$navbar?>
<div class="grey lighten-2 padtb60">
    <div class="section container">
        <div class="row">
            <div class="col l3 s12">
                <h5>Contact Us</h5> 
                <p class="grey-text">EightyEight@Casablanca, 5th floor unit F,G
                    Jl Raya Casablanca Kav. 88
                    Kuningan. Jakarta Selatan, Indonesia</p>
                <i class="fa fa-phone-square"></i> 021 12347890<br>
            </div>
            <div class="col l5 s12">
                <?php echo $this->session->flashdata('msg'); ?> 
                <?php echo form_open("user/contactpost"); ?>
                <div class="input-field">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="name" type="text" class="validate" name="name">
                    <label for="name">Name</label>
                </div>
                <div class="input-field">
                    <i class="material-icons prefix">mail</i>
                    <input id="email" type="email" class="validate" name="email">
                    <label for="email">Email</label>
                </div> 
                <div class="input-field">
                    <i class="material-icons prefix">phone</i>
                    <input id="phone" type="text" class="validate" name="phone">
                    <label for="phone">phone</label>
                </div>  
                <div class="input-field">
                    <i class="material-icons prefix">create</i>
                    <input id="subject" type="text" class="validate" name="subject">
                    <label for="subject">subject</label>
                </div>  
                <div class="input-field">
                    <i class="material-icons prefix">create</i>
                    <textarea id="message" class="materialize-textarea" name="message"></textarea>
                    <label for="message">Pesan</label>
                </div>   
                <button class="btn" type="submit">Kirim</button>

                <?php echo form_close(); ?> 
            </div> 
            <div class="col l4 s12 m12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.297499880511!2d106.83966961432043!3d-6.224448662692956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f38d25ae12df%3A0x625972cd1f030969!2sOffice+88!5e0!3m2!1sen!2sus!4v1488912300546" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="clearfix"></div> 
        </div>
    </div>
</div> 
<script>
    $(document).ready(function () {
        $('.refreshCaptcha').on('click', function () {
            $.get('<?php echo base_url('page/refreshcapcha'); ?>', function (data) {
                $('#captImg').html(data);
            });
        });
    });
</script>	
<?=$footer?>			