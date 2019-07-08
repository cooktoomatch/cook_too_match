const pathname = location.pathname;
const path = pathname.split('/');

const cook_id = path[3];


//ページを開いた際に実行される関数
async function comment() {

    const params = {
        cook_id: cook_id
    }
    //jsonMessage(web.phpに新たに追加)からmessageテーブルのデータを取得
    const comment = await axios.get(`/jsonComment`, {params: params});
    console.log(comment)

    let content = ''

    //contentに足していく。
    comment.data.forEach(element => {
        content += tag(element.content)
    });


    // displayに表示させる
    $('.commentArea').html(content);
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
                const content = tag(res.data.content);
                // const content = tag(res.data);

                // $('.display').append(content)
                $('.commentArea').append(content)


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
function tag(value) {
    // return `<li>
    //         <img src="/storage/user_icon/${val.user_icon}" alt="icon" class="icon rounded-circle img-fluid">
    //         <p class="user_name">${val.user_name}</p>
    //         <p class="content">${val.message.content}</p>
    //         <p class="date">${val.message.created_at}</p>
    //         </li>`;
    return `<tr>
            <td class="table-text">
            <div>${value}</div>
            </td>
            </tr>`;
}