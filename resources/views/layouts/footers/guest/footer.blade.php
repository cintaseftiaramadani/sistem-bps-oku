  <footer class="footer py-5">
    <div class="container">
      <div class="row">
      <div class="col-lg-8 mb-4 mx-auto text-center">
      @if (!auth()->user() || \Request::is('static-sign-up')) 
        <div class="row">
          <div class="col-8 mx-auto text-center mt-1">
            <p class="mb-0 text-secondary">
              Hak Cipta © <script>
                document.write(new Date().getFullYear())
              </script> 
              <a style="color: #252f40;" href="https://www.bps.go.id/id" class="font-weight-bold ml-1" 
                 target="_blank">Badan Pusat Statistik Kabupaten Ogan Komering Ulu</a>
             </p>
          </div>
        </div>
      @endif
    </div>
  </footer>