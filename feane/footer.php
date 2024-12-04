<!-- footer.php -->

<style>
   /* Garantir que o footer ocupe toda a largura da tela */
footer {
  background-color: #333333; /* Cor de fundo escura */
  color: #ffffff; /* Cor do texto branca */
  padding: 0px;
  text-align: center;
  width: 100%; /* Largura total da tela */
  box-sizing: border-box; /* Inclui o padding no cálculo da largura */
  position: relative; /* Garante que o footer se posicione corretamente */
}

footer p {
  margin: 0;
  font-size: 0.9em;
}

footer ul {
  list-style: none;
  padding: 0;
  display: flex;
  justify-content: center; /* Centraliza os itens do menu */
  margin: 10px 0 0 0;
  width: 100%; /* Garante que a lista ocupe toda a largura */
}

footer ul li {
  margin: 0 10px;
}

footer ul li a {
  color: #ffffff; /* Cor branca para os links */
  text-decoration: none;
  font-size: 0.9em;
  transition: color 0.3s;
}

footer ul li a:hover {
  color: #ffdd57; /* Cor amarela ao passar o mouse */
}
</style>

<footer>
    <p>&copy; <?php echo date("Y"); ?> Cantina Pizzaria. Todos os direitos reservados.</p>
    <ul>
        <li><a href="politica-privacidade.php">Política de Privacidade</a></li>
        <li><a href="termos-de-uso.php">Termos de Uso</a></li>
        <li><a href="contato.php">Contato</a></li>
    </ul>
</footer>