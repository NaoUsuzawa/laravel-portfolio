<div class="position-relative mb-2" style="height:50px">

    <div class="d-flex align-items-center d-md-none gap-3">
        <a href="http://127.0.0.1:8000/message"><i class="fa-solid fa-angle-left" style="font-size:35px; line-height:50px; color: #D9D9D9"></i></a>
        <img src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg" alt="user" class="rounded-circle" style="width:50px; height:50px;">
    
        <h6 class="mb-0" style="line-height: 1">USER 3</h6>
    </div>

    <div class="position-absolute top-50 start-50 translate-middle d-flex align-items-center justify-content-center rounded d-none d-md-block text-center"
        style="background-color: #f1bdb2; color:#ffffff; width:330px; height:50px;">
        <h2 class="mb-0" style="font-size:24px; line-height: 50px;">Talking with USER 3</h2>
    </div>

    <div class="position-absolute top-50 end-0 translate-middle-y d-flex align-items-center d-none d-md-block">
        <a href="" class="text-decoration-none" style="color:#f1bdb2;">
            Delete &nbsp;<i class="fa-solid fa-trash" style="font-size:35px;"></i>
        </a>
    </div>

    <div class="position-absolute top-50 end-0 translate-middle-y dropdown d-md-none me-2">
        <button class="btn btn-link text-secondary p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-ellipsis-vertical" style="color: #D9D9D9; font-size:30px;"></i>
        </button>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
        <li class="text-center"><a class="dropdown-item" href="#" style="color: #9F6B46"><i class="fa-solid fa-trash" style="color:#9F6B46"></i> &nbsp;Comment</a></li>
        <li class="text-center"><a class="dropdown-item" href="#" style="color: #9F6B46"><i class="fa-solid fa-trash" style="color:#9F6B46"></i> &nbsp;Room</a></li>
        </ul>
    </div>

</div>

<div class="message-board mb-3 rounded" style="">

</div>

<div class="d-flex w-100">
    <div class="d-flex flex-column me-4 w-100">
        <input type="text" name="message" id="massage" class="form-control" placeholder="Enter a message">
    </div>
    
    <div class="d-flex flex-column me-4">
        <button class="btn custom-btn">Send</button>
    </div>

    <div class="d-flex" style="color: #f1bdb2;">
        <i class="fa-regular fa-face-smile me-4" style="font-size: 38px;"></i>

        <input type="file" id="imageInput" accept="image/*" style="display:none">
        <i class="fa-solid fa-image" id="imageIcon" style="font-size: 38px;cursor:pointer;"></i>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const imageIcon = document.getElementById("imageIcon");
    const imageInput = document.getElementById("imageInput");

    // imageInput excute when imageIcon is clicked
    imageIcon.addEventListener("click", () => {
        imageInput.click(); 
    });

    imageInput.addEventListener("change", function() {
        const file = this.files[0];
        if (file) {
            const previewUrl = URL.createObjectURL(file);
            const previewImg = document.createElement("img");
            previewImg.src = previewUrl;
            previewImg.style.maxWidth = "150px";
            previewImg.style.borderRadius = "10px";

            document.querySelector(".message-board").appendChild(previewImg);
            }
    });
});
</script>