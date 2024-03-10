
@if (session()->has('success'))

<script>
  document.addEventListener('DOMContentLoaded', function() {
      var myToast = new bootstrap.Toast(document.getElementById('success'));
      myToast.show();
  });
</script>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999;">
  <div id="success" class="toast bg-success" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body d-flex align-items-center">
        <button type="button" class="btn-close btn-primary bg-white p-2" data-bs-dismiss="toast" aria-label="Close"></button>
        <div class="text-white ms-3 fs-6">
          {{ session('success') }}
        </div>
      </div>
  </div>
</div>

@elseif (session()->has('error'))

<script>
  document.addEventListener('DOMContentLoaded', function() {
      var myToast = new bootstrap.Toast(document.getElementById('error'));
      myToast.show();
  });
</script>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999;">
  <div id="error" class="toast bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body d-flex align-items-center">
        <button type="button" class="btn-close btn-primary bg-white p-2" data-bs-dismiss="toast" aria-label="Close"></button>
        <div class="text-white ms-3 fs-6">
          {{ session('error') }}
        </div>
      </div>
  </div>
</div>

@endif