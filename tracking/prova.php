<!DOCTYPE html>
<html>
<head>
  <title>Saved Shipments</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Saved Shipments</h1>
  <ul class="shipment-list">
    <li>
      <h3>Shipment 1</h3>
      <div class="shipment-details">
        <h2>Shipment Details</h2>
        <p>Details of Shipment 1 will appear here.</p>
      </div>
    </li>
    <li>
      <h3>Shipment 2</h3>
      <div class="shipment-details">
        <h2>Shipment Details</h2>
        <p>Details of Shipment 2 will appear here.</p>
      </div>
    </li>
    <li>
      <h3>Shipment 3</h3>
      <div class="shipment-details">
        <h2>Shipment Details</h2>
        <p>Details of Shipment 3 will appear here.</p>
      </div>
    </li>
    <li>
      <h3>Shipment 4</h3>
      <div class="shipment-details">
        <h2>Shipment Details</h2>
        <p>Details of Shipment 4 will appear here.</p>
      </div>
    </li>
  </ul>

  <script>
    // JavaScript code to show shipment details when clicked
    const shipmentItems = document.querySelectorAll('.shipment-list li');
    
    shipmentItems.forEach(item => {
      const shipmentDetails = item.querySelector('.shipment-details');
      let isOpen = false;
      
      item.addEventListener('click', () => {
        if (isOpen) {
          // Close the details if already open
          shipmentDetails.style.opacity = '0';
          setTimeout(() => {
            shipmentDetails.style.display = 'none';
          }, 300);
        } else {
          // Hide all shipment details first
          shipmentItems.forEach(item => {
            const details = item.querySelector('.shipment-details');
            if (details !== shipmentDetails) {
              details.style.opacity = '0';
              setTimeout(() => {
                details.style.display = 'none';
              }, 300);
            }
          });

          // Open the clicked shipment's details with animation
          shipmentDetails.style.display = 'block';
          setTimeout(() => {
            shipmentDetails.style.opacity = '1';
          }, 10);
        }
        
        isOpen = !isOpen;
      });
    });
  </script>
</body>
</html>
