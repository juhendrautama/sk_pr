   <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" >
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">

          <?php $no=1; foreach($tampil_data_rekomen->result()as $rs){?> 
            <div class="carousel-item <?php if ($ambil_jumlah_slider->jumlah==$rs->id_rekomen) { echo 'active';} ?>" data-bs-interval="10000">
              <img  src="img/rekomen/<?php echo $rs->file; ?>" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
           <?php } ?>

          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>