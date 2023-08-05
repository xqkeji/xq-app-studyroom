<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=xq_c('config','site_name','自习室管理系统')?>-学生登录</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?=xq_c('config','seo_desc','自习室管理系统')?>">
  <meta name="author" content="xqkeji.cn">
  <?=$this->getAssetsCss('xq-student-page')?>
</head>
<body class="bg-dark">
<div class="container-fluid">
	<div class="row justify-content-center align-items-center" style="height:100vh;">
        <div class="col-4" style="margin-top:-5rem;">
          <h2 class="text-center"><b><?=xq_c('config','site_name','自习室管理系统')?></b></h2>
          <div class="card">
            <div class="card-body">
              <p class="text-dark text-center" style="font-size:18px;">
              学生登录
              </p>
              <?php
				 $this->outputFlash();
				 echo $form;
			  ?>			
            </div>
          </div>
        </div>
    </div>
</div>
<?=$this->getAssetsJs('xq-student-page')?>
</body>
</html>