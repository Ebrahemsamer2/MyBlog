let clearData = (parent, elements) => {

    elements.forEach(element => {
        $(parent).find("[name='" + element + "']").val('')
    });

}   
