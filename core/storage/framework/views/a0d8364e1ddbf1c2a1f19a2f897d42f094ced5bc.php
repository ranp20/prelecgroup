<?php $__env->startSection('content'); ?>

<div class="container-fluid">

	<!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-0 bc-title"><b><?php echo e(__('Visibility')); ?></b></h3>
                </div>
        </div>
    </div>

	<!-- Form -->
	<div class="row">

		<div class="col-xl-12 col-lg-12 col-md-12">

			<div class="card o-hidden border-0 shadow-lg">
				<div class="card-body ">
					<!-- Nested Row within Card Body -->
					<div class="row">
                        <div class="col-xl-3 col-lg-3">
                            <div class="nav flex-column m-3 theme_change nav-pills nav-secondary" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active" data="theme1" data-toggle="pill" href="#hone"><?php echo e(__('Home One')); ?></a>
                                <a class="nav-link" data="theme2" data-toggle="pill" href="#htwo"><?php echo e(__('Home Two')); ?></a>
                                <a class="nav-link" data="theme3" data-toggle="pill" href="#hthree"><?php echo e(__('Home Three')); ?></a>
                                <a class="nav-link" data="theme4" data-toggle="pill" href="#hfour"><?php echo e(__('Home Four')); ?></a>

                            </div>
                        </div>
						<div class="col-xl-9 col-lg-9">
                            <form class="admin-form" action="<?php echo e(route('back.setting.visible.update')); ?>" method="POST"
                                enctype="multipart/form-data"> <?php echo csrf_field(); ?>

                                <?php echo $__env->make('alerts.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <div id="tabs">
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div id="hone" class="tab-pane active"><br>
                                                <div class="row justify-content-center">
                                                    <div class="col-lg-12">

                                                        <div class="form-group">
                                                            <label class="switch-primary">
                                                                <input type="checkbox" class="switch switch-bootstrap " name="is_slider" value="1" <?php echo e($setting->is_slider == 1 ? 'checked' : ''); ?>>
                                                                <span class="switch-body"></span>
                                                                <span class="switch-text"><?php echo e(__('Slider Section')); ?></span>
                                                            </label>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="switch-primary">
                                                            <input type="checkbox" class="switch switch-bootstrap  " name="is_three_c_b_first" value="1" <?php echo e($setting->is_three_c_b_first == 1 ? 'checked' : ''); ?>>
                                                            <span class="switch-body"></span>
                                                            <span class="switch-text"><?php echo e(__('3 column banner First')); ?></span>
                                                            </label>
                                                        </div>


                                                        <div class="form-group">
                                                            <label class="switch-primary">
                                                                <input type="checkbox" class="switch switch-bootstrap  " name="is_popular_category" value="1" <?php echo e($setting->is_popular_category == 1 ? 'checked' : ''); ?>>
                                                                <span class="switch-body"></span>
                                                                <span class="switch-text"><?php echo e(__('Popular Categories')); ?></span>
                                                            </label>
                                                        </div>



                                                        <div class="form-group">
                                                            <label class="switch-primary">
                                                            <input type="checkbox" class="switch switch-bootstrap" name="is_three_c_b_second" value="1" <?php echo e($setting->is_three_c_b_second == 1 ? 'checked' : ''); ?>>
                                                            <span class="switch-body"></span>
                                                            <span class="switch-text"><?php echo e(__('3 column banner Second')); ?></span>
                                                            </label>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="switch-primary">
                                                            <input type="checkbox" class="switch switch-bootstrap" name="is_t1_falsh" value="1" <?php echo e($extra_settings->is_t1_falsh == 1 ? 'checked' : ''); ?>>
                                                            <span class="switch-body"></span>
                                                            <span class="switch-text"><?php echo e(__('Flash Deal')); ?></span>
                                                            </label>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="switch-primary">
                                                                <input type="checkbox" class="switch switch-bootstrap" name="is_highlighted" value="1" <?php echo e($setting->is_highlighted == 1 ? 'checked' : ''); ?>>
                                                                <span class="switch-body"></span>
                                                                <span class="switch-text"><?php echo e(__('Featured, Best Seller, Top Rated, New Product')); ?></span>
                                                            </label>
                                                        </div>




                                                        <div class="form-group">
                                                            <label class="switch-primary">
                                                                <input type="checkbox" class="switch switch-bootstrap" name="is_popular_brand" value="1" <?php echo e($setting->is_popular_brand == 1 ? 'checked' : ''); ?>>
                                                                <span class="switch-body"></span>
                                                                <span class="switch-text"><?php echo e(__('Popular Brands')); ?></span>
                                                            </label>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="switch-primary">
                                                                <input type="checkbox" class="switch switch-bootstrap" name="is_featured_category" value="1" <?php echo e($setting->is_featured_category == 1 ? 'checked' : ''); ?>>
                                                                <span class="switch-body"></span>
                                                                <span class="switch-text"><?php echo e(__('Featured Categories')); ?></span>
                                                            </label>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="switch-primary">
                                                                <input type="checkbox" class="switch switch-bootstrap" name="is_two_c_b" value="1" <?php echo e($setting->is_two_c_b == 1 ? 'checked' : ''); ?>>
                                                                <span class="switch-body"></span>
                                                                <span class="switch-text"><?php echo e(__('Two column banner')); ?></span>
                                                            </label>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="switch-primary">
                                                                <input type="checkbox" class="switch switch-bootstrap" name="is_two_column_category" value="1" <?php echo e($setting->is_two_column_category == 1 ? 'checked' : ''); ?>>
                                                                <span class="switch-body"></span>
                                                                <span class="switch-text"><?php echo e(__('Three column category')); ?></span>
                                                            </label>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="switch-primary">
                                                                <input type="checkbox" class="switch switch-bootstrap" name="is_blogs" value="1" <?php echo e($setting->is_blogs == 1 ? 'checked' : ''); ?>>
                                                                <span class="switch-body"></span>
                                                                <span class="switch-text"><?php echo e(__('blog Section')); ?></span>
                                                            </label>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="switch-primary">
                                                            <input type="checkbox" class="switch switch-bootstrap  " name="is_service" value="1" <?php echo e($setting->is_service == 1 ? 'checked' : ''); ?>>
                                                            <span class="switch-body"></span>
                                                            <span class="switch-text"><?php echo e(__('Service Section')); ?></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="htwo" class="tab-pane"><br>

                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label class="switch-primary">
                                                                <input type="checkbox" class="switch switch-bootstrap " name="is_t2_slider" value="1" <?php echo e($extra_settings->is_t2_slider == 1 ? 'checked' : ''); ?>>
                                                                <span class="switch-body"></span>
                                                                <span class="switch-text"><?php echo e(__('Slider Section')); ?></span>
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="switch-primary">
                                                                <input type="checkbox" class="switch switch-bootstrap " name="is_t2_service_section" value="1" <?php echo e($extra_settings->is_t2_service_section == 1 ? 'checked' : ''); ?>>
                                                                <span class="switch-body"></span>
                                                                <span class="switch-text"><?php echo e(__('Service Section')); ?></span>
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="switch-primary">
                                                                <input type="checkbox" class="switch switch-bootstrap " name="is_t2_3_column_banner_first" value="1" <?php echo e($extra_settings->is_t2_3_column_banner_first == 1 ? 'checked' : ''); ?>>
                                                                <span class="switch-body"></span>
                                                                <span class="switch-text"><?php echo e(__('3 Column Banner First')); ?></span>
                                                            </label>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="switch-primary">
                                                                <input type="checkbox" class="switch switch-bootstrap " name="is_t2_new_product" value="1" <?php echo e($extra_settings->is_t2_new_product == 1 ? 'checked' : ''); ?>>
                                                                <span class="switch-body"></span>
                                                                <span class="switch-text"><?php echo e(__('New Product Section')); ?></span>
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="switch-primary">
                                                                <input type="checkbox" class="switch switch-bootstrap " name="is_t2_3_column_banner_second" value="1" <?php echo e($extra_settings->is_t2_3_column_banner_second == 1 ? 'checked' : ''); ?>>
                                                                <span class="switch-body"></span>
                                                                <span class="switch-text"><?php echo e(__('3 Column Banner Second')); ?></span>
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="switch-primary">
                                                            <input type="checkbox" class="switch switch-bootstrap" name="is_t2_falsh" value="1" <?php echo e($extra_settings->is_t2_falsh == 1 ? 'checked' : ''); ?>>
                                                            <span class="switch-body"></span>
                                                            <span class="switch-text"><?php echo e(__('Flash Deal')); ?></span>
                                                            </label>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="switch-primary">
                                                                <input type="checkbox" class="switch switch-bootstrap " name="is_t2_featured_product" value="1" <?php echo e($extra_settings->is_t2_featured_product == 1 ? 'checked' : ''); ?>>
                                                                <span class="switch-body"></span>
                                                                <span class="switch-text"><?php echo e(__('Featured Product Section')); ?></span>
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="switch-primary">
                                                                <input type="checkbox" class="switch switch-bootstrap " name="is_t2_bestseller_product" value="1" <?php echo e($extra_settings->is_t2_bestseller_product == 1 ? 'checked' : ''); ?>>
                                                                <span class="switch-body"></span>
                                                                <span class="switch-text"><?php echo e(__('Bestseller Product Section')); ?></span>
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="switch-primary">
                                                                <input type="checkbox" class="switch switch-bootstrap " name="is_t2_toprated_product" value="1" <?php echo e($extra_settings->is_t2_toprated_product == 1 ? 'checked' : ''); ?>>
                                                                <span class="switch-body"></span>
                                                                <span class="switch-text"><?php echo e(__('Top Rated Product Section')); ?></span>
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="switch-primary">
                                                                <input type="checkbox" class="switch switch-bootstrap " name="is_t2_2_column_banner" value="1" <?php echo e($extra_settings->is_t2_2_column_banner == 1 ? 'checked' : ''); ?>>
                                                                <span class="switch-body"></span>
                                                                <span class="switch-text"><?php echo e(__('2 Column Banner')); ?></span>
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="switch-primary">
                                                            <input type="checkbox" class="switch switch-bootstrap" name="is_t2_three_column_category" value="1" <?php echo e($extra_settings->is_t2_three_column_category == 1 ? 'checked' : ''); ?>>
                                                            <span class="switch-body"></span>
                                                            <span class="switch-text"><?php echo e(__('Three Column Category')); ?></span>
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="switch-primary">
                                                                <input type="checkbox" class="switch switch-bootstrap " name="is_t2_blog_section" value="1" <?php echo e($extra_settings->is_t2_blog_section == 1 ? 'checked' : ''); ?>>
                                                                <span class="switch-body"></span>
                                                                <span class="switch-text"><?php echo e(__('Blog Section')); ?></span>
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="switch-primary">
                                                                <input type="checkbox" class="switch switch-bootstrap " name="is_t2_brand_section" value="1" <?php echo e($extra_settings->is_t2_brand_section == 1 ? 'checked' : ''); ?>>
                                                                <span class="switch-body"></span>
                                                                <span class="switch-text"><?php echo e(__('Brand Section')); ?></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div id="hthree" class="tab-pane"><br>

                                                    <div class="row">

                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="switch-primary">
                                                                    <input type="checkbox" class="switch switch-bootstrap " name="is_t3_slider" value="1" <?php echo e($extra_settings->is_t3_slider == 1 ? 'checked' : ''); ?>>
                                                                    <span class="switch-body"></span>
                                                                    <span class="switch-text"><?php echo e(__('Slider Section')); ?></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="switch-primary">
                                                                    <input type="checkbox" class="switch switch-bootstrap " name="is_t3_service_section" value="1" <?php echo e($extra_settings->is_t3_service_section == 1 ? 'checked' : ''); ?>>
                                                                    <span class="switch-body"></span>
                                                                    <span class="switch-text"><?php echo e(__('Service Section')); ?></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="switch-primary">
                                                                    <input type="checkbox" class="switch switch-bootstrap " name="is_t3_3_column_banner_first" value="1" <?php echo e($extra_settings->is_t3_3_column_banner_first == 1 ? 'checked' : ''); ?>>
                                                                    <span class="switch-body"></span>
                                                                    <span class="switch-text"><?php echo e(__('3 Column Banner First')); ?></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="switch-primary">
                                                                    <input type="checkbox" class="switch switch-bootstrap " name="is_t3_falsh" value="1" <?php echo e($extra_settings->is_t3_falsh == 1 ? 'checked' : ''); ?>>
                                                                    <span class="switch-body"></span>
                                                                    <span class="switch-text"><?php echo e(__('Flash Deal')); ?></span>
                                                                </label>
                                                            </div>
                                                        </div>


                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="switch-primary">
                                                                    <input type="checkbox" class="switch switch-bootstrap " name="is_t3_popular_category" value="1" <?php echo e($extra_settings->is_t3_popular_category == 1 ? 'checked' : ''); ?>>
                                                                    <span class="switch-body"></span>
                                                                    <span class="switch-text"><?php echo e(__('Popular Category')); ?></span>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="switch-primary">
                                                                    <input type="checkbox" class="switch switch-bootstrap " name="is_t3_3_column_banner_second" value="1" <?php echo e($extra_settings->is_t3_3_column_banner_second == 1 ? 'checked' : ''); ?>>
                                                                    <span class="switch-body"></span>
                                                                    <span class="switch-text"><?php echo e(__('3 Column Banner Second')); ?></span>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="switch-primary">
                                                                    <input type="checkbox" class="switch switch-bootstrap " name="is_t3_pecialpick" value="1" <?php echo e($extra_settings->is_t3_pecialpick == 1 ? 'checked' : ''); ?>>
                                                                    <span class="switch-body"></span>
                                                                    <span class="switch-text"><?php echo e(__('Special Pick')); ?></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="switch-primary">
                                                                    <input type="checkbox" class="switch switch-bootstrap " name="is_t3_brand_section" value="1" <?php echo e($extra_settings->is_t3_brand_section == 1 ? 'checked' : ''); ?>>
                                                                    <span class="switch-body"></span>
                                                                    <span class="switch-text"><?php echo e(__('Brand Section')); ?></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="switch-primary">
                                                                    <input type="checkbox" class="switch switch-bootstrap " name="is_t3_three_column_category" value="1" <?php echo e($extra_settings->is_t3_three_column_category == 1 ? 'checked' : ''); ?>>
                                                                    <span class="switch-body"></span>
                                                                    <span class="switch-text"><?php echo e(__('Three Column Category')); ?></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="switch-primary">
                                                                    <input type="checkbox" class="switch switch-bootstrap " name="is_t3_2_column_banner" value="1" <?php echo e($extra_settings->is_t3_2_column_banner == 1 ? 'checked' : ''); ?>>
                                                                    <span class="switch-body"></span>
                                                                    <span class="switch-text"><?php echo e(__('2 Column Banner')); ?></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="switch-primary">
                                                                    <input type="checkbox" class="switch switch-bootstrap " name="is_t3_blog_section" value="1" <?php echo e($extra_settings->is_t3_blog_section == 1 ? 'checked' : ''); ?>>
                                                                    <span class="switch-body"></span>
                                                                    <span class="switch-text"><?php echo e(__('Blog Section')); ?></span>
                                                                </label>
                                                            </div>
                                                        </div>

                                                    </div>

                                            </div>


                                            <div id="hfour" class="tab-pane"><br>

                                                <div class="row">

                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label class="switch-primary">
                                                                <input type="checkbox" class="switch switch-bootstrap " name="is_t4_slider" value="1" <?php echo e($extra_settings->is_t4_slider == 1 ? 'checked' : ''); ?>>
                                                                <span class="switch-body"></span>
                                                                <span class="switch-text"><?php echo e(__('Slider Section')); ?></span>
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="switch-primary">
                                                                <input type="checkbox" class="switch switch-bootstrap " name="is_t4_featured_banner" value="1" <?php echo e($extra_settings->is_t4_featured_banner == 1 ? 'checked' : ''); ?>>
                                                                <span class="switch-body"></span>
                                                                <span class="switch-text"><?php echo e(__('Featured Banner')); ?></span>
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="switch-primary">
                                                                <input type="checkbox" class="switch switch-bootstrap " name="is_t4_specialpick" value="1" <?php echo e($extra_settings->is_t4_specialpick == 1 ? 'checked' : ''); ?>>
                                                                <span class="switch-body"></span>
                                                                <span class="switch-text"><?php echo e(__('Special Pick')); ?></span>
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="switch-primary">
                                                                <input type="checkbox" class="switch switch-bootstrap " name="is_t4_3_column_banner_first" value="1" <?php echo e($extra_settings->is_t4_3_column_banner_first == 1 ? 'checked' : ''); ?>>
                                                                <span class="switch-body"></span>
                                                                <span class="switch-text"><?php echo e(__('3 Column Banner First')); ?></span>
                                                            </label>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="switch-primary">
                                                                <input type="checkbox" class="switch switch-bootstrap " name="is_t4_flashdeal" value="1" <?php echo e($extra_settings->is_t4_flashdeal == 1 ? 'checked' : ''); ?>>
                                                                <span class="switch-body"></span>
                                                                <span class="switch-text"><?php echo e(__('Flash Deal')); ?></span>
                                                            </label>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="switch-primary">
                                                                <input type="checkbox" class="switch switch-bootstrap " name="is_t4_3_column_banner_second" value="1" <?php echo e($extra_settings->is_t4_3_column_banner_second == 1 ? 'checked' : ''); ?>>
                                                                <span class="switch-body"></span>
                                                                <span class="switch-text"><?php echo e(__('3 Column Banner Second')); ?></span>
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="switch-primary">
                                                                <input type="checkbox" class="switch switch-bootstrap " name="is_t4_popular_category" value="1" <?php echo e($extra_settings->is_t4_popular_category == 1 ? 'checked' : ''); ?>>
                                                                <span class="switch-body"></span>
                                                                <span class="switch-text"><?php echo e(__('Popular Category')); ?></span>
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="switch-primary">
                                                                <input type="checkbox" class="switch switch-bootstrap " name="is_t4_2_column_banner" value="1" <?php echo e($extra_settings->is_t4_2_column_banner == 1 ? 'checked' : ''); ?>>
                                                                <span class="switch-body"></span>
                                                                <span class="switch-text"><?php echo e(__('2 Column Banner')); ?></span>
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="switch-primary">
                                                                <input type="checkbox" class="switch switch-bootstrap " name="is_t4_blog_section" value="1" <?php echo e($extra_settings->is_t4_blog_section == 1 ? 'checked' : ''); ?>>
                                                                <span class="switch-body"></span>
                                                                <span class="switch-text"><?php echo e(__('Blog Section')); ?></span>
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="switch-primary">
                                                                <input type="checkbox" class="switch switch-bootstrap " name="is_t4_brand_section" value="1" <?php echo e($extra_settings->is_t4_brand_section == 1 ? 'checked' : ''); ?>>
                                                                <span class="switch-body"></span>
                                                                <span class="switch-text"><?php echo e(__('Brand Section')); ?></span>
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="switch-primary">
                                                                <input type="checkbox" class="switch switch-bootstrap " name="is_t4_service_section" value="1" <?php echo e($extra_settings->is_t4_service_section == 1 ? 'checked' : ''); ?>>
                                                                <span class="switch-body"></span>
                                                                <span class="switch-text"><?php echo e(__('Service Section')); ?></span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    <div>

                                    <div class="form-group d-flex justify-content-center">
                                        <button type="submit" class="btn btn-secondary"><?php echo e(__('Submit')); ?></button>
                                    </div>

                            </form>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/grupocorein/public_html/core/resources/views/back/settings/section.blade.php ENDPATH**/ ?>