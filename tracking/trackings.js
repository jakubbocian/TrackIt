function initTrackings() {
    const shipmentItems = document.querySelectorAll('.shipment-list li');

    console.log(shipmentItems);
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
}
