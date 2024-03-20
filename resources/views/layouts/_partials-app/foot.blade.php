<!--begin::Javascript-->
<script>var hostUrl = "assets/";</script>
<script>
  function disableButton(action) {
    var button = document.getElementById('submitButton');
    button.innerHTML = '<div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div> loading...';
    button.disabled = true;
    document.getElementById(action).submit();
  }
</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>


