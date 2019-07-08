function i(value) {
    console.log(value)
}

const pathname = location.pathname;
const path = pathname.split('/');

const cook_id = path[3];


//ページを開いた際に実行される関数
async function comment() {

    const params = {
        cook_id: cook_id
    }
    //jsonMessage(web.phpに新たに追加)からmessageテーブルのデータを取得
    const comment = await axios.get(`/jsonComment`, {
        params: params
    });

    // i(comment.data)

    let content = ''

    //contentに足していく。
    comment.data.forEach(element => {
        content += tag(element.user.name, element.content, element.created_at, element.user.icon)
    });


    // displayに表示させる
    $('.msgArea').html(content);
}
//関数実行

comment();


//コメントを
$('.pyorosiku').on('click', function () {


    async function submit() {

        const params = {
            cook_id: cook_id,
            user_id: $('.user_id').val(),
            content: $('.text').val(),
        }

        await axios.post(`/cooks/show/${cook_id}`, params)
            .then(res => {

                // i(res.data.length)

                const count = res.data.length - 1

                const content = tag(res.data[count].user.name, res.data[count].content, res.data[count].created_at, res.data[count].user.icon);

                // i(content)

                // $('.display').append(content)
                $('.msgArea').prepend(content)


                $('.text').val('')
            })
            .catch(e => {
                alert(e.response.data.errors.content)
            });
    }

    submit();
})

//データベースからデータを取得した際にhtmlに組み込むための関数
//htmlに組み込むタグを変更するにはここを変更する。
function tag(name, content, time, icon) {
    // return `<li>
    //         <img src="/storage/user_icon/${val.user_icon}" alt="icon" class="icon rounded-circle img-fluid">
    //         <p class="user_name">${val.user_name}</p>
    //         <p class="content">${val.message.content}</p>
    //         <p class="date">${val.message.created_at}</p>
    //         </li>`;
    // return `<tr>
    //         <td class="table-text">
    //         <div>${name}</div>
    //         <div>${content}</div>
    //         <div>${time}</div>
    //         </td>
    //         </tr>`;

    return `<li>
            <img src="/storage/user_icon/${icon}" alt="icon" class="icon rounded-circle img-fluid">
            <p class="user_name">${name}</p>
            <p class="content">${content}</p>
            <p class="date">${time}</p>
            </li>`;
}