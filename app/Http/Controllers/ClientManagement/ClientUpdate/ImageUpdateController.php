<?php

namespace App\Http\Controllers\ClientManagement\ClientUpdate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// サービス
use App\Services\ClientManagement\ClientUpdate\ImageUpdateService;

class ImageUpdateController extends Controller
{
    public function update(Request $request)
    {
        try{
            // インスタンス化
            $ImageUpdateService = new ImageUpdateService;
            // 既存の顧客画像を削除
            $client = $ImageUpdateService->deleteCurrentImage($request->update_id);
            // 顧客画像を保存
            $client_image_file_name = $ImageUpdateService->saveClientImage($request, $client);
        }catch (\Exception $e){
            return redirect()->back()->with([
                'alert_type' => 'error',
                'alert_message' => '顧客画像の更新に失敗しました。',
            ]);
        }
        return redirect()->back()->with([
            'alert_type' => 'success',
            'alert_message' => '顧客画像を更新しました。',
        ]);
    }
}