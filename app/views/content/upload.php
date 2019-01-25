<?php $this->output('tampilan/header'); ?>
<!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
<script type="text/javascript">
$(document).ready(function(){
	$('#images').on('change',function(){
		$('#multiple_upload_form').ajaxForm({
			target:'#images_preview',
			beforeSubmit:function(e){
				$('.uploading').show();
			},
			success:function(e){
				$('.uploading').hide();
				$('#images_preview').append("<img src='/bantuan/uploaddistribusi/"+e+"' height='300px' width='300px'/>");
			},
			error:function(e){
			}
		}).submit();
	});
});
</script>

	<div class="upload_div" style="padding-top:20px">
    <form method="post" name="multiple_upload_form" id="multiple_upload_form" enctype="multipart/form-data" action="<?php echo $settingUrl->siteUrl('admin/distribusi/prosesupload'); ?>">
    	<input type="hidden" name="image_form_submit" value="1"/>
            <label>Pilih gambar yang mau diunggah.</label>
            <input class="form-control" type="file" name="images[]" id="images" multiple >
        <div class="uploading none">
            <label>&nbsp;</label>
            <img src="<?php $settingUrl->baseUrl('public/assets/images/uploading.gif'); ?>"/>
        </div>
    </form>
    </div>
    <div class="gallery" style="padding-top:30px" id="images_preview"></div>
</div>
<?php $this->output('tampilan/rightmenu'); ?>