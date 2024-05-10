<?php
function renderStarRating($rating,$maxRating=5) {
  $fullStar = "<i class = 'far fa-star filled'></i>";
  $halfStar = "<i class = 'far fa-star-half filled'></i>";
  $emptyStar = "<i class = 'far fa-star'></i>";
  $rating = $rating <= $maxRating?$rating:$maxRating;

  $fullStarCount = (int)$rating;
  $halfStarCount = ceil($rating)-$fullStarCount;
  $emptyStarCount = $maxRating -$fullStarCount-$halfStarCount;

  $html = str_repeat($fullStar,$fullStarCount);
  $html .= str_repeat($halfStar,$halfStarCount);
  $html .= str_repeat($emptyStar,$emptyStarCount);
  $html = $html;
  return $html;
}

$user_id = 0;
if(Auth::check()){
  if(!empty(auth()->user()) || auth()->user() != ""){
    $user = Auth::user();
    $user_id = Auth::user()->id;
  }
}
?>
<div class="row g-3" id="main_div">
  <?php if(isset($items) && !empty($items) && $items->count() > 0): ?>
    <?php if($checkType != 'list'): ?>
      <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
          $TaxesAll = DB::table('taxes')->get();
          $sumFinalPrice1 = 0;
          $sumFinalPrice2 = 0;
          $sumTotalPriceFinal = 0;
          $couponInfo_totalprice = 0;
          $incIGV = $TaxesAll[0]->value;
          $sinIGV = $TaxesAll[1]->value;
          $incIGV_format = $incIGV / 100;
          $sinIGV_format = $sinIGV;
          $getAllCouponInfo = [];
          $getAllDataCouponById = [];
          // --------------- VALIDAR SI YA SE ACTIVÓ UN CUPÓN EN EL PRODUCTO ('tbl_applycoupons')
          if(!empty($item->coupon_id) && $item->coupon_id != "" && $item->coupon_id != null && $item->coupon_id != 0){
            $getAllCouponInfo = DB::table('tbl_applycoupons')->where("id_user","=",$user_id)->where("id_prod","=",$item->id)->where("id_coupon","=",$item->coupon_id)->where("status","!=",0)->select('id_user', 'id_prod', 'id_coupon', 'totalprice')->take(1)->get();
            if(count($getAllCouponInfo) > 0){
              $allDataConvert = json_decode($getAllCouponInfo, TRUE);
              $getAllDataCouponById = DB::table('tbl_coupons')->where("id","=",$allDataConvert[0]['id_coupon'])->where("status","!=",0)->select('name', 'discount_percentage')->take(1)->get();
              if(count($getAllDataCouponById) > 0){
                $allCouponDataConvertById = json_decode($getAllDataCouponById, TRUE);
                $coupinf_discount_percentage = $allCouponDataConvertById[0]['discount_percentage'];
                $couponInfo_totalprice = $allDataConvert[0]['totalprice']; // SETEAR LA VARIABLE DE PRECIO TOTAL PARA CUPÓN ACTIVADO
              }
            }
          }

          if($item->sections_id != 0){
            if($item->sections_id == 1 && $item->on_sale_price != 0 && $item->on_sale_price != ""){
              if($item->tax_id == 1){
                $sumFinalPrice1 = $item->on_sale_price * $incIGV_format;
                $sumFinalPrice2 = $item->on_sale_price + $sumFinalPrice1;
                // if(count($getAllCouponInfo) > 0){
                //   $sumTotalPriceFinal = $couponInfo_totalprice;
                // }else{
                //   $sumTotalPriceFinal = $sumFinalPrice2;
                // }
                if(count($getAllDataCouponById) > 0){
                  $sumTotalPriceFinal = $couponInfo_totalprice;
                }else{
                  $sumTotalPriceFinal = $sumFinalPrice2;
                }
              }else{
                $sumFinalPrice1 = $item->on_sale_price;
                $sumFinalPrice2 = $item->on_sale_price + $sumFinalPrice1;
                // if(count($getAllCouponInfo) > 0){
                //   $sumTotalPriceFinal = $couponInfo_totalprice;
                // }else{
                //   $sumTotalPriceFinal = $sumFinalPrice2;
                // }
                if(count($getAllDataCouponById) > 0){
                  $sumTotalPriceFinal = $couponInfo_totalprice;
                }else{
                  $sumTotalPriceFinal = $sumFinalPrice2;
                }
              }                    
            }else if($item->sections_id == 2 && $item->special_offer_price != 0 && $item->special_offer_price != ""){
              if($item->tax_id == 1){
                $sumFinalPrice1 = $item->special_offer_price * $incIGV_format;
                $sumFinalPrice2 = $item->special_offer_price + $sumFinalPrice1;
                // if(count($getAllCouponInfo) > 0){
                //   $sumTotalPriceFinal = $couponInfo_totalprice;
                // }else{
                //   $sumTotalPriceFinal = $sumFinalPrice2;
                // }
                if(count($getAllDataCouponById) > 0){
                  $sumTotalPriceFinal = $couponInfo_totalprice;
                }else{
                  $sumTotalPriceFinal = $sumFinalPrice2;
                }
              }else{
                $sumFinalPrice1 = $item->special_offer_price;
                $sumFinalPrice2 = $item->special_offer_price + $sumFinalPrice1;
                // if(count($getAllCouponInfo) > 0){
                //   $sumTotalPriceFinal = $couponInfo_totalprice;
                // }else{
                //   $sumTotalPriceFinal = $sumFinalPrice2;
                // }
                if(count($getAllDataCouponById) > 0){
                  $sumTotalPriceFinal = $couponInfo_totalprice;
                }else{
                  $sumTotalPriceFinal = $sumFinalPrice2;
                }
              }
            }else{
              if($item->tax_id == 1){                
                $sumFinalPrice1 = $item->special_offer_price * $incIGV_format;
                $sumFinalPrice2 = $item->special_offer_price + $sumFinalPrice1;
                // if(count($getAllCouponInfo) > 0){
                //   $sumTotalPriceFinal = $couponInfo_totalprice;
                // }else{
                //   $sumTotalPriceFinal = $sumFinalPrice2;
                // }
                if(count($getAllDataCouponById) > 0){
                  $sumTotalPriceFinal = $couponInfo_totalprice;
                }else{
                  $sumTotalPriceFinal = $sumFinalPrice2;
                }
              }else{
                $sumFinalPrice1 = $item->special_offer_price;
                $sumFinalPrice2 = $item->special_offer_price + $sumFinalPrice1; 
                // if(count($getAllCouponInfo) > 0){
                //   $sumTotalPriceFinal = $couponInfo_totalprice;
                // }else{
                //   $sumTotalPriceFinal = $sumFinalPrice2;
                // }
                if(count($getAllDataCouponById) > 0){
                  $sumTotalPriceFinal = $couponInfo_totalprice;
                }else{
                  $sumTotalPriceFinal = $sumFinalPrice2;
                }
              }
            }
          }else{
            // if(count($getAllCouponInfo) > 0){
            //   $sumTotalPriceFinal = $couponInfo_totalprice;
            // }else{
            //   $sumTotalPriceFinal = $item->discount_price;
            // }
            if(count($getAllDataCouponById) > 0){
              $sumTotalPriceFinal = $couponInfo_totalprice;
            }else{
              $sumTotalPriceFinal = $item->discount_price;
            }
          }
        ?>
        <div class="col-gd">
          <div class="product-card ">
            <?php if($item->is_stock()): ?>
            <?php
              $itm_istype = '';
              if($item->is_type == 'feature'){
                $itm_istype = 'bg-warning';
              }else if($item->is_type == 'new'){
                $itm_istype = 'bg-danger';
              }else if($item->is_type == 'top'){
                $itm_istype = 'bg-info';
              }else if($item->is_type == 'best'){
                $itm_istype = 'bg-dark';
              }else if($item->is_type == 'flash_deal'){
                $itm_istype = 'bg-success';
              }else{
                $itm_istype = '';
              }
            ?>
            <div class="product-badge <?php echo e($itm_istype); ?>"> <?php echo e($item->is_type != 'undefine' ?  (str_replace('_',' ',__("$item->is_type"))) : ''); ?></div>
            <?php else: ?>
            <div class="product-badge bg-secondary border-default text-body"><?php echo e(__('out of stock')); ?></div>
            <?php endif; ?>
            <?php if($item->previous_price && $item->previous_price !=0): ?>
            <div class="product-badge product-badge2 bg-info"> -<?php echo e(PriceHelper::DiscountPercentage($item)); ?></div>
            <?php endif; ?>
            <div class="product-thumb">
              <a href="<?php echo e(route('front.product',$item->slug)); ?>" class="d-flex align-items-center justify-content-center">
                <img class="lazy" data-src="<?php echo e(asset('assets/images/items/'.$item->thumbnail)); ?>" alt="Product" width="100" height="100" decoding="sync">
              </a>
              <div class="product-button-group">
                <a class="product-button wishlist_store" href="<?php echo e(route('user.wishlist.store',$item->id)); ?>" title="<?php echo e(__('Wishlist')); ?>"><i class="icon-heart"></i></a>
                <a class="product-button product_compare" href="javascript:;" data-target="<?php echo e(route('fornt.compare.product',$item->id)); ?>" title="<?php echo e(__('Compare')); ?>"><i class="icon-repeat"></i></a>
                <?php echo $__env->make('includes.item_footer',['sitem' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
            </div>
            <div class="product-card-body">
              <div class="product-category">
                <a href="<?php echo e(route('front.catalog').'?category='.$item->category->slug); ?>"><?php echo e($item->category->name); ?></a>
              </div>
              <h3 class="product-title">
                <a href="<?php echo e(route('front.product',$item->slug)); ?>">
                  <span><?php echo e(strlen(strip_tags($item->name)) > $name_string_count ? substr(strip_tags($item->name), 0, 38) . '...' : strip_tags($item->name)); ?></span>
                </a>
              </h3>
              <p class="product-sku__2">SKU: <?php echo e(strlen(strip_tags($item->sku)) > $name_string_count ? substr(strip_tags($item->sku), 0, 38) . '...' : strip_tags($item->sku)); ?></p>
              <h4 class="product-price">
                <?php if($item->previous_price !=0): ?>
                <del><?php echo e(PriceHelper::setPreviousPrice($item->previous_price)); ?></del>
                <?php endif; ?>
                <span><?php echo e(PriceHelper::setCurrencyPrice($sumTotalPriceFinal)); ?></span>
              </h4>
              <div class="cWtspBtnCtc">
                <a title="Solicitar información" href="https://api.whatsapp.com/send?phone=51<?php echo e($setting->footer_phone); ?>&text=Solicito información sobre: <?php echo e(route('front.product',$item->slug)); ?>" target="_blank" class="cWtspBtnCtc__pLink">
                  <img src="<?php echo e(route('front.index')); ?>/assets/images/boton-pedir-por-whatsapp.png" alt="WhatsApp imagen - Solicitar información" class="boton-as cWtspBtnCtc__pLink__imgInit" width="100" height="100" decoding="sync">
                </a>
                <div class="cWtspBtnCtc__pSubM">
                  <?php if(isset($setting->whatsapp_numbers) && $setting->whatsapp_numbers != "[]" && !empty($setting->whatsapp_numbers)): ?>
                  <?php
                    $whatsappCollection = json_decode($setting->whatsapp_numbers, TRUE);
                    $ArrwpsNumbers = "";
                    $wps_inproducts = [];
                    if(isset($whatsappCollection['whatsapp_numbers'])){
                      $ArrwpsNumbers = $whatsappCollection['whatsapp_numbers'];
                      if(isset($ArrwpsNumbers['in_product'])){
                        $wps_inproducts = $ArrwpsNumbers['in_product'];
                      }
                    }
                  ?>
                  <ul class="cWtspBtnCtc__pSubM__m">
                    <?php $__currentLoopData = $wps_inproducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="cWtspBtnCtc__pSubM__m__i">
                      <a title="<?php echo e($v['title']); ?>" class="cWtspBtnCtc__pSubM__m__link" href="https://api.whatsapp.com/send?phone=51<?php echo e($v['number']); ?>&text=<?php echo e($v['text']); ?>" target="_blank">
                        <img src="<?php echo e(asset('assets/images/Utilities')); ?>/whatsapp-icon.png" alt="Icono-tienda" width="100" height="100" decoding="sync">
                        <span><?php echo e($v['title']); ?></span>
                      </a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
                  <?php else: ?>
                  <p>No hay información</p>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
      <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
          $TaxesAll = DB::table('taxes')->get();
          $sumFinalPrice1 = 0;
          $sumFinalPrice2 = 0;
          $sumTotalPriceFinal = 0;
          $couponInfo_totalprice = 0;
          $incIGV = $TaxesAll[0]->value;
          $sinIGV = $TaxesAll[1]->value;
          $incIGV_format = $incIGV / 100;
          $sinIGV_format = $sinIGV;
          $getAllCouponInfo = [];
          $getAllDataCouponById = [];
          // --------------- VALIDAR SI YA SE ACTIVÓ UN CUPÓN EN EL PRODUCTO ('tbl_applycoupons')
          if(!empty($item->coupon_id) && $item->coupon_id != "" && $item->coupon_id != null && $item->coupon_id != 0){
            $getAllCouponInfo = DB::table('tbl_applycoupons')->where("id_user","=",$user_id)->where("id_prod","=",$item->id)->where("id_coupon","=",$item->coupon_id)->where("status","!=",0)->select('id_user', 'id_prod', 'id_coupon', 'totalprice')->take(1)->get();
            if(count($getAllCouponInfo) > 0){
              $allDataConvert = json_decode($getAllCouponInfo, TRUE);
              $getAllDataCouponById = DB::table('tbl_coupons')->where("id","=",$allDataConvert[0]['id_coupon'])->where("status","!=",0)->select('name', 'discount_percentage')->take(1)->get();
              if(count($getAllDataCouponById) > 0){
                $allCouponDataConvertById = json_decode($getAllDataCouponById, TRUE);
                $coupinf_discount_percentage = $allCouponDataConvertById[0]['discount_percentage'];
                $couponInfo_totalprice = $allDataConvert[0]['totalprice']; // SETEAR LA VARIABLE DE PRECIO TOTAL PARA CUPÓN ACTIVADO
              }
            }
          }

          if($item->sections_id != 0){
            if($item->sections_id == 1 && $item->on_sale_price != 0 && $item->on_sale_price != ""){
              if($item->tax_id == 1){
                $sumFinalPrice1 = $item->on_sale_price * $incIGV_format;
                $sumFinalPrice2 = $item->on_sale_price + $sumFinalPrice1;
                // if(count($getAllCouponInfo) > 0){
                //   $sumTotalPriceFinal = $couponInfo_totalprice;
                // }else{
                //   $sumTotalPriceFinal = $sumFinalPrice2;
                // }
                if(count($getAllDataCouponById) > 0){
                  $sumTotalPriceFinal = $couponInfo_totalprice;
                }else{
                  $sumTotalPriceFinal = $sumFinalPrice2;
                }
              }else{
                $sumFinalPrice1 = $item->on_sale_price;
                $sumFinalPrice2 = $item->on_sale_price + $sumFinalPrice1;
                // if(count($getAllCouponInfo) > 0){
                //   $sumTotalPriceFinal = $couponInfo_totalprice;
                // }else{
                //   $sumTotalPriceFinal = $sumFinalPrice2;
                // }
                if(count($getAllDataCouponById) > 0){
                  $sumTotalPriceFinal = $couponInfo_totalprice;
                }else{
                  $sumTotalPriceFinal = $sumFinalPrice2;
                }
              }                    
            }else if($item->sections_id == 2 && $item->special_offer_price != 0 && $item->special_offer_price != ""){
              if($item->tax_id == 1){
                $sumFinalPrice1 = $item->special_offer_price * $incIGV_format;
                $sumFinalPrice2 = $item->special_offer_price + $sumFinalPrice1;
                // if(count($getAllCouponInfo) > 0){
                //   $sumTotalPriceFinal = $couponInfo_totalprice;
                // }else{
                //   $sumTotalPriceFinal = $sumFinalPrice2;
                // }
                if(count($getAllDataCouponById) > 0){
                  $sumTotalPriceFinal = $couponInfo_totalprice;
                }else{
                  $sumTotalPriceFinal = $sumFinalPrice2;
                }
              }else{
                $sumFinalPrice1 = $item->special_offer_price;
                $sumFinalPrice2 = $item->special_offer_price + $sumFinalPrice1;
                // if(count($getAllCouponInfo) > 0){
                //   $sumTotalPriceFinal = $couponInfo_totalprice;
                // }else{
                //   $sumTotalPriceFinal = $sumFinalPrice2;
                // }
                if(count($getAllDataCouponById) > 0){
                  $sumTotalPriceFinal = $couponInfo_totalprice;
                }else{
                  $sumTotalPriceFinal = $sumFinalPrice2;
                }
              }
            }else{
              if($item->tax_id == 1){                
                $sumFinalPrice1 = $item->special_offer_price * $incIGV_format;
                $sumFinalPrice2 = $item->special_offer_price + $sumFinalPrice1;
                // if(count($getAllCouponInfo) > 0){
                //   $sumTotalPriceFinal = $couponInfo_totalprice;
                // }else{
                //   $sumTotalPriceFinal = $sumFinalPrice2;
                // }
                if(count($getAllDataCouponById) > 0){
                  $sumTotalPriceFinal = $couponInfo_totalprice;
                }else{
                  $sumTotalPriceFinal = $sumFinalPrice2;
                }
              }else{
                $sumFinalPrice1 = $item->special_offer_price;
                $sumFinalPrice2 = $item->special_offer_price + $sumFinalPrice1; 
                // if(count($getAllCouponInfo) > 0){
                //   $sumTotalPriceFinal = $couponInfo_totalprice;
                // }else{
                //   $sumTotalPriceFinal = $sumFinalPrice2;
                // }
                if(count($getAllDataCouponById) > 0){
                  $sumTotalPriceFinal = $couponInfo_totalprice;
                }else{
                  $sumTotalPriceFinal = $sumFinalPrice2;
                }
              }
            }
          }else{
            // if(count($getAllCouponInfo) > 0){
            //   $sumTotalPriceFinal = $couponInfo_totalprice;
            // }else{
            //   $sumTotalPriceFinal = $item->discount_price;
            // }
            if(count($getAllDataCouponById) > 0){
              $sumTotalPriceFinal = $couponInfo_totalprice;
            }else{
              $sumTotalPriceFinal = $item->discount_price;
            }
          }
        ?>
        <div class="col-lg-12">
          <div class="product-card product-list">
            <div class="product-thumb">
            <?php if($item->is_stock()): ?>
            <?php
              $itm_istype = '';
              if($item->is_type == 'feature'){
                $itm_istype = 'bg-warning';
              }else if($item->is_type == 'new'){
                $itm_istype = 'bg-danger';
              }else if($item->is_type == 'top'){
                $itm_istype = 'bg-info';
              }else if($item->is_type == 'best'){
                $itm_istype = 'bg-dark';
              }else if($item->is_type == 'flash_deal'){
                $itm_istype = 'bg-success';
              }else{
                $itm_istype = '';
              }
            ?>
              <div class="product-badge <?php echo e($itm_istype); ?>"><?php echo e($item->is_type != 'undefine' ?  ucfirst(str_replace('_',' ',$item->is_type)) : ''); ?></div>
              <?php else: ?>
              <div class="product-badge bg-secondary border-default text-body"><?php echo e(__('out of stock')); ?></div>
              <?php endif; ?>
              <?php if($item->previous_price && $item->previous_price !=0): ?>
              <div class="product-badge product-badge2 bg-info"> -<?php echo e(PriceHelper::DiscountPercentage($item)); ?></div>
              <?php endif; ?>
              <div class="product-thumb">
                <a href="<?php echo e(route('front.product',$item->slug)); ?>" class="d-flex align-items-center justify-content-center">
                  <img class="lazy" data-src="<?php echo e(asset('assets/images/items/'.$item->thumbnail)); ?>" alt="Product" width="100" height="100" decoding="sync">
                </a>
                <div class="product-button-group">
                  <a class="product-button wishlist_store" href="<?php echo e(route('user.wishlist.store',$item->id)); ?>" title="<?php echo e(__('Wishlist')); ?>"><i class="icon-heart"></i></a>
                  <a data-target="<?php echo e(route('fornt.compare.product',$item->id)); ?>" class="product-button product_compare" href="javascript:;" title="<?php echo e(__('Compare')); ?>"><i class="icon-repeat"></i></a>
                  <?php echo $__env->make('includes.item_footer',['sitem' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
              </div>
            </div>
            <div class="product-card-inner">
              <div class="product-card-body">
                <div class="product-category">
                  <a href="<?php echo e(route('front.catalog').'?category='.$item->category->slug); ?>"><?php echo e($item->category->name); ?></a>
                </div>
                <h3 class="product-title">
                  <a href="<?php echo e(route('front.product',$item->slug)); ?>">
                    <span><?php echo e(strlen(strip_tags($item->name)) > $name_string_count ? substr(strip_tags($item->name), 0, 75) . '...' : strip_tags($item->name)); ?></span>
                  </a>
                </h3>
                
                <h4 class="product-price">
                  <?php if($item->previous_price !=0): ?>
                    <del><?php echo e(PriceHelper::setPreviousPrice($item->previous_price)); ?></del>
                  <?php endif; ?>
                  <span><?php echo e(PriceHelper::setCurrencyPrice($sumTotalPriceFinal)); ?></span>
                </h4>
                <p class="text-sm sort_details_show  text-muted hidden-xs-down my-1">
                <?php echo e(strlen(strip_tags($item->sort_details)) > 100 ? substr(strip_tags($item->sort_details), 0, 100) : strip_tags($item->sort_details)); ?>

                </p>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
  <?php else: ?>
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body text-center">
        <h4 class="h4 mb-0"><?php echo e(__('No Product Found')); ?></h4>
      </div>
    </div>
  </div>
  <?php endif; ?>
</div>
<div class="row mt-15" id="item_pagination">
  <div class="col-lg-12 text-center">
    <?php if(isset($items) && !empty($items) && $items->count() > 0): ?>
      <?php echo e($items->links()); ?>

    <?php endif; ?>
  </div>
</div>
<script type="text/javascript" src="<?php echo e(asset('assets/front/js/catalog.js')); ?>"></script><?php /**PATH /home/grupocorein/public_html/core/resources/views/front/catalog/catalog.blade.php ENDPATH**/ ?>