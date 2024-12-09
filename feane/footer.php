<!-- footer.php -->

<style>

footer {
  background-color: #333;
  color: #ffffff; 
  padding: 0px;
  text-align: center;
  width: 100%;
  box-sizing: border-box; 
  position: relative; 
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
  color: #ffffff;
  text-decoration: none;
  font-size: 0.9em;
  transition: color 0.3s;
}

footer ul li a:hover {
  color: #ffdd57;
}
</style>

<footer>
    <p>&copy; <?php echo date("Y"); ?> Cantina Pizzaria. Todos os direitos reservados.</p>
    <ul>
        <li><a href="#">Política de Privacidade</a></li>
        <li><a href="sobre.php">Quem somos?</a></li>
        <li><a href="contato.php">Contato</a></li>
    </ul>
</footer>