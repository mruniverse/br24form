<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title-guide">
            Bem-vindo <?= $request['NAME'] ?>!
        </div>
    </div>
    <?
    echo "<pre>";
    foreach ($contacts as $contact) {
        print_r($contact);
    }
    echo "<pre>";
    ?>
</div>
