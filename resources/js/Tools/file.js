import axios from 'axios';
import $swal from 'sweetalert2'

export async function uploadImage(formData, folder) {
    if (!formData.get("image")) {
        return false;
    }
    formData.append("folder", folder);

    try {
        return await axios.post("/api/file/upload-image", formData, {
            headers: {
                "Content-Type": "multipart/form-data",
            },
        });
    } catch (error) {
        let messages = Object.values(error.response.data.errors);
        let flattenDatas = _.flatten(messages)
        let text = flattenDatas.join('<br>')
        $swal.fire({
            html: text,
            title: '系統訊息',
            icon: 'error',
            confirmButtonText: '確定'
        })
    }


}