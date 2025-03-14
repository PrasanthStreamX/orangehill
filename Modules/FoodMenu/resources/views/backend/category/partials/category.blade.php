<tr>
    <td class="title">
        @for ($i=0; $i <= $category->depth -1; $i++) <span class="row-spacer">-</span> @endfor
        {{$category->title}}
    </td>
    <td>{{$category->weight}}</td>
    <td>{{$category->active ? 'Yes' : 'No'}}</td>
    <td>
        <div class="actions">
            <a href="/admin/foodmenu/category/{{$category->id}}"><i class="fa-solid fa-eye"></i></a>
            <a href="/admin/foodmenu/category/{{$category->id}}/edit"><i class="fa-solid fa-pencil"></i></a>
        </div>
    </td>
</tr>
@if(count($category->children) > 0)
    @foreach ( $category->children as $category )
        @include('foodmenu::backend.category.partials.category', $category)
    @endforeach
@endif