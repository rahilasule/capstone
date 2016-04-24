
var global_sub = 0;

function send_request(url){
    var obj, result;
    obj = $.ajax({url: url, async: false});
    result = $.parseJSON(obj.responseText);
    return result;
}

function getDetails() {

    var url,url2, result,result1, qty,id,name,price,c,sub,isub;

    c =1;
    qty = $('#qty').val();
    id = $('#item_id').val();

    url = "../../application/controllers/controller.php?cmd=1&id="+id;
    
    result = send_request(url);

    name = result.item_name;
    price = result.price;
    sub = price*qty;
    isub = Math.round(sub*100)/100;

    addRow(c,name,qty,price);
    c = c+1;

    url2 = "../../application/controllers/controller.php?cmd=2&id="+id+"&qty="+qty+"&sub="+isub;
    result1 = send_request(url2);
    //alert(result.result);
}

function addRow(count,iname,iqty,iprice){

    var table = document.getElementById('table');
    var row = table.insertRow(count);

    var name = row.insertCell(0);
    var quantity = row.insertCell(1);
    var price = row.insertCell(2);
    var subtotal = row.insertCell(3);

    name.innerHTML= iname;

    quantity.innerHTML= iqty;

    price.innerHTML= iprice;

    var sub = iqty * iprice;
    var isub = Math.round(sub * 100)/100;

    subtotal.innerHTML = isub;
    
}
