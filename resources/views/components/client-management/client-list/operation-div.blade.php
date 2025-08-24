<div class="flex">
    <div id="dropdown" class="dropdown">
        <button id="dropdown_btn" class="dropdown_btn"><i class="las la-bars la-lg mr-1"></i>メニュー</button>
        <div class="dropdown-content" id="dropdown-content">
            <form method="GET" action="" id="allocate_form" class="m-0">
                <button type="button" id="allocate_enter" class="dropdown-content-element"><i class="las la-sync-alt la-lg mr-1"></i>引当処理</button>
            </form>
        </div>
    </div>
</div>
<form method="POST" action="" id="operation_div_form" class="m-0">
    @csrf
</form>