<div id="contact" class="tm-page-content">
    <div class="tm-black-bg tm-contact-text-container">
      <h2 class="tm-text-primary">Contact Wave</h2>
      <p>Wave Cafe Template has a video background. You can use this layout for your websites. Please contact Tooplate's Facebook page. Tell your friends about our website.</p>
    </div>
    <div class="tm-black-bg tm-contact-form-container tm-align-right">
      <form action="{{route('insertMessage')}}" method="post" id="contact-form">
        @csrf
        <div class="tm-form-group">
          <input type="text" name="full_name" class="tm-form-control" placeholder="Name"  />
          @error('full_name')
            <strong>{{ $message }}</strong>
          @enderror
        </div>
        <div class="tm-form-group">
          <input type="email" name="email" class="tm-form-control" placeholder="Email" />
          @error('email')
            <strong>{{ $message }}</strong>
          @enderror
        </div>        
        <div class="tm-form-group tm-mb-30">
          <textarea rows="6" name="content" class="tm-form-control" placeholder="Message" ></textarea>
          @error('content')
            <strong>{{ $message }}</strong>
          @enderror
        </div>        
        <div>
          <button type="submit" class="tm-btn-primary tm-align-right">
            Submit
          </button>
        </div>
      </form>
    </div>
  </div>