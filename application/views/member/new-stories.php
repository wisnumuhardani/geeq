<?=$head?>
<?=$navbar?>
<div class="blue-grey lighten-3">
    <div class="section container">
        <div class="row">
            <div class="col s0 m2 l1"></div>
            <div class="col s12 m8 l10">
                <div class="card-tm2 white">
                    <div class="p40">
                        <div class="bx-title">
                            <h2 class="stand-title"><span>Tulis Cerita</span></h2>
                        </div>
                    </div>
                    <form id="stories" name="stories" method="post" action="<?php echo base_url('member/savepost'); ?>" enctype="multipart/form-data">
                        <input hidden name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                        <input hidden name="id_reg" value="<?php echo $id_reg; ?>">
                        <input hidden name="id_post" value="<?php echo $id_post; ?>">
                        <input hidden name="status" value="<?php echo $status; ?>">
                        <!--text-editor-->
                        <div class="input-field col s12">
                            <input required id="title_content" name="title" value="<?php echo $title; ?>" type="text" class="validate white" data-length="40" required>
                            <input hidden id="seotitle" name="seotitle" value="<?php echo $seotitle; ?>">
                            <label for="title_content">Judul</label>
                        </div>
                        <div class="file-field input-field col s12">
                            <div class="blue-grey darken-3 btn waves-effect waves-light ">
                                <span>Images cover</span>
                                <input name="postimage" type="file">
                            </div>
                            <div class="file-path-wrapper pl-10">
                                <input class="file-path validate white" type="text" placeholder="Masukkan gambar utama" required>
                            </div>
                        </div>
                        <?php if (!empty($image)) { ?>
                            <div class="col s12">
                                <label>Main Image</label><br>
                                <img src="<?php echo base_url('assets/picture/thumb/' . $image . ''); ?>"/>
                            </div>
                        <?php } ?>
                        <div class="col s12"> 
                            <input id="content" name="content" type="hidden" >
                            <div id="editor-container"><?php echo $content; ?></div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="col s12 p40">  
                            <input id="tag" class="chips tag" name="tag" type="text"/>
                        </div>
                        <div class="col s12">
                            <button id="btnsave" class="waves-effect waves-light btn right blue-grey darken-3">Simpan</button>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div><!--end card-->
            </div>
            <div class="col s0 m2 l1"></div>
        </div>  
    </div>  


    <script src="<?php echo base_url('assets/js/quill.min.js'); ?>"></script>
    <script>
        var Delta = Quill.import('delta');
        var quill = new Quill('#editor-container', {
            modules: {
                toolbar: [
                    ['bold', 'italic'],['underline', 'link'],
                    [{'script': 'sub'}, {'script': 'super'}],
                    ['image', 'video']
                ]
            },
            placeholder: 'Write your story here...',
            theme: 'snow'
        });

        // Store accumulated changes
        var change = new Delta();
        quill.on('text-change', function (delta) {
           change = change.compose(delta);
			var delta = quill.getContents();
			var text = quill.getText();
			var justHtml = quill.root.innerHTML;
//			preciousContent.innerHTML = JSON.stringify(delta);
//			justTextContent.innerHTML = text;
//			justHtmlContent.innerHTML = justHtml;
//			console.log(justHtml);

        });

        // Save periodically
        // setInterval(function () {
        //     if (change.length() > 0) {
        //         console.log('Saving changes', change);
                 
        //          Send partial changes
        //          $.post('/your-endpoint', { 
        //          partial: JSON.stringify(change) 
        //          });
                 
        //          Send entire document
        //          $.post('/your-endpoint', { 
        //          doc: JSON.stringify(quill.getContents())
        //          });
                 
        //         change = new Delta();
        //     }
        // }, 5 * 1000);

        // Check for unsaved data
        // window.onbeforeunload = function () {
        //     if (change.length() > 0) {
        //         return 'There are unsaved changes. Are you sure you want to leave?';
        //     }
        // }

        //var form = document.querySelector('stories');
        $( "#btnsave" ).click(function() {
            event.preventDefault();
            //var content = JSON.stringify(quill.getContents());
			var content = quill.root.innerHTML;
            //console.log(content);
            $("#content").val(content);
            $( "#stories" ).submit();
        });    
        
        //SEOTITLE
        $('#title_content').on('input', function () {
            var permalink;
            permalink = $.trim($(this).val());
            permalink = permalink.replace(/\s+/g, ' ');
            $('#seotitle').val(permalink.toLowerCase());
            $('#seotitle').val($('#seotitle').val().replace(/\W/g, ' '));
            $('#seotitle').val($.trim($('#seotitle').val()));
            $('#seotitle').val($('#seotitle').val().replace(/\s+/g, '-'));
        });
        //TAG
        $('input.tag').material_chip({
            placeholder: 'Enter a tag',
            secondaryPlaceholder: '+Tag'
        });
    </script>	 
<?=$footer?>