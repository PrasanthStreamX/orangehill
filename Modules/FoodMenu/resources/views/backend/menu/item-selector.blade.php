<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#itemSelector">Add Menu Item</button>

<div class="modal fade item-select-modal" id="itemSelector" tabindex="-1" aria-labelledby="itemSelectorLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="itemSelectorLabel">Add Menu Item</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="select-filter row">
                    <div class="col-lg-4">
                        <select name="category_id" id="category" class="form-select" required>
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-8">
                        <input type="text" class="form-control"   placeholder="Search Menu Item" id="search">
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <input type="hidden" name="type_id" value="{{$type->id}}">
                <table class="table item-selector-table" id="itemTable">
                    <tbody></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" >Submit</button>
            </div>
        </div>
    </div>
</div>
