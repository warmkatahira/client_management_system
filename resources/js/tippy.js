// ユーザーの氏名を表示するツールチップ
tippy('.tippy_user_full_name', {
    content: (reference) => reference.dataset.userFullName,
    duration: 500,
    allowHTML: true,
    placement: 'right',
    theme: 'tippy_main_theme',
});

// グーグルマップに遷移するツールチップ
tippy('.tippy_jump_google_map', {
    content: '<i class="las la-map-marked-alt la-lg mr-1"></i>Googleマップを表示',
    duration: 500,
    allowHTML: true,
    placement: 'right',
    theme: 'tippy_main_theme',
});