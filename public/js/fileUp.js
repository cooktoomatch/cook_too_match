function i(value) {
    console.log(value)
}

// let count = 1;
function setFile(c) {
    let count = 1;

    if (c !== 1) {
        count = Number($(`#image-file-${c}`)[0].id.split('-')[2]);
        // debugger;
    }
    
    // debugger;
    $(`#image-file-${count}`).change(function (e) {
        let file = e.target.files[0];

        const reader = new FileReader();
        if (file.type.indexOf("image") < 0) {
            alert("画像ファイルを指定してください。");
            return false;
        }

        reader.onload = (function (file) {
            return function (e) {
                // debugger;
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

                
                // debugger;
                setFile(count);
            };
        })(file);

        reader.readAsDataURL(file);
    });
};

setFile(1);
// var count

// $('.form-file').on('click', function (e) {
//     console.log(e.currentTarget.classList[0].slice(8))

//     var count = e.currentTarget.classList[0].slice(8)


//     $(`.file-${count}`).click()

// })

// $('.file').change(function (e) {

//     // i(e)

//     //固有のクラス名
//     let className = $('.file').attr('class').split(' ')[2]

//     let count = Number(className.slice(5))
//     // i(count)

//     // i(className)

//     let file = e.target.files[0];

//     let file_name = file.name


//     let period = file_name.indexOf('.')

//     file_name = file_name.substr(0, period)

//     // i(file_name)

//     var reader = new FileReader();

//     if (file.type.indexOf("image") < 0) {
//         alert("画像ファイルを指定してください。");
//         return false;
//     }

//     reader.onload = (function (file) {

//         return function (e) {
//             $("#upArea").append(`<img class="upImg-${file_name} img-raised">`);
//             $(`.upImg-${file_name}`).attr("src", e.target.result);
//             $(`.upImg-${file_name}`).attr("title", file.name);
//         };
//     })(file);
//     reader.readAsDataURL(file);

//     $(`.${className}`).css('display', 'none')
//     $('.custom-file').append(`<input type="file" class="file custom-file-input file-${count +1}" name="image">`)

// })



// $(`.file-${count}`).change(function (e) {

//     count++

//     console.log(e)

//     console.log(count + 'changeA')

//     $('.custom-file').append(`<input type="file" class="file file-${count}" name="image">`)

//     console.log(count + 'changeL')

//     // clickAction(count);
// })

// $('.file').change(function (e) {
//     var file = e.target.files[0];

//     // console.log(file)

//     // console.log('----------------------------------')

//     var reader = new FileReader();
//     if (file.type.indexOf("image") < 0) {
//         alert("画像ファイルを指定してください。");
//         return false;
//     }
//     // console.log(reader)
//     // console.log('----------------------------------')


//     reader.onload = (function (file) {
//         return function (e) {
//             $("#upArea").append("<img class='upImg img-raised'>");
//             $(".upImg").attr("src", e.target.result);
//             $(".upImg").attr("title", file.name);
//         };
//     })(file);
//     reader.readAsDataURL(file);

//     // console.log(reader.readAsDataURL(file))
// });