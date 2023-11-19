<div class="tabsCards">
    <div class="cardOpcoesUsuario">
        <a href="{{ route('configurar.get') }}" class="acessarOpcao">
            <div class="titleOpcoesUser">
                <h3>Perfil </h2><ion-icon name="settings"></ion-icon>
            </div>
            <p>Modifique as Configurações do seu perfil</p>            
        </a>
    </div>
    <div class="cardOpcoesUsuario">
        <a href="{{ route('seguranca.get') }}" class="acessarOpcao">
            <div class="titleOpcoesUser">
                <h3>Segurança da Conta </h2><ion-icon name="lock-closed-outline"></ion-icon>
            </div>
            <p>Altere sua senha e ativação do 2FA</p>           
        </a>
    </div>
    <div class="cardOpcoesUsuario">
        <a href="{{ route('deletar') }}" class="acessarOpcao">
            <div class="titleOpcoesUser">
                <h3>Deletar Conta </h2><ion-icon name="close"></ion-icon>
            </div>
            <p>Não creio que seja preciso, mas se desejar...</p>            
        </a>
    </div>
</div>
