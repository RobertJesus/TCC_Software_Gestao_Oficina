
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Central do Assinante</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
    </head>
    <body>
        <div class="container-fluid">
            <header>
                <!--<div class="form-group">
                    <a class="navbar-brand"><img src="https://static.ferramentaskennedy.com.br/storage/assets/tools1.png" style="width:125px;"></a>
                </div>-->
            </header>
            <div class="row d-flex justify-content-center"> 
                <div class="form-group col-md-4">
                    <div class="card central">
                        <div class="card-body text-center">
                            <h4 class="card-title">Central do Assinante</h4>
                            <h6 class="card-subtitle mb-2 text-muted">Informe seu CPF ou CNPJ para acessar a area do cliente.</h6>
                            <form method="POST" action="">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="CPF ou CNPJ do assinante" name="record" />
                                </div>
                                <a class="btn btn-info btn-sm btn-block" href="#">Acessar a Central do Assinante</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>