<?php return [ /* |-------------------------------------------------------------------------- | Validation Language Lines |-------------------------------------------------------------------------- | | The following language lines contain the default error messages used by | the validator class. Some of these rules have multiple versions such | as the size rules. Feel free to tweak each of these messages here. | */
    'accepted' => '注意: :attribute 為必填.', 'active_url' => '注意: :attribute 是不可用的連結.', 'after' =>
    '注意: :attribute 必須為一個在 :date 之後的時間.', 'alpha' => '注意: :attribute 只允許全部為字母.', 'alpha_dash' => '注意: :attribute 只允許字幕，數字和_連線符.', 'alpha_num' => '注意: :attribute 只允許字幕和數字.', 'array' => '注意: :attribute 必須為陣列.',
    'before' => '注意: :attribute 必須為一個在 :date 之前的時間.',
    'between' => [
        'numeric' => '注意: :attribute 必須在 :min 至 :max 之間.',
        'file' => '注意: :attribute 必須限制在 :min 至 :max k.',
        'string' => '注意: :attribute 必須在 :min 至 :max 字元.',
        'array' => '注意: :attribute 必須包含 :min 至 :max 鍵.',
    ],
    'boolean' => '注意: :attribute 欄位必須為 true 或 false.',
    'confirmed' => '注意: :attribute 確認不匹配.', 'date' =>
    '注意: :attribute 是一個不可用的時間.', 'date_format' =>
    '注意: :attribute 不匹配: format :format.', 'different' => '注意: :attribute 和 :other 必須不同.', 'digits' => '注意: :attribute 必須 :digits 數值.', 'digits_between' => '注意: :attribute 必須在 :min 至 :max 數值之間.', 'dimensions' => '注意: :attribute 有無效的圖片尺寸.', 'distinct' => '注意: :attribute 欄位具有重複的值.', 'email' => '注意: :attribute 必須為可用的郵箱地址.',
    'exists' => '注意: 選中的 :attribute 不可用.',
    'file' => '注意: :attribute 必須為一個檔案.',
    'filled' => '注意: :attribute 欄位必填.',
    'image' => '注意: :attribute 必須為圖片.',
    'in' => '注意: 選中的 :attribute 不可以.',
    'in_array' => '注意: :attribute 欄位未出現在 :other 其中.',
    'integer' => '注意: :attribute 必須為整數.',
    'ip' => '注意: :attribute 必須為合法的IP地址.',
    'json' => '注意: :attribute 必須為合法的JSON格式資料.', 'max' => [
        'numeric' => '注意: :attribute 不可以比 :max 大.', 'file' => '注意: :attribute 不能超過 :max 千位元組.',
        'string' => '注意: :attribute 不可超過 :max 個字元.',
        'array' => '注意: :attribute 不能超過 :max 個鍵值對.',
    ],
    'mimes' => '注意: :attribute 必須為: :values 型別的檔案.',
    'min' => [
        'numeric' => '注意: :attribute 必須最小為 :min.',
        'file' => '注意: :attribute 必須至少 :min 千位元組.',
        'string' => '注意: :attribute 必須至少 :min 字元.', 'array' => '注意: :attribute 必須至少包含 :min 個鍵值對.',
    ], 'not_in' => '注意: 選中的 :attribute 不合法.', 'numeric' => '注意: :attribute 必須為數字.', 'present' => '注意: :attribute 必須出現.',
    'regex' => '注意: :attribute 格式不合規範.',
    'required' => '注意: :attribute 欄位必填.',
    'required_if' => '注意: :attribute 欄位必填當 :other 即 :value.', 'required_unless' => '注意: :attribute 必填除非 :other 在 :values 其中.', 'required_with' => '注意: :attribute 必填當 :values 出現.', 'required_with_all' => '注意: :attribute 欄位必填當 :values 出現.', 'required_without' => '注意: :attribute 欄位必填當 :values 沒有出現.', 'required_without_all' => '注意: :attribute 欄位必填當 :values 無一可用.', 'same' => '注意: :attribute 和 :other 必須保持一致.', 'size' => [
        'numeric' => '注意: :attribute 必須 :size.', 'file' => '注意: :attribute 必須包含 :size 千位元組.', 'string' => '注意: :attribute 必須包含 :size 字元.',
        'array' => '注意: :attribute 必須包含 :size 鍵.',
    ], 'string' => '注意: :attribute 必須為字元.', 'timezone' => '注意: :attribute 時區必須為合理的時區.', 'unique' => '注意: :attribute 已經被佔用，請更換.', 'url' => '注意: :attribute 格式不可用.', 'zh_mobile' => '注意: :attribute 不是有效的電話號碼.', /* |-------------------------------------------------------------------------- | Custom Validation Language Lines |-------------------------------------------------------------------------- | | Here you may specify custom validation messages for attributes using 注意: | convention "attribute.rule" to name 注意: lines. This makes it quick to | specify a specific custom language line for a given attribute rule. | */
    'custom' => ['attribute-name' => ['rule-name' => 'custom-message',],],
    /* |-------------------------------------------------------------------------- | Custom Validation Attributes |-------------------------------------------------------------------------- | | 注意: following language lines are used to swap attribute place-holders | with something more reader friendly such as E-Mail Address instead | of "email". This simply helps us make messages a little cleaner. | */ 'attributes' => [], 'identitycards' => '身份證號錯誤！',
];
