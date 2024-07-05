<!DOCTYPE html>
<html lang="en">
  <head>

    @include('frontpages.includes.head')

  </head>
  <body>
    <div class="tm-container">
      <div class="tm-row">

        <!-- Site Header -->
        @include('frontpages.includes.siteHeader')
        <!-- end Site Header -->

        <div class="tm-right">
          <main class="tm-main">
            <!-- Drink Menu Page -->
            @include('frontpages.includes.drinkMenu') 
            <!-- end Drink Menu Page -->

            <!-- About Us Page -->
            @include('frontpages.includes.aboutUs') 
            <!-- end About Us Page -->

            
            <!-- Special Items Page -->
            @include('frontpages.includes.specialItems') 
            <!-- end Special Items Page -->

            <!-- Contact Page -->
            @include('frontpages.includes.contact') 
            <!-- end Contact Page -->

          </main>

        </div>

      </div>

      <!-- copy right footer ------>
      @include('frontpages.includes.copyRightFooter') 
      <!-- end copy right footer -->

    </div>
      
    <!-- Background video -->
    @include('frontpages.includes.bg-video') 
    <!-- end Background video -->

    <!-- java scripts -->
    @include('frontpages.includes.javaScripts') 
    <!--end java scripts -->

  </body>
</html>