function i(value) {
    console.log(value)
}

//月の日数を取得する ex  getLastDay(2019,4)
const getLastDay = (year, month) => {
    return new Date(year, month, 0).getDate()
};

const today = new Date()

const todayYear = today.getFullYear()
const todayMonth = today.getMonth() + 1
const todayday = today.getDate()

$('.year').html(`
<option value ="${todayYear}" selected>${todayYear}年</option>
<option value ="${todayYear + 1}">${todayYear + 1}年</option>
`)

$('.month').html(`
<option value ="${todayMonth}" selected>${todayMonth}月</option>
<option value ="${todayMonth + 1}">${todayMonth + 1}月</option>
<option value ="${todayMonth + 2}">${todayMonth + 2}月</option>
<option value ="${todayMonth + 3}">${todayMonth + 3}月</option>
`)

let days = '';

for (let i = todayday; i <= getLastDay(todayYear, todayMonth); i++) {
    days += `<option value="${i}">${i}日</option>`
}

$('.day').html(days)


$('.year,.month').change(function () {

    const year = $('.year' + ' option:selected').val()
    const month = $('.month' + ' option:selected').val()

    const dayCount = getLastDay(year, month);

    if (month == todayMonth && year == todayYear) {
        let days = ''

        for (let i = todayday; i <= dayCount; i++) {
            days += `<option value ="${i}">${i}日</option>`
        }

        $('.day').html(days)
    } else {
        let days = '';

        for (let i = 1; i <= dayCount; i++) {
            days += `<option value ="${i}">${i}日</option>`
        }

        $('.day').html(days)
    }

})