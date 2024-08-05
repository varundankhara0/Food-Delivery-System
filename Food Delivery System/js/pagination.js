$(document).ready(function() {
    const itemsPerPage = 12;
    let currentPage = 1;
    const $foodItems = $('#food-items');
    const $paginationControls = $('#pagination-controls');
    const $items = $foodItems.children('.trending-items');
    
    function paginateItems() {
      const totalItems = $items.length;
      const totalPages = Math.ceil(totalItems / itemsPerPage);
      
      $items.hide();
      const start = (currentPage - 1) * itemsPerPage;
      const end = start + itemsPerPage;
      $items
      .slice(start, end).show();
    
    $paginationControls.empty();
    for (let i = 1; i <= totalPages; i++) {
      const activeClass = (i === currentPage) ? 'is_active' : '';
      $paginationControls.append(`<li><a href="#" class="${activeClass}" data-page="${i}">${i}</a></li>`);
    }
  }

  function updatePagination(filter = '*') {
    currentPage = 1;
    const $filteredItems = (filter === '*') ? $items : $items.filter(filter);
    
    const totalItems = $filteredItems.length;
    const totalPages = Math.ceil(totalItems / itemsPerPage);
    
    $filteredItems.hide();
    const start = (currentPage - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    $filteredItems.slice(start, end).show();
    
    $paginationControls.empty();
    for (let i = 1; i <= totalPages; i++) {
      const activeClass = (i === currentPage) ? 'is_active' : '';
      $paginationControls.append(`<li><a href="#" class="${activeClass}" data-page="${i}">${i}</a></li>`);
    }
  }

  $paginationControls.on('click', 'a', function(e) {
    e.preventDefault();
    currentPage = parseInt($(this).data('page'));
    paginateItems();
  });

  // Initialize Isotope
  const $grid = $foodItems.isotope({
    itemSelector: '.trending-items',
    layoutMode: 'fitRows'
  });

  $('.trending-filter a').click(function() {
    $('.trending-filter a').removeClass('is_active');
    $(this).addClass('is_active');
    const filterValue = $(this).attr('data-filter');
    $grid.isotope({ filter: filterValue });
    updatePagination(filterValue);
  });

  paginateItems();
});
