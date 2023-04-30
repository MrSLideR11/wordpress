<div class="modal">
    <div class="form">
        <h2 class="form_title"></h2>
        <p class="form_description">Мы перезвоним вам и ответим на любой вопрос</p>
        <?php get_template_part(
            "components/fos", 
            null, 
            [
                "inputs" => [
                    [
                        "type" => "text", 
                        "name" => "name", 
                        "placeholder" => "Ваше имя",
                        "required" => false
                    ], [
                        "type" => "tel", 
                        "name" => "phone", 
                        "placeholder" => "+7 (___) ___-__-__",
                        "required" => true
                    ]
                ], 
                "orientation" => "vertikal",
                "agreement" => true
            ]
        ); ?>
        <span class="form_close">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.6812 18.8879L1.11221 3.3189C0.482039 2.68873 0.478247 1.72872 1.10346 1.10351C1.72868 0.47829 2.68869 0.482082 3.31886 1.11226L18.8879 16.6813C19.5181 17.3115 19.5219 18.2715 18.8966 18.8967C18.2714 19.5219 17.3114 19.5181 16.6812 18.8879Z" fill="black"/>
                <path d="M18.888 3.3187L3.31896 18.8877C2.68879 19.5179 1.72878 19.5217 1.10357 18.8965C0.478351 18.2713 0.482143 17.3113 1.11232 16.6811L16.6813 1.11205C17.3115 0.481874 18.2715 0.478082 18.8967 1.1033C19.522 1.72851 19.5182 2.68852 18.888 3.3187Z" fill="black"/>
            </svg>
        </span>
    </div>
</div>