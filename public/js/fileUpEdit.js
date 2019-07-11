function i(value) {
  console.log(value)
}

let count = $('#script').data().count;

function setFile(c) {
    let count = 1;

    if (c !== 1) {
        count = Number($(`#image-file-${c}`)[0].id.split('-')[2]);
    }
    
    $(`#image-file-${count}`).change(function (e) {
        let file = e.target.files[0];

        const reader = new FileReader();
        if (file.type.indexOf("image") < 0) {
            alert("画像ファイルを指定してください。");
            return false;
        }

        reader.onload = (function (file) {
            return function (e) {
                $(`#upArea-${count}`).append(`<img class='upImg upImg-${count} img-raised'>`);
                $(`.upImg-${count}`).attr("src", e.target.result);
                $(`.upImg-${count}`).attr("title", file.name);

                $(`#file-btn-${count}`).css('display', 'none');

                count++;

                if (count === 4) return;

                const fileGroup = `<div class="fileGroup-${count}">
                                  <div id="upArea-${count}"></div>
                                  <div id="file-btn-${count}" class="fileBtn form-control form-file" onClick="$('#image-file-${count}').click();">追加でファイルを選択</div>
                                  <input id="image-file-${count}" type="file" class="custom-file-input" name="image_${count}" placeholder="サムネイル" style="display: none;">
                                  </div>`;

                
                $('#fileArea').append(fileGroup);

                setFile(count);
            };
        })(file);

        reader.readAsDataURL(file);
    });
};

setFile(1);