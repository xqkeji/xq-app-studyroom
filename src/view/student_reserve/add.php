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

<script type="text/javascript">
function buildingChange(building)
{
  building_id=building.value;
  let payload = JSON.stringify({
      building_id: building_id
  });
  let jsonHeaders = new Headers({
      'Content-Type': 'application/json'
  });
  fetch('<?=xq_url('getoption')?>', {
    method: 'POST',    // 发送请求体时必须使用一种HTTP方法
    body: payload,
    headers: jsonHeaders
  }).then(res=>res.json()).then(res=>{
	  let room=document.querySelector('#room_id');
    let options=room.options;
    let length=options.length;
    for(let i=0;i<length;i++)
    {
      options.remove(0);
    }
    for(let key in res)
    {
      options.add(new Option(res[key],key));
    }
  });

}
</script>



