import Chart from "chart.js/auto";

// 画面読み込み時の処理
$(document).ready(function() {
    // グラフを作成
    createChart();
    //createClientsCountChartByRegion();
    //createClientsCountChartByBase();
});

// 
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
                    clients_count_chart_by_base_labels.push(value['base_name']);
                });
                // 表示する情報や設定を配列に格納
                const clients_count_chart_by_base_data = {
                    labels: clients_count_chart_by_base_labels,
                    datasets: [
                        getClientsCountByBase(data['bases']),
                    ]
                };
                // HTML内にある <canvas id="shipping_count_chart"> 要素を取得し、その2D描画コンテキストを取得する
                // Chart.js はこのコンテキストを使ってグラフを描画する
                const clients_count_chart_by_region_ctx = document.getElementById("clients_count_chart_by_region").getContext("2d");
                const clients_count_chart_by_base_ctx = document.getElementById("clients_count_chart_by_base").getContext("2d");
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
                            }
                        }
                    }
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
    // 地域別の情報を格納する配列を初期化
    let clients_count_arr = [];
    // 日付の分だけループ処理
    $.each(regions, function(index, value) {
        // 出荷件数を配列に格納
        clients_count_arr.push(value['clients_count']);
    });
    return {
        type: 'bar',
        label: '顧客数(地域別)',
        data: clients_count_arr,
        borderColor: 'rgb(75, 192, 192)',
        backgroundColor: 'rgba(75, 192, 192, 0.5)',
        pointBackgroundColor: 'rgb(75, 192, 192)',
        pointRadius: 5,
        pointHoverRadius: 7,
        yAxisID: "y-axis-1",
        borderRadius: 30,
    };
}

// 倉庫別の顧客数データを取得
function getClientsCountByBase(bases)
{
    // 地域別の情報を格納する配列を初期化
    let clients_count_arr = [];
    // 日付の分だけループ処理
    $.each(bases, function(index, value) {
        // 出荷件数を配列に格納
        clients_count_arr.push(value['clients_count']);
    });
    return {
        type: 'bar',
        label: '顧客数(倉庫別)',
        data: clients_count_arr,
        borderColor: 'rgb(255, 153, 180)',
        backgroundColor: 'rgba(255, 153, 180, 0.5)',
        pointBackgroundColor: 'rgb(255, 153, 180)',
        pointRadius: 5,
        pointHoverRadius: 7,
        yAxisID: "y-axis-1",
        borderRadius: 30,
    };
}