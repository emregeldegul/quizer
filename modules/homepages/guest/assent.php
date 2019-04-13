<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo NAME; ?> | Üyelik Uyarısı</h3>
            </div>
            <div class="panel-body">
                <fieldset>
                    <form action="<?php echo URL."/?mod=signup"; ?>" method="POST">

                        <label for="">Üye Olmadan Önce Mutlaka Okuyunuz</label><br>
                        <ul>
                            <li>Okul numaranızı xx-xxx-xxx şeklinde giriniz.</li>
                            <li>Bilgilerinizi doğru bir şekilde giriniz.</li>
                            <li>Üyelikler onay sürecinden geçmektedir.</li>
                            <li>Çift hesap açmayınız.</li>
                        </ul>
                        <input type="submit" name="assent" value="Kabul Ediyorum" class="btn btn-lg btn-success btn-block">
                    </form>
                </fieldset>
            </div>
        </div>
    </div>
</div>
