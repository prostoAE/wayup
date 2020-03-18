<?php
//About company Shortcode
if (class_exists("WPBakeryShortCode")) {
  class WPBakeryShortCode_Wayup_About_Module extends WPBakeryShortCode {
  }
}
if (function_exists('vc_map')) {
  vc_map(array(
    'name' => esc_html__('Инфо о компании', 'wayup'),
    'base' => 'wayup_about_module',
    'category' => esc_html__('Wayup', 'wayup'),
    'description' => esc_html__('Введите данные о компании', 'wayup'),
    'show_settings_on_create' => true,
    'icon' => '',
    'weight' => -5,
    'params' => array(
      array(
        "type" => "textfield",
        "heading" => esc_html__("Заголовок 1", "wayup"),
        "param_name" => "title1",
        "value" => esc_html__("Почему мы –", "wayup"),
        "description" => esc_html__("Введите текст", "wayup")
      ),
      array(
        "type" => "textfield",
        "heading" => esc_html__("Заголовок 2", "wayup"),
        "param_name" => "title2",
        "value" => esc_html__("ПРАВИЛЬНЫЙ ВЫБОР ДЛЯ ВАС", "wayup"),
        "description" => esc_html__("Введите текст", "wayup")
      ),
      array(
        "type" => "textarea",
        "heading" => esc_html__("Описание", "wayup"),
        "param_name" => "desc",
        "value" => '',
        "description" => esc_html__("Введите описание", "wayup")
      ),
      array(
        "type" => "attach_image",
        "heading" => esc_html__("Картинка модуля", "wayup"),
        "param_name" => "featured_image",
        "value" => '',
        "description" => esc_html__("Загрузите картинку", "wayup")
      ),
      array(
        "type" => "attach_image",
        "heading" => esc_html__("Фото автора", "wayup"),
        "param_name" => "author",
        "value" => '',
        "description" => esc_html__("Загрузите фото", "wayup")
      ),
      array(
        "type" => "attach_image",
        "heading" => esc_html__("Фото подписи", "wayup"),
        "param_name" => "signature",
        "value" => '',
        "description" => esc_html__("Загрузите фото", "wayup")
      ),
      array(
        "type" => "textfield",
        "heading" => esc_html__("Цитата", "wayup"),
        "param_name" => "quote",
        "value" => esc_html__("Мы здесь, чтобы помочь вам построить и поддержать свою мечту.", "wayup"),
        "description" => esc_html__("Введите текст", "wayup")
      ),
      array(
        "type" => "textfield",
        "heading" => esc_html__("Имя автора", "wayup"),
        "param_name" => "author_name",
        "value" => esc_html__("Дмитрий Львович", "wayup"),
        "description" => esc_html__("Введите текст", "wayup")
      ),
      array(
        "type" => "textfield",
        "heading" => esc_html__("Должность", "wayup"),
        "param_name" => "author_status",
        "value" => esc_html__("Директор компании", "wayup"),
        "description" => esc_html__("Введите текст", "wayup")
      ),
    )
  ));
}

//Progress Bars Shortcode
if (class_exists("WPBakeryShortCode")) {
  class WPBakeryShortCode_Wayup_Progress_Module extends WPBakeryShortCode {
  }
}
if (function_exists('vc_map')) {
  vc_map(array(
    'name' => esc_html__('Прогресс модуль', 'wayup'),
    'base' => 'wayup_progress_module',
    'category' => esc_html__('Wayup', 'wayup'),
    'description' => esc_html__('Введите данные для модуля', 'wayup'),
    'show_settings_on_create' => true,
    'icon' => '',
    'weight' => -5,
    'params' => array(
      array(
        "type" => "textfield",
        "heading" => esc_html__("Заголовок 1", "wayup"),
        "param_name" => "title1",
        "value" => '',
        "description" => esc_html__("Введите текст", "wayup")
      ),
      array(
        "type" => "textfield",
        "heading" => esc_html__("Заголовок 2", "wayup"),
        "param_name" => "title2",
        "value" => '',
        "description" => esc_html__("Введите текст", "wayup")
      ),
      array(
        "type" => "textfield",
        "heading" => esc_html__("Заголовок 3", "wayup"),
        "param_name" => "title3",
        "value" => '',
        "description" => esc_html__("Введите текст", "wayup")
      ),
      array(
        "type" => "textfield",
        "heading" => esc_html__("Заголовок 4", "wayup"),
        "param_name" => "title4",
        "value" => '',
        "description" => esc_html__("Введите текст", "wayup")
      ),
      array(
        "type" => "textfield",
        "heading" => esc_html__("Значение 1", "wayup"),
        "param_name" => "value1",
        "value" => '',
        "description" => esc_html__("Введите текст", "wayup")
      ),
      array(
        "type" => "textfield",
        "heading" => esc_html__("Значение 2", "wayup"),
        "param_name" => "value2",
        "value" => '',
        "description" => esc_html__("Введите текст", "wayup")
      ),
      array(
        "type" => "textfield",
        "heading" => esc_html__("Значение 3", "wayup"),
        "param_name" => "value3",
        "value" => '',
        "description" => esc_html__("Введите текст", "wayup")
      ),
      array(
        "type" => "textfield",
        "heading" => esc_html__("Значение 4", "wayup"),
        "param_name" => "value4",
        "value" => '',
        "description" => esc_html__("Введите текст", "wayup")
      ),
      array(
        "type" => "attach_image",
        "heading" => esc_html__("Фото для фона", "wayup"),
        "param_name" => "bg",
        "value" => '',
        "description" => esc_html__("Загрузите картинку", "wayup")
      ),
    )
  ));
}

//Contact Shortcode
if (class_exists("WPBakeryShortCode")) {
  class WPBakeryShortCode_Wayup_Contact_Module extends WPBakeryShortCode {
  }
}
if (function_exists('vc_map')) {
  vc_map(array(
    'name' => esc_html__('Свяжитесь', 'wayup'),
    'base' => 'wayup_contact_module',
    'category' => esc_html__('Wayup', 'wayup'),
    'description' => esc_html__('Введите данные для модуля', 'wayup'),
    'show_settings_on_create' => true,
    'icon' => '',
    'weight' => -5,
    'params' => array(
      array(
        "type" => "textfield",
        "heading" => esc_html__("Заголовок", "wayup"),
        "param_name" => "title",
        "value" => '',
        "description" => esc_html__("Введите текст", "wayup")
      ),
      array(
        "type" => "textfield",
        "heading" => esc_html__("Ссылка", "wayup"),
        "param_name" => "link",
        "value" => '',
        "description" => esc_html__("Введите текст", "wayup")
      ),
    )
  ));
}

//Office Shortcode
if (class_exists("WPBakeryShortCode")) {
  class WPBakeryShortCode_Wayup_Office_Module extends WPBakeryShortCode {
  }
}
if (function_exists('vc_map')) {
  vc_map(array(
    'name' => esc_html__('Офисы', 'wayup'),
    'base' => 'wayup_office_module',
    'category' => esc_html__('Wayup', 'wayup'),
    'description' => esc_html__('Введите данные для модуля', 'wayup'),
    'show_settings_on_create' => true,
    'icon' => '',
    'weight' => -5,
    'params' => array(
      array(
        "type" => "textfield",
        "heading" => esc_html__("Заголовок 1", "wayup"),
        "param_name" => "title1",
        "value" => esc_html__("Наши офисы расположены по", "wayup"),
        "description" => esc_html__("Введите текст", "wayup")
      ),
      array(
        "type" => "textfield",
        "heading" => esc_html__("Заголовок 2", "wayup"),
        "param_name" => "title2",
        "value" => esc_html__("всей России", "wayup"),
        "description" => esc_html__("Введите текст", "wayup")
      ),

      array(
        "type" => "textfield",
        "heading" => esc_html__("Главный офис (адрес)", "wayup"),
        "param_name" => "office1",
        "value" => esc_html__("г. Москва, ул. Бутырская, 62 Z-Plaza, 5-й этаж", "wayup"),
        "description" => esc_html__("Введите текст", "wayup")
      ),
      array(
        "type" => "attach_image",
        "heading" => esc_html__("Главный офис (фото)", "wayup"),
        "param_name" => "office1photo",
        "value" => '',
        "description" => esc_html__("Введите текст", "wayup")
      ),

      array(
        "type" => "textfield",
        "heading" => esc_html__("Офис в Калининграде (адрес)", "wayup"),
        "param_name" => "office2",
        "value" => esc_html__("г. Москва, ул. Бутырская, 62 Z-Plaza, 5-й этаж", "wayup"),
        "description" => esc_html__("Введите текст", "wayup")
      ),
      array(
        "type" => "attach_image",
        "heading" => esc_html__("Офис в Калининграде (фото)", "wayup"),
        "param_name" => "office2photo",
        "value" => '',
        "description" => esc_html__("Введите текст", "wayup")
      ),

      array(
        "type" => "textfield",
        "heading" => esc_html__("Офис в Казани (адрес)", "wayup"),
        "param_name" => "office3",
        "value" => esc_html__("г. Москва, ул. Бутырская, 62 Z-Plaza, 5-й этаж", "wayup"),
        "description" => esc_html__("Введите текст", "wayup")
      ),
      array(
        "type" => "attach_image",
        "heading" => esc_html__("Офис в Казани (фото)", "wayup"),
        "param_name" => "office3photo",
        "value" => '',
        "description" => esc_html__("Введите текст", "wayup")
      ),

      array(
        "type" => "textfield",
        "heading" => esc_html__("Офис в Тюмени (адрес)", "wayup"),
        "param_name" => "office4",
        "value" => esc_html__("г. Москва, ул. Бутырская, 62 Z-Plaza, 5-й этаж", "wayup"),
        "description" => esc_html__("Введите текст", "wayup")
      ),
      array(
        "type" => "attach_image",
        "heading" => esc_html__("Офис в Тюмени (фото)", "wayup"),
        "param_name" => "office4photo",
        "value" => '',
        "description" => esc_html__("Введите текст", "wayup")
      ),

      array(
        "type" => "textfield",
        "heading" => esc_html__("Офис в Благовещенске (адрес)", "wayup"),
        "param_name" => "office5",
        "value" => esc_html__("г. Москва, ул. Бутырская, 62 Z-Plaza, 5-й этаж", "wayup"),
        "description" => esc_html__("Введите текст", "wayup")
      ),
      array(
        "type" => "attach_image",
        "heading" => esc_html__("Офис в Благовещенске (фото)", "wayup"),
        "param_name" => "office5photo",
        "value" => '',
        "description" => esc_html__("Введите текст", "wayup")
      ),

      array(
        "type" => "textfield",
        "heading" => esc_html__("Офис в Норильске (адрес)", "wayup"),
        "param_name" => "office6",
        "value" => esc_html__("г. Москва, ул. Бутырская, 62 Z-Plaza, 5-й этаж", "wayup"),
        "description" => esc_html__("Введите текст", "wayup")
      ),
      array(
        "type" => "attach_image",
        "heading" => esc_html__("Офис в Норильске (фото)", "wayup"),
        "param_name" => "office6photo",
        "value" => '',
        "description" => esc_html__("Введите текст", "wayup")
      ),

      array(
        "type" => "textfield",
        "heading" => esc_html__("Офис во Владивостоке (адрес)", "wayup"),
        "param_name" => "office7",
        "value" => esc_html__("г. Москва, ул. Бутырская, 62 Z-Plaza, 5-й этаж", "wayup"),
        "description" => esc_html__("Введите текст", "wayup")
      ),
      array(
        "type" => "attach_image",
        "heading" => esc_html__("Офис во Владивостоке (фото)", "wayup"),
        "param_name" => "office7photo",
        "value" => '',
        "description" => esc_html__("Введите текст", "wayup")
      ),

    )
  ));
}

//Team Slider Extension
if (class_exists('WPBakeryShortCodesContainer')) {
  class WPBakeryShortCode_Wayup_Team_Slider extends WPBakeryShortCodesContainer {
  }
}
if (function_exists('vc_map')) {
  vc_map(array(
    "name" => esc_html__('Наша команда', 'wayup'),
    "base" => "wayup_team_slider",
    "as_parent" => array('only' => 'wayup_team_slider_item'),
    'description' => esc_html__('Описание для модуля', 'olins'),
    "content_element" => true,
    "category" => esc_html__('Wayup', 'wayup'),
    "icon" => '',
    "show_settings_on_create" => false,
    "params" => array(),
    "js_view" => 'VcColumnView'
  ));
}
if (class_exists("WPBakeryShortCode")) {
  class WPBakeryShortCode_Wayup_Team_Slider_Item extends WPBakeryShortCode {
  }
}
if (function_exists('vc_map')) {
  vc_map(array(
    'name' => esc_html__('Член команды', 'wayup'),
    'base' => 'wayup_team_slider_item',
    'category' => esc_html__('Wayup', 'wayup'),
    'description' => esc_html__('Тест', 'wayup'),
    'show_settings_on_create' => true,
    "as_child" => array('only' => 'wayup_team_slider'),
    'icon' => '',
    'weight' => -5,
    'params' => array(
      array(
        "type" => "attach_image",
        "heading" => esc_html__("Фото члена команды", "wayup"),
        "param_name" => "photo",
        "description" => esc_html__("Select or Upload an image.", "wayup")
      ),
      array(
        "type" => "textfield",
        "heading" => esc_html__("Имя", "wayup"),
        "param_name" => "name",
        "value" => '',
        "description" => esc_html__("Введите имя", "wayup")
      ),
      array(
        "type" => "textfield",
        "heading" => esc_html__("Должность", "wayup"),
        "param_name" => "status",
        "value" => '',
        "description" => esc_html__("Введите должность", "wayup")
      ),
      array(
        "type" => "textarea",
        "heading" => esc_html__("Описание", "wayup"),
        "param_name" => "desc",
        "value" => '',
        "description" => esc_html__("Введите описание", "wayup")
      ),
      array(
        "type" => "textfield",
        "heading" => esc_html__("ВК линк", "wayup"),
        "param_name" => "vklink",
        "value" => '',
        "description" => esc_html__("Введите", "wayup")
      ),
      array(
        "type" => "textfield",
        "heading" => esc_html__("ФБ линк", "wayup"),
        "param_name" => "fblink",
        "value" => '',
        "description" => esc_html__("Введите", "wayup")
      ),
      array(
        "type" => "textfield",
        "heading" => esc_html__("TW линк", "wayup"),
        "param_name" => "twlink",
        "value" => '',
        "description" => esc_html__("Введите", "wayup")
      ),
      array(
        "type" => "textfield",
        "heading" => esc_html__("IG линк", "wayup"),
        "param_name" => "instalink",
        "value" => '',
        "description" => esc_html__("Введите", "wayup")
      ),

    )
  ));
}

//Help Shortcode
if (class_exists("WPBakeryShortCode")) {
  class WPBakeryShortCode_Wayup_Help_Module extends WPBakeryShortCode {
  }
}
if (function_exists('vc_map')) {
  vc_map(array(
    'name' => esc_html__('Блок помощи', 'wayup'),
    'base' => 'wayup_help_module',
    'category' => esc_html__('Wayup', 'wayup'),
    'description' => esc_html__('Введите данные', 'wayup'),
    'show_settings_on_create' => true,
    'icon' => '',
    'weight' => -5,
    'params' => array(
      array(
        "type" => "textfield",
        "heading" => esc_html__("Заголовок 1", "wayup"),
        "param_name" => "title1",
        "value" => esc_html__("Кому мы", "wayup"),
        "description" => esc_html__("Введите текст", "wayup")
      ),
      array(
        "type" => "textfield",
        "heading" => esc_html__("Заголовок 2", "wayup"),
        "param_name" => "title2",
        "value" => esc_html__("ПОМОГАЕМ", "wayup"),
        "description" => esc_html__("Введите текст", "wayup")
      ),
      array(
        "type" => "textarea",
        "heading" => esc_html__("Описание", "wayup"),
        "param_name" => "desc",
        "value" => esc_html__("Мы фокусируемся на юридических вопросах, актуальных для успешного современного бизнеса", "wayup"),
        "description" => esc_html__("Введите текст", "wayup")
      ),
      array(
        "type" => "textfield",
        "heading" => esc_html__("Ссылка", "wayup"),
        "param_name" => "link",
        "value" => esc_html__("#", "wayup"),
        "description" => esc_html__("Вставьте ссылку", "wayup")
      ),
      array(
        "type" => "textfield",
        "heading" => esc_html__("Блок 1 заголовок", "wayup"),
        "param_name" => "block1title",
        "value" => esc_html__("Стартапам", "wayup"),
        "description" => esc_html__("Введите заголовок", "wayup")
      ),
      array(
        "type" => "textarea",
        "heading" => esc_html__("Блок 1 описание", "wayup"),
        "param_name" => "block1desc",
        "value" => esc_html__("Когда вы будете готовы вывести свой стартап на новый уровень, мы можем оказать вам юридические услуги, чтобы помочь вам расти", "wayup"),
        "description" => esc_html__("Введите текст", "wayup")
      ),
      array(
        "type" => "textfield",
        "heading" => esc_html__("Блок 2 заголовок", "wayup"),
        "param_name" => "block2title",
        "value" => esc_html__("Фрилансеру", "wayup"),
        "description" => esc_html__("Введите заголовок", "wayup")
      ),
      array(
        "type" => "textarea",
        "heading" => esc_html__("Блок 2 описание", "wayup"),
        "param_name" => "block2desc",
        "value" => esc_html__("Начать независимый бизнес проще, чем когда-либо. Неважно подрабатываете вы или работаете самостоятельно, мы можем помочь вам сделать все правильно", "wayup"),
        "description" => esc_html__("Введите текст", "wayup")
      ),
      array(
        "type" => "textfield",
        "heading" => esc_html__("Блок 3 заголовок", "wayup"),
        "param_name" => "block3title",
        "value" => esc_html__("Малому бизнесу", "wayup"),
        "description" => esc_html__("Введите заголовок", "wayup")
      ),
      array(
        "type" => "textarea",
        "heading" => esc_html__("Блок 3 описание", "wayup"),
        "param_name" => "block3desc",
        "value" => esc_html__("Мы поможем направить ваш бизнес в правильном направлении. Окажем услуги в области договорного, трудового права, недвижимости и многое другое", "wayup"),
        "description" => esc_html__("Введите текст", "wayup")
      ),
    )
  ));
}

//Why We Shortcode
if (class_exists("WPBakeryShortCode")) {
  class WPBakeryShortCode_Wayup_Why_Module extends WPBakeryShortCode {
  }
}
if (function_exists('vc_map')) {
  vc_map(array(
    'name' => esc_html__('Блок Почему мы!', 'wayup'),
    'base' => 'wayup_why_module',
    'category' => esc_html__('Wayup', 'wayup'),
    'description' => esc_html__('Введите данные', 'wayup'),
    'show_settings_on_create' => true,
    'icon' => '',
    'weight' => -5,
    'params' => array(
      array(
        "type" => "textfield",
        "heading" => esc_html__("Заголовок 1", "wayup"),
        "param_name" => "title1",
        "value" => esc_html__("Почему мы –", "wayup"),
        "description" => esc_html__("Введите текст", "wayup")
      ),
      array(
        "type" => "textfield",
        "heading" => esc_html__("Заголовок 2", "wayup"),
        "param_name" => "title2",
        "value" => esc_html__("правильный выбор для вас", "wayup"),
        "description" => esc_html__("Введите текст", "wayup")
      ),
      array(
        "type" => "textarea_html",
        "heading" => esc_html__("Описание", "wayup"),
        "param_name" => "content",
        "value" => '',
        "description" => esc_html__("Введите текст", "wayup")
      ),
      array(
        "type" => "attach_image",
        "heading" => esc_html__("Фото", "wayup"),
        "param_name" => "photo",
        "value" => '',
        "description" => esc_html__("Загрузите фото", "wayup")
      ),
      array(
        "type" => "textfield",
        "heading" => esc_html__("Ссылка", "wayup"),
        "param_name" => "link",
        "value" => '',
        "description" => esc_html__("Укажите ссылку", "wayup")
      ),
    )
  ));
}

//Features Shortcode
if (class_exists("WPBakeryShortCode")) {
  class WPBakeryShortCode_Wayup_Features_Module extends WPBakeryShortCode {
  }
}
if (function_exists('vc_map')) {
  vc_map(array(
    'name' => esc_html__('Блок Кейсы', 'wayup'),
    'base' => 'wayup_features_module',
    'category' => esc_html__('Wayup', 'wayup'),
    'description' => esc_html__('Введите данные', 'wayup'),
    'show_settings_on_create' => true,
    'icon' => '',
    'weight' => -5,
    'params' => array(
      array(
        "type" => "textfield",
        "heading" => esc_html__("Заголовок 1", "wayup"),
        "param_name" => "title1",
        "value" => esc_html__("Наши", "wayup"),
        "description" => esc_html__("Заполните заголовок 1", "wayup")
      ),
      array(
        "type" => "textfield",
        "heading" => esc_html__("Заголовок 2", "wayup"),
        "param_name" => "title2",
        "value" => esc_html__("КЕЙСЫ", "wayup"),
        "description" => esc_html__("Заполните заголовок 2", "wayup")
      ),
      array(
        "type" => "textfield",
        "heading" => esc_html__("Описание", "wayup"),
        "param_name" => "desc",
        "value" => esc_html__("Кейсы – это описание конкретной ситуации или случая в определённой сфере юридической практики. Вы можете ознакомиться с конкретными ситуациями, с которыми сталкивались юристы компании JC", "wayup"),
        "description" => esc_html__("Заполните описание", "wayup")
      ),
    )
  ));
}

//Testimonial Shortcode
if (class_exists("WPBakeryShortCode")) {
  class WPBakeryShortCode_Wayup_Testimonial_Module extends WPBakeryShortCode {
  }
}
if (function_exists('vc_map')) {
  vc_map(array(
    'name' => esc_html__('Блок Отзывы', 'wayup'),
    'base' => 'wayup_testimonial_module',
    'category' => esc_html__('Wayup', 'wayup'),
    'description' => esc_html__('Введите данные', 'wayup'),
    'show_settings_on_create' => true,
    'icon' => '',
    'weight' => -5,
    'params' => array(
      array(
        "type" => "textfield",
        "heading" => esc_html__("Заголовок 1", "wayup"),
        "param_name" => "title1",
        "value" => esc_html__("За нас говорят", "wayup"),
        "description" => esc_html__("Заполните заголовок 1", "wayup")
      ),
      array(
        "type" => "textfield",
        "heading" => esc_html__("Заголовок 2", "wayup"),
        "param_name" => "title2",
        "value" => esc_html__("НАШИ КЛИЕНТЫ", "wayup"),
        "description" => esc_html__("Заполните заголовок 2", "wayup")
      ),
    )
  ));
}

//Services Shortcode
if (class_exists("WPBakeryShortCode")) {
  class WPBakeryShortCode_Wayup_Services_Module extends WPBakeryShortCode {
  }
}
if (function_exists('vc_map')) {
  vc_map(array(
    'name' => esc_html__('Блок Услуги', 'wayup'),
    'base' => 'wayup_services_module',
    'category' => esc_html__('Wayup', 'wayup'),
    'description' => esc_html__('Введите данные', 'wayup'),
    'show_settings_on_create' => true,
    'icon' => '',
    'weight' => -5,
    'params' => array(
      array(
        "type" => "textfield",
        "heading" => esc_html__("Заголовок 1", "wayup"),
        "param_name" => "title1",
        "value" => esc_html__("Наши", "wayup"),
        "description" => esc_html__("Заполните заголовок 1", "wayup")
      ),
      array(
        "type" => "textfield",
        "heading" => esc_html__("Заголовок 2", "wayup"),
        "param_name" => "title2",
        "value" => esc_html__("УСЛУГИ", "wayup"),
        "description" => esc_html__("Заполните заголовок 2", "wayup")
      ),
    )
  ));
}

//News Shortcode
if (class_exists("WPBakeryShortCode")) {
  class WPBakeryShortCode_Wayup_News_Module extends WPBakeryShortCode {
  }
}
if (function_exists('vc_map')) {
  vc_map(array(
    'name' => esc_html__('Блок Новости', 'wayup'),
    'base' => 'wayup_news_module',
    'category' => esc_html__('Wayup', 'wayup'),
    'description' => esc_html__('Введите данные', 'wayup'),
    'show_settings_on_create' => true,
    'icon' => '',
    'weight' => -5,
    'params' => array()
  ));
}
