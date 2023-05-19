//esecuzione get dato un form
function GET(url, formname, div) {
    var elements = document.forms[formname].elements;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.response);
            if (response.code != undefined) {
                response = response.code;
                if (response.behave == 'replace'){
                    document.getElementById(div).innerHTML = response.code;
                }
                else if (response.behave == 'append'){
                    document.getElementById(div).innerHTML += response.code;
                }
            }
            else if (response.redirect != undefined) {
                location.href = response.redirect.page;
            }
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
                if (response.behave == 'replace'){
                    document.getElementById(div).innerHTML = response.code;
                }
                else if (response.behave == 'append'){
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