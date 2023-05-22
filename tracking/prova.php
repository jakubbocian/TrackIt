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
    }
    
    /* Colors */
    .shipment-list li:nth-child(n) {
      background-color: #ffecd9; /* Light orange */
    }

    .shipment-list li:hover {
      background-color: #d4d4d4; /* Light gray */
    }
  </style>
</head>
<body>
  <h1>Saved Shipments</h1>
  <ul class="shipment-list">
    <li><h3>Shipment 1</h3></li>
    <li>Shipment 2</li>
    <li>Shipment 3</li>
    <li>Shipment 4</li>
  </ul>

  <div class="shipment-details">
    <h2>Shipment Details</h2>
    <p>Details of the selected shipment will appear here.</p>
  </div>

  <script>
    // JavaScript code to show shipment details when clicked
    const shipmentItems = document.querySelectorAll('.shipment-list li');
    const shipmentDetails = document.querySelector('.shipment-details');

    shipmentItems.forEach(item => {
      item.addEventListener('click', () => {
        shipmentDetails.style.display = 'block';
      });
    });
  </script>
</body>
</html>
