<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato - Restaurante Gourmet</title>
    <link href="dist/css/cssContato.css" rel="stylesheet" />
</head>
<body>
    <header>
        <h1>Entre em Contato</h1>
        <a href="index.php">Voltar</a>
    </header>
    <main>
        <section class="contact-info">
        <center>
            <h2>Informações de Contato</h2>
            <p>Alguma duvida ou problema?</p>
            <p>Entre já em contato</p>
        </center>
            <br>
            <p><strong>Telefone:</strong> (47) 99710-0817 <img src="dist/images/chamada-telefonica.png" class="img-icone" ></p>
            <p><strong>Telefone:</strong> (47) 99938-8882 <img src="dist/images/chamada-telefonica.png" class="img-icone" ></p>
            <p><strong>Email:</strong> daniel_mn_costa@estudante.sc.senai.br <img src="dist/images/o-email.png" class="img-icone" ></p>
            <p><strong>Email:</strong> luis_furlan@estudante.sesisenai.org.br <img src="dist/images/o-email.png" class="img-icone" ></p>
            <p><strong>Horário de Funcionamento:</strong> Seg a Sab: 10h - 22h</p>
        </section>

        <section class="contact-form">
            <h2>Envie uma Mensagem</h2>
            <form action="#" method="post">
                <label for="name">Nome:</label>
                <input type="text" id="name" name="name" placeholder="Seu nome completo" required>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Seu email" required>
                
                <label for="message">Mensagem:</label>
                <textarea id="message" name="message" placeholder="Escreva sua mensagem aqui..." rows="5" required></textarea>
                
                <button type="submit">Enviar</button>
            </form>
        </section>

        <section class="map">
            <h2>Localização</h2>
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.835434509202!2d-122.41941508467704!3d37.77492927975915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8085809c5f2765f7%3A0x6b65f0e83b2c6b2a!2sRestaurante!5e0!3m2!1spt-BR!2sbr!4v1234567890123" 
                height="300" 
                allowfullscreen>
            </iframe>
        </section>
    </main>
    <footer>
        &copy; 2024 Cantina Pizzaria. Todos os direitos reservados.
    </footer>
</body>
</html>
