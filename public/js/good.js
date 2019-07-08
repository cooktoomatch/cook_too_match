function i(value) {
    console.log(value)
}

$('.good-store').on('click', function () {
    async function submit() {
        const cook_id = $('.cook_id').val();

        const params = {
            cook_id: cook_id,
        }

        await axios.post(`/goods/store`, params)
            .then(res => {
                const content = `<input class="good_id" type="hidden" name="good_id" value="${res.data.id}">
                                 <button type="submit" class="good-delete btn btn-sm btn-primary btn-outline-primary btn-icon btn-round">
                                 <i class="far fa-thumbs-up"></i>
                                 </button>
                                 <script src="/js/good.js"></script>`
                

                $('.goodBtnArea').html(content)
            })
            .catch(e => {
                alert(e.response.data.errors.content)
            });
    }

    submit();
});

$('.good-delete').on('click', function () {
    async function submit() {
        const good_id = $('.good_id').val();

        const params = {
            good_id: good_id
        }

        await axios.delete(`/good/${good_id}`, params)
            .then(res => {
                const content = `<input class="cook_id" type="hidden" name="cook_id" value="${res.data.cook_id}">
                                 <button type="submit" class="good-store btn btn-sm btn-default btn-outline-default btn-icon btn-round">
                                 <i class="far fa-thumbs-up"></i>
                                 </button>
                                 <script src="/js/good.js"></script>`

                $('.goodBtnArea').html(content)
            })
            .catch(e => {
                alert(e.response.data.errors.content)
            });
    }

    submit();
});









    // //elはbtn-数値
    // const el = $(this)[0].className.split(' ')[7]
    // //cook_id
    // const cook_id = el.slice(4)

    // //今回は一応書きます これはのちに変える
    // let good_num = $(this)[0].className.split(' ')[8]
    // good_num = Number(good_num)

    // // i(good_num)

    // if ($('.' + el).hasClass('plus')) {
    //     $('.' + el).removeClass('plus')

    //     $('.' + el).css('background-color', 'white')

    //     async function good() {

    //         const params = {
    //             cook_id: cook_id,
    //             good: good_num,
    //         }

    //         const response = await axios.post('/cooks', params)
    //         i(response.data.good)
    //     }

    //     good()

    // } else {
    //     $('.' + el).addClass('plus')
    //     $('.' + el).css('background-color', 'orange')


    //     const params = {
    //         cook_id: cook_id,
    //         good: good_num + 1,
    //     }

    //     async function good() {
    //         const response = await axios.post('/cooks', params)

    //         i(response.data.good)
    //     }

    //     good()
    // }