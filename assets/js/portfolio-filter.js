document.addEventListener('DOMContentLoaded', function() {
  const filterControls = document.querySelectorAll('.portfolio-filter button');
  const items = document.querySelectorAll('.portfolio-item');

  if (!filterControls.length) return;

  filterControls.forEach(btn => {
    btn.addEventListener('click', () => {
      const term = btn.getAttribute('data-term'); // e.g. 'all' or 'branding'
      // active class
      filterControls.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      items.forEach(item => {
        const terms = item.getAttribute('data-terms') || '';
        if (term === 'all' || terms.split(' ').includes(term)) {
          item.style.display = ''; // show
        } else {
          item.style.display = 'none'; // hide
        }
      });
    });
  });
});
