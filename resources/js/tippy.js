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
    content: 'Googleマップを表示',
    duration: 500,
    allowHTML: true,
    placement: 'right',
    theme: 'tippy_main_theme',
});

// HPに遷移するツールチップ
tippy('.tippy_jump_hp', {
    content: 'HPを表示',
    duration: 500,
    allowHTML: true,
    placement: 'right',
    theme: 'tippy_main_theme',
});