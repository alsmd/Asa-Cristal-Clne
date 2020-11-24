    <!-- REGISTRAR -->
    <div class="d-flex justify-content-center registrar esconder-login">
        <div class="login-container container text-light">
            <div class="login-header d-flex justify-content-between">
                <div class="login-header-content d-flex align-items-center">
                    <span class="mr-2"><i class="fas fa-crow"></i></span>   já possui uma  conta? <a href="#" class="mudar-de-login text-warning ml-2">Logar</a>
                </div>
    
                <button class="btn btn-dark py-2 px-3" id="btn-fechar-registrar"><i class="fas fa-times"></i></button>
            </div>
    
    
            <div class="login-body row">
                <!-- REGISTRAR NO CONTA DO SITE -->
                <div class="col-md-6 login-body-item1">
                    <form action="/register" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nome:</label>
                            <input type="text" id="name" name="name" class="form-control bg-dark">
                        </div>
                        <div class="form-group">
                            <label for="re_email">Email:</label>
                            <input type="email" id="email" name="email" class="form-control bg-dark">
                        </div>
                        
                        <!-- <div class="form-group">
                            <label for="con_email">Confirmar Email:</label>
                            <input type="email" id="con_email" name="email" class="form-control bg-dark">
                        </div> -->
                        <div class="form-group">
                            <label for="password">Senha:</label>
                            <input type="password" id="password" name="password" class="form-control bg-dark">
                        </div>
                       
                        <div class="form-group">
                            <label for="con_senha">Confirmar Senha:</label>
                            <input type="password" id="con_senha" name="password_confirmation" class="form-control bg-dark">
                        </div>
                        

                        <div class="row mx-0">
                            <div class="custom-control custom-checkbox col-6">
                                <input type="checkbox" class="custom-control-input" id="aceitar_termos" required>
                                <label class="custom-control-label" for="aceitar_termos">Aceito e concordo com as politicas da empresa.</label>
                            </div>
                        </div>
                        <button class="btn btn-outline-success py-2 px-4 mt-4">Registrar</button>

                        <button class="btn btn-outline-secondary py-2 px-4 mt-4 mostrar-face" type="button">Face</button>
                    </form>
                </div>
               <!--  REGISTRAR POR REDES SOCIAIS -->
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
                            <button class="btn btn-outline-secondary py-2 px-4  mostrar-face" type="button">Registrar</button>
                            
                        </div>
                       

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $("#btn-fechar-registrar").on('click',()=>{
            $('.registrar').toggleClass('esconder-login');
        })
         
        //Trocar a visualização de login
        //Trocar a visualização de login
        
        $(".registrar .mostrar-face").on('click',()=>{
            if($('.registrar .login-body-item2').hasClass('mudar-login')){
                $('.registrar .login-body-item2').removeClass('mudar-login');
                $('.registrar .login-body-item1').addClass('mudar-login');
            }else{
                $('.registrar .login-body-item1').removeClass('mudar-login');
                $('.registrar .login-body-item2').addClass('mudar-login');
            }
        })
    </script>