// profile image drag and drop
const dropArea = document.querySelector(".form-drag-area");
let dropText = document.querySelector(".description");
const browseButton = document.querySelector(".form-upload");
let inputPath = document.querySelector("#profile_image");

let file; //this is a global variable and we'll use it inside multiple functions



//browse options and upload options
browseButton.onclick = () => {
    inputPath.click();
}

inputPath.addEventListener("change", function() {
    //getting user select file and [0] this means if user select multiple files then we'll select only the first one
    file = this.files[0];

    showImage(); //calling function
});

dropArea.addEventListener("dragover", (event) => {
    event.preventDefault(); //preventing from default behaviour
    dropArea.classList.add("active");
    dropText.textContent= "Release to Upload File";
});
dropArea.addEventListener("dragleave", () => {
    dropArea.classList.remove("active");
    dropText.textContent = "Drag & Drop to Upload File";
});

dropArea.addEventListener("drop", (event) => {
    //getting user select file and [0] this means if user select multiple files then we'll select only the first one
    event.preventDefault(); //preventing from default behaviour
    file = event.dataTransfer.files[0];
    let list = new DataTransfer();
    list.items.add(file);
    inputPath.files = list.files;

    showImage(); //calling function
    dropArea.classList.remove("active");
});


function showImage() {
    let fileType = file.type; //getting selected file type

    let validExtensions = ["image/jpeg", "image/jpg", "image/png"]; //adding some valid image extensions in array

    if(validExtensions.includes(fileType)) { //if user selected file is an image file
        let fileReader = new FileReader(); //creating new FileReader object

        fileReader.onload = () => {
            let fileURL = fileReader.result; //passing user file source in fileURL variable
            /*let imgTag = `<img src="${fileURL}" alt="">`; //creating an img tag and passing user selected file source inside src attribute */
            document.querySelector("#profile_image_placeholder").setAttribute('src', fileURL);//adding that created img tag inside dropArea container
        }
        fileReader.readAsDataURL(file);

        let validate = document.querySelector(".profile-image-validation");
        validate.classList.add("active");
    } else {
        alert("This is not an Image File!");
        dropArea.classList.remove("active");
        /* dropText.textContent("Drag & Drop to Upload File"); */
    }
}