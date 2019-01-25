<?php $this->output('tampilan/header'); ?>
<!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <h1 class="my-4">SALING MEMBANTU
            <small>Untuk Kemanusiaan</small>
          </h1>

          <!-- Blog Post -->
          <div class="card mb-4">
            <img src="<?php echo $settingUrl->baseUrl(); ?>assets/images/bantuan.jpg">
          </div>

         
          <!-- Pagination -->
          <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Newer &rarr;</a>
            </li>
          </ul>

        </div>
<?php $this->output('tampilan/rightmenu'); ?>