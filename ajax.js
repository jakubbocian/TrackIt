// JavaScript code to show shipment details when clicked
function initTrackings() {
    const shipmentItems = document.querySelectorAll('.shipment-list li');

    alert(shipmentItems);
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

//esecuzione get dato un form
function GET(url, formname, div) {
    var elements = document.forms[formname].elements;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.response);
            if (response.code != undefined) {
                response = response.code;
                if (response.behave == 'replace') {
                    document.getElementById(div).innerHTML = response.code;
                }
                else if (response.behave == 'append') {
                    document.getElementById(div).innerHTML += response.code;
                }
            }
            else if (response.redirect != undefined) {
                location.href = response.redirect.page;
            }
            initTrackings();
        }
    };
    var data = "";
    for (var i = 0; i < elements.length; i++) {
        data += elements[i].name + "=" + elements[i].value + "&";
    }
    xhr.open('GET', url + '?' + data, true);
    xhr.send();
}

function POST(url, formname, div) {
    var elements = document.forms[formname].elements;
    var data = new FormData();
    for (var i = 0; i < elements.length; i++) {
        var element = elements[i];
        if (element.type != "submit") {
            data.append(element.name, element.value);
        }
    }

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.response);
            if (response.code != undefined) {
                response = response.code;
                if (response.behave == 'replace') {
                    document.getElementById(div).innerHTML = response.code;
                }
                else if (response.behave == 'append') {
                    document.getElementById(div).innerHTML += response.code;
                }
            }
            else if (response.redirect != undefined) {
                location.href = response.redirect.page;
            }
        }
    };

    xhr.open('POST', url);
    xhr.send(data);
}