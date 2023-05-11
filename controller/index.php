<?php
require "../view/funcoes.php";
require "../model/Enquete.php";

cabecalho();

echo "<form action=\"gravaenquete.php\" method=\"post\" name=\"f1\"class=\"form-line\">
    <center>
        <label>
            Qual ODS você considera a mais importante para o Brasil?<p><p>
            <select name=\"txtsugestao\" class=\"form-control\">
                <option value=\"\">Selecione...</option>
                <option value=\"Erradicação da Pobreza\">1- Erradicação da Pobreza</option>
                <option value=\"Fome Zero e Agricultura Sustentável\">2- Fome Zero e Agricultura Sustentável</option>
                <option value=\"Saúde e Bem-Estar\">3- Saúde e Bem-Estar</option>
                <option value=\"Educação de Qualidade\">4- Educação de Qualidade</option>
                <option value=\"Igualdade de Gênero\">5- Igualdade de Gênero</option>
                <option value=\"Água Potável e Saneamento\">6- Água Potável e Saneamento</option>
                <option value=\"Energia Limpa e Acessível\">7- Energia Limpa e Acessível</option>
                <option value=\"Trabalho Decente e Crescimento Econômico\">8- Trabalho Decente e Crescimento Econômico</option>
                <option value=\"Indústria, Inovação e Infraestrutura\">9- Indústria, Inovação e Infraestrutura</option>
                <option value=\"Redução das Desigualdades\">10- Redução das Desigualdades</option>
                <option value=\"Cidades e Comunidades Sustentáveis\">11- Cidades e Comunidades Sustentáveis</option>
                <option value=\"Consumo e Produção Responsáveis\">12- Consumo e Produção Responsáveis</option>
                <option value=\"Ação contra a Mudança Global do Clima\">13- Ação contra a Mudança Global do Clima</option>
                <option value=\"Vida na Água\">14- Vida na Água</option>
                <option value=\"Vida Terrestre\">15- Vida Terrestre</option>
                <option value=\"Paz, Justiça e Instituições Eficazes\">16- Paz, Justiça e Instituições Eficazes</option>
                <option value=\"Parcerias e Meios de Implementação\">17- Parcerias e Meios de Implementação.</option>
            </select>
            <p><p>
            Por quais motivos?<br>
            <input type=\"text\" autofocus name=\"txtods\" size=\"40\" maxlenght=\"100\" class=\"form-control\">
        </label>
    </center>
    <p style=\"text-align:center\">
        <input type=\"submit\" class=\"btn btn-primary\" value=\"Gravar\">
        <input type=\"reset\" class=\"btn btn-primary\" value=\"Limpar\">
    </p>
</form>";

rodape();
?>
