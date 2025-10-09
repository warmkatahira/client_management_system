<div id="image_update_modal" class="image_update_modal_close fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto w-full px-60">
    <div class="relative top-32 mx-auto shadow-lg rounded-md bg-theme-body">
        <div class="flex justify-between items-center bg-theme-main text-white rounded-t-md px-4 py-2">
            <p>{{ $title }}</p>
        </div>
        <div class="p-10">
            <form method="POST" action="{{ route($route) }}" id="image_update_form" enctype="multipart/form-data">
                @csrf
                <label class="btn bg-theme-main text-white p-3">
                    <i class="las la-image la-lg mr-1"></i>画像を選択
                    <input type="file" id="select_image" name="image" class="hidden">
                </label>
                <div class="crop-container">
                    <img id="preview" src="" alt="プレビュー画像">
                </div>
                <input type="hidden" id="crop_data_x" name="crop_data_x">
                <input type="hidden" id="crop_data_y" name="crop_data_y">
                <input type="hidden" id="crop_data_width" name="crop_data_width">
                <input type="hidden" id="crop_data_height" name="crop_data_height">
                <input type="hidden" id="update_id" name="update_id">
            </form>
            <div class="flex flex-row mt-10 gap-x-10">
                <button type="button" id="image_update_enter" class="btn bg-btn-enter p-3 text-white w-56 ml-auto" data-update-id="{{ $updateId }}"><i class="las la-check la-lg mr-1"></i>変更</button>
                <button type="button" class="btn image_update_modal_close bg-btn-cancel p-3 text-white w-56"><i class="las la-times la-lg mr-1"></i>キャンセル</button>
            </div>
        </div>
    </div>
</div>