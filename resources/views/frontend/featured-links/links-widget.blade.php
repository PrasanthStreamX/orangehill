<section class="section-featured-image">
    <div class="container">
        <div class="featured-posts">
            @foreach ($featuredLinks as $link)    
            <a href="{{$link->url}}" class="item">
                <span class="image"><img src="{{url('storage/images/'.$link->thumb)}}" alt=""></span>
                <span class="content">
                    <span class="title">{{$link->title}}</span>
                    <span class="info">{{$link->info}}</span>
                    <span class="description">{{$link->description}}</span>
                    <span class="actions">
                        <span class="btn">Book Now</span>
                    </span>
                </span>
            </a>
            @endforeach
        </div>
    </div>
</section>