function i(value) {
    console.log(value)
}

$('.good').on('click', function () {
    //elはbtn-数値
    const el = $(this)[0].className.split(' ')[7]
    //cook_id
    const cook_id = el.slice(4)

    //今回は一応書きます これはのちに変える
    let good_num = $(this)[0].className.split(' ')[8]
    good_num = Number(good_num)

    // i(good_num)

    if ($('.' + el).hasClass('plus')) {
        $('.' + el).removeClass('plus')

        $('.' + el).css('background-color', 'white')

        async function good() {

            const params = {
                cook_id: cook_id,
                good: good_num,
            }

            const response = await axios.post('/cooks', params)
            i(response.data.good)
        }

        good()

    } else {
        $('.' + el).addClass('plus')
        $('.' + el).css('background-color', 'orange')


        const params = {
            cook_id: cook_id,
            good: good_num + 1,
        }

        async function good() {
            const response = await axios.post('/cooks', params)

            i(response.data.good)
        }

        good()
    }

});