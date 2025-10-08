import Chart from "chart.js/auto";
import ChartDataLabels from 'chartjs-plugin-datalabels';
import colorMap from '../../chart_color';

// 画面読み込み時の処理
$(document).ready(function() {
    // グラフを作成
    createChart();
});

// グラフを作成
function createChart(){
    // AJAX通信のURLを定義
    const ajax_url = '/client_detail/ajax_get_chart_data';
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: ajax_url,
        type: 'GET',
        data: {
            'client_id': $('#client_id').val(),
        },
        dataType: 'json',
        success: function(data){
            try {
                const container = document.getElementById('client_sales_chart_div');
                container.innerHTML = '';
                data['base_clients'].forEach(base_client => {
                    // 倉庫顧客IDと倉庫名を取得
                    const base_client_id = base_client.base_client_id;
                    const base_name = base_client.base_name;
                    // 売上データを格納
                    const client_sales = data['client_sales'][base_client_id] || [];
                    // ラッパー用のdivを作成
                    const wrapper = document.createElement('div');
                    wrapper.classList.add('w-full', 'p-2', 'bg-white', 'rounded-2xl', 'shadow-md', 'col-span-6'); 
                    // 必要ならidも設定
                    wrapper.id = 'client_sales_wrapper_' + base_client_id;
                    // タイトル＋操作ボタン用のdivを作成
                    const headerDiv = document.createElement('div');
                    headerDiv.classList.add('flex', 'justify-between', 'items-center', 'px-5'); 
                    // タイトル用のpタグを作成
                    const title = document.createElement('p');
                    title.textContent = '売上推移(' + base_name + ')';
                    title.classList.add('text-base');
                    // セレクトとボタン用のdiv
                    const controlDiv = document.createElement('div');
                    controlDiv.classList.add('flex', 'items-center');
                    // select要素を作成
                    const termSelect = document.createElement('select');
                    termSelect.id = 'termSelect_' + base_client_id;
                    termSelect.classList.add('text-sm', 'rounded-lg');
                    termSelect.dataset.baseClientId = base_client_id;
                    // 今期を取得
                    const currentTermNumber = data['term']['current_fiscal_term']['term_number'];
                    // 過去5期分（今年を除く）を追加
                    for(let i = 1; i <= 5; i++){
                        const term_number = currentTermNumber - i;
                        const option = document.createElement('option');
                        option.value = term_number;
                        option.textContent = term_number + '期';
                        termSelect.appendChild(option);
                    }
                    // button要素を作成
                    const addBtn = document.createElement('button');
                    addBtn.classList.add('btn', 'bg-btn-enter', 'text-white', 'rounded-lg', 'px-5', 'py-2', 'add_term_button', 'mr-5', 'ml-2');
                    addBtn.textContent = '追加';
                    addBtn.dataset.baseClientId = base_client_id;
                    // controlDivにselectとbuttonを追加
                    controlDiv.appendChild(termSelect);
                    controlDiv.appendChild(addBtn);
                    // headerDivにタイトルと操作Divを追加
                    headerDiv.appendChild(title);
                    headerDiv.appendChild(controlDiv);
                    // 折れ線ボタン
                    const lineBtn = document.createElement('button');
                    lineBtn.type = 'button';
                    lineBtn.classList.add('btn', 'chart_type_change', 'border', 'border-black', 'p-1', 'tippy_line_chart', 'bg-theme-sub-y');
                    lineBtn.innerHTML = '<img src="/icon/line_chart.svg" class="w-6 h-6">';
                    lineBtn.dataset.baseClientId = base_client_id;
                    lineBtn.dataset.chartType = 'line';
                    // 折れ線グラフのツールチップ
                    tippy(lineBtn, {
                        content: '折れ線グラフで表示',
                        duration: 500,
                        allowHTML: true,
                        placement: 'right',
                        theme: 'tippy_main_theme',
                    });
                    // 棒グラフボタン
                    const barBtn = document.createElement('button');
                    barBtn.type = 'button';
                    barBtn.classList.add('btn', 'chart_type_change', 'border-y', 'border-r', 'border-black', 'p-1', 'tippy_bar_chart');
                    barBtn.innerHTML = '<img src="/icon/bar_chart.svg" class="w-6 h-6">';
                    barBtn.dataset.baseClientId = base_client_id;
                    barBtn.dataset.chartType = 'bar';
                    // 棒グラフのツールチップ
                    tippy(barBtn, {
                        content: '棒グラフで表示',
                        duration: 500,
                        allowHTML: true,
                        placement: 'right',
                        theme: 'tippy_main_theme',
                    });
                    // controlDivに追加（selectと追加ボタンの右に横並びで追加）
                    controlDiv.appendChild(lineBtn);
                    controlDiv.appendChild(barBtn);
                    // wrapperにheaderDivを追加
                    wrapper.appendChild(headerDiv);
                    // canvas要素を作る
                    const canvas = document.createElement('canvas');
                    canvas.id = 'client_sales_chart_' + base_client_id;
                    // クラスを追加
                    canvas.classList.add('w-full', 'bg-white');
                    canvas.height = 300;
                    // canvasをwrapperに追加
                    wrapper.appendChild(canvas);
                    // wrapperをcontainerに追加
                    container.appendChild(wrapper);
                    // ラベルを作成(10月始まりの12ヶ月ラベル)
                    const labels = Array.from({ length: 12 }, (_, i) => {
                        const month = ((i + 9) % 12) + 1;
                        return month + '月';
                    });
                    // 売上データを取得
                    const datasets = getClientsSalesChart(client_sales, base_client_id);
                    // Chart.js初期化
                    const ctx = canvas.getContext('2d');
                    new Chart(ctx, {
                        data: {
                            labels: labels,
                            datasets: datasets
                        },
                        options: {
                            responsive: false,
                            scales: {
                                "y-axis-1": {
                                    type: "linear",
                                    position: "left",
                                    ticks: {
                                        max: 50000000,
                                        min: 0,
                                        stepSize: 500000
                                    }
                                },
                                x: {
                                    offset: true,  // 端のバーを少し内側にずらす
                                }
                            },
                            animation: {
                                onProgress: (animation) => {
                                },
                                delay: (ctx) => {
                                let index = ctx.dataIndex;
                                return index * 80;
                                }
                            },
                            plugins: {
                                legend: {
                                    labels: { usePointStyle: true }
                                },
                                tooltip: {
                                    callbacks: {
                                        title: function(context) {
                                            const dataset = context[0].dataset;
                                            const monthLabel = dataset.yearMonthJp[context[0].dataIndex];
                                            return monthLabel;
                                        },
                                        label: function(context) {
                                            return context.formattedValue + '円';
                                        }
                                    },
                                    bodyFont: {
                                        size: 16,       // ツールチップ本文のフォントサイズ
                                    },
                                    titleFont: {
                                        size: 18,       // ツールチップタイトルのフォントサイズ
                                    },
                                    padding: 12,        // 内側の余白
                                    boxPadding: 6,      // カラーボックスの余白
                                },
                            }
                        }
                    });
                });
            } catch (e) {
                alert('グラフの生成に失敗しました。');
            }
        },
        error: function(){
            alert('グラフの生成に失敗しました。');
        }
    });
}

// 売上データを取得
function getClientsSalesChart(client_sales, target_base_client_id)
{
    // 使用するカラーを取得
    const chart = Chart.getChart('client_sales_chart_' + target_base_client_id);
    const colorArray = Object.values(colorMap);
    const existingDatasets = chart ? chart.data.datasets.length : 0;
    const colors = colorArray[existingDatasets % colorArray.length];
    // 配列を初期化
    let amountArr = [];
    let yearMonthJpArr = [];
    // 期を取得
    const term_number = client_sales[0]['term_number'];
    // グラフがある場合
    if(chart){
        // 既に存在する期であるかチェック
        const exists = chart.data.datasets.some(ds => ds.term_number === term_number);
        // 既に存在している場合
        if(exists){
            // 追加させないので、[]を返す
            return [];
        }
    }
    // 売上データを格納
    $.each(client_sales, function(index, sales) {
        amountArr.push(sales['amount']);
        yearMonthJpArr.push(sales['year_month_jp']);
    });
    // 配列を初期化
    const datasets = [];
    // データがある場合
    if(amountArr.length > 0){
        // 現在のタイプを取得（取得できない場合は'line'をセット）
        const current_type = chart?.data?.datasets?.[0]?.type ?? 'line';
        // 配列に追加
        datasets.push({
            type: current_type,
            label: term_number + '期',
            data: amountArr,
            borderColor: colors.borderColor,
            backgroundColor: colors.backgroundColor,
            pointBackgroundColor: colors.borderColor,
            pointRadius: 5,
            pointHoverRadius: 7,
            yAxisID: "y-axis-1",
            yearMonthJp: yearMonthJpArr,
            term_number: term_number,
            borderRadius: 30,
            fill: true,     // 線の下を塗りつぶす
            tension: 0.4,   // 曲線をなめらかに
        });
    }
    return datasets;
}

// グラフを追加
$(document).on('click', '.add_term_button', function () {
    // AJAX通信のURLを定義
    const ajax_url = '/client_detail/ajax_get_sales_data';
    // 倉庫顧客IDを取得
    const base_client_id = $(this).data('base-client-id');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: ajax_url,
        type: 'GET',
        data: {
            'client_id': $('#client_id').val(),
            'term_number': $('#termSelect_' + base_client_id).val(),
            'base_client_id': base_client_id,
        },
        dataType: 'json',
        success: function(data){
            try {
                // 売上データを格納
                const client_sales = data['client_sales'][data['base_client_id']] || [];
                // データがない場合はスキップ
                if (client_sales.length === 0) return;
                // グラフを追加するキャンバスを取得
                const canvas_id = 'client_sales_chart_' + data['base_client_id'];
                // 売上データを取得
                const datasets = getClientsSalesChart(client_sales, data['base_client_id']);
                // グラフを取得
                const chart = Chart.getChart(canvas_id);
                // グラフを追加して更新
                chart.data.datasets.push(...datasets);
                chart.update();
            } catch (e) {
                alert('グラフの生成に失敗しました。');
            }
        },
        error: function(){
            alert('グラフの生成に失敗しました。');
        }
    });
});

// チャート種別を切り替え
$(document).on('click', '.chart_type_change', function () {
    // チャート種別を取得
    const chart_type = $(this).data('chart-type');
    // 倉庫顧客IDを取得
    const base_client_id = $(this).data('base-client-id');
    // グラフを取得
    const chart = Chart.getChart('client_sales_chart_' + base_client_id);
    // 全datasetのtypeを変更
    chart.data.datasets.forEach(ds => {
        ds.type = chart_type;
    });
    chart.update();
    // 同じwrapper内のボタン全てをリセット
    $(`#client_sales_wrapper_${base_client_id} .chart_type_change`).removeClass('bg-theme-sub-y');
    // クリックしたボタンに背景色を追加
    $(this).addClass('bg-theme-sub-y');
});