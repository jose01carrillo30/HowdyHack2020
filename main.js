/** ------ Constants ------ */
const enums = {
    status : {
        REQUESTED : 1,
        INPROGRESS : 2,
        COMPLETED : 3,
        PUBLISHED : 4
    }
}

function refreshOpenList(listname) {
    console.log("refreshOpenList");
    // clear list

    // add loading symbol

    var data = new FormData();
    data.append('status', enums.status.REQUESTED);
   
    // AJAX CALL
    var xhr = new XMLHttpRequest();
    console.log("Calling xhr.open");
    xhr.open('POST', "get_captions.php");
    xhr.onload = function () {
      console.log(this.response);
    //   if (this.response == "OK") {
        console.log("got response as ");
        console.log(this.response);
        console.log("with type ");
        var respObj = JSON.parse(this.response);
        console.log("got response (decoded) as ");
        console.log(respObj);
        console.log("with type ");
        console.log(typeof respObj);
        console.log("with output var of ");
        console.log(respObj.output);
        console.log("with type ");
        console.log(typeof respObj.output);
        // location.href = "thank-you.html";
        // alert("OK!");
        displayOpenCaption(0,0,0);
    //   } else {
    //     // TODO: notify that page could not load
    //     alert(this.response);
    //   }
    };
    console.log("Calling xhr.send");
    xhr.send(data);
    console.log("Called xhr.send");
}

function displayOpenCaption(resultObject, index, array) {
    // add this object to list
    console.log("object created");
    var node = 
    `<li class="list-group-item">I am cactus</li>`;
    // `<li id="${ingredient.name}" class="list-group-item">${ingredient.name}<span class="close" onclick="removeIngredient(this)">x</span></li>`;
    
    $("#ingredientsList").append(node);

}
