<div class="input-group mb-3">
  <input type="search" id="orderSearch" class="form-control" placeholder="Search by customer, date, or amount...">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="button" onclick="clearSearch()">Clear</button>
  </div>
</div>

<script>
  const searchInput = document.getElementById('orderSearch');
  const tableRows = document.querySelectorAll('#ordersTable tbody tr');

  function filterOrders() {
    const query = searchInput.value.toLowerCase().trim();
    tableRows.forEach(row => {
      const text = row.textContent.toLowerCase();
      row.style.display = text.includes(query) ? '' : 'none';
    });
  }

  function clearSearch() {
    searchInput.value = '';
    filterOrders();
  }

  searchInput.addEventListener('input', filterOrders);
</script>
