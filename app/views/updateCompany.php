<div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                TESTE
            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Alteração cadastral</h3>
                        <form method="POST" class="row register-form" action="/company/update">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="company" class="form-control" placeholder="Company Name" value="<?= $company->getCompany() ?>" required/>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="cnpj" class="form-control" id="CNPJ" placeholder="CNPJ" value="<?= $company->getCnpj() ?>" required>
                                    <script>$("#CNPJ").mask("99.999.999/9999-99");</script>
                                </div>
                                <input type="submit" class="btnRegister" value="Register"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>