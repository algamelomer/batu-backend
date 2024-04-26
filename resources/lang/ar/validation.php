<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | الأسطر التالية تحتوي على رسائل الخطأ الافتراضية المستخدمة من قبل
    | فئة المُحقق. بعض هذه القواعد لها نسخ متعددة
    | مثل قواعد الحجم. تتيح لك تعديل كل من هذه الرسائل هنا.
    |
    */

    'accepted' => 'يجب قبول :attribute.',
    'accepted_if' => 'يجب قبول :attribute عندما :other يكون :value.',
    'active_url' => ':attribute ليس عنوان URL صالحًا.',
    'after' => ':attribute يجب أن يكون تاريخًا بعد :date.',
    'after_or_equal' => ':attribute يجب أن يكون تاريخًا بعد أو يساوي :date.',
    'alpha' => ':attribute يجب أن يحتوي على أحرف فقط.',
    'alpha_dash' => ':attribute يجب أن يحتوي على أحرف وأرقام وشرطات وشرطات سفلية فقط.',
    'alpha_num' => ':attribute يجب أن يحتوي على أحرف وأرقام فقط.',
    'array' => ':attribute يجب أن يكون مصفوفة.',
    'before' => ':attribute يجب أن يكون تاريخًا قبل :date.',
    'before_or_equal' => ':attribute يجب أن يكون تاريخًا قبل أو يساوي :date.',
    'between' => [
        'array' => ':attribute يجب أن يكون بين :min و :max عنصر.',
        'file' => ':attribute يجب أن يكون بين :min و :max كيلوبايت.',
        'numeric' => ':attribute يجب أن يكون بين :min و :max.',
        'string' => ':attribute يجب أن يكون بين :min و :max حرف.',
    ],
    'boolean' => 'حقل :attribute يجب أن يكون صحيحًا أو خطأ.',
    'confirmed' => 'تأكيد :attribute لا يتطابق.',
    'current_password' => 'كلمة المرور غير صحيحة.',
    'date' => ':attribute ليس تاريخًا صالحًا.',
    'date_equals' => ':attribute يجب أن يكون تاريخًا يساوي :date.',
    'date_format' => ':attribute لا يتطابق مع الشكل :format.',
    'declined' => 'يجب رفض :attribute.',
    'declined_if' => 'يجب رفض :attribute عندما :other يكون :value.',
    'different' => ':attribute و :other يجب أن يكونوا مختلفين.',
    'digits' => ':attribute يجب أن يكون :digits أرقام.',
    'digits_between' => ':attribute يجب أن يكون بين :min و :max أرقام.',
    'dimensions' => ':attribute لديها أبعاد صورة غير صالحة.',
    'distinct' => 'حقل :attribute لديه قيمة مكررة.',
    'email' => ':attribute يجب أن يكون عنوان بريد إلكتروني صالح.',
    'ends_with' => ':attribute يجب أن ينتهي بأحد القيم التالية: :values.',
    'enum' => 'القيمة المحددة :attribute غير صالحة.',
    'exists' => ':attribute المحدد غير صالح.',
    'file' => ':attribute يجب أن يكون ملفًا.',
    'filled' => 'حقل :attribute يجب أن يكون له قيمة.',
    'gt' => [
        'array' => ':attribute يجب أن يكون لديه أكثر من :value عنصر.',
        'file' => ':attribute يجب أن يكون أكبر من :value كيلوبايت.',
        'numeric' => ':attribute يجب أن يكون أكبر من :value.',
        'string' => ':attribute يجب أن يكون أكبر من :value حرف.',
    ],
    'gte' => [
        'array' => ':attribute يجب أن يكون لديه :value عنصر أو أكثر.',
        'file' => ':attribute يجب أن يكون أكبر من أو يساوي :value كيلوبايت.',
        'numeric' => ':attribute يجب أن يكون أكبر من أو يساوي :value.',
        'string' => ':attribute يجب أن يكون أكبر من أو يساوي :value حرف.',
    ],
    'image' => ':attribute يجب أن يكون صورة.',
    'in' => ':attribute المحدد غير صالح.',
    'in_array' => 'حقل :attribute غير موجود في :other.',
    'integer' => ':attribute يجب أن يكون عددًا صحيحًا.',
    'ip' => ':attribute يجب أن يكون عنوان IP صالحًا.',
    'ipv4' => ':attribute يجب أن يكون عنوان IPv4 صالحًا.',
    'ipv6' => ':attribute يجب أن يكون عنوان IPv6 صالحًا.',
    'json' => ':attribute يجب أن يكون سلسلة JSON صالحة.',
    'lt' => [
        'array' => ':attribute يجب أن يكون أقل من :value عنصر.',
        'file' => ':attribute يجب أن يكون أقل من :value كيلوبايت.',
        'numeric' => ':attribute يجب أن يكون أقل من :value.',
        'string' => ':attribute يجب أن يكون أقل من :value حرف.',
    ],
    'lte' => [
        'array' => ':attribute يجب أن لا يحتوي على أكثر من :value عنصر.',
        'file' => ':attribute يجب أن يكون أقل من أو يساوي :value كيلوبايت.',
        'numeric' => ':attribute يجب أن يكون أقل من أو يساوي :value.',
        'string' => ':attribute يجب أن يكون أقل من أو يساوي :value حرف.',
    ],
    'mac_address' => ':attribute يجب أن يكون عنوان MAC صالحًا.',
    'max' => [
        'array' => ':attribute قد لا يحتوي على أكثر من :max عنصر.',
        'file' => ':attribute قد لا يكون أكبر من :max كيلوبايت.',
        'numeric' => ':attribute قد لا يكون أكبر من :max.',
        'string' => ':attribute قد لا يكون أكبر من :max حرف.',
    ],
    'mimes' => ':attribute يجب أن يكون ملفًا من النوع: :values.',
    'mimetypes' => ':attribute يجب أن يكون ملفًا من النوع: :values.',
    'min' => [
        'array' => ':attribute يجب أن يحتوي على الأقل :min عنصر.',
        'file' => ':attribute يجب أن يكون على الأقل :min كيلوبايت.',
        'numeric' => ':attribute يجب أن يكون على الأقل :min.',
        'string' => ':attribute يجب أن يكون على الأقل :min حرف.',
    ],
    'multiple_of' => ':attribute يجب أن يكون مضاعفًا لـ :value.',
    'not_in' => ':attribute المحدد غير صالح.',
    'not_regex' => 'صيغة :attribute غير صالحة.',
    'numeric' => ':attribute يجب أن يكون رقمًا.',
    'present' => 'يجب أن يكون حقل :attribute موجودًا.',
    'prohibited' => 'حقل :attribute ممنوع.',
    'prohibited_if' => 'حقل :attribute ممنوع عندما :other هو :value.',
    'prohibited_unless' => 'حقل :attribute ممنوع ما لم يكن :other في :values.',
    'prohibits' => 'حقل :attribute يمنع :other من الوجود.',
    'regex' => 'صيغة :attribute غير صالحة.',
    'required' => 'حقل :attribute مطلوب.',
    'required_array_keys' => 'يجب أن يحتوي حقل :attribute على مدخلات لـ: :values.',
    'required_if' => 'حقل :attribute مطلوب عندما :other هو :value.',
    'required_unless' => 'حقل :attribute مطلوب ما لم يكن :other في :values.',
    'required_with' => 'حقل :attribute مطلوب عندما يكون :values موجودًا.',
    'required_with_all' => 'حقل :attribute مطلوب عندما تكون :values موجودة.',
    'required_without' => 'حقل :attribute مطلوب عندما لا يكون :values موجودًا.',
    'required_without_all' => 'حقل :attribute مطلوب عندما لا تكون أيًا من :values موجودة.',
    'same' => ':attribute و :other يجب أن يتطابقا.',
    'size' => [
        'array' => ':attribute يجب أن يحتوي على :size عنصر.',
        'file' => ':attribute يجب أن يكون :size كيلوبايت.',
        'numeric' => ':attribute يجب أن يكون :size.',
        'string' => ':attribute يجب أن يكون :size حرف.',
    ],
    'starts_with' => ':attribute يجب أن يبدأ بأحد القيم التالية: :values.',
    'string' => ':attribute يجب أن يكون سلسلة.',
    'timezone' => ':attribute يجب أن يكون منطقة زمنية صالحة.',
    'unique' => ':attribute تم استخدامه بالفعل.',
    'uploaded' => ':attribute فشل في التحميل.',
    'url' => ':attribute يجب أن يكون عنوان URL صالحًا.',
    'uuid' => ':attribute يجب أن يكون UUID صالحًا.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | يمكنك هنا تحديد رسائل التحقق المخصصة للسمات باستخدام
    | التسمية "attribute.rule" لتسمية الأسطر. هذا يجعل من السهل تحديد
    | خطة لغة مخصصة محددة لسمة معينة.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | الأسطر التالية تستخدم لتبديل بديل مكان السمة الخاصة بنا
    | بشيء أكثر ودية للقارئ مثل "عنوان البريد الإلكتروني" بدلاً من "البريد الإلكتروني". هذا يساعدنا فقط في جعل رسالتنا أكثر تعبيرًا.
    |
    */

    'attributes' => [],

];
