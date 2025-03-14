@isset($pageFace)    
<div class="page-face">
    <div class="bg">
        @isset($pageFace['page_bg'])<img src="{{url($pageFace['page_bg'])}}" alt="">@endisset
    </div>
    <div class="container">
        <div class="page-title">
            @isset($pageFace['page_title'])<h1 class="title">{{$pageFace['page_title']}}</h1>@endisset
        </div>
    </div>
</div>
@endisset