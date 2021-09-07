import $swal from 'sweetalert2'
import _ from 'lodash';


//call api  錯誤處理function
export function errorMessage(error) {

    switch (error.response.status) {
        case 500:
            errorAlert("伺服器錯誤！請通知廠商！");
            break;
        case 403:
            errorAlert(error.response.data.message);
            break;
        case 422:
            let messages = Object.values(error.response.data.errors);
            let flattenDatas = _.flatten(messages)
            let text = flattenDatas.join('<br>')
            $swal.fire({
                html: text,
                title: '系統訊息',
                icon: 'error',
                confirmButtonText: '確定'
            })
            break;
        // default:
        // console.log(error.response);
    }
}

// 成功訊息
export function successAlert(message) {
    $swal.fire("系統訊息", message, "success");
}

// 確認訊息
export function confirmAlert(message) {
    return $swal
        .fire({
            title: "系統訊息",
            text: message,
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "是的",
            cancelButtonText: "取消",
        });
}

//錯誤訊息
export function errorAlert(message) {
    return $swal.fire("系統訊息", message, "error");
}