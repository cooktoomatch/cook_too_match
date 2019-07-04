const select = $('#pref');
const selected = $('#pref').data('selected');
select.children('option').prevObject[0][selected].selected = true;