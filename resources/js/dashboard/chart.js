import Chart from "chart.js/auto";
import ChartDataLabels from 'chartjs-plugin-datalabels';
import colorMap from '../chart_color';

// 画面読み込み時の処理
$(document).ready(function() {
    // グラフを作成
    createChart();
});

// グラフを作成
function createChart(){
    // AJAX通信のURLを定義
    const ajax_url = '/dashboard/ajax_get_chart_data';
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: ajax_url,
        type: 'GET',
        data: {},
        dataType: 'json',
        success: function(data){
            try {
                // ラベルを格納する配列を初期化
                let clients_count_chart_by_region_labels = [];
                let clients_count_chart_by_base_labels = [];
                let sales_rank_chart_labels = [];
                // 地域の分だけループ処理
                $.each(data['regions'], function(index, value) {
                    // 地域名を配列に格納
                    clients_count_chart_by_region_labels.push(value['region_name']);
                });
                // 表示する情報や設定を配列に格納
                const clients_count_chart_by_region_data = {
                    labels: clients_count_chart_by_region_labels,
                    datasets: [
                        getClientsCountByRegion(data['regions']),
                    ]
                };
                // 倉庫の分だけループ処理
                $.each(data['bases'], function(index, value) {
                    // 倉庫名を配列に格納
                    clients_count_chart_by_base_labels.push(value['short_base_name']);
                });
                // 表示する情報や設定を配列に格納
                const clients_count_chart_by_base_data = {
                    labels: clients_count_chart_by_base_labels,
                    datasets: [
                        getClientsCountByBase(data['bases']),
                    ]
                };
                // 売上ランクの分だけループ処理
                $.each(data['sales_rank_counts'], function(index, value) {
                    // 倉庫名を配列に格納
                    sales_rank_chart_labels.push(value['sales_rank_name']);
                });
                // 表示する情報や設定を配列に格納
                const sales_rank_chart_data = {
                    labels: sales_rank_chart_labels,
                    datasets: [
                        getSalesRank(data['sales_rank_counts']),
                    ]
                };
                // HTML内にある <canvas id="shipping_count_chart"> 要素を取得し、その2D描画コンテキストを取得する
                // Chart.js はこのコンテキストを使ってグラフを描画する
                const clients_count_chart_by_region_ctx = document.getElementById("clients_count_chart_by_region").getContext("2d");
                const clients_count_chart_by_base_ctx = document.getElementById("clients_count_chart_by_base").getContext("2d");
                const sales_rank_chart_ctx = document.getElementById("sales_rank_chart").getContext("2d");
                // Chart.js を使って新しい折れ線グラフ(Line Chart)を作成する
                const clients_count_chart_by_region = new Chart(clients_count_chart_by_region_ctx, {
                    // グラフに表示するデータ
                    data: clients_count_chart_by_region_data,
                    // オプション設定
                    options: {
                        responsive: false,
                        scales: {
                            "y-axis-1": {
                                type: "linear",
                                position: "left",
                                ticks: {
                                    max: 200,
                                    min: 0,
                                    stepSize: 10
                                }
                            },
                        },
                        plugins: {
                            legend: {
                                labels: {
                                    // 凡例がpointStyleに従う
                                    usePointStyle: true
                                }
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return context.formattedValue;
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
                            }
                        }
                    }
                });
                const clients_count_chart_by_base = new Chart(clients_count_chart_by_base_ctx, {
                    // グラフに表示するデータ
                    data: clients_count_chart_by_base_data,
                    // オプション設定
                    options: {
                        responsive: false,
                        scales: {
                            "y-axis-1": {
                                type: "linear",
                                position: "left",
                                ticks: {
                                    max: 200,
                                    min: 0,
                                    stepSize: 10
                                }
                            },
                        },
                        plugins: {
                            legend: {
                                labels: {
                                    // 凡例がpointStyleに従う
                                    usePointStyle: true
                                }
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return context.formattedValue;
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
                            }
                        }
                    }
                });
                const sales_rank_chart = new Chart(sales_rank_chart_ctx, {
                    // グラフに表示するデータ
                    data: sales_rank_chart_data,
                    // オプション設定
                    options: {
                        responsive: false,
                        plugins: {
                            legend: {
                                labels: {
                                    boxWidth: 0,            // 色の四角を非表示にする
                                    usePointStyle: false    // 点スタイルも使わない
                                }
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        // 現在の値
                                        const value = context.raw;
                                        // 全データの配列
                                        const dataArray = context.chart.data.datasets[context.datasetIndex].data;
                                        // 合計
                                        const total = dataArray.reduce((acc, val) => acc + val, 0);
                                        // パーセンテージを計算
                                        const percentage = ((value / total) * 100).toFixed(1);
                                        // 表示形式
                                        return value + ' (' + percentage + '%)';
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
                            datalabels: {
                                color: '#000',              // 文字色
                                font: {                     // 文字スタイル
                                    weight: 'bold',
                                    size: 15,
                                },
                                formatter: (value, context) => {
                                    // 全データの合計を取得
                                    const dataArray = context.chart.data.datasets[0].data;
                                    const total = dataArray.reduce((acc, val) => acc + val, 0);
                                    // パーセンテージを計算
                                    const percentage = (value / total * 100).toFixed(1); // 小数点1桁
                                    // 改行して表示
                                    return value + '\n(' + percentage + '%)';
                                },
                                anchor: 'center',           // セグメント中心に表示
                                align: 'center'
                            }
                        }
                    },
                    plugins: [ChartDataLabels],
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

// 地域別の顧客数データを取得
function getClientsCountByRegion(regions)
{
    // 使用するカラーを取得
    const colors = colorMap[0];
    // 地域別の情報を格納する配列を初期化
    let clients_count_arr = [];
    // 地域の分だけループ処理
    $.each(regions, function(index, value) {
        // 顧客数を配列に格納
        clients_count_arr.push(value['clients_count']);
    });
    return {
        type: 'bar',
        label: '顧客数(地域別)',
        data: clients_count_arr,
        borderColor: colors.borderColor,
        backgroundColor: colors.backgroundColor,
        pointBackgroundColor: colors.borderColor,
        pointRadius: 5,
        pointHoverRadius: 7,
        yAxisID: "y-axis-1",
        borderRadius: 30,
    };
}

// 倉庫別の顧客数データを取得
function getClientsCountByBase(bases)
{
    // 使用するカラーを取得
    const colors = colorMap[1];
    // 倉庫別の情報を格納する配列を初期化
    let clients_count_arr = [];
    // 倉庫の分だけループ処理
    $.each(bases, function(index, value) {
        // 顧客数を配列に格納
        clients_count_arr.push(value['clients_count']);
    });
    return {
        type: 'bar',
        label: '顧客数(倉庫別)',
        data: clients_count_arr,
        borderColor: colors.borderColor,
        backgroundColor: colors.backgroundColor,
        pointBackgroundColor: colors.borderColor,
        pointRadius: 5,
        pointHoverRadius: 7,
        yAxisID: "y-axis-1",
        borderRadius: 30,
    };
}

// 売上ランク別の顧客数データを取得
function getSalesRank(sales_rank_counts)
{
    // 売上ランク別の情報を格納する配列を初期化
    let clients_count_arr = [];
    // 売上ランクの分だけループ処理
    $.each(sales_rank_counts, function(index, value) {
        // 顧客数を配列に格納
        clients_count_arr.push(value['count']);
    });
    // 現在の年月を取得
    const now = new Date();
    const yyyy = now.getFullYear();
    const mm = String(now.getMonth() + 1).padStart(2, '0');
    return {
        type: 'pie',
        label: `顧客数(売上ランク別) ${yyyy}年${mm}月`,
        data: clients_count_arr,
        borderColor: [
            colorMap[0].borderColor,
            colorMap[1].borderColor,
            colorMap[5].borderColor,
            colorMap[3].borderColor,
            colorMap[4].borderColor,
        ],
        backgroundColor: [
            colorMap[0].backgroundColor,
            colorMap[1].backgroundColor,
            colorMap[5].backgroundColor,
            colorMap[3].backgroundColor,
            colorMap[4].backgroundColor,
        ],
        pointBackgroundColor: [
            colorMap[0].borderColor,
            colorMap[1].borderColor,
            colorMap[5].borderColor,
            colorMap[3].borderColor,
            colorMap[4].borderColor,
        ],
        yAxisID: "y-axis-pie",
    };
}