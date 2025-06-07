const addDocumentBtn = document.getElementById("addDocbtn");
const removeDocumentBtn = document.getElementById("removeDocbtn");
const documentPlaceholder = document.getElementById("document_placeholder");
const intRemArea = document.getElementById('intentially_removed');

let inputPath = document.querySelector("#document");

let file;

function toggleBrowse(){
    inputPath.click();
}

function removeDoc(){
    addDocumentBtn.style.display = "block";
    removeDocumentBtn.style.display = "none";
    documentPlaceholder.style.display = "none";

    documentPlaceholder.setAttribute('src', '');

    inputPath.value = null;

    //intentially removed at edit
    intRemArea.value = 'removed';
}

inputPath.addEventListener("change", function() {
    file = this.files[0];
    /*if(file){
        const reader = new FileReader();
        reader.addEventListener("load", function(){
            imagePlaceholder.setAttribute('src', reader.result);
        });
        reader.readAsDataURL(file);
    } */
    /*  if(this.value){ */
    addDocumentBtn.style.display = "none";
    removeDocumentBtn.style.display = "block";
    documentPlaceholder.style.display = "block";

    showDoc();

});

function showDoc(){
    let fileType = file.type;
    let validExtensions = ["image/jpg", "image/jpeg", "image/png"];

    if (validExtensions.includes(fileType)){
        let fileReader = new FileReader();

        fileReader.onload = () => {
            let fileURL = fileReader.result;
            documentPlaceholder.setAttribute('src', fileURL);
        }

        fileReader.readAsDataURL(file);
    } else {
        alert("This file is not an image");
        removeDoc();
    }

}