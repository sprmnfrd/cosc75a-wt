function displayUpdateData(product_code, product_name, product_type, product_image, price_amount, product_description) {
    let pCode = document.getElementById("update-product-code");
    let pName = document.getElementById("update-product-name");
    let pType = document.getElementById("update-product-type");
    let pImage = document.getElementById("update-product-image-display");
    let prAmount = document.getElementById("update-product-price");
    let pDescription = document.getElementById("update-product-desc");

    pCode.value = product_code;
    pName.value = product_name;
    pType.value = product_type;

    pImage.src = "../../images/product_images/"+product_image;
    document.getElementById("update-product-image-display-div").classList.remove("d-none");

    prAmount.value = price_amount;
    pDescription.value = product_description;
}

function toggleError(element_id, action) {
    if(action === "show") {
        document.getElementById(element_id).classList.remove("d-none");
    } else {
        document.getElementById(element_id).classList.add("d-none");
    }
}

