// function i(value) {
//     console.log(value)
// }

function goodStore(target) {
    // store時はcook_idで判別
    const cook_id = target.classList[1].split('-')[2];

    async function submit() {
        const params = {
            cook_id: cook_id,
        };

        await axios.post(`/goods/store`, params)
            .then(res => {
                const content = `<button type="submit" class="good-delete good-delete-${res.data.id} btn btn-sm btn-primary btn-outline-primary btn-icon btn-round">
                                 <i class="far fa-thumbs-up"></i>
                                 </button>
                                 <script>
                                 $('.good-delete-${res.data.id}').on('click', e => {
                                    goodDelete(e.currentTarget);
                                 });
                                 </script>`;

                $(`.goodBtnArea-${cook_id}`).html(content);
            })
            .catch(e => {
                alert(e.response.data.errors.content);
            });
    }
    submit();
};

function goodDelete(target) {
    // delete時はgood_idで判別
    const good_id = target.classList[1].split('-')[2];

    async function submit() {
        const params = {
            good_id: good_id
        };

        await axios.delete(`/good/${good_id}`, params)
            .then(res => {
                const content = `<button type="submit" class="good-store good-store-${res.data.cook_id} btn btn-sm btn-default btn-outline-default btn-icon btn-round">
                                 <i class="far fa-thumbs-up"></i>
                                 </button>
                                 <script>
                                 $('.good-store-${res.data.cook_id}').on('click', e => {
                                    goodStore(e.currentTarget);
                                 });
                                 </script>`;

                $(`.goodBtnArea-${res.data.cook_id}`).html(content);
            })
            .catch(e => {
                alert(e.response.data.errors.content);
            });
    }
    submit();
};


$('.good-store').on('click', e => {
    goodStore(e.currentTarget);
});

$('.good-delete').on('click', e => {
    goodDelete(e.currentTarget);
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