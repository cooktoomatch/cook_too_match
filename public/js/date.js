function i(value) {
    console.log(value)
}

//月の日数を取得する ex  getLastDay(2019,4)
const getLastDay = (year, month) => {
    return new Date(year, month, 0).getDate()
};

//それぞれの項目をselectタグのoptionに入れる際に利用する関数
//dateは表示する際の年月日時分の要素 unitは単位 countには表示する個数 limitは折り返す地点 booleanはtrueの時折り返しなし
//selectはselectedを付与したい値を設定した時にselectedを付与する。selectタグのoptionの内容は変わらずselectedがつくかどうかを判断する
const displayTag = (date, unit, count, limit = 0, boolean = false, select = false) => {

    const value = [];

    for (let i = 0; i < count; i++) {



        if (select == date) {
            value.push(`<option value ="${date}" selected>${date}${unit}</option>`)
        } else {
            value.push(`<option value ="${date}">${date}${unit}</option>`)
        }
        date++

        if (boolean && date == limit) {
            break
        }

        if (limit != 0 && limit + 1 == date) {
            date = 1
        }
    }
    return value

}

const minutes = {
    0: [0, 15, 30, 45],
    1: [15, 30, 45],
    2: [30, 45],
    3: [45],
    4: ['-']
}

//todayMinuteの時間帯により条件を分岐する ➀
function minute(value) {
    const minute = []
    value.forEach(function (el) {
        minute.push(`<option value="${el}">${el}分</option>`)
    })
    $('.minute').html(minute)
}

// ➀とこれはセット
function timeSet() {
    if (todayMinute >= 0 && todayMinute < 15) {
        minute(minutes[1])
    } else if (todayMinute >= 15 && todayMinute < 30) {
        minute(minutes[2])
    } else if (todayMinute >= 30 && todayMinute < 45) {
        minute(minutes[3])
    } else if (todayMinute >= 45 && todayMinute < 60) {
        minute(minutes[4])
    }
}

// ----------------------------------------------------------- function

const today = new Date()

//今日の年月日時分
const todayYear = today.getFullYear()
const todayMonth = today.getMonth() + 1
const todayDay = today.getDate()
const todayHour = today.getHours()
const todayMinute = today.getMinutes()

//今月の日数
const todayLastDay = getLastDay(todayYear, todayMonth)

//今月の残り日数
const spaceDay = getLastDay(todayYear, todayMonth) - todayDay


$('.year').html(displayTag(todayYear, '年', 2))

$('.month').html(displayTag(todayMonth, '月', 9, 12))

$('.day').html(displayTag(todayDay, '日', 100, todayLastDay, true))

$('.hour').html(displayTag(todayHour, '時', 14, 24, true))


$('.year').change(function () {

    const year = $('.year' + ' option:selected').val()
    const month = $('.month' + ' option:selected').val()
    const day = $('.day' + ' option:selected').val()
    const hour = $('.hour' + ' option:selected').val()

    if (year == todayYear) {
        $('.month').html(displayTag(todayMonth, '月', 100, 12, true, true))

        $('.day').html(displayTag(todayDay, '日', 100, todayLastDay, true, true))

        $('.hour').html(displayTag(todayHour, '時', 100, 24, true, true))

        timeSet()

    } else {
        $('.month').html(displayTag(1, '月', 100, 12, true, true))

        $('.day').html(displayTag(1, '日', 100, todayLastDay, true, true))

        $('.hour').html(displayTag(1, '時', 100, 24, true, true))

        minute(minutes[0])
    }
})


$('.month').change(function () {

    const year = $('.year' + ' option:selected').val()
    const month = $('.month' + ' option:selected').val()
    const day = $('.day' + ' option:selected').val()
    const hour = $('.hour' + ' option:selected').val()

    if (year == todayYear && month == todayMonth) {

        $('.day').html(displayTag(todayDay, '日', 100, todayLastDay, true, true))

        $('.hour').html(displayTag(todayHour, '時', 100, 24, true, true))

        timeSet()
    } else {
        $('.day').html(displayTag(1, '日', 100, todayLastDay, true, true))

        $('.hour').html(displayTag(1, '時', 100, 24, true, true))

        minute(minutes[0])
    }
})

$('.day').change(function () {

    const year = $('.year' + ' option:selected').val()
    const month = $('.month' + ' option:selected').val()
    const day = $('.day' + ' option:selected').val()
    const hour = $('.hour' + ' option:selected').val()

    if (year == todayYear && month == todayMonth && day == todayDay) {

        $('.hour').html(displayTag(todayHour, '時', 100, 24, true, true))

        timeSet()
    } else {

        $('.hour').html(displayTag(1, '時', 100, 24, true, true))

        minute(minutes[0])
    }
})

$('.hour').change(function () {

    const year = $('.year' + ' option:selected').val()
    const month = $('.month' + ' option:selected').val()
    const day = $('.day' + ' option:selected').val()
    const hour = $('.hour' + ' option:selected').val()

    if (year == todayYear && month == todayMonth && day == todayDay && hour == todayHour) {
        timeSet()
    } else {
        minute(minutes[0])
    }

})