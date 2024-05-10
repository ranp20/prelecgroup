<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <div class="card mb-4">
    <div class="card-body">
      <div class="d-sm-flex align-items-center justify-content-between">
        <h3 class="mb-0 bc-title"><b><?php echo e(__('Update Product')); ?></b> </h3>
        <a class="btn btn-primary   btn-sm" href="<?php echo e(route('back.item.index')); ?>"><i class="fas fa-chevron-left"></i> <?php echo e(__('Back')); ?></a>
      </div>
    </div>
  </div>
  <div id="iptc-A3gs4FS_token">
    <?php echo csrf_field(); ?>
  </div>
  <?php
    $getAllTaxes = DB::table('taxes')->get()->toArray();
    $arrTaxesValue = [];
    foreach($getAllTaxes as $k => $v){
      $arrTaxesValue[$k]['value'] = $v->value;
    }
  ?>
  <input class="hidden" placeholder="" value="<?= $arrTaxesValue[0]['value'];?>" style="visibility:hidden;display:none;" id="e_hY-596kjkJN79">
  <input class="hidden" placeholder="" value="<?= $arrTaxesValue[1]['value'];?>" style="visibility:hidden;display:none;" id="e_hD-123kjkJN79">
  <div class="row">
    <div class="col-lg-12">
      <?php echo $__env->make('alerts.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
  </div>
  <form class="admin-form" action="<?php echo e(route('back.item.update',$item->id)); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="row">
      <div class="col-lg-8">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
              <label for="unidadraiz"><?php echo e(__('Select Root Unit')); ?> *</label>
              <select name="unidadraiz" id="unidadraiz" class="form-control">
                <option value="" selected><?php echo e(__('Select One')); ?></option>
                <?php $__currentLoopData = DB::table('tbl_unidadraiz')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uraiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($uraiz->id); ?>" <?php echo e($uraiz->id == $item->unidad_raiz ? 'selected' : ''); ?>><?php echo e($uraiz->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
            <div class="form-group">
              <label for="atributoraiz"><?php echo e(__('Select Root Attribute')); ?> </label>
              <select name="atributoraiz" id="atributoraiz" class="form-control">
                <option value="" selected><?php echo e(__('Select One')); ?></option>
                <?php $__currentLoopData = DB::table('tbl_atributoraiz')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attraiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($attraiz->id); ?>" <?php echo e($attraiz->id == $item->atributo_raiz ? 'selected' : ''); ?>><?php echo e($attraiz->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
            <?php
              $attrRoot_name = DB::table('tbl_atributoraiz')->where('id',$item->atributo_raiz)->get()->toArray();
            ?>
            <?php if($item->atributo_raiz != 0 || count($attrRoot_name) != 0): ?>
              <?php if($attrRoot_name[0]->name == "COLOR" || $attrRoot_name[0]->name == "color" || $attrRoot_name[0]->name == "COLORES" || $attrRoot_name[0]->name == "colores"): ?>
                <?php if($item->atributoraiz_collection != "" && $item->atributoraiz_collection != "[]"): ?>
                <div id="cTentr-af172698__p-adm">
                  <div id="attrcolors-section">
                    <div class="d-flex">
                      <div class="flex-grow-1">
                        <div class="form-group">
                          <span><strong>Lista de colores</strong></span>
                        </div>
                      </div>
                    </div>
                    <div class="d-flex">
                      <div class="flex-grow-1">
                        <div class="form-group">
                          <input type="text" class="form-control aia848d__clrcode" placeholder="Código de Producto" value="">
                        </div>
                      </div>
                      <div class="flex-grow-1">
                        <div class="form-group">
                          <label class="color-picker">
                            <span>
                              <input type="color" class="form-control aia848d__clrname" placeholder="Código de Color" value="">
                            </span>
                          </label>
                        </div>
                      </div>
                      <div class="flex-btn">
                        <button type="button" class="btn btn-success add-color" data-text="" data-text1=""> <i class="fa fa-plus"></i> </button>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex c-sctGroupList">
                    <div class="flex-grow-1">
                      <div class="scGroupElems-sectionList">
                        <div class="c-zTitleSectionFloating">
                          <span class="c-zTitleSectionFloating__txt">Lista de <strong>Colores Agregados</strong></span>
                        </div>
                        <div class="scGroupElems-sectionList__c" id="attrcolors-sectionList__c">
                          <?php
                            $arrColorAdd = [];
                            $ColorAll = [];
                            $ColorAll2 = [];
                            if(isset($item->atributoraiz_collection) && $item->atributoraiz_collection != ""){
                              $colorsAvailables = json_decode($item->atributoraiz_collection, TRUE);
                              if(count($colorsAvailables) > 0){
                                $colorsAvailables_list = $colorsAvailables['atributoraiz_collection']['color'];
                              
                                foreach($colorsAvailables_list as $key => $val){
                                  $arrColorAdd[$key]['code'] = $val['code'];
                                  $arrColorAdd[$key]['name'] = $val['name'];
                                }
                              }
                            }
                          ?>
                          <?php $__currentLoopData = $arrColorAdd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($v['code'] != null && $v['code'] != ""): ?>
                            <div class="d-flex attrcolor-item">
                              <div class="flex-grow-1">
                                <div class="form-group">
                                  <input type="text" class="form-control" name="color_code[]" placeholder="Código de Producto" value="<?php echo e($v['code']); ?>">
                                </div>
                              </div>
                              <div class="flex-grow-1">
                                <div class="form-group">
                                  <label class="color-picker">
                                    <span>
                                      <input type="color" class="form-control" name="color_name[]" placeholder="Código de Color" value="<?php echo e($v['name']); ?>">
                                    </span>
                                  </label>
                                </div>
                              </div>
                              <div class="flex-btn">
                                <button type="button" class="btn btn-danger remove-color">
                                  <i class="fa fa-minus"></i>
                                </button>
                              </div>
                            </div>
                            <?php endif; ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php else: ?>
                <div id="cTentr-af172698__p-adm">
                  <div id="attrcolors-section">
                    <div class="d-flex">
                      <div class="flex-grow-1">
                        <div class="form-group">
                          <span><strong>Lista de colores</strong></span>
                        </div>
                      </div>
                    </div>
                    <div class="d-flex">
                      <div class="flex-grow-1">
                        <div class="form-group">
                          <input type="text" class="form-control aia848d__clrcode" placeholder="Código de Producto" value="">
                        </div>
                      </div>
                      <div class="flex-grow-1">
                        <div class="form-group">
                          <label class="color-picker">
                            <span>
                              <input type="color" class="form-control aia848d__clrname" placeholder="Código de Color" value="">
                            </span>
                          </label>
                        </div>
                      </div>
                      <div class="flex-btn">
                        <button type="button" class="btn btn-success add-color" data-text="" data-text1=""> <i class="fa fa-plus"></i> </button>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex c-sctGroupList">
                    <div class="flex-grow-1">
                      <div class="scGroupElems-sectionList">
                        <div class="c-zTitleSectionFloating">
                          <span class="c-zTitleSectionFloating__txt">Lista de <strong>Colores Agregados</strong></span>
                        </div>
                        <div class="scGroupElems-sectionList__c" id="attrcolors-sectionList__c">
                          <div class="scGroupElems-sectionList__c__deftxt" id="defTxt57vnj-attrclr__anyval">
                            <p>Sin Colores</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php endif; ?>
              <?php else: ?>
                <div id="cTentr-af172698__p-adm"></div>
              <?php endif; ?>
            <?php else: ?>
              <div id="cTentr-af172698__p-adm"></div>
            <?php endif; ?>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="form-group">
              <label for="name"><?php echo e(__('Name')); ?> *</label>
              <input type="text" name="name" class="form-control item-name" id="name" placeholder="<?php echo e(__('Enter Name')); ?>" value="<?php echo e($item->name); ?>">
              <span id="spn__iptequalsmssg"></span>
            </div>
            <div class="form-group">
              <label for="slug"><?php echo e(__('Slug')); ?> *</label>
              <input type="text" name="slug" class="form-control" id="slug" placeholder="<?php echo e(__('Enter Slug')); ?>" value="<?php echo e($item->slug); ?>">
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="form-group pb-0  mb-0">
              <label class="d-block"><?php echo e(__('Featured Image')); ?> *</label>
            </div>
            <div class="form-group pb-0 pt-0 mt-0 mb-0">
              <img class="admin-img lg" src="<?php echo e($item->photo ? asset('assets/images/items/'.$item->photo) : asset('assets/images/placeholder.png')); ?>">
            </div>
            <div class="form-group position-relative ">
              <label class="file">
                <input type="file"  accept="image/*"   class="upload-photo" name="photo" id="file"  aria-label="File browser example">
                <span class="file-custom text-left"><?php echo e(__('Upload Image...')); ?></span>
              </label>
              <br>
              <span class="mt-1 text-info"><?php echo e(__('Image Size Should Be 800 x 800. or square size')); ?></span>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="form-group pb-0  mb-0">
              <label><?php echo e(__('Gallery Images')); ?> </label>
            </div>
            <div class="form-group pb-0 pt-0 mt-0 mb-0">
              <div id="gallery-images">
                <div class="d-block gallery_image_view">
                <?php $__empty_1 = true; $__currentLoopData = $item->galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                  <div class="single-g-item d-inline-block m-2">
                    <span data-toggle="modal" data-target="#confirm-delete" href="javascript:;" data-href="<?php echo e(route('back.item.gallery.delete',$gallery->id)); ?>" class="remove-gallery-img">
                      <i class="fas fa-trash"></i>
                    </span>
                    <a class="popup-link" href="<?php echo e($gallery->photo ? asset('assets/images/items/'.$gallery->photo) : asset('assets/images/placeholder.png')); ?>">
                      <img class="admin-gallery-img" src="<?php echo e($gallery->photo ? asset('assets/images/items/'.$gallery->photo) : asset('assets/images/placeholder.png')); ?>" alt="No Image Found">
                    </a>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                  <h6><b><?php echo e(__('No Images Added')); ?></b></h6>
                <?php endif; ?>
                </div>
              </div>
            </div>
            <div class="form-group position-relative ">
              <label class="file">
                <input type="file"  accept="image/*"   name="galleries[]" id="gallery_file" aria-label="File browser example" accept="image/*" multiple>
                <span class="file-custom text-left"><?php echo e(__('Upload Image...')); ?></span>
              </label>
              <br>
              <span class="mt-1 text-info"><?php echo e(__('Image Size Should Be 800 x 800. or square size')); ?></span>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="form-group">
              <label for="sort_details"><?php echo e(__('Short Description')); ?> *</label>
              <textarea name="sort_details" id="sort_details" class="form-control" placeholder="<?php echo e(__('Short Description')); ?>" required><?php echo e($item->sort_details); ?></textarea>
            </div>
            <div class="form-group">
              <label for="details"><?php echo e(__('Description')); ?> *</label>
              <textarea name="details" id="details" class="form-control text-editor" rows="6" placeholder="<?php echo e(__('Enter Description')); ?>"><?php echo e($item->details); ?></textarea>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="form-group">
              <label for="tags"><?php echo e(__('Product Tags')); ?></label>
              <input type="text" name="tags" class="tags" id="tags" placeholder="<?php echo e(__('Tags')); ?>" value="<?php echo e($item->tags); ?>">
            </div>
            <div class="form-group">
              <label class="switch-primary">
                <input type="checkbox" class="switch switch-bootstrap status radio-check" name="is_specification" value="1" <?php echo e($item->is_specification ==1 ? 'checked' : ''); ?>>
                <span class="switch-body"></span>
                <span class="switch-text"><?php echo e(__('Specifications')); ?></span>
              </label>
            </div>
            <div id="cTentr-af1728903__p-adm" class="<?php echo e($item->is_specification == 0 ? 'd-none' : ''); ?>">
              <?php if($item->is_specification != 0): ?>
                <?php if($item->specification_collection != "" && $item->specification_collection != "[]"): ?>
                  <div id="specifications-section">
                    <div class="d-flex">
                      <div class="flex-grow-1">
                        <div class="form-group">
                          <input type="text" class="form-control aia843d__spcfname" placeholder="<?php echo e(__('Specification Name')); ?>" value="">
                          <span id="ccffs89_51-2ifc099"></span>
                        </div>
                      </div>
                      <div class="flex-grow-1">
                        <div class="form-group">
                          <input type="text" class="form-control aia843d__spcfdsc" placeholder="<?php echo e(__('Specification description')); ?>" value="">
                        </div>
                      </div>
                      <div class="flex-btn">
                        <button type="button" class="btn btn-success add-specification" data-text="<?php echo e(__('Specification Name')); ?>" data-text1="<?php echo e(__('Specification Description')); ?>"> <i class="fa fa-plus"></i> </button>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex c-sctGroupList">
                    <div class="flex-grow-1">
                      <div class="scGroupElems-sectionList">
                        <div class="c-zTitleSectionFloating">
                          <span class="c-zTitleSectionFloating__txt">Lista de <strong>Especificaciones Agregadas</strong></span>
                        </div>
                        <div class="scGroupElems-sectionList__c" id="specifications-sectionList__c">
                          
                          <?php
                            $arrSpecificationAdd = [];
                            $ColorAll = [];
                            $ColorAll2 = [];
                            if(isset($item->specification_collection) && $item->specification_collection != ""){
                              $specificationsAvailables = json_decode($item->specification_collection, TRUE);
                              if(count($specificationsAvailables) > 0){
                                $specificationsAvailables_list = $specificationsAvailables['specification_collection']['product'];
                              
                                foreach($specificationsAvailables_list as $key => $val){
                                  $arrSpecificationAdd[$key]['name'] = $val['name'];
                                  $arrSpecificationAdd[$key]['description'] = $val['description'];
                                }
                              }
                            }
                          ?>
                          <?php $__currentLoopData = $arrSpecificationAdd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($v['name'] != null && $v['name'] != ""): ?>
                            <div class="d-flex specification-item">
                              <div class="flex-grow-1">
                                <div class="form-group">
                                  <input type="text" class="form-control" name="specification_name[]" placeholder="<?php echo e($v['name']); ?>" value="<?php echo e($v['name']); ?>">
                                </div>
                              </div>
                              <div class="flex-grow-1">
                                <div class="form-group">
                                  <input type="text" class="form-control" name="specification_description[]" placeholder="<?php echo e($v['description']); ?>" value="<?php echo e($v['description']); ?>">
                                </div>
                              </div>
                              <div class="flex-btn">
                                <button type="button" class="btn btn-danger remove-spcification">
                                  <i class="fa fa-minus"></i>
                                </button>
                              </div>
                            </div>
                            <?php endif; ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                      </div>
                    </div>
                  </div>
                <?php else: ?>
                  <div id="specifications-section">
                    <div class="d-flex">
                      <div class="flex-grow-1">
                        <div class="form-group">
                          <input type="text" class="form-control aia843d__spcfname" placeholder="<?php echo e(__('Specification Name')); ?>" value="">
                          <span id="ccffs89_51-2ifc099"></span>
                        </div>
                      </div>
                      <div class="flex-grow-1">
                        <div class="form-group">
                          <input type="text" class="form-control aia843d__spcfdsc" placeholder="<?php echo e(__('Specification description')); ?>" value="">
                        </div>
                      </div>
                      <div class="flex-btn">
                        <button type="button" class="btn btn-success add-specification" data-text="<?php echo e(__('Specification Name')); ?>" data-text1="<?php echo e(__('Specification Description')); ?>"> <i class="fa fa-plus"></i> </button>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex c-sctGroupList">
                    <div class="flex-grow-1">
                      <div class="scGroupElems-sectionList">
                        <div class="c-zTitleSectionFloating">
                          <span class="c-zTitleSectionFloating__txt">Lista de <strong>Especificaciones Agregadas</strong></span>
                        </div>
                        <div class="scGroupElems-sectionList__c" id="specifications-sectionList__c">
                          <div class="scGroupElems-sectionList__c__deftxt" id="defTxt57vnj-espc__anyval">
                            <p>Sin Especificaciones</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
              <?php else: ?>
                <div id="specifications-section">
                  <div class="d-flex">
                    <div class="flex-grow-1">
                      <div class="form-group">
                        <input type="text" class="form-control aia843d__spcfname" placeholder="<?php echo e(__('Specification Name')); ?>" value="">
                        <span id="ccffs89_51-2ifc099"></span>
                      </div>
                    </div>
                    <div class="flex-grow-1">
                      <div class="form-group">
                        <input type="text" class="form-control aia843d__spcfdsc" placeholder="<?php echo e(__('Specification description')); ?>" value="">
                      </div>
                    </div>
                    <div class="flex-btn">
                      <button type="button" class="btn btn-success add-specification" data-text="<?php echo e(__('Specification Name')); ?>" data-text1="<?php echo e(__('Specification Description')); ?>"> <i class="fa fa-plus"></i> </button>
                    </div>
                  </div>
                </div>
                <div class="d-flex c-sctGroupList">
                  <div class="flex-grow-1">
                    <div class="scGroupElems-sectionList">
                      <div class="c-zTitleSectionFloating">
                        <span class="c-zTitleSectionFloating__txt">Lista de <strong>Especificaciones Agregadas</strong></span>
                      </div>
                      <div class="scGroupElems-sectionList__c" id="specifications-sectionList__c">
                        <div class="scGroupElems-sectionList__c__deftxt" id="defTxt57vnj-espc__anyval">
                          <p>Sin Especificaciones</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="form-group">
              <label for="meta_keywords"><?php echo e(__('Meta Keywords')); ?></label>
              <input type="text" name="meta_keywords" class="tags" id="meta_keywords" placeholder="<?php echo e(__('Enter Meta Keywords')); ?>" value="<?php echo e($item->meta_keywords); ?>">
            </div>
            <div class="form-group">
              <label for="meta_description"><?php echo e(__('Meta Description')); ?></label>
              <textarea name="meta_description" id="meta_description" class="form-control" rows="5" placeholder="<?php echo e(__('Enter Meta Description')); ?>"><?php echo e($item->meta_description); ?></textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card">
          <div class="card-body">
            <input type="hidden" class="check_button" name="is_button" value="0">
            <button type="submit" class="btn btn-secondary mr-2"><?php echo e(__('Update')); ?></button>
            
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <div class="form-group">
              <label for="coupon_id"><?php echo e(__('Select Coupon')); ?> </label>
              <select name="coupon_id" id="coupon_id" class="form-control">
                <option value="" selected><?php echo e(__('Select Coupon')); ?></option>
                <?php $__currentLoopData = DB::table('tbl_coupons')->whereStatus(1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($coupon->id); ?>" <?php echo e($coupon->id == $item->coupon_id ? 'selected' : ''); ?> ><?php echo e($coupon->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <div class="form-group">
              <label for="discount_price"><?php echo e(__('Current Price')); ?> *</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><?php echo e($curr->sign); ?></span>
                </div>
                <input type="text" id="discount_price" name="discount_price" class="form-control" placeholder="<?php echo e(__('Enter Current Price')); ?>" min="1" step="0.1" value="<?php echo e(round($item->discount_price * $curr->value,2)); ?>" required>
              </div>
            </div>
            <div class="form-group">
              <label for="previous_price"><?php echo e(__('Previous Price')); ?></label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><?php echo e($curr->sign); ?></span>
                </div>
                <input type="text" id="previous_price" name="previous_price" class="form-control" placeholder="<?php echo e(__('Enter Previous Price')); ?>" min="1" step="0.1" value="<?php echo e(round($item->previous_price*$curr->value ,2)); ?>">
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="form-group">
              <label for="category_id"><?php echo e(__('Select Category')); ?> *</label>
              <select name="category_id" id="category_id" data-href="<?php echo e(route('back.get.subcategory')); ?>" class="form-control">
                <?php $__currentLoopData = DB::table('categories')->whereStatus(1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($cat->id); ?>" <?php echo e($cat->id == $item->category_id ? 'selected' : ''); ?>><?php echo e($cat->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
            <div class="form-group">
              <label for="subcategory_id"><?php echo e(__('Select Sub Category')); ?> </label>
              <select name="subcategory_id" id="subcategory_id" class="form-control" data-href="<?php echo e(route('back.get.childcategory')); ?>">
                <option value=""><?php echo e(__('Select one')); ?></option>
                <?php $__currentLoopData = DB::table('subcategories')->where('category_id',$item->category_id)->whereStatus(1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($subcat->id); ?>" <?php echo e($subcat->id == $item->subcategory_id ? 'selected' : ''); ?>><?php echo e($subcat->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
            <div class="form-group">
              <label for="childcategory_id"><?php echo e(__('Select Child Category')); ?> </label>
              <select name="childcategory_id" id="childcategory_id" class="form-control">
                <option value=""><?php echo e(__('Select one')); ?></option>
                <?php $__currentLoopData = DB::table('chield_categories')->where('category_id',$item->category_id)->whereStatus(1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chieldcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($chieldcategory->id); ?>" <?php echo e($chieldcategory->id == $item->childcategory_id ? 'selected' : ''); ?>><?php echo e($chieldcategory->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
            <div class="form-group">
              <label for="brand_id"><?php echo e(__('Select Brand')); ?> </label>
              <select name="brand_id" id="brand_id" class="form-control">
                <option value="" selected><?php echo e(__('Select Brand')); ?></option>
                <?php $__currentLoopData = DB::table('brands')->whereStatus(1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($brand->id); ?>" <?php echo e($brand->id == $item->brand_id ? 'selected' : ''); ?> ><?php echo e($brand->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="form-group">
              <label for="stock"><?php echo e(__('Total in stock')); ?> *</label>
              <div class="input-group mb-3">
                <input type="number" id="stock" name="stock" class="form-control" placeholder="<?php echo e(__('Total in stock')); ?>" value="<?php echo e($item->stock); ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="tax_id"><?php echo e(__('Select Tax')); ?> *</label>
              <select name="tax_id" id="tax_id" class="form-control">
                <option value=""><?php echo e(__('Select One')); ?></option>
                <?php $__currentLoopData = DB::table('taxes')->whereStatus(1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($tax->id); ?>" <?php echo e($item->tax_id == $tax->id ? 'selected' : ''); ?> ><?php echo e($tax->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
            <div class="form-group">
              <label for=""><?php echo e(__('Seleccionar sección')); ?> *</label>
              <div class="border-list-switchs">
                <div class="form-check pb-0">
                  <?php if($item->sections_id != 0): ?>
                    <section class="c-sRadioBtn__c--cDesign-1">
                      <div class="c-sRadioBtn__c--cDesign-1__c">
                      <input type="radio" class="c-sRadioBtn__c--cDesign-1__c__input" name="sections_id" value="0" id="0"/>
                        <label class="c-sRadioBtn__c--cDesign-1__c__label"></label>
                      </div>
                      <label for="0" style="cursor:pointer;">Ninguna</label>
                    </section>
                    <?php $__currentLoopData = DB::table('tbl_sections')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php
                      $onSection = "";
                      if($section->name == "on_sale"){
                        $onSection = "En promoción";
                      }else if($section->name == "special_offer"){
                        $onSection = "Oferta Especial";
                      }else{
                        $onSection = $section->name;
                      }
                      ?>
                      <section class="c-sRadioBtn__c--cDesign-1">
                        <div class="c-sRadioBtn__c--cDesign-1__c">
                        <input type="radio" class="c-sRadioBtn__c--cDesign-1__c__input" name="sections_id" value="<?php echo e($section->id); ?>" <?php echo e($item->sections_id == $section->id ? 'checked' : ''); ?> id="<?php echo e($onSection); ?>"/>
                          <label class="c-sRadioBtn__c--cDesign-1__c__label"></label>
                        </div>
                        <label for="<?php echo e($onSection); ?>" style="cursor:pointer;"><?php echo e($onSection); ?></label>
                      </section>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php else: ?>
                    <section class="c-sRadioBtn__c--cDesign-1">
                      <div class="c-sRadioBtn__c--cDesign-1__c">
                      <input type="radio" class="c-sRadioBtn__c--cDesign-1__c__input" name="sections_id" checked value="0" id="0"/>
                        <label class="c-sRadioBtn__c--cDesign-1__c__label"></label>
                      </div>
                      <label for="0" style="cursor:pointer;">Ninguna</label>
                    </section>
                    <?php $__currentLoopData = DB::table('tbl_sections')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php
                      $onSection = "";
                      if($section->name == "on_sale"){
                        $onSection = "En promoción";
                      }else if($section->name == "special_offer"){
                        $onSection = "Oferta Especial";
                      }else{
                        $onSection = $section->name;
                      }
                      ?>
                      <section class="c-sRadioBtn__c--cDesign-1">
                        <div class="c-sRadioBtn__c--cDesign-1__c">
                        <input type="radio" class="c-sRadioBtn__c--cDesign-1__c__input" name="sections_id" value="<?php echo e($section->id); ?>" <?php echo e($item->sections_id == $section->id ? 'checked' : ''); ?> id="<?php echo e($onSection); ?>"/>
                          <label class="c-sRadioBtn__c--cDesign-1__c__label"></label>
                        </div>
                        <label for="<?php echo e($onSection); ?>" style="cursor:pointer;"><?php echo e($onSection); ?></label>
                      </section>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <?php
              $TaxesAll = DB::table('taxes')->get();
              $sumFinalPriceIGV1 = 0;
              $sumFinalPriceIGV2 = 0;
              $incIGV = $TaxesAll[0]->value;
              $sinIGV = $TaxesAll[1]->value;
              $incIGV_format = $incIGV / 100;
              $sinIGV_format = $sinIGV;
            ?>
            <?php if($item->sections_id != 0 || $item->sections_id != ""): ?>
              <div id="cTentr-af1698__p-adm">
                <?php if($item->sections_id == 1): ?>
                <div class="form-group">
                  <label for="on-sale-price">En Promoción *</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">S/.</span>
                    </div>
                    <input type="text" data-valformat="withcomedecimal" data-archorigv="product" id="on-sale-price" name="on_sale_price" class="form-control" placeholder="Ingrese el precio" min="1" step="0.1" value="<?php echo e($item->on_sale_price); ?>" required>
                  </div>
                </div>
                <div class="c_cPreviewAmmountIGV">
                  <?php if($item->tax_id != 0 && $item->tax_id == 1): ?>
                  <?php
                    $sumFinalPriceIGV1 = $incIGV_format * $item->on_sale_price;
                    $sumFinalPriceIGV2 = $item->on_sale_price + $sumFinalPriceIGV1;
                  ?>
                  <div class="py-0 pt-0 form-group cPreviewAmmountIGV">
                    <span style="display:block;"><strong>INCLUYE IGV: </strong></span>
                    <span>Monto Final: </span>
                    <span id="c-prevammt__igvGs23s">S/. <?php echo e($sumFinalPriceIGV2); ?></span>
                  </div>
                  <?php endif; ?>
                </div>
                <?php elseif($item->sections_id == 2): ?>
                <div class="form-group">
                  <label for="special-offer-price">Oferta Especial *</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">S/.</span>
                    </div>
                    <input type="text" data-valformat="withcomedecimal" data-archorigv="product" id="special-offer-price" name="special_offer_price" class="form-control" placeholder="Ingrese el precio" min="1" step="0.1" value="<?php echo e($item->special_offer_price); ?>" required>
                  </div>
                </div>
                <div class="c_cPreviewAmmountIGV">
                  <?php if($item->tax_id != 0 && $item->tax_id == 1): ?>
                  <?php
                    $sumFinalPriceIGV1 = $incIGV_format * $item->special_offer_price;
                    $sumFinalPriceIGV2 = $item->special_offer_price + $sumFinalPriceIGV1;
                  ?>
                  <div class="py-0 pt-0 form-group cPreviewAmmountIGV">
                    <span style="display:block;"><strong>INCLUYE IGV: </strong></span>
                    <span>Monto Final: </span>
                    <span id="c-prevammt__igvGs23s">S/. <?php echo e($sumFinalPriceIGV2); ?></span>
                  </div>
                  <?php endif; ?>
                </div>
                <?php else: ?>
                <div></div>
                <?php endif; ?>
              </div>
            <?php else: ?>
              <div id="cTentr-af1698__p-adm"></div>
            <?php endif; ?>
            <?php
            $arrStoresAdd = [];
            $StoresAll = [];
            $StoresAll2 = [];
            if(isset($item->store_availables) && $item->store_availables != ""){
              $storesAvailables = json_decode($item->store_availables, TRUE);
              $storesAvailables_list = $storesAvailables['store'];
              foreach($storesAvailables_list as $key => $val){
                $arrStoresAdd[$key]['id'] = $val['id'];
              }
            }

            if(count($arrStoresAdd) > 0){
              foreach($arrStoresAdd as $k => $v){
                $StoresAll[$k]['store'] = DB::table('tbl_stores')->where('id',$v['id'])->get()->toArray()[0];
              }
            }

            if($selectedIds != ""){
              foreach($selectedIds as $k => $v){
                $StoresAll2[$k] = $v['id'];
              }
            }
            ?>
            
            <div class="form-group">
              <label for=""><?php echo e(__('Seleccionar Tiendas')); ?> *</label>
              <div class="border-list-switchs">
                <?php $__currentLoopData = DB::table('tbl_stores')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                
                <div class="form-check pb-0">
                  <section class="c-sWitch__c--cDesign-1">
                    <div class="c-sWitch__c--cDesign-1__c">
                      <input type="checkbox" class="c-sWitch__c--cDesign-1__c__input" name="store_availables[]" id="<?php echo e($v->name); ?>" value="<?php echo e((isset($arrStoresAdd[$k]['id']) && $v->id == $arrStoresAdd[$k]['id']) ? $arrStoresAdd[$k]['id'] : $v->id); ?>" <?php if($selectedIds != ''): ?> <?php $__currentLoopData = $selectedIds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e(($v->id == $v2['id'])? 'checked':''); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?> />
                      <label class="c-sWitch__c--cDesign-1__c__label"></label>
                    </div>
                    <label for="<?php echo e($v->name); ?>" style="cursor:pointer;"><?php echo e($v->name); ?></label>
                  </section>
                </div>                
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                
              </div>
            </div>
            
            <div class="form-group">
              <label for="sku"><?php echo e(__('SKU')); ?> *</label>
              <input type="text" name="sku" class="form-control" id="sku" placeholder="<?php echo e(__('Enter SKU')); ?>" value="<?php echo e($item->sku); ?>">
            </div>
            <div class="form-group">
              <label for="video"><?php echo e(__('Vido Link')); ?> </label>
              <input type="text" name="video" class="form-control" id="video" placeholder="<?php echo e(__('Enter Video Link')); ?>" value="<?php echo e($item->video); ?>">
            </div>                    
            <!-- NUEVO CONTENIDO (INICIO) -->
            <div class="form-group">
              <label for="sku"><?php echo e(__('Código SAP')); ?> *</label>
              <input type="text" name="sap_code" class="form-control" id="sap_code" placeholder="<?php echo e(__('Enter SAP code')); ?>" value="<?php echo e($item->sap_code); ?>">
            </div>                    
            <div>
              <div class="form-group pb-0  mb-0">
                <label class="d-block"><?php echo e(__('Adjuntar PDF')); ?> *</label>
              </div>
              <div class="form-group position-relative ">
                <label class="file">
                  <input type="file" accept="application/pdf" class="upload-photo" name="adj_doc" id="adj_doc" aria-label="File browser example" value="<?php echo e($item->adj_doc); ?>">
                  <?php if($item->adj_doc): ?>
                  <span class="file-custom text-left"><?php echo e($item->adj_doc); ?></span>
                  <?php else: ?>
                  <span class="file-custom text-left"><?php echo e(__('Adjuntar PDF...')); ?></span>
                  <?php endif; ?>
                </label>
              </div>
            </div>
            <!-- NUEVO CONTENIDO (FIN) -->
          </div>
        </div>
      </div>
    </div>
  </form>
</div>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="confirm-deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('Confirm Delete?')); ?></h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo e(__('You are going to delete this image from gallery.')); ?> <?php echo e(__('Do you want to delete it?')); ?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
        <form action="" class="d-inline btn-ok" method="POST">
          <?php echo csrf_field(); ?>
          <?php echo method_field('DELETE'); ?>
          <button type="submit" class="btn btn-danger"><?php echo e(__('Delete')); ?></button>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo e(asset('assets/front/js/plugins/jquery-3.7.0.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/back/js/item.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/grupocorein/public_html/core/resources/views/back/item/edit.blade.php ENDPATH**/ ?>