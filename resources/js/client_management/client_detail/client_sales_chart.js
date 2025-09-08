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
                $.each(data['client_sales'], function(base_client_id, sales) {
                    // 倉庫名取得
                    const base_name = sales[0].base_name;
                    // canvas要素を作る
                    const canvas = document.createElement('canvas');
                    canvas.id = 'client_sales_chart_' + base_client_id;
                    // クラスを追加
                    canvas.classList.add('w-full', 'p-2', 'bg-white', 'rounded-2xl', 'shadow-md', 'col-span-6');
                    canvas.height = 300;
                    // 要素を追加
                    container.appendChild(canvas);
                    // ラベルを作成
                    const labels = sales.map(sale => sale.year_month_jp);
                    // 売上データを取得
                    const datasets = getClientsSalesChart(data['client_sales'], base_client_id, base_name);
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
function getClientsSalesChart(client_sales, target_base_client_id, base_name)
{
    // 使用するカラーを取得
    const colors = colorMap[0];
    // 配列を初期化
    let client_sales_arr = [];
    // 売上の分だけループ処理
    $.each(client_sales, function(base_client_id, sales) {
        // 対象のbase_client_idではない場合
        if(parseInt(base_client_id) !== parseInt(target_base_client_id)){
            return;
        }
        // 売上金額を格納
        $.each(sales, function(index, sale) {
            client_sales_arr.push(sale['amount']);
        });
    });
    return [
        {
            type: 'line',
            label: '売上推移(' + base_name + ')',
            data: client_sales_arr,
            borderColor: colors.borderColor,
            backgroundColor: colors.backgroundColor,
            pointBackgroundColor: colors.borderColor,
            pointRadius: 5,
            pointHoverRadius: 7,
            yAxisID: "y-axis-1",
            borderRadius: 30,
        }
    ];
}