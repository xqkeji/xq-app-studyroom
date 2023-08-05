<?php
$this->setMainView("admin");
$params=xqkeji\App::getActionParams();
?>
<div id="xqkeji-page-body" class="card">
  <div class="card-header bg-success align-items-center">
      <div class="row">
          <div class="col-4">
              <h5 class="align-items-center">
              <span class="xq-backpage" style="margin-right:1rem;cursor:pointer;">
                <i class="bi bi-reply" ></i>
              </span>
              <?=$pageTitle?>
              </h5>
          </div>
      </div>
  </div>
  <div class="card-body">
    <?php
	  $this->outputFlash();
	  echo $form;
	?>
  </div>
</div>





