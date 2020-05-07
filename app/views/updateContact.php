<div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                TESTE
            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Alteração cadastral</h3>
                        <form method="POST" class="row register-form" action="/updateContact">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name" value="<?= $contact->getName() ?>" required/>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Your Email" value="<?= $contact->getEmail() ?>" required/>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="phone" class="form-control" id="phonen"
                                           placeholder="Your Phone" value="<?= $contact->getPhone() ?>" required/>
                                    <script>$("#phonen").mask("(99) 99999-9999");</script>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="cpf" class="form-control" id="CPF" placeholder="CPF" value="<?= $contact->getCpf() ?>" required>
                                    <script>$("#CPF").mask("999.999.999-99");</script>
                                </div>
                                <input type="submit" class="btnRegister" value="Register"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>