<?php

if (isset($_POST['data_nascimento']) && !empty($_POST['data_nascimento'])) {
    $data_nascimento = $_POST['data_nascimento'];
    
    if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $data_nascimento)) {
        $partes = explode('-', $data_nascimento);
        $data_nascimento = $partes[2] . '/' . $partes[1] . '/' . $partes[0];
    } else {
        echo "Formato de data inválido.";
        exit;
    }

    libxml_use_internal_errors(true);
    $signos = simplexml_load_file("signos.xml");

    if ($signos === false) {
        echo "Erro ao carregar o arquivo XML.";
        foreach (libxml_get_errors() as $error) {
            echo "<br>", $error->message;
        }
        libxml_clear_errors();
    } else {
        function geraTimestamp($data)
        {
            $partes = explode('/', $data);
            return mktime(0, 0, 0, (int)$partes[1], (int)$partes[0], (int)$partes[2]);
        }

        function check_in_range($start_date, $end_date, $date_from_user)
        {
            $year_parts = explode('/', $date_from_user);
            if (count($year_parts) !== 3) {
                echo "Formato de data inválido fornecido.";
                return false;
            }
            $year = $year_parts[2];
            $start_ts = geraTimestamp($start_date . "/" . $year);
            $end_ts = geraTimestamp($end_date . "/" . $year);
            $user_ts = geraTimestamp($date_from_user);

            return ($user_ts >= $start_ts && $user_ts <= $end_ts);
        }

        foreach ($signos->signo as $l) {
            $start_date = (string)$l->dataInicio;
            $end_date = (string)$l->dataFim;

            if (check_in_range($start_date, $end_date, $data_nascimento)) {           
                echo "<div class='new-container mb-4'>"; 
                echo "<div class='nome'>" . htmlspecialchars((string) $l->signoNome) . "</div><br>"; 
                echo "<hr class='mx-auto'></hr>";
                echo "<div class='highlight'>" . htmlspecialchars((string)$l->descricao) . "</div><br>";
                
                echo "<img src='" . htmlspecialchars((string)$l->imagem) . "' alt='" . htmlspecialchars((string)$l->signoNome) . "' style='width: 200px; height: auto;'><br>";

                
                echo "<a class='' href='index.php'>Voltar ao início 😄</a>";
                echo "</div>";
                break; 
            }           
                      
        }
    }
} else {
    echo "Por favor, insira sua data de nascimento.";
}
?>



<link rel="stylesheet" href="./assets/css/style.css" />