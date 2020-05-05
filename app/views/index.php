<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title-guide">
            Bem-vindo <?= $_SESSION['name'] ?>!

            <?php
                print_r(CRest::checkServer());
            ?>
        </div>
    </div>
</div>
