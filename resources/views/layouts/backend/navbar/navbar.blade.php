<div class="sidebar">
    <ul>
        <li><a href="/admin">Dashboard</a></li>
        @if(Module::has('FoodMenu'))
            <li>Food Menu</li>
            <ul>
                <li><a href="/admin/foodmenu/type">Menu</a></li>
                <li><a href="/admin/foodmenu/category">Categories</a></li>
                <li><a href="/admin/foodmenu/item">Items</a></li>
            </ul>
        @endif
        <li><a href="/admin/featured-links">Featured Links</a></li>
        <li><a href="/admin/gallery">Gallery</a></li>
    </ul>
    
</div>