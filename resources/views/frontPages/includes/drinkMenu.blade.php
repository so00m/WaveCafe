<div id="drink" class="tm-page-content">
  <nav class="tm-black-bg tm-drinks-nav">
    <ul>
      @foreach ($categories as $category)
      <li>
        <a href="#" class="tm-tab-link active" data-id="{{$category->id}}"> {{$category->name}} </a>
      </li>
      @endforeach
    </ul>
  </nav>

  @foreach($categories as $category)
    <div id="{{$category->id}}" class="tm-tab-content">
      <div class="tm-list">
        @foreach($beverages as $beverage)
          @if ($beverage->category_id  == $category->id )
            <div class="tm-list-item">
              <img src="{{asset('assets/images/'.$beverage->image)}}" alt="Image" class="tm-list-item-img"  >
              <div class="tm-black-bg tm-list-item-text" >
                <h3 class="tm-list-item-name">{{$beverage->title}} <span class="tm-list-item-price">${{$beverage->price}}</span></h3>
                <p class="tm-list-item-description">{{$beverage->content}}</p>
              </div>
            </div>
          @endif
        @endforeach
      </div>
    </div>
  @endforeach
</div>