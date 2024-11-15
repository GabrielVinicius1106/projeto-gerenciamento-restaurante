<!-- header.php -->

<style>
    header {
    background-color: #333333; /* Cor de fundo */
    padding: 20px;
    width: 100%; /* Largura total da tela */
    box-sizing: border-box; /* Ajusta o padding sem ultrapassar a largura */
}

header nav {
    display: flex;
    justify-content: space-between; /* Espaça os itens uniformemente */
    align-items: center; /* Centraliza verticalmente */
    max-width: 1200px; /* Tamanho máximo para centralizar */
    margin: 0 auto; /* Centraliza o conteúdo */
}

header nav ul {
    list-style: none;
    display: flex;
    justify-content: center; /* Centraliza os itens do menu */
    margin: 0;
    padding: 0;
}

header nav ul li {
    margin: 0 15px;
}

header nav ul li a {
    color: #ffffff; /* Cor branca para os links */
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s;
}

header nav ul li a:hover {
    color: #ffdd57; /* Cor amarela ao passar o mouse */
}
</style>

<header>
    <nav>
        <ul>
        </ul>
    </nav>
</header>