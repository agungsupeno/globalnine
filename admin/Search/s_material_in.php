<script>
    document.addEventListener('DOMContentLoaded', function() {
      if (typeof(Storage) !== "undefined") {
          var startDate = localStorage.getItem('start_date');
          var endDate = localStorage.getItem('end_date');

          if (startDate && endDate) {
              document.querySelector('input[name="start_date"]').value = startDate;
              document.querySelector('input[name="end_date"]').value = endDate;

              if (window.location.search) {
                  window.history.replaceState({}, document.title, window.location.pathname);
              }

              localStorage.removeItem('start_date');
              localStorage.removeItem('end_date');
          }
      }
        if (window.location.search) {
                  window.history.replaceState({}, document.title, window.location.pathname);
        }
    });
</script>