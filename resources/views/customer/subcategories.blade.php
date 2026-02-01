<!-- @if($subcategories->isNotEmpty())
    @foreach($subcategories as $sub)
        <a href="{{ url('products?category='.$category->CategoryId.'&subcategory='.$sub->SubCategoryId) }}" 
           class="w-60 p-6 bg-gray-100 rounded-xl shadow hover:shadow-lg block text-center">
            <div class="font-bold text-black text-lg">{{ $sub->SubCategoryName }}</div>
        </a>
    @endforeach
@else
    <p class="text-gray-600 w-full text-center">No subcategories found.</p>
@endif
 -->
