  <div class="col-lg-9 col-md-9 col-md-offset-0 col-sm-9 col-xs-12 u">
                    <div class="ilham12">
                        <div class="well"><span class="judul">Kategori </span></div>
                    </div>
                    <div class="row">
                        <?php
                        $gelalllkat=$this->Mpublik->get_all_kategori();
                        foreach($gelalllkat->result() as $a){ 
                        ?>
                        <div class="col-lg-3 col-lg-push-0 col-lg-pull-0 col-md-3 col-md-offset-0 col-md-push-0 col-md-pull-0 col-sm-3 col-xs-6">
            <a href="<?=base_url('welcome/form_kategori/'.$a->id)?>" class="thumbnail">
      <img src="<?=base_url()?>/images/<?=$a->kategori?>" style="height: 180px" alt="...">
    </a>
                        </div>
						<?php	
						}
                        ?>
                        
                        
                       
                        
                    </div>
                </div>