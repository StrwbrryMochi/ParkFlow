// Register Photo Preview and Choose File
const fileUploadContainer = document.getElementById("file-upload-container");
const fileUpload = document.getElementById("file-upload");
const fileChosen = document.getElementById("file-chosen");
const filePreview = document.getElementById("file-preview");

let isFileDialogOpen = false;

fileUploadContainer.addEventListener("click", function (event) {
  if (!isFileDialogOpen) {
    isFileDialogOpen = true;
    fileUpload.click();
  }
});

fileUpload.addEventListener("change", function () {
  const file = this.files[0];

  if (file) {
    fileChosen.textContent = file.name;

    const reader = new FileReader();

    reader.onload = function (e) {
      filePreview.src = e.target.result;
      filePreview.style.display = "block";
    };
    reader.readAsDataURL(file);
  } else {
    fileChosen.textContent = "No file chosen";
    filePreview.style.display = "none";
  }
  isFileDialogOpen = false;
});
