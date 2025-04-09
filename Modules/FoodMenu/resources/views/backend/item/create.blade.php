@extends('foodmenu::layouts.backend.master')
@section('title') Add Menu @endsection
@section('moduleContent')
    <h1 class="page-title">Create Menu Item</h1>
    <div><a href="/admin/foodmenu/item">List</a> </div>
    <div>
        <form action="{{route('foodmenu.item.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <div>
                    <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}">
                </div>
            </div>
            <div class="mb-3">
                <label for="short_info" class="form-label">Short Description</label>
                <div>
                    <textarea name="info" id="short_info" rows="2" class="form-control">{{old('info')}}</textarea>
                </div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <div>
                    <textarea name="description" id="description" rows="6" class="form-control">{{old('description')}}</textarea>
                </div>
            </div>
            <div class="mb-3">
                <label for="note" class="form-label">Note</label>
                <div>
                    <textarea name="note" id="note" rows="2" class="form-control">{{old('note')}}</textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-12 col-lg-4" id="singlePrice">
                    <div class="border-box">
                        <label for="price" class="box-label form-label">Single Price</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">{{_currencySymbol()}}</span>
                            <input type="text" name="single_price" class="form-control" value="{{old('single_price')}}">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6" id="multiplePrice">
                    <div class="border-box">
                        <label for="price" class="box-label form-label">Multiple Prices</label>
                        <div id="multiplePriceList">
                            <div class="row mb-3">
                                <div class="col-sm-4 col-lg-4"><input type="text" name="price_label[]" class="form-control" placeholder="Label"  value="{{old('price_label')}}"></div>
                                <div class="col-sm-8 col-lg-8">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">{{_currencySymbol()}}</span>
                                        <input type="number" name="multi_price[]" id="price1" class="form-control" placeholder="0.00" value="{{old('multi_price')}}" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" name="multiple_price_add" id="multiplePriceAddBtn" class="btn btn-outline-primary btn-sm">Add</button>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-12 col-lg-4">
                    <label for="thumb" class="form-label">Thumbnail Image</label>
                    <div>
                        <input type="file" name="thumb" id="thumb" class="form-control">
                    </div>
                </div>
                <div class="col-sm-12 col-lg-4">
                    <label for="cover_photo" class="form-label">Cover Photo</label>
                    <div>
                        <input type="file" name="cover_photo" id="cover_photo" class="form-control">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="weight" class="form-label">Weight</label>
                <div>
                    <input type="number" name="weight" id="weight" class="form-control" value="{{old('weight')}}">
                </div>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" name="active" id="active" class="form-check-input" value="1" @checked(old('active') ?? true)>
                <label for="active">Active</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
@section('page-script')
<script type="module">
    $('document').ready(function(){
        const priceField = '<div class="row mb-3 item">'
                            +'<div class="col-sm-4 col-lg-4"><input type="text" name="price_label[]" class="form-control" placeholder="Label" ></div>'
                            +'<div class="col-sm-8 col-lg-8" style="position:relative; padding-right:30px">'
                                +'<div class="input-group">'
                                    +'<span class="input-group-text" id="basic-addon1">{{_currencySymbol()}}</span>'
                                    +'<input type="number" name="multi_price[]" class="form-control" placeholder="0.00" value="{{old('price')}}" >'
                                +'</div>'
                                +'<button type="button" class="remove-price-item btn btn-sm btn-outline-default" style="position:absolute; right:0; top:5px">X</button>'
                            +'</div>'
                        +'</div>';
        $('#multiplePriceAddBtn').click(function(){
            $('#multiplePriceList').append(priceField);
        });
        $('#multiplePriceList').on('click', '.remove-price-item', function(){
            $(this).closest('.item').remove();
        })
    });
</script>
@endsection