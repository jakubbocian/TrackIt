<!DOCTYPE html>
<html>
<head>
  <title>Saved Shipments</title>
  <style>
    /* CSS styles */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
    }

    h1 {
      color: #333;
      margin-bottom: 20px;
    }

    .shipment-list {
      list-style-type: none;
      padding: 0;
      color: #FFFFF1;
    }

    .shipment-list li {
      background-color: #f5f5f5;
      border-radius: 5px;
      padding: 10px;
      margin-bottom: 10px;
      cursor: pointer;
    }

    .shipment-list li:hover {
      background-color: #eaeaea;
    }

    .shipment-details {
      display: none;
      margin-top: 20px;
      padding: 10px;
      background-color: #f9f9f9;
      border: 1px solid #ccc;
      border-radius: 5px;
      opacity: 0;
      transition: opacity 0.3s ease;
    }
    
    /* Colors */
    .shipment-list li:nth-child(n) {
      background-color: #F16821; /* Light orange */
    }

    .shipment-list li:hover {
      background-color: #d4d4d4; /* Light gray */
    }
  </style>
</head>
<body>
  <h1>Saved Shipments</h1>
  <ul class="shipment-list">
    <li><h3>Shipment 1</h3>
      <div class="shipment-details">
        <h2>Shipment Details</h2>
        <p>Details of Shipment 1 will appear here.</p>
      </div>
    </li>
    <li>Shipment 2
      <div class="shipment-details">
        <h2>Shipment Details</h2>
        <p>Details of Shipment 2 will appear here.</p>
      </div>
    </li>
    <li>Shipment 3
      <div class="shipment-details">
        <h2>Shipment Details</h2>
        <p>Details of Shipment 3 will appear here.</p>
      </div>
    </li>
    <li>Shipment 4
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
      
      item.addEventListener('click', () => {
        // Hide all shipment details first
        shipmentItems.forEach(item => {
          item.querySelector('.shipment-details').style.display = 'none';
        });

        // Display the clicked shipment's details with animation
        shipmentDetails.style.opacity = '0';
        shipmentDetails.style.display = 'block';
        setTimeout(() => {
          shipmentDetails.style.opacity = '1';
        }, 10);
      });
    });
  </script>
</body>
</html>
