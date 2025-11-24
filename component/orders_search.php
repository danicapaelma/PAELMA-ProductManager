<div class="input-group mb-3">
  <input type="search" id="orderSearch" class="form-control" placeholder="Search by customer, date, or amount...">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="button" onclick="clearSearch()">Clear</button>
  </div>
</div>

<script>
  const searchInput = document.getElementById('orderSearch');

  searchInput.addEventListener('input', () => {
    const query = searchInput.value.toLowerCase().trim();
    const rows = document.querySelectorAll('#ordersTable tbody tr');
    rows.forEach(row => {
      const text = row.textContent.toLowerCase();
      row.style.display = text.includes(query) ? '' : 'none';
    });
  });

  function clearSearch() {
    searchInput.value = '';
    const rows = document.querySelectorAll('#ordersTable tbody tr');
    rows.forEach(row => row.style.display = '');
  }
</script>
