 <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                {{-- <section id="slider"><!--slider-->
                    <div class="container">
                      <div class="row"> 

                         <div id="carousel-example-generic" class="carousel slide " data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">

                                    @foreach( $sliders as $slider )
                                        <li data-target="#carousel-example-generic" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                                    @endforeach
                                </ol>

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    @foreach( $sliders as $slider )
                                        <div class="item {{ $loop->first ? ' active' : '' }}" >
                                            <img src="{{ URL::to($slider->slider_image) }}"  style="width: 100%; height: 400px;" ">
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Controls -->
                                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>

                         </div>
                     </div>
                 </section> --}}
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>
                        
                        <div class="carousel-inner">
                        
                        <?php $i = 1; 
                        $sliders = DB::table('tbl_slider')->where('publication_status',1)->get();

                            foreach ($sliders as $slider) {
                                    if ($i == 1) {
                        
                                ?>
                                
                                <div class="item active">
                                <?php }else{ ?>
                            
                                <div class="item">
                                <?php } ?>
                                <div class="col-sm-4">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>Free E-Commerce Template</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-8">
                                    <img src="{{URL::to($slider->slider_image)}}" class="girl img-responsive" alt="" />
                                    {{-- <img src="{{URL::to('frontend/images/home/pricing.png')}}"  class="pricing" alt="" /> --}}
                                </div>
                            </div>                            
                        
                            <?php $i++; } ?>
                        </div>
                        
                        
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </section><!--/slider-->