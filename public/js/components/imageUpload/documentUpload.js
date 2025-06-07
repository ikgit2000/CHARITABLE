//document

// profile image drag and drop
const dropArea1 = document.querySelector(".form1-drag-area");
let dropText1 = document.querySelector(".description1");
const browseButton1 = document.querySelector(".form1-upload");
let inputPath1 = document.querySelector("#document");

let documentFile;



//browse options and upload options
browseButton1.onclick = () => {
    inputPath1.click();
}

inputPath1.addEventListener("change", function() {
    //getting user select file and [0] this means if user select multiple files then we'll select only the first one
    documentFile = this.files[0];

    showDocument(); //calling function
});

dropArea1.addEventListener("dragover", (event) => {
    event.preventDefault(); //preventing from default behaviour
    dropArea1.classList.add("active");
    dropText1.textContent= "Release to Upload File";
});
dropArea1.addEventListener("dragleave", () => {
    dropArea1.classList.remove("active");
    dropText1.textContent = "Drag & Drop to Upload File";
});

dropArea1.addEventListener("drop", (event) => {
    //getting user select file and [0] this means if user select multiple files then we'll select only the first one
    event.preventDefault(); //preventing from default behaviour
    documentFile = event.dataTransfer.files[0];
    let list = new DataTransfer();
    list.items.add(documentFile);
    inputPath1.files = list.files;

    showDocument(); //calling function
    dropArea1.classList.remove("active");
});


function showDocument() {
    let documentType = documentFile.type; //getting selected file type

    let validExtensions = ["image/jpeg", "image/jpg", "image/png"]; //adding some valid image extensions in array

    if(validExtensions.includes(documentType)) { //if user selected file is an image file
        let documentReader = new FileReader(); //creating new FileReader object

        documentReader.onload = () => {
            let documentURL = documentReader.result; //passing user file source in fileURL variable
            /*let imgTag = `<img src="${fileURL}" alt="">`; //creating an img tag and passing user selected file source inside src attribute */
            document.querySelector("#document_placeholder").setAttribute('src', documentURL);//adding that created img tag inside dropArea container
        }
        documentReader.readAsDataURL(documentFile);

        let validate = document.querySelector(".document-validation");
        validate.classList.add("active");
    } else {
        alert("This is not an Image File!");
        dropArea1.classList.remove("active");
        /* dropText.textContent("Drag & Drop to Upload File"); */
    }
}