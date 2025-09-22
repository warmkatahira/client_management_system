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
                // base_client_id のリストを今年・昨年からまとめて取得
                const baseClientIds = new Set([
                    ...Object.keys(data['current_year_client_sales']),
                    ...Object.keys(data['last_year_client_sales'])
                ]);
                const container = document.getElementById('client_sales_chart_div');
                container.innerHTML = '';
                baseClientIds.forEach(base_client_id => {
                    // 売上データを格納
                    const salesCurrent = data['current_year_client_sales'][base_client_id] || [];
                    const salesLast    = data['last_year_client_sales'][base_client_id] || [];
                    // データがない場合はスキップ
                    if (salesCurrent.length === 0 && salesLast.length === 0) return;
                    // 倉庫名を取得
                    const base_name = (salesCurrent[0] || salesLast[0]).base_name;
                    // canvas要素を作る
                    const canvas = document.createElement('canvas');
                    canvas.id = 'client_sales_chart_' + base_client_id;
                    // クラスを追加
                    canvas.classList.add('w-full', 'p-2', 'bg-white', 'rounded-2xl', 'shadow-md', 'col-span-6');
                    canvas.height = 300;
                    // 要素を追加
                    container.appendChild(canvas);
                    // ラベルを作成(1から12月)
                    const labels = Array.from({ length: 12 }, (_, i) => (i + 1) + '月');
                    // 売上データを取得
                    const datasets = getClientsSalesChart(data, base_client_id, base_name);
                    // Chart.js初期化
                    const ctx = canvas.getContext('2d');
                    new Chart(ctx, {
                        type: 'line',
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
                                        max: 100000000,
                                        min: 0,
                                        stepSize: 1000000
                                    }
                                },
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
                                        size: 14,       // ツールチップ本文のフォントサイズ
                                    },
                                    titleFont: {
                                        size: 16,       // タイトルのフォントサイズ
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
function getClientsSalesChart(data, target_base_client_id, base_name)
{
    // 使用するカラーを取得
    const currentColors = colorMap[0];
    const lastColors    = colorMap[1];
    // 配列を初期化
    let currentYearArr = [];
    let lastYearArr    = [];
    let currentYearMonthJpArr = [];
    let lastYearMonthJpArr = [];
    // 今年の年を取得
    const currentYear = data['current_year_client_sales'].length === 0 ? '' : data['current_year_client_sales'][target_base_client_id][0]['year_month'].split('-')[0];
    // 今年の売上データを格納
    $.each(data['current_year_client_sales'], function(base_client_id, sales) {
        if (parseInt(base_client_id) !== parseInt(target_base_client_id)) {
            return;
        }
        $.each(sales, function(index, sale) {
            currentYearArr.push(sale['amount']);
            currentYearMonthJpArr.push(sale['year_month_jp']);
        });
    });
    // 昨年の年を取得
    const lastYear = data['last_year_client_sales'].length === 0 ? '' : data['last_year_client_sales'][target_base_client_id][0]['year_month'].split('-')[0];
    // 昨年の売上データを格納
    $.each(data['last_year_client_sales'], function(base_client_id, sales) {
        if (parseInt(base_client_id) !== parseInt(target_base_client_id)) {
            return;
        }
        $.each(sales, function(index, sale) {
            lastYearArr.push(sale['amount']);
            lastYearMonthJpArr.push(sale['year_month_jp']);
        });
    });
    // 配列を初期化
    const datasets = [];
    // 今年のデータがある場合
    if(currentYearArr.length > 0){
        datasets.push({
            type: 'line',
            label: '売上推移（' + base_name + `@${currentYear}年）`,
            data: currentYearArr,
            borderColor: currentColors.borderColor,
            backgroundColor: currentColors.backgroundColor,
            pointBackgroundColor: currentColors.borderColor,
            pointRadius: 5,
            pointHoverRadius: 7,
            yAxisID: "y-axis-1",
            yearMonthJp: currentYearMonthJpArr,
        });
    }
    // 昨年のデータがある場合
    if(lastYearArr.length > 0){
        datasets.push({
            type: 'line',
            label: '売上推移（' + base_name + `@${lastYear}年）`,
            data: lastYearArr,
            borderColor: lastColors.borderColor,
            backgroundColor: lastColors.backgroundColor,
            pointBackgroundColor: lastColors.borderColor,
            pointRadius: 5,
            pointHoverRadius: 7,
            borderDash: [5, 5],
            yAxisID: "y-axis-1",
            yearMonthJp: lastYearMonthJpArr,
        });
    }
    return datasets;
}