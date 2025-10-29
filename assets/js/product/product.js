document.addEventListener('DOMContentLoaded', function() {
  const toggleButtons = document.querySelectorAll('.toggle-features');
  
  toggleButtons.forEach(button => {
    button.addEventListener('click', function(e) {
      e.preventDefault();
      
      const productId = this.dataset.productId;
      const featuresSection = document.getElementById(`features-${productId}`);
      const toggleText = this.querySelector('.toggle-text');
      
      if (featuresSection.style.display === 'none') {
        featuresSection.style.display = 'block';
        toggleText.textContent = 'Mostrar menos ▲';
      } else {
        featuresSection.style.display = 'none';
        toggleText.textContent = 'Mostrar más ▼';
      }
    });
  });
});