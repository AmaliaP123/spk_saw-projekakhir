<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LOGIN AREA</title>
        
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css" />
        <link rel="shortcut icon" href="<?= base_url() ?>assets/frontend/img/favicon.png" />
        <script type="text/javascript" src="<?= base_url() ?>assets/jquery-1.12.3.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="col-md-3" style="margin-top: 10%">
               
        </form>
    </div>
        <div class="col-md-5 col-md-offset-0" style="margin-top: 10%">
            <form method="post" action="<?= site_url() ?>/admin/validasi">
                <div class="panel panel-default">
                    <div class="panel-heading">Silakan Login</div>

                    <div class="panel-body">
                        <p><?php echo $this->session->flashdata('msg');?></p>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" />
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>  
                    <div class="panel-footer small">
                        PT. MITRA GEMILANG INTI PERKASA
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>