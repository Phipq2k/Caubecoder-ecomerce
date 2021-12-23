<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Danh mục sản phẩm</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            @foreach ($category as $key => $catePro)
                <div class="panel panel-default">
                    @if ($catePro->category_parent_id == 0)
                        @if ($catePro->category_parent_status == 0)
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a href="{{url('/danh-muc-san-pham/'.$catePro->category_slug)}}">
                                    {{$catePro->category_name}}
                                </a>
                            </h4>
                        </div>
                        @elseif ($catePro->category_parent_status == 1)
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordian" href="#category{{$catePro->id}}">
                                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                    {{$catePro->category_name}}
                                </a>
                            </h4>
                        </div>
                        @endif
                    @endif
                    <div id="category{{$catePro->id}}" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul>
                                @foreach ($category as $key => $subCate)
                                    @if ($subCate->category_parent_id == $catePro->id)
                                    <li><a href="{{url('/danh-muc-san-pham/'.$subCate->category_slug)}}">{{$subCate->category_name}}</a></li>
                                    @endif
                                @endforeach												
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
            
        </div><!--/category-products-->

        <h2>Thương hiệu sản phẩm</h2>
        <div class="brands_products"><!--brands_products-->
            <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">
                    @foreach ($brand as $key => $brandPro)
                        <li><a href="{{URL::to('/thuong-hieu-san-pham/'.$brandPro->brand_slug)}}">{{$brandPro->brand_name}}</a></li>
                    @endforeach	
                </ul>
            </div>
        </div><!--/brands_products-->
        <div class="price-range"><!--Lọc giá sản phẩm -->
            <label class="label label-info" for="amount">Lọc giá sản phẩm</label>
            <form>
                <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold; width: 100%">
                <input type="hidden" name="start_price" id="start_price" value="{{$minPrice}}">
                <input type="hidden" name="end_price" id="end_price" value="{{$maxPrice}}">
                <div id="slider-range"></div>
                <p></p>
                <button type="submit" class="btn btn-sm btn-success pull-right btn-price-range">Lọc giá</button>
            </form>
        </div><!--/Lọc giá sản phẩm -->
    </div>
</div>