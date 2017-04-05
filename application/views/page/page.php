 
<div class="grey lighten-2">
    <div class="section container">
        <div class="row">
            <div class="col l12">
                <h1><?php echo $title; ?></h1>
                <?php if ($images != "") { ?>
                    <div class="col-md-4 mmb15">
                        <img class="responsive-img" src="<?php echo $images; ?> " alt="#">
                    </div>
                <?php } ?>
                <?php if ($images == "") { ?>
                    <div class="col-md-12"> 
                    <?php } else { ?>
                        <div class="col-md-8"> 
                        <?php } ?> 
                        <?php echo $content; ?> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

