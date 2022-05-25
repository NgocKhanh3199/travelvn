function getfilenameupload(name) {

    date = new Date()
    tamp = name.split(".")
    return tamp[0] + "_" +
        date.getHours() + "_" +
        date.getMinutes() + "_" +
        date.getSeconds() + "_" +
        date.getDate() + "_" +
        (date.getMonth() + 1) + '_' +
        date.getFullYear() + "." + tamp[1]
}

function uploadFile(hinhanh, folder) {
    arrName = [];
    for (i = 0; i < hinhanh.length; i++) {
        data = new FormData()
        nameSave = getfilenameupload(hinhanh[0].name)
        data.append('file', hinhanh[i])
        data.append('name', nameSave)
        data.append('folder', folder)
        arrName.push(nameSave)
        $.ajax({
            url: 'index.php?controller=controller&action=uploadFile',
            type: 'post',
            data: data,
            contentType: false,
            processData: false,
            success: function(data) {
            }
        })
    }
    return arrName
    
}