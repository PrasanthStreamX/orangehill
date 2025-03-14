<div class="sidebar">
    <ul>
        <li><a href="/admin">Dashboard</a></li>
        @if(Module::has('FoodMenu'))
            <li>Food Menu</li>
            <ul>
                <li><a href="/admin/foodmenu/create">Create Menu</a></li>
                <li class="divider"></li>
                <li><a href="/admin/foodmenu/item">Menu Items</a></li>
                <li><a href="/admin/foodmenu/type">Menu Types</a></li>
                <li><a href="/admin/foodmenu/category">Menu Categories</a></li>
            </ul>
        @endif
        <li><a href="/admin/featured-links">Featured Links</a></li>
        <li><a href="/admin/gallery">Gallery</a></li>
    </ul>
</div>