@extends('foodmenu::layouts.backend.master')
@section('title') Create Menu @endsection
@section('moduleContent')
    <h1 class="page-title">Create Menu</h1>
    <div>
        <div class="menu-container">
            <div class="header">
                <div class="main">
                    <div>{{$type->title}}</div>
                    <h4>{{$type->info}}</h4>
                    @if($type->description)<div><small>{{$type->description}}</small></div>@endif
                    <div>
                        Type: {{ucfirst($type->type)}} 
                        @if($type->price_full) | Price Adult: {{_price($type->price_full)}} - Child: {{_price($type->price_half)}} @endif
                    </div>
                    @if($type->note)<div class="text-danger"><small>{{$type->note}}</small></div>@endif
                </div>
                <div class="filters">
                    <form action="{{route('foodmenu.store')}}" method="POST" id="addItemForm">
                        @csrf
                        @method('POST')
                        @include('foodmenu::backend.menu.item-selector')
                    </form>
                </div>
            </div>
            <form action="{{route('foodmenu.update.order')}}" id="menuGroup" method="POST">
                @csrf
                <input type="hidden" name="type_id" value="{{$type->id}}">
                @foreach ($menuGroups as $menu_group_key => $group)
                    @if($group->type->id == $type->id)
                        <div class="card mt-2">
                            <div class="card-header">
                                <h6 class="card-title">{{$group->category->title}}</h6>
                            </div>
                            <div class="card-body">
                                <ul class="menu-item-box menuItemListSortable">
                                    @foreach ($menus as $menu)
                                        @if($menu->category_id == $group->category_id && $menu->type_id == $group->type_id)
                                            <li class="menu-item" id="item_{{$menu->item->id}}">
                                                <div class="handle">
                                                    <i class="fa-solid fa-arrows-up-down"></i>
                                                </div>
                                                <div class="item-body">
                                                    <div class="header">
                                                        <div class="title">{{$menu->item->title}}</div>
                                                        <div class="actions">
                                                            <a href="/admin/foodmenu/delete/{{$menu->id}}/{{$type->id}}" role="button" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to remove this item?');">Remove</a>
                                                        </div>
                                                    </div>
                                                    <div class="content">
                                                        <div class="image"><img src="{{url('storage/images/'.$menu->item->thumb)}}" alt=""></div>
                                                        <div class="details">
                                                            <div class="description text-muted"><small>{{$menu->item->description}}</small></div>
                                                            <input type="hidden" name="item_id[]" value="{{$menu->item->id}}">
                                                            <input type="hidden" name="category_id[]" value="{{$menu->category_id}}">
                                                        </div>
                                                        <div class="prices">
                                                            <div class="price-title">Price</div>
                                                            <div class="price-list">
                                                                @if(count($menu->item->prices) > 0)
                                                                    @foreach ($menu->item->prices as $key => $priceItem)
                                                                        <div class="item">
                                                                            <label>{{$priceItem->title}}</label>
                                                                            <div class="value">{{_price($priceItem->price)}}</div>
                                                                        </div>
                                                                    @endforeach
                                                                @else
                                                                    {{_price($menu->item->price)}}
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                @endforeach
            </form>
        </div>
    </div>
@endsection
@section('page-script')
    <script type="module">
        $('#search').on('keyup', function(){
            search();
        });
        search();
        function search(){
            var keyword = $('#search').val();
            $.post('{{ route("foodmenu.item.search") }}',
            {
                _token: $('meta[name="csrf-token"]').attr('content'),
                keyword:keyword
            },
            function(data){
                table_post_row(data);
            });
        }
        function table_post_row(res){
            let htmlView = '';
            if(res.items.length <= 0){
                htmlView+= `
                <tr>
                    <td colspan="4">No data.</td>
                </tr>`;
            }
            for(let i = 0; i < res.items.length; i++){
                htmlView += `
                    <tr>
                        <td>
                            <input type="checkbox" class="checkbox" name="item_id[]" value="`+res.items[i].id+`" >
                            <input type="hidden" name="weight[]" value="`+res.items[i].weight+`" >
                            <img src="{{url('storage/images')}}/`+res.items[i].thumb+`" style="width:60px; height:60px">
                        </td>
                        <td>`+res.items[i].title+`</td>
                        <td>`+res.items[i].price+`</td>
                    </tr>`;
            }
            $('#itemTable tbody').html(htmlView);
        }
        $(document).ready(function(){
            $('#itemTable').on('click', 'tr', function(){
                var ele = $(this).children().find(':checkbox');
                console.log(ele);
                if(ele.is(':checked')){
                    ele.prop('checked', false);
                    $(this).removeClass('checked');
                } else {
                    ele.prop('checked', true);
                    $(this).addClass('checked');
                }
            })
        });

        $('.weight-changer').change(function(){
            /*
            var weight = $(this).val();
            
            location.reload();
            */
        });
        var sortableArr = $('.menuItemListSortable');
        $.each(sortableArr, function(i, el){
            new Sortable(el, {
                sort: true, 
                onUpdate: function(evt){
                    //evt.newIndex;
                    //var item_id = evt.item.id.split("_").pop();
                    //var item_weight = evt.newIndex;
                    //console.log(evt)
                    var form = $('#menuGroup');
                    //form.submit();
                    var actionUrl = '/admin/foodmenu/update/order';
                    $.ajax({
                        type: "POST",
                        url: actionUrl,
                        data: form.serialize(), 
                    });
                    
                }
            });
        });
    </script>
@endsection