    <!-- Login model -->
    <div class="d-flex justify-content-center login esconder-login">
        <div class="login-container container text-light">
            <div class="login-header d-flex justify-content-between">
                <div class="login-header-content d-flex align-items-center">
                    <span class="mr-2">Login.</span>   Não tem conta? <a href="#" class="mudar-de-login">Registrar</a>
                </div>
    
                <button class="btn btn-dark py-2 px-3" id="btn-fechar"><i class="fas fa-times"></i></button>
            </div>
    
    
            <div class="login-body row">
                <!-- LOGIN COM CONTA DO SITE -->
                <div class="col-md-6 login-body-item1">
                    <form action="">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" class="form-control bg-dark">
                        </div>
    
                        <div class="form-group">
                            <label for="senha">Senha:</label>
                            <input type="password" id="senha" name="senha" class="form-control bg-dark">
                        </div>

                        <div class="row mx-0">
                            <div class="custom-control custom-checkbox col-6">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Lembrar de min</label>
                            </div>
                            <a href="" class="col-6">Esqueceu a senha?</a>
                        </div>
                        <button class="btn btn-outline-primary py-2 px-4 mt-4">Logar</button>

                        <button class="btn btn-outline-secondary py-2 px-4 mt-4 mostrar-face" type="button">Face</button>
                    </form>
                </div>
               <!--  LOGIN POR REDES SOCIAIS -->
                <div class="col-md-6 login-body-item2 mudar-login">
                    <h3 class="mb-4">Acessar com Facebook</h3>

                    <div>
                        <div class="d-flex align-items-center mb-4 ">
                            <div class="py-2 px-3  rounded mr-2"style="background:gray;">
                                <i class="fas fa-user-ninja"></i>
                            </div>
                            <span>Logue rápido e jogue os seus jogos!</span> 
                        </div>
                        

                        <button class="btn btn-block btn-info d-flex justify-start align-items-center logar-facebook"><i class="fab fa-facebook-square text-dark  mr-2"></i>Acessar com o facebook</button>

                        <div>
                            <p class="mb-0 mt-3">Outros</p>
                            <button class="btn btn-small btn-outline-danger"> <i class="fab fa-google-plus-g"></i></button>
                            <button class="btn btn-outline-secondary py-2 px-4  mostrar-face" type="button">Login</button>
                        </div>
                       

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $("#btn-fechar").on('click',()=>{
            $('.login').toggleClass('esconder-login');
        })
    //Trocar a visualização de login
    $(".login .mostrar-face").on('click',()=>{
        if($('.login .login-body-item2').hasClass('mudar-login')){
            $('.login-body-item2').removeClass('mudar-login');
            $('.login .login-body-item1').addClass('mudar-login');
        }else{
            $('.login .login-body-item1').removeClass('mudar-login');
            $('.login .login-body-item2').addClass('mudar-login');
        }
    })
    </script>