
let id = $("input[name*='book_id']")
id.attr("readonly","readonly");


$(".btnedit").click( e =>{
    let textvalues = displayData(e);

    let country = $("input[name*='countries']");
    let region = $("input[name*='regions']");
    let price = $("input[name*='prices']");

    id.val(textvalues[0]);
    country.val(textvalues[1]);
    region.val(textvalues[2]);
    price.val(textvalues[3].replace("$", ""));
});


function displayData(e) {
    let id = 0;
    const td = $("#tbody tr td");
    let textvalues = [];

    for (const value of td){
        if(value.dataset.id == e.target.dataset.id){
           textvalues[id++] = value.textContent;
        }
    }
    return textvalues;

}
