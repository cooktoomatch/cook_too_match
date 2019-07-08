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
    4: ['-'],
    5: ['-']
}

//todayMinuteの時間帯により条件を分岐する ➀
function minute(value, tag) {
    const minute = []
    value.forEach(function (el) {
        minute.push(`<option value="${el}">${el}分</option>`)
    })
    $(tag).html(minute)
}

// ➀とこれはセット
function timeSet(tag, count) {
    if (todayMinute >= 0 && todayMinute < 15) {
        minute(minutes[count], tag)
    } else if (todayMinute >= 15 && todayMinute < 30) {
        minute(minutes[count + 1], tag)
    } else if (todayMinute >= 30 && todayMinute < 45) {
        minute(minutes[count + 2], tag)
    } else if (todayMinute >= 45 && todayMinute < 60) {
        minute(minutes[count + 3], tag)
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


//start 提供開始時間

$('.start-year').html(displayTag(todayYear, '年', 2))

$('.start-month').html(displayTag(todayMonth, '月', 9, 12))

$('.start-day').html(displayTag(todayDay, '日', 100, todayLastDay, true))

$('.start-hour').html(displayTag(todayHour, '時', 14, 24, true))

timeSet('.start-minute', 1)


$('.start-year').change(function () {

    const year = $('.start-year' + ' option:selected').val()
    const month = $('.start-month' + ' option:selected').val()
    const day = $('.start-day' + ' option:selected').val()
    const hour = $('.start-hour' + ' option:selected').val()

    if (year == todayYear) {
        $('.start-month').html(displayTag(todayMonth, '月', 100, 12, true, true))

        $('.start-day').html(displayTag(todayDay, '日', 100, todayLastDay, true, true))

        $('.start-hour').html(displayTag(todayHour, '時', 100, 24, true, true))

        timeSet('.start-minute', 1)

    } else {
        $('.start-month').html(displayTag(1, '月', 100, 12, true, true))

        $('.start-day').html(displayTag(1, '日', 100, todayLastDay, true, true))

        $('.start-hour').html(displayTag(1, '時', 100, 24, true, true))

        minute(minutes[0], '.start-minute')
    }
})


$('.start-month').change(function () {

    const year = $('.start-year' + ' option:selected').val()
    const month = $('.start-month' + ' option:selected').val()
    const day = $('.start-day' + ' option:selected').val()
    const hour = $('.start-hour' + ' option:selected').val()

    if (year == todayYear && month == todayMonth) {

        $('.start-day').html(displayTag(todayDay, '日', 100, todayLastDay, true, true))

        $('.start-hour').html(displayTag(todayHour, '時', 100, 24, true, true))

        timeSet('.start-minute', 1)
    } else {
        $('.start-day').html(displayTag(1, '日', 100, todayLastDay, true, true))

        $('.start-hour').html(displayTag(1, '時', 100, 24, true, true))

        minute(minutes[0], '.start-minute')
    }
})

$('.start-day').change(function () {

    const year = $('.start-year' + ' option:selected').val()
    const month = $('.start-month' + ' option:selected').val()
    const day = $('.start-day' + ' option:selected').val()
    const hour = $('.start-hour' + ' option:selected').val()

    if (year == todayYear && month == todayMonth && day == todayDay) {

        $('.start-hour').html(displayTag(todayHour, '時', 100, 24, true, true))

        timeSet('.start-minute', 1)
    } else {

        $('.start-hour').html(displayTag(1, '時', 100, 24, true, true))

        minute(minutes[0], '.start-minute')
    }
})

$('.start-hour').change(function () {

    const year = $('.start-year' + ' option:selected').val()
    const month = $('.start-month' + ' option:selected').val()
    const day = $('.start-day' + ' option:selected').val()
    const hour = $('.start-hour' + ' option:selected').val()

    if (year == todayYear && month == todayMonth && day == todayDay && hour == todayHour) {
        timeSet('.start-minute', 1)
    } else {
        minute(minutes[0], '.start-minute')
    }

})

//end 提供終了時間

$('.end-year').html(displayTag(todayYear, '年', 2))

$('.end-month').html(displayTag(todayMonth, '月', 9, 12))

$('.end-day').html(displayTag(todayDay, '日', 100, todayLastDay, true))

$('.end-hour').html(displayTag(todayHour, '時', 14, 24, true))

timeSet('.end-minute', 2)


$('.end-year').change(function () {

    const year = $('.end-year' + ' option:selected').val()
    const month = $('.end-month' + ' option:selected').val()
    const day = $('.end-day' + ' option:selected').val()
    const hour = $('.end-hour' + ' option:selected').val()

    if (year == todayYear) {
        $('.end-month').html(displayTag(todayMonth, '月', 100, 12, true, true))

        $('.end-day').html(displayTag(todayDay, '日', 100, todayLastDay, true, true))

        $('.end-hour').html(displayTag(todayHour, '時', 100, 24, true, true))

        timeSet('.end-minute', 2)

    } else {
        $('.end-month').html(displayTag(1, '月', 100, 12, true, true))

        $('.end-day').html(displayTag(1, '日', 100, todayLastDay, true, true))

        $('.end-hour').html(displayTag(1, '時', 100, 24, true, true))

        minute(minutes[0], '.end-minute')
    }
})


$('.end-month').change(function () {

    const year = $('.end-year' + ' option:selected').val()
    const month = $('.end-month' + ' option:selected').val()
    const day = $('.end-day' + ' option:selected').val()
    const hour = $('.end-hour' + ' option:selected').val()

    if (year == todayYear && month == todayMonth) {

        $('.end-day').html(displayTag(todayDay, '日', 100, todayLastDay, true, true))

        $('.end-hour').html(displayTag(todayHour, '時', 100, 24, true, true))

        timeSet('.end-minute', 2)
    } else {
        $('.end-day').html(displayTag(1, '日', 100, todayLastDay, true, true))

        $('.end-hour').html(displayTag(1, '時', 100, 24, true, true))

        minute(minutes[0], '.end-minute')
    }
})

$('.end-day').change(function () {

    const year = $('.end-year' + ' option:selected').val()
    const month = $('.end-month' + ' option:selected').val()
    const day = $('.end-day' + ' option:selected').val()
    const hour = $('.end-hour' + ' option:selected').val()

    if (year == todayYear && month == todayMonth && day == todayDay) {

        $('.end-hour').html(displayTag(todayHour, '時', 100, 24, true, true))

        timeSet('.end-minute', 2)
    } else {

        $('.end-hour').html(displayTag(1, '時', 100, 24, true, true))

        minute(minutes[0], '.end-minute')
    }
})

$('.end-hour').change(function () {

    const year = $('.end-year' + ' option:selected').val()
    const month = $('.end-month' + ' option:selected').val()
    const day = $('.end-day' + ' option:selected').val()
    const hour = $('.end-hour' + ' option:selected').val()

    if (year == todayYear && month == todayMonth && day == todayDay && hour == todayHour) {
        timeSet('.end-minute', 2)
    } else {
        minute(minutes[0], '.end-minute')
    }

})