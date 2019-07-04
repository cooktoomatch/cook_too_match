const pathname = location.pathname;
const path = pathname.split('/');

const conversation = path[2];

//ページを開いた際に実行される関数
async function message() {

    //jsonMessage(web.phpに新たに追加)からmessageテーブルのデータを取得
    const message = await axios.get(`/jsonMessage`);

    let content = ''

    //contentに足していく。
    message.data.forEach(element => {
        content += tag(element.content)
    });


    //tbodyに表示させる
    $('.tbody').html(content);

}

//関数実行
message();


//コメントを
$('.btn').on('click', function () {


    async function submit() {

        const params = {
            content: $('.form-control').val(),
            conversation_id: $('.conversation_id').val(),
            user_id: $('.user_id').val(),
        }

        await axios.post(`/conversations/${conversation}/messages`, params)
            .then(res => {
                const content = tag(res.data.content);

                $('.tbody').append(content)

                $('.form-control').val('')
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
    return `<tr>
            <td class="table-text">
            <div>${value}</div>
            </td>
            </tr>`;
}