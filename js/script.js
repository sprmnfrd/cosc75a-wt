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

function displayUpdatePromotion(promotion_code, promotion_image, promotion_start, promotion_end) {
    let prCode = document.getElementById("update-promotion-code");
    let prImage = document.getElementById("update-promotion-image-display");
    let prStart = document.getElementById("update-promotion-start");
    let prEnd = document.getElementById("update-promotion-end");

    prCode.value = promotion_code;
    prStart.value = promotion_start;
    prEnd.value = promotion_end;

    prImage.src = "../../images/promotions/"+promotion_image;
    document.getElementById("update-promotion-image-display-div").classList.remove("d-none");

}

function toggleError(element_id, action) {
    if(action === "show") {
        document.getElementById(element_id).classList.remove("d-none");
    } else {
        document.getElementById(element_id).classList.add("d-none");
    }
}

