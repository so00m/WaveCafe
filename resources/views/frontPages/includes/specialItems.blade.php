<div id="special" class="tm-page-content">
  <div class="tm-special-items">
    @foreach ($beverages as $beverage)
      @if (isset($beverage->special))
        <div class="tm-black-bg tm-special-item"  style="width:100%" >
          <img src="{{ asset('assets/images/'.$beverage->image)}}" style="width:100%"   alt="Image">
          <div class="tm-special-item-description">
            <h2 class="tm-text-primary tm-special-item-title">{{ $beverage->title }}</h2>
            <p class="tm-special-item-text">{{ $beverage->content }}.</p>  
          </div>
        </div>
      @endif  
    @endforeach
  </div> 
</div>