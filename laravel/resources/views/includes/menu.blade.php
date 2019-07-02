<div class="menu-wrap">
    <div class="container">
        <div class="row menu-bar">
            <div class="col-md-3">
                <div class="nav-bar-category">
                    <div class="module-inner">
                        <h3 class="module-title">
                            <span>DANH MỤC SẢN PHẨM</span> <i id="dropdown-icon" class="fas fa-align-justify" style="font-size: 27px;float: right;line-height: 58px;"></i>
                        </h3>
						<div class="menu-dropdown">
							<div class="module-ct">
								<ul class="nav nav-pills nav-stacked hide" style="<?php if (Route::getCurrentRoute()->uri() == '/') { ?> display : block !important;position: relative !important <?php } else { ?>position: absolute !important; z-index:999; width: 100%;border: 1px solid #ebebeb;background: #fff; <?php } ?>">
									@foreach ($cate as $c)
										<li class="sub1">
											<span class=''>
												<a class='a1' href="{{url('danh-sach/'.$c->slug)}}" style="padding: 13px 5px">
													{{$c->title}}
												</a>
												<span class="menu-icon-down"><img src="{{url('template_asset/images/site/scroll-to-up/scrollbutton4-white2.png')}}" /></span>
											</span>
											<div>
												<div class="ul2" id="box">
												<div class="row">
														@foreach($c->subcate as $sc)
															<div class="sub2 col-lg-4 col-md-4" >
																<a class='a2' href="{{url('danh-sach/'.$c->slug.'/'.$sc->slug)}}">
																	<span>{{$sc->title}}</span>
																</a>
																<ul class='ul3'>
																	@foreach($sc->nsx as $nsx)
																		<li class='sub3'>
																			<a class='a3' href="{{url('danh-sach/'.$c->slug.'/'.$sc->slug.'/'.$nsx->slug)}}">
																				<span>
																				{{$nsx->title}}
																				</span>
																			</a>
																		</li>
																	@endforeach
																</ul>
															</div>
														@endforeach
													</div>
													<script>
														jQuery(".ul2 .sub2 ").each(function() {
															var childItemCount = jQuery(this).find('.sub3').length;
															if(childItemCount >= 20 ){
																jQuery(this).removeClass("col-lg-4");
																jQuery(this).removeClass("col-md-4");
																jQuery(this).addClass("col-lg-12");
																jQuery(this).addClass("col-md-12");
																jQuery(this).find(".sub3").addClass("col3");
															}
														})
													</script>
												</div>
											</div>
										</li>
									@endforeach
								</ul>
							</div>
						</div>
                        <?php if (Route::getCurrentRoute()->uri() != '/') { ?>
							<style>
							.nav-bar-category:hover .menu-dropdown {
								display: block;
							}
							</style>
							<script>
								jQuery(document).ready(function () {
									jQuery('h3.module-title').click( function () {
										if(jQuery(".module-ct .nav").hasClass("show")) {
											jQuery(".module-ct .nav").removeClass("show");
										}  	else {
											jQuery(".module-ct .nav").addClass("show");
										}
									});
								});
							</script>
						<?php } else { ?>
							<script>
								jQuery(document).ready(function () {
									if (jQuery(window).width() < 768 ){
										jQuery('h3.module-title').click( function () {
											if(jQuery(".module-ct .nav").hasClass("show")) {
												jQuery(".module-ct .nav").removeClass("show");
											}  	else {
												jQuery(".module-ct .nav").addClass("show");
											}
										});
									}
								});
							</script>
						<?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="menu-right">
                    <ul>
                        <li class="toplink">
                            <a href="{{url('bai-viet/gioi-thieu')}}">
                                Giới thiệu
                            </a>
                        </li>
                        <li class="toplink">
                            <a href="{{url('tin-tuc')}}">
                                Hoạt động
                            </a>
                        </li>
                        <li class="toplink has-child" style="position: relative;">
                            <a href="{{url('tin-tuc')}}">
                                Tin tức
                            </a>
							<div class="customdropdow-menu">
								<ul>
								@foreach($newsCategory as $newCate)
									<li>
										<a href="{{url('danh-muc-tin-tuc', $newCate->id)}}" title="{{$newCate->title}}">{{$newCate->title}}</a>
									</li>
									@endforeach
								</ul>
							</div>
                        </li>
                        <li class="toplink">
                            <a href="{{url('lien-he')}}" class="border-none">
                                Liên hệ
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="clear: both;"></div>
