@extends('foodmenu::layouts.backend.master')
@section('title') Create Menu @endsection
@section('moduleContent')
    <h1 class="page-title">Create Menu</h1>
    <div>
        <div class="d-flex align-items-start vertical-tabs">
            <ul class="nav nav-pills flex-column nav-pills border-end border-3 me-3 align-items-end" id="pills-tab" role="tablist">
                @foreach ($types as $i => $type)    
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-primary fw-semibold @if($i==0) active @endif position-relative" id="{{$type->slug}}-tab" data-bs-toggle="pill" data-bs-target="#{{$type->slug}}" type="button" role="tab" aria-controls="{{$type->slug}}" aria-selected="true">{{$type->title}}</button>
                    </li>
                @endforeach
            </ul>
            <div class="tab-content border rounded-3 border-primary p-3 w-100" id="pills-tabContent">
                @foreach ($types as $i => $type)
                    <div class="tab-pane fade show @if($i==0) active @endif" id="{{$type->slug}}" role="tabpanel" aria-labelledby="{{$type->slug}}-tab">
                        <div class="header">
                            <div class="main">
                                <div>{{$type->title}}</div>
                                <h4>{{$type->info}}</h4>
                                @if($type->description)<div><small>{{$type->description}}</small></div>@endif
                                @if($type->note)<div class="text-danger"><small>{{$type->note}}</small></div>@endif
                            </div>
                            <div class="actions">
                                <div class="title">Add Item</div>
                                <div>
                                    <form action="{{route('foodmenu.store')}}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <div class="d-flex">
                                            <input type="hidden" name="type_id" value="{{$type->id}}">
                                            <select name="category_id" id="category" class="form-select" required>
                                                <option value="">Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                                @endforeach
                                            </select>
                                            <select name="item_id" id="item" class="form-select" required>
                                                <option value="">Select Item</option>
                                                @foreach ($items as $item)
                                                    <option value="{{$item->id}}">{{$item->title}} - ${{$item->price}}</option>
                                                @endforeach
                                            </select>
                                            <button type="submit" class="btn btn-primary">ADD</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @foreach ($menuGroups as $group)
                            @if($group->type->id == $type->id)
                                <div class="card mt-2">
                                    <div class="card-header">
                                        <h6 class="card-title">{{$group->category->title}}</h6>
                                    </div>
                                    <div class="card-body">
                                        <ul class="menu-item-box">
                                            @foreach ($menus as $item)
                                                @if($item->category_id == $group->category_id && $item->type_id == $group->type_id)
                                                <li>
                                                    <div class="item-body">
                                                        <div class="image"><img src="{{url('storage/images/fm_item_thumb_3_1739959222.heif')}}" alt=""></div>
                                                        <div class="details">
                                                            <div class="title">{{$item->item->title}}</div>
                                                            <div class="description text-muted"><small>{{$item->item->description}}</small></div>
                                                            <div class="price">$ {{number_format($item->item->price, 2, '.', ',');}}</div>
                                                        </div>
                                                        <div class="col-end">
                                                            <div class="actions">
                                                                <div class="form-group"  style="width: 6rem;">
                                                                    <!--
                                                                    <label for="weight">Weight</label>
                                                                    <select name="weight" id="weight" class="form-select form-select-sm">
                                                                        @for ($i=-50; $i <= 50; $i++)
                                                                            <option value="{{$i}}" @selected($i==0) @selected($item->item->weight == $i)>{{$i}}</option>
                                                                        @endfor
                                                                    </select>
                                                                    -->
                                                                </div>
                                                                <a href="/admin/foodmenu/delete/{{$item->id}}" class="btn btn-secondary btn-sm" onclick="return confirm('Are you sure you want to remove this item?');"><i class="fa-solid fa-close"></i></a>
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
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection