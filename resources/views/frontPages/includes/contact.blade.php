<div id="contact" class="tm-page-content">
    <div class="tm-black-bg tm-contact-text-container">
      <h2 class="tm-text-primary">Contact Wave</h2>
      <p>Wave Cafe Template has a video background. You can use this layout for your websites. Please contact Tooplate's Facebook page. Tell your friends about our website.</p>
    </div>
    <div class="tm-black-bg tm-contact-form-container tm-align-right">
      <form action="{{route('insertMessage')}}" method="post" id="contact-form">
        @csrf
        <div class="tm-form-group">
          <input type="text" name="full_name" value="{{old('full_name')}}" class="tm-form-control" placeholder="Name"  />
          
          <p style="color:rgb(224, 0, 0);font-size:75%;font-weight: 600">
            @error('full_name'){{ $message }}@enderror
          </p>

        </div>

        <div class="tm-form-group">
          <input type="email" name="email" value="{{old('email')}}" class="tm-form-control" placeholder="Email" />
          
          <p style="color:rgb(224, 1, 1);font-size:75%;font-weight: 600">
            @error('email'){{ $message }}@enderror
          </p>

        </div>  

        <div class="tm-form-group tm-mb-30">
          <textarea rows="6" name="content"  class="tm-form-control" placeholder="Message" >{{old('content')}}</textarea>
          
          <p style="color:rgb(224, 2, 2);font-size:75%;font-weight: 600" > 
            @error('content'){{ $message }}@enderror
          </p>
          

        </div>      
          
        <div>
          <button type="submit" class="tm-btn-primary tm-align-right">
            Submit
          </button>
        </div>
      </form>
    </div>
  </div> 
 