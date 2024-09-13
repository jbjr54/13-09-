<?php 
    // Chamada de conexão com o Banco de Dados através do arquivo externo
    include("../private/db/conexao.php");

    // Comando SQL para listagem dos registros vindos do MySQL em ordem decrescente
    $consulta = "SELECT FOTO_ADOCAO, NOME, ESPECIE, RACA, SEXO, DTA_NASC, CARACT, SAUDE, TUTOR_EMAIL, TUTOR_CELL FROM viadaspatinhas.tb_adocao WHERE ID = ?" ;

    // Guarda dados retornados em um array (matriz)
    $result = $conn->query($consulta);

    // Verifica se a consulta foi bem-sucedida
    if ($result === false) {
        die("Erro na consulta: " . $conn->error);
    }

    // Caso o banco de dados retorne 1 linha ou mais, inicia uma estrutura de repetição para listar
    if ($result->num_rows > 0) 
    {
        // Escreve os dados do Array (matriz) e a cada volta no loop do while escreve um registro na tela
?>