<div class="header">

  <div class="header2">
    <a class="main-logo" href="<?php echo e(url('')); ?>"><img src="template_asset/images/logo/logo.png" alt=""></a>
    <form action="<?php echo e(url('tim-kiem')); ?>" class="search" method="POST">
      <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
      <input class="txt-search" type="text" name="search" size="80" placeholder="Nhập tên hoặc mã sản phẩm cần tìm kiếm...">
      <button type="submit" class="btn-red ok" name="ok">Tìm kiếm</button>
    </form>

    <ul class="header-right">
      
      
      
      <li><img class="tuvan" src="template_asset/images/site/header/btn-tuvan.png" alt=""></li>
      <li>  <?php
        $result=count(Cart::content());
     ?><a class="mycart" href="<?php echo e(url('gio-hang')); ?>"><img src="<?php echo e(url('/')); ?>/images/grocery-cart-icon-7482.png" /> <span>(<?php echo $result; ?>)</span></a></li>
    </ul>
    <?php
        $result=count(Cart::content());
     ?>
   
  </div>

</div>
<div style="clear: both;"></div>
