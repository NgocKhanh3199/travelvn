<!DOCTYPE html>
<html>

<Head>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</Head>

<body>

    <select id="hotel_name" aria-placeholder="chon tinh" onchange="get_huyen()" name="hotel_name" class="form-select" aria-label="Default select example">

        <option value="">Chọn Tỉnh</option>

    </select>
    <br><br>
    <select id="hotel_name1" name="hotel_name1" onchange="get_id_huyen()" class="form-select" aria-label="Default select example">

    </select>
    <br><br>

    <select id="hotel_name2" name="hotel_name2" class="form-select" aria-label="Default select example">

    </select>
    <!-- <button onclick="get_id_tinh()">ok</button> -->

    $('#item-tour').children().remove()
</body>

</html>
<script>
    document.onload = get()
    // A URL returns TEXT data.
    function get() {
        get_tinh()
        // get_huyen()
    }

    function get_tinh() {
        id_tinh = null
        id_tinh = $('#hotel_name').val()
        $.ajax({
            url: 'https://provinces.open-api.vn/api/?depth=3',
            method: "GET",
            data: {
                // id_account: id_account,
            },
            success: function(data) {
                // data_item = JSON.parse(data)
                for (i = 0; i < data.length; i++) {
                    // huyen = data[i]['districts'][0]['name'];
                    // xa = ['districts'][0]['wards'][1]['name']
                    $('#hotel_name').append(
                        `
                    <option id='tinh' value="` + data[i]['code'] + `">` + data[i]['name'] + `</option>
                    `
                    )


                }
                // get_huyen()
            }
        })
    }

    function get_huyen() {

        id_tinh = $('#hotel_name').val()
        $.ajax({
            url: 'https://provinces.open-api.vn/api/p/' + id_tinh + '?depth=2',
            method: "GET",
            data: {
                // id_account: id_account,
            },
            success: function(data) {
                // console.log(data['districts'].length)
                // console.log(data['districts'][2]['name'])
                // data_item = JSON.parse(data)

                for (i = 0; i < data['districts'].length; i++) {
                    console.log(data['districts'][i]['name'])
                    $('#hotel_name1').append(
                        `
                    <option id='huyen' value="` + data['districts'][i]['code'] + `">` + data['districts'][i]['name'] + `</option>
                    `
                    )

                }
            }
        })
    }

    function get_id_huyen() {
        id_huyen = $('#hotel_name1').val()
        console.log(id_huyen)
        $.ajax({
            url: 'https://provinces.open-api.vn/api/d/' + id_huyen + '?depth=2',
            method: "GET",
            data: {
                // id_account: id_account,
            },
            success: function(data) {
                // console.log(data['districts'].length)
                // console.log(data['districts'][2]['name'])
                // data_item = JSON.parse(data)

                for (i = 0; i < data['wards'].length; i++) {
                    // console.log(data['wards'][i]['name'])
                    $('#hotel_name2').append(
                        `<option id='xa' value="` + data['wards'][i]['code'] + `">` + data['wards'][i]['name'] + `</option>
                    `
                    )

                }
            }
        })

    }
</script>