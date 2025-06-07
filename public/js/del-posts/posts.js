const addImageBtn = document.getElementById("addImagebtn");
const removeImageBtn = document.getElementById("removeImagebtn");
const imagePlaceholder = document.getElementById("image_placeholder");
const intRemArea = document.getElementById('intentially_removed');

let inputPath = document.querySelector("#image");

let file;

function toggleBrowse(){
    inputPath.click();
}

function removeImage(){
    addImageBtn.style.display = "block";
    removeImageBtn.style.display = "none";
    imagePlaceholder.style.display = "none";

    imagePlaceholder.setAttribute('src', '');

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
        addImageBtn.style.display = "none";
        removeImageBtn.style.display = "block";
        imagePlaceholder.style.display = "block";

        showImage();

});

function showImage(){
    let fileType = file.type;
    let validExtensions = ["image/jpg", "image/jpeg", "image/png"];

    if (validExtensions.includes(fileType)){
        let fileReader = new FileReader();

        fileReader.onload = () => {
            let fileURL = fileReader.result;
            imagePlaceholder.setAttribute('src', fileURL);
        }

        fileReader.readAsDataURL(file);
    } else {
        alert("This file is not an image");
        removeImage();
    }

}