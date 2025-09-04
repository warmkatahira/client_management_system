// ユーザーの氏名を表示するツールチップ
tippy('.tippy_user_full_name', {
    content: (reference) => reference.dataset.userFullName,
    duration: 500,
    allowHTML: true,
    placement: 'right',
});