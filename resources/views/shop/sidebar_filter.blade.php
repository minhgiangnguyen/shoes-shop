<!-- Start Filter categories -->
@if(Route::currentRouteName() != 'shop.collection')
<div class="sidebar-categories">
    <div class="head">Collection</div>
    <ul class="main-categories" id="collect-list">
        @foreach($collections as $collect)
        <li class="main-nav-list">
            <a href="#" data-pjax rel="collect-{{ $collect->CollectionID}}">
                {{$collect->CollectionName}}
                <span class="number">({{$collect->products_count}})</span>
            </a>
        </li>
        @endforeach
    </ul>
</div>
@endif

<div class="sidebar-filter">
    <div class="top-filter-head">Product Filters</div>
    <div class="common-filter">
        <div class="sidebar-categories">
            <div class="head" style="background:white">Color</div>
            <ul class="main-categories" id="color-list">
                @foreach($colors as $color)
                <li class="main-nav-list">
                    <a href="#" data-pjax rel="color-{{ $color->ColorID}}" style="line-height: 40px;">
                        <div class="square-color" style="background-color: {{$color->ColorName}};
                                    {{($color->ColorName=='White')?'border: 2px solid #555':''}}">
                        </div>
                        <span class="number">({{$color->products_count}})</span>
                    </a>

                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="sidebar-categories">
        <div class="head" style="background:white">Size</div>
        <ul class="main-categories" id="size-list">
            @foreach($sizes as $size)
            <li class="main-nav-list">
                <a href="#" data-pjax rel="size-{{ $size->SizeID}}" style="line-height: 40px;">
                    {{$size->SizeName}}
                    <span class="number">({{$size->products_count}})</span>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="sidebar-categories">
        <div class="head" style="background:white">Gender</div>
        <ul class="main-categories" id="gender-list">
            @foreach($genders as $gender)
            <li class="main-nav-list">
                <a href="#" data-pjax rel="gender-{{ $gender->GenderID}}" style=" line-height: 40px;">
                    {{$gender->GenderName}}
                    <span class="number">({{$gender->products_count}})</span>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>

<div class="sidebar-filter mt-50">
    <!-- <div class="top-filter-head">Product Filters</div> -->

    <!-- <div class="common-filter">
        <div class="head">Price</div>
        <div class="price-range-area">
            <div id="price-range"></div>
            <div class="value-wrapper d-flex">
                <div class="price">Price:</div>
                <span>$</span>
                <div id="lower-value"></div>
                <div class="to">to</div>
                <span>$</span>
                <div id="upper-value"></div>
            </div>
        </div>
    </div> -->
</div>
<!-- End Filter categories -->