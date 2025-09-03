// リスト形式のツールチップ
tippy('.tippy_list_display', {
    content: "リスト形式",
    duration: 500,
    allowHTML: true,
    placement: 'right',
});

// カード形式のツールチップ
tippy('.tippy_card_display', {
    content: "カード形式",
    duration: 500,
    allowHTML: true,
    placement: 'right',
});

// ユーザーの氏名を表示するツールチップ
tippy('.tippy_user_full_name', {
    content: (reference) => reference.dataset.userFullName,
    duration: 500,
    allowHTML: true,
    placement: 'right',
});